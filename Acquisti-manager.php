<?php 
session_start();
require_once("database-entrance.php");
$acquisti=$db->get_purchase_acquisti($_SESSION["ID"]);
$page="Acquisti.php";
require("Bopleve.php");
?>