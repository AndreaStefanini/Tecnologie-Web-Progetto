<?php
session_start();
require_once('database-entrance.php');
$result = $db -> get_article((int)$_GET["id"]);
$articolo = $result[0];
$db->update_number_of_clicks((int)$_GET["id"]);
$page = "evento.php";
require ("Bopleve.php");
?>