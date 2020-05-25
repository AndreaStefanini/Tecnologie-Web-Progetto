<?php
require_once("database-entrance.php");
session_start();

$notif = $db->fetch_notification($_SESSION["ID"]);
$output="";
foreach($notif as $n){
    $output .= "<a class='dropdown-item' href='#'>". $n["notific_content"] . "</a>" .PHP_EOL;
}


//evento che sta per scadere 
$datadioggi=date("Y/m/d");
$notificapersobalizzata3=$db->get_evento_acquistato_vicino($_SESSION["ID"],$datadioggi);
$acquistatoilBiglietto=$db->get_aquisti();
$output3 = '';
if(!empty($acquistatoilBiglietto)){
    if(!empty($notificapersobalizzata3)){
        foreach($acquistatoilBiglietto as $riw){
            foreach($notificapersobalizzata3 as $row){
                if($riw["COD_Evento"]==$row["ID_Articles"]){
                $output3 .= '
                <li>
                <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
                <strong>'.$row["Article_Title"].'</strong><br />
                <small><em>sta per scadere!</em></small>
                </a>
                </li>
                ';
                }
            }
       }
    }
}
$countEvent=count($notificapersobalizzata3);

$output.= $output3;
if($countfinale != ''){
    $db->set_new_status_non_visto($_SESSION["ID"]);  //controllo da rivedere perche output3 e sepre "pieno"
}
$countfinale = count($notif) + $countEvent;
$notifiche = array(
    'notification' => $outputfinale,
    'unseen_notification'  => $countfinale
 );
 echo json_encode($notifiche); 


?>