<?php
session_start();
require_once("databasefunctions.php");
require_once("function.php");
$dbh=new databasefunctions("localhost", "root", "", "utenti");

?>