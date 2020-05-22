<?php
session_start();
require_once("database-entrance.php");
if($_POST["submit"]){
    if(!empty($_SESSION["id_change"])){
        $price= number_format($_POST["Ticket_Cost"], 2, '.', '');
        echo "<script type='text/javascript'>alert(".$price."); </script>";
        $db->update_article($_SESSION["id_change"],$_POST["dataevento"],$price ,$_POST["EventLocation"],$_POST["TimeEvent"],$_POST["Ticket_Number"]);
    }
    header("Location: login.php");
}

?>