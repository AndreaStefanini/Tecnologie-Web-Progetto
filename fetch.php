<?php
require_once("database-entrance.php");
session_start();

$notif = $db->fetch_notification($_SESSION["ID"]);
$output="";
foreach($notif as $n){
    $output .= "<a class='dropdown-item' href='#'>". $n["notific_content"] . "</a>" .PHP_EOL;
}


//evento che sta per scadere 
$datadioggi=date("Y-m-d");
$close_event=$db->get_evento_acquistato_vicino($_SESSION["ID"],$datadioggi);
foreach($close_event as $c){
    $output .= "<a class='dropdown-item' href='#'>" . $c["Article_Title"] . " si sta avvicinando!</a>". PHP_EOL;
}
$countEvent=count($close_event);
$countfinale = count($notif) + $countEvent;
if($countfinale != ''){
        $db->set_new_status_non_visto($_SESSION["ID"]);  //controllo da rivedere perche output3 e sepre "pieno"
}
$notifiche = array(
    'notification' => $output,
    'unseen_notification'  => $countfinale
 );
 echo json_encode($notifiche); 


?>