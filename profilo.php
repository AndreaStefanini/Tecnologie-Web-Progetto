<?php

require_once("database-entrance.php");
session_start();

//if(!empty($_SESSION)){
//    $page= "login-form.php";            qui pensavo di fare un controllo per vedere che se la connessione 
//}else{     
$articoli=count($db->get_by_author($_SESSION["ID"]));                              
$page= "profilo-form.php"; 
//}
require("Bopleve.php");
?>