<?php
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore! Username o password non corretti";
    }
    else{
        registerLogger($login_result[0]);
    }
}

?>