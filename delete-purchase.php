<?php
session_start();
require_once("database-entrance.php");
if(!empty($_GET["delete"])){
    $db->delete_purchase($_SESSION["ID"], $GET["delete_ticket"]);
}
?>
