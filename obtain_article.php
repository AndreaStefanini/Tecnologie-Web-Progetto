<?php
require_once('database-entrance.php');
$result = $db -> get_article((int)$_GET["id"]);
$articolo = $result[0];
$db->update_number_of_clicks((int)$_GET["id"]);
$page = "Event-handler.php";
require ("Bopleve.php");
?>