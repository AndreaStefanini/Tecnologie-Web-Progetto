<?php
require_once('database-entrance.php');
$result = $db -> get_article((int)$_GET["id"]);
$TemplateParam = $result[0];

require ("Event-handler.php");
?>