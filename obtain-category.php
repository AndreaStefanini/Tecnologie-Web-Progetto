<?php
session_start();
require_once("database-entrance.php");
$categoria=$db->get_by_categories($_GET["categories"]);

$page="categorie.php";
require("Bopleve.php");

?>