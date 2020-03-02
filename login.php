<?php
require_once("database-entrance.php");

if(isset($_POST["email"])&& isset($_POST["password"])){
    $result=$db->login($_POST["email"],$_POST["password"]);
    if(count($result)==0){
       echo "Error";
    }else{
        //echo "Welcome: " . $result[0]["Nome"];
        session_start();
        //$_SESSION["ID"]= $result["ID"];
        $_SESSION["email"]= $result["email"];
        
        header("Location: ../BOPLEVE.html");
        exit();

    }
}

?>