<?php
require_once("database-entrance.php");
if(isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["nome"]) && isset($_GET["datanascita"]) && isset($_GET["tipouser"])){
    if(ContainsNumbers($_GET["password"]) && ContainsUpperCase($_GET["password"]) && ContainsPunctuation($_GET["password"]) && strlen($_GET["password"])>=8){
        $db->add_user($_GET["nome"],$_GET["cognome"],$_GET["email"],$_GET["password"],$_GET["datanascita"],$_GET["tipouser"]);
    }else{
        echo "<script type='text/javascript'>alert('Your password is too weak for our standard, please create a more secure password, you will redirected to the sign page')</script>";
        $page = "signup-form.php";
        require("Bopleve.php");
    }
}


function ContainsNumbers($String){
    return preg_match('/\\d/', $String) > 0;
}
function ContainsUpperCase($String){
    return preg_match('/[A-Z]/', $String) >0;
}
function ContainsPunctuation($String){
    return preg_match('/[,.;-]/',$String) > 0;
}
?>