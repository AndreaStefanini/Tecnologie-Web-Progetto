<?php

require_once("database-entrance.php");
session_start();

//if(!empty($_SESSION)){
//    $page= "login-form.php";            qui pensavo di fare un controllo per vedere che se la connessione 
//}else{                                  è scaduta di rifare il login ma non so come si fa 
$page= "profilo-form.php"; 
//}
require("Bopleve.php");
?>