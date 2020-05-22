<?php
require_once("database-entrance.php");
session_start();

if($_POST["view"] != '')
{
    $db->set_new_status_visto($_SESSION["ID"]);
    $db->set_new_status_evento_respinto($_SESSION["ID"]);
    $db->set_new_status_evento_accettato($_SESSION["ID"]);
    $db->set_new_status_evento_soldout($_SESSION["ID"]);
}

 //notifiche personalizzate evento accettato "promotore"
$datadiieri=date("Y/m/d",mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
$data=$db->get_evento_accettato($datadiieri,$_SESSION["ID"]);
$output = '';

if(!empty($data)){
    foreach($data as $row){
        $output .= '
        <li>
        <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
        <strong>'.$row["Article_Title"].'</strong><br />
        <small><em>evento accettato</em></small>
        </a>
        </li>
        ';
    }

}
$count=count($data);

 //notifiche personalizzate evento respinto "promotore"
 
 $datadiieri1=date("Y/m/d",mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
 $notificapersobalizzata1=$db->get_evento_respinto($datadiieri1, $_SESSION["ID"]);
 $output1 = '';
 if(!empty($notificapersobalizzata1)){
    foreach($notificapersobalizzata1 as $row){
        $output1 .= '
        <li>
        <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
        <strong>'.$row["Article_Title"].'</strong><br />
        <small><em>evento respinto</em></small>
        </a>
        </li>
        ';
    }
}
$count1=count($notificapersobalizzata1);

//notifiche personalizzate evento sold-out "promotore"
$notificapersobalizzata2=$db->get_evento_soldout($_SESSION["ID"]);
$output2 = '';
 if(!empty($notificapersobalizzata2)){
    foreach($notificapersobalizzata2 as $row){
        $output2 .= '
        <li>
        <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
        <strong>'.$row["Article_Title"].'</strong><br />
        <small><em>evento sold-out!</em></small>
        </a>
        </li>
        ';
    }

}
$count2=count($notificapersobalizzata2);

//evento che sta per scadere 
$datadioggi=date("Y/m/d");
$notificapersobalizzata3=$db->get_evento_scadere($datadioggi);
$acquistatoilBiglietto=$db->get_aquisti($_SESSION["ID"]);
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
$count3=count($notificapersobalizzata3);

$outputfinale= $output.''.$output1.''.$output2.''.$output3;
if($countfinale != ''){
    $db->set_new_status_non_visto($_SESSION["ID"]);  //controllo da rivedere perche output3 e sepre "pieno"
}
$countfinale = $count + $count1+ $count2 + $count3;
$notifiche = array(
    'notification' => $outputfinale,
    'unseen_notification'  => $countfinale
 );
 echo json_encode($notifiche); 


?>