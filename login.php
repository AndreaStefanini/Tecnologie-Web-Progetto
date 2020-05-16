<?php
require_once("database-entrance.php");
session_start();
if(!empty($_SESSION)){
    $page= "login-in.php";
}else{
    if(isset($_POST["email"])&& isset($_POST["password"])){
        $result=$db->login($_POST["email"], md5($_POST["password"]));
        if(count($result)==0){
           echo "<script type ='text/javascript'> alert('I dati inseriti non sono corretti, riprova'); </script> ";
           $_POST = array();
           header("Location: login.php");
        }else{
            echo "<script type ='text/javascript'> alert('Benvenuto'); </script> ";
            $_SESSION["email"]= $_POST["email"];
            $_SESSION["nome"] = $result[0]["Nome"];
            $_SESSION["cognome"] = $result[0]["Cognome"];
            $_SESSION["ID"] = $result[0]["ID"];
            $_SESSION["User"] = $result[0]["Tipo_User"];
            $_SESSION["ProfileImage"] = $result[0]["ProfileImage"];
            $_POST = array();
            if($result[0]["Tipo_User"]=="Cliente"){
                header("Location: index.php");
            }
            $page = "login-in.php";
        }
    }else{
        $page= "login-form.php";
    }
}
    
    require("Bopleve.php");



?>