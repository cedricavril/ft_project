<?php

/*sera envoyé chaque lundi pour les dailies.
sera envoyé chaque premier du mois pour les monthlies
*/

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$filters = $_SESSION['filters'];
/*$frequence='weekly';*/
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);
$freq = $data['freq'];
$email = $data['email'];
$update = $data['update'];
$offersIndexToSend = $data['offersIndexToSend'];

include_once("database.php");
$db = new DataBase();
$db->getConnection();

echo $db->alerte_create($email, $filters, $offersIndexToSend, $update, $freq);
?>