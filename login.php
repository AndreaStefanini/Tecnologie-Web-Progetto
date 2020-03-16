<?php
require_once("database-entrance.php");
if(isset($_POST["email"])&& isset($_POST["password"])){
    $result=$db->login($_POST["email"],$_POST["password"]);
    if(count($result)==0){
       echo "<script type ='text/javascript'> alert('I dati inseriti non sono corretti, riprova'); </script> ";
       require("login.php");
    }else{
        echo "<script type ='text/javascript'> alert('Benvenuto'); </script> ";
        session_start();
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["nome"] = $result[0]["Nome"];
        $_SESSION["ID"] = $result[0]["ID"];
        $_SESSION["User"] = $result[0]["Tipo_User"];
        $page = "login-in.php";
    }
}else{
    $page= "login-form.php";
}

   

    
require("Bopleve.php");


?>