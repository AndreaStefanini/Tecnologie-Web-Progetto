<?php 
require_once("database-entrance.php");
$TemplateParam = $db->get_random_posts(4);
$topevents = $db->get_top_three_events();

?>