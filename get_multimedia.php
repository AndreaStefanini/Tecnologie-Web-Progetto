<?php 
require_once("database-entrance.php");
$TemplateParam = $db->getRandomPosts(4);
?>