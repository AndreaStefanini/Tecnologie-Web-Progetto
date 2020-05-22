<?php 
session_start();
require_once("database-entrance.php");
$purchases=$db->get_purchase($_SESSION["ID"]);
$page="cart.php";
require("Bopleve.php");
?>