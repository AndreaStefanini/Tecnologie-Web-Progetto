<?php
    require_once("database-entrance.php");
    $db->update_status($_POST["id_articolo"],$_POST["status"]);
    if($_POST["status"]==1){
        $messaggio = "Congratulazioni il tuo articolo, è stato approvato, ed è ora pubblico sul sito!.";
        $db->insert_new_notification($_POST["author"],$messaggio);
    }else{
        $db->insert_new_notification($_POST["author"],$_POST["messagge"]);
    }
    
?>