<?php
session_start();
require_once("database-entrance.php");
echo "<h1>checking the id </h1>";
if($_POST["submit"]){
    if(!empty($_SESSION["id_change"])){
        $db->update_article($_SESSION["id_change"],$_POST["dataevento"],$_POST["Ticket_Cost"],$_POST["EventLocation"],$_POST["TimeEvent"],$_POST["Ticket_Number"]);
    }
    header("Location: login.php");
}

?>