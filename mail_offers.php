<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'functions.php';

function callback($buffer, $offresData, $email) {
    
    //offresData used there
    $file = 'dynamic_template_share.php';
    if (!file_exists($file)) {
        echo '<pre class=\'error-message\'>Fichier de template d\'offres introuvable. </pre>';
        exit;
    }

    $subject = 'un test depuis francetrouvaille.naytheet.fr';

    if ($_SESSION['total'] > 50) $suffix = '<pre class=\'error-message\'>Vous pourrez créer une alerte dès que le nombres d\'offres est inférieur à 50</pre>';
    else $suffix = '<div class=\'btn-row modal-single-button\'><button type="button" id="create_alert" class="btn btn-primary" onclick="showModal(\'alert-form\'); document.getElementById(\'alertEmail\').focus();">Créer une alerte</button></div>';

    if (mail_using_PHPMailer($email, $subject, $buffer)) {
        echo "<pre class='info-message'>Mail envoyé avec succès.</pre>$suffix";
    }

    else {
        echo json_encode(['text' => '<pre class=\'error-message\'>Problème d\'envoi de mail. Réessayez ou rechargez la page. Si le problème persiste, contactez France Trouvaille.</pre>', 'status' => 500]);
        http_response_code(403);
    }
}


/*	$headers[] = 'Bcc: anniversaire_verif@example.com';*/

/*get the template with the current values inside*/
$offresData = $_SESSION['offresData'];
$filters = $_SESSION['filters'];
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);
// protection
if (!isset($data['csrf']) || $data['csrf'] !== $_SESSION['csrf']) {

    http_response_code(403);
    exit("Forbidden");
}
$offersIndexToSend = $data['offersIndexToSend'];
$total_quoted = $data['total_quoted'] ?? null;
$email = $data['email'] ?? null;
/*email valide à checker donc*/


ob_start();
    include "dynamic_template_share.php";
    $buffer = ob_get_contents();
ob_end_clean();

callback($buffer, $data, $email);
?>