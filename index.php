<?php
session_start();
require_once("database-entrance.php");
$currentDate=date("Y/m/d");
$db->remove_outdated_articles($currentDate);
$page ="home.php";
$TemplateParam = $db->get_random_posts(4);
$topevents = $db->get_top_three_events();
require("Bopleve.php");

?>