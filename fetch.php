<?php
require_once("database-entrance.php");

/*<?php
include('connect.php');
if(isset($_POST['view'])){

if($_POST["view"] != '')
{
   $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0";
   mysqli_query($con, $update_query);
}

?>*/

$data=$db->get_new_event();
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
$count=$db->get_num_unseen_noti();
$notifiche = array(
    'notification' => $output,
    'unseen_notification'  => $count
 );
 //$db->set_new_status();
 echo json_encode($notifiche);



?>