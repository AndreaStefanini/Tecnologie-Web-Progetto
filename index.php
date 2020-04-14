<?php
require_once("database-entrance.php");
$page ="home.php";
$TemplateParam = $db->get_random_posts(4);
$topevents = $db->get_top_three_events();
require("Bopleve.php");

?>