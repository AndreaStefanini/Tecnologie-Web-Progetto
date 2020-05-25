<?php
session_start();
require_once("database-entrance.php"); 
$notif = $db->fetch_notification($_SESSION["ID"]);
$output="";
foreach($notif as $n){
    $output .= "<a class='dropdown-item' href='#'>". $n["notific_content"] . "</a>" .PHP_EOL;
}
$exitvalue = array(
    "notifiche" => $output,
    "numero_notifiche" => count($notif)
);
echo json_encode($exitvalue);

?> 