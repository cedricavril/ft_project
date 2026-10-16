<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$config = parse_ini_file(__DIR__ . '/config.ini', true);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$FTconfig = $config['FT'];

$ENABLE_CACHE_DATA = false;

define("GET_TOKEN", array(
    'url' => "https://entreprise.francetravail.fr/connexion/oauth2/access_token?realm=/partenaire",
    'opt' => [
        CURLOPT_POST                => true,
        CURLOPT_POSTFIELDS          => http_build_query([
            'grant_type'    => 'client_credentials',
            'client_id'     => $FTconfig['CLIENT_ID'],
            'client_secret' => $FTconfig['CLIENT_SECRET'],
            'scope'         => 'api_offresdemploiv2 o2dsoffre'
        ]),
        CURLOPT_RETURNTRANSFER      => true,
        CURLOPT_HTTPHEADER          => [
            "Content-Type: application/x-www-form-urlencoded"
        ],
        CURLOPT_TIMEOUT             => 100,
        CURLOPT_SSL_VERIFYPEER      => true,
        CURLOPT_SSL_VERIFYHOST      => 2
    ]
));

/* GET_OFFERS below will need a token for the api to work :
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer " . $token
        ]
*/
define("GET_OFFERS", array(
    'opt' => [
        CURLOPT_RETURNTRANSFER      => true,
        CURLOPT_TIMEOUT             => 100,
        CURLOPT_SSL_VERIFYPEER      => true,
        CURLOPT_SSL_VERIFYHOST      => 2
    ]
));

/* ============================================================
   Fetch OAuth2 token using cURL (recommended)
   fetch_offres should have been called this, but given the 
   project lil size and too few curl callings, we just 
   focused on curl params with const vars.
============================================================ */
function api_process($api_params) {
// API process
    $ch = curl_init($api_params['url']);
    curl_setopt_array($ch, $api_params['opt']);
    $response = curl_exec($ch);
    $error    = curl_error($ch);
    curl_close($ch);

// errors
    if ($response === false) {
        echo "<div id='flash-message'><pre class='error-message'>cURL error (token): $error</pre></div>";
        return null;
    }

// data formatting
    $data = json_decode($response, true);

// output the data
    return $data['access_token'] ?? null;
}

/* ============================================================
   Build API URL (France Travail)
============================================================ */
function build_api_url(array $filters): string {
    $base = "https://api.francetravail.io/partenaire/offresdemploi/v2/offres/search?";
    $params = [];

    if ($filters['departement'] !== '') {
        $params[] = "departement=" . urlencode($filters['departement']);
    }
    if ($filters['codeROME'] !== '') {
        $params[] = "codeROME=" . urlencode($filters['codeROME']);
    }
    /* todo: yagni below ?*/
    if ($filters['contrat'] !== '') {
        $params[] = "typeContrat=" . urlencode($filters['contrat']);
    }
    if ($filters['typeContrat'] !== '') {
        $params[] = "typeContrat=" . urlencode($filters['typeContrat']);
    }
    if ($filters['experience'] !== '') {
        $params[] = "experience=" . urlencode($filters['experience']);
    }
    if ($filters['motsCles'] !== '') {
        $params[] = "motsCles=" . urlencode($filters['motsCles']);
    }
    if ($filters['commune'] !== '') {
        $params[] = "commune=" . urlencode($filters['commune']);
    }
/*    if ($filters['range'] !== '') {
        $params[] = "range=" . urlencode($filters['range']);
    }
*/
    $params[] = "range=0-149";

    return $base . implode("&", $params);
}

function highlight_keywords($text, $keywords) {
    if (!$keywords || !$text) return $text;

    // Sépare les mots-clés par espaces
    $words = preg_split('/\s+/', trim($keywords));

    // Échappe les caractères spéciaux regex
    $escaped = array_map('preg_quote', $words);

    // Construit une regex OR insensible à la casse
    $pattern = '/(' . implode('|', $escaped) . ')/i';

    // Remplace par <mark>
    return preg_replace($pattern, '<u>$1</u>', $text);
}

function fetch_offres($url) {

    // 1. Get the token
    $token = $_SESSION['token'] ?? api_process(GET_TOKEN);
    if (!$token) {
        return ['resultats' => [], 'total' => 0];
    } else $_SESSION['token'] = $token;

    $ch = curl_init($url);

    // 2. get the offers
    curl_setopt_array($ch,
        GET_OFFERS['opt'] + [ CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Bearer " . $token
            ] ]
    );

    $response = curl_exec($ch);
    $error    = curl_error($ch);
    curl_close($ch);

    if ($error) echo "<div id='flash-message'><pre class='error-message'>cURL error (API): $error</pre></div>";

/*    if no token, refresh and submit again Cf. app.js */
    if (curl_getinfo($ch)['http_code'] === 401) {
        unset($_SESSION['token']);
        header("Refresh:0");
        exit;
    }

    $data = json_decode($response, true);

    return [
        'resultats' => $data['resultats'] ?? [],
        'total'     => count($data['resultats'] ?? [])
    ];
}

/* ============================================================
   Cache managing
============================================================ */

// Generate a unique cache key based on search parameters
function get_cache_key($params) {
    return 'search_' . md5(json_encode($params)) . '_data' .  '.json';
}

// Load cached data if file exists and is not expired
/*
3600 = 1h

86400 = 24h

300 = 5 minutes
*/
function load_cache($key, $ttl_seconds = 3600) {
    $file = __DIR__ . '/cache/' . $key;

    // No cache file
    if (!file_exists($file)) return null;

    // Cache expired
    if (time() - filemtime($file) > $ttl_seconds) return null;

    // Return decoded JSON
    return json_decode(file_get_contents($file), true);
}

// Save API response to cache
function save_cache($key, $data) {
    $file = __DIR__ . '/cache/' . $key;
    file_put_contents($file, json_encode($data));
}

function mail_using_PHPMailer($to, $subject, $body) {

    $config = parse_ini_file(__DIR__ . '/config.ini', true);

    $mailConfig = $config['mail'];

    require __DIR__ . '/vendor/autoload.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        $mail->isSMTP();
        $mail->Host = $mailConfig['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $mailConfig['smtp_user'];
        $mail->Password = $mailConfig['smtp_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->isHTML(true);

        $mail->setFrom($mailConfig['smtp_user'], 'France Trouvaille');
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();

        return true;
    } catch (Exception $e) {
        echo "ERREUR : {$mail->ErrorInfo}\n";
        return false;
    }
}