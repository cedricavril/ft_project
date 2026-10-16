<?php
session_start();

/* proton 7IwaIu7ZFnq%qip[*/

ini_set('display_errors', 'Off');
error_reporting(0);

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


include_once "functions.php";

function renewal($newArray, &$currentArray) {
    //remove new elements from current if any
    $arrayHead = [];
    foreach ($currentArray as $key => $value) {
        if ($index = array_search($value['id'], $newArray)) {
            echo "égalité avec $index où on a {$value['id']}";
            $arrayHead[] = $currentArray[$key];
            unset($currentArray[$key]);
        }
    }
    // reindex
    $currentArray = array_values($currentArray);

    // add the removed new elements in the beginning of the current
    foreach ($arrayHead as $value) {
        array_unshift($currentArray, $value);
    }
}

function callback($buffer, $email) {

    $file = 'cron_dynamic_template_share.php';

    $subject = 'admin - envoi cron depuis francetrouvaille.naytheet.fr';

    if (!file_exists($file)) {
        mail_using_PHPMailer('cedric_avril_pro@hotmail.fr', $subject, 'Fichier de template d\'offres introuvable.');
        exit;
    }

    if (mail_using_PHPMailer($email, $subject, $buffer)) {
        mail_using_PHPMailer('cedric_avril_pro@hotmail.fr', 'France trouvaille - offres', $buffer);
    } else {
        mail_using_PHPMailer('cedric_avril_pro@hotmail.fr', 'mail cron pb d\'envoi', $buffer);
    }
}


foreach ($users as $user) {

    $email = $user['email'];

    /*get old_offers' refs from $old_offers array, Cf. cron.php*/

    $old_offers_codes = array_map(function($row) use ($email) {
        if ($row['email'] !== $email) {
            return;
        }
        return $row['num_offer'];
    }, $old_offers);
    $old_offers_codes = array_filter($old_offers_codes); // remove null lines

    // get current offers
    $filters = json_decode($user['filtre'], true);
    $cached_url = build_api_url($filters);
    $offresData = fetch_offres($cached_url);

    $resultats = $offresData['resultats'] ?? [];
    $total     = count($resultats);

    /* infer current offers refs from FT*/
    $current_offers = [];
    foreach ($resultats as $key => $value)
        $current_offers[] = $value['id'];

    /* infer new offers refs */
    $newOffers = array_diff($current_offers, $old_offers_codes);

    // unshift new offers to the beginning of the current offers array
    renewal($newOffers, $resultats);

    // will be used in the template loop to highlight new offers, since new offers are brought to top of the array
    $total_newOffers = count($newOffers);

    if ($total > 0) {

    ob_start();
        include "cron_dynamic_template_share.php";
        $buffer = ob_get_contents();
    ob_end_clean();

    } else $buffer = '0 offre ce jour.';

    callback($buffer, $email);
    // $db comes from cron.php
    $db->alert_update_old_offers($email, $newOffers);
}
?>