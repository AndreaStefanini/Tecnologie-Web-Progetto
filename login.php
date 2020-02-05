<?php
<<<<<<< HEAD
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore! Username o password non corretti";
    }
    else if(count($login_result)==1){
        //registerLogger($login_result[0]);
        echo "login succesfull!";
        exit();
=======
require_once("database-entrance.php");

if(isset($_GET["email"])&& isset($_GET["password"])){
    $result=$db->login($_GET["email"],$_GET["password"]);
    if(count($result)==0){
       echo "Error";
    }else{
        echo "Welcome: " . $result[0]["Nome"];
>>>>>>> 421826497ee303ca438497b0e53cc3fefd57ae21
    }
}

?>