<?php
require_once('database-entrance.php');
$result = $db -> get_article((int)$_GET["id"]);
$TemplateParam = $result[0];
$db->update_number_of_clicks((int)$_GET["id"]);
require ("Event-handler.php");
?>