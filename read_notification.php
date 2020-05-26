<?php
require_once("database-entrance.php");
session_start();
$db->read_notification($_SESSION["ID"]);


?>