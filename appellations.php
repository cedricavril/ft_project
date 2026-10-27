<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$config = parse_ini_file(__DIR__ . '/config.ini', true);

$FTconfig = $config['FT'];
$client = $FTconfig['CLIENT_ID'];
$secret = $FTconfig['CLIENT_SECRET'];
$ENABLE_CACHE_DATA = true;

function get_token($client, $secret) {
    $url = "https://entreprise.francetravail.fr/connexion/oauth2/access_token?realm=/partenaire";

    $payload = http_build_query([
        'grant_type'    => 'client_credentials',
        'client_id'     => $client,
        'client_secret' => $secret,
        'scope'         => 'api_rome-metiersv1 nomenclatureRome'
    ]);

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_POST            => true,
        CURLOPT_POSTFIELDS      => $payload,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_HTTPHEADER      => [
            "Content-Type: application/x-www-form-urlencoded"
        ],
        CURLOPT_TIMEOUT         => 100,
        CURLOPT_SSL_VERIFYPEER  => true,
        CURLOPT_SSL_VERIFYHOST  => 2
    ]);

    $response = curl_exec($ch);
    $error    = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        echo "<pre class='error-message'>cURL error (token): $error</pre>";
        return null;
    }

    $data = json_decode($response, true);
    return $data['access_token'] ?? null;
}

    $cacheFile = __DIR__ . '/cache/appellations.json';
    $cacheDuration = 60 * 60 * 24 * 30; // appr. one month

    // 0. Appellations cache exists and is fresh and cache data is enabled : output its data and exit
    if (file_exists($cacheFile) && $ENABLE_CACHE_DATA) {
        $cache = json_decode(file_get_contents($cacheFile), true);
        if (time() - $cache['timestamp'] < $cacheDuration) {
            echo json_encode($cache['data']);
            return;
        }
    }

    // 0. Get the token from the session OR get a new one through the function below
    $token = $_SESSION['token'] ?? get_token($client, $secret);

    // 2. Fetch libelles and rome codes from API
    $url = "https://api.francetravail.io/partenaire/rome-metiers/v1/metiers/appellation?champs=libelle,romeparent";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer " . $token
        ]
    ]);

    $response = curl_exec($ch);

    // 2.1 old token Error : delete it, ask to refresh the page and exit
    if (!$response) {
        unset($_SESSION['token']);
        echo '<p class="error-message">' . 'Récupération des appellations depuis l\'API FT vide, peut être à cause d\'un token périmé. Token supprimé, rechargez la page.' . '</p>';    
        return;
    }

    curl_close($ch);

    // 3 get the data from the payload and format it customizedly
    $data = json_decode($response, true);
    $appellations = [];

    foreach ($data as $item) {
        $appellations[] = [
            "libelle"  => $item["libelle"],
            "codeRome" => $item["romeParent"]
        ];
    }

    // 4. Save the custom cache
    file_put_contents($cacheFile, json_encode([
        "timestamp" => time(),
        "data" => $appellations
    ]));

    // 5. output the data in this format : 
/*        "timestamp" => php time(),
            [
                "libelle"  => fleuriste,
                "codeRome" => code rome de fleuriste
            ]
*/
    echo json_encode($data);