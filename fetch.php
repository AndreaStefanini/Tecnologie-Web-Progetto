<?php
require_once("database-entrance.php");
session_start();

/*include('connect.php');
if(isset($_POST['view'])){*/

if($_POST["view"] != '')
{
    $db->set_new_status_visto($_SESSION["ID"]);
    $db->set_new_status_evento_respinto($_SESSION["ID"]);
}else{
    //$db->set_new_status_non_visto($_SESSION["ID"]);
}

$datadiieri=date("Y/m/d",mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
$data=$db->get_new_event($datadiieri);
$output = '';

if(!empty($data)){
    foreach($data as $row){
        $output .= '
        <li>
        <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
        <strong>'.$row["Article_Title"].'</strong><br />
        <small><em>'.$row["Date_Event"].'</em></small>
        </a>
        </li>
        ';
    }

}
else{
    $output .= '<li><p style="color: black">No notifications</p></li>';
}
$count=count($data);
$notifiche = array(
    'notification' => $output,
    'unseen_notification'  => $count
 );

 //notifiche personalizzate evento respinto
 
 $datadiieri1=date("Y/m/d",mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
 $notificapersobalizzata1=$db->get_evento_respinto($datadiieri1, $_SESSION["ID"]);
 $output1 = '';
 if(!empty($notificapersobalizzata1)){
    foreach($notificapersobalizzata1 as $row){
        $output1 .= '
        <li>
        <a href="obtain_article.php?id='.$row['ID_Articles'].'" style="color: black">
        <strong>'.$row["Article_Title"].'</strong><br />
        <small><em>'.$row["Date_Event"].'</em></small>
        </a>
        </li>
        ';
    }

}
else{
    $output .= '<li><p style="color: black">No notifications</p></li>';
}
$count1=count($data);
$notifiche1 = array(
    'notification' => $output1,
    'unseen_notification'  => $count1
 );

 echo json_encode($notifiche);
 echo json_encode($notifiche1); 

?>