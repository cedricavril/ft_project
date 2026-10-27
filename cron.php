<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Explorateur d’offres France Travail</title>
    <script src="ft_project/app.js"></script>
    <script src="app.js"></script>
</head>
<body>
<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include_once("functions.php");
include_once("database.php");


$db = new DataBase();
$db->getConnection();

// purging old offers 
$db->monthly_purge();
// purging alerts
$emailRecipients = $db->yearly_purge();

//continuer ici
// faire une boucle dès que ça marche
if ($emailRecipients['emailsAlreadyExpired']) {
	foreach ($emailRecipients['emailsAlreadyExpired'] as $email) {
		mail_using_PHPMailer($email, 'Alerte expirée', "Votre alerte de recherche sur <a href='https://francetrouvaille.naytheet.fr'>https://francetrouvaille.naytheet.fr</a> a expiré.");
	}
}
if ($emailRecipients['emailsExpiringNextWeek']) {
	foreach ($emailRecipients['emailsExpiringNextWeek'] as $email) {
		mail_using_PHPMailer($email, 'Alerte sur le point d\'expirer', "Votre alerte de recherche sur <a href='https://francetrouvaille.naytheet.fr'>https://francetrouvaille.naytheet.fr</a> expirera dans une semaine.");
	}
}

$old_offers = $db->alert_get_all_old_offers();
$all_alerts = $db->alerte_get_all();

	// if first day of week, get all users, otherwise get daily ones only
	$users = (date('N') === '1') ? $db->alerte_get_all() : $db->alerte_get_all_by_freq('daily');

	$old_offers = $db->alert_get_old_offers((date('N') === '1') ? '*': 'daily');

	// mailing them theirs FT offers
	include("cron_mail.php");



?>


</body>
</html>