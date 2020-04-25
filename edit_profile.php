<?php
require_once("database-entrance.php");
require_once("utilities/utility-functions.php");
session_start();

if (isset($_POST["edit"])){
    if(ContainsNumbers($_POST["password"]) && ContainsUpperCase($_POST["password"]) && ContainsPunctuation($_POST["password"]) && strlen($_POST["password"]) >= 8){
        $FolderName = $_SESSION["nome"] . $_SESSION["cognome"];
        if(file_exists($FolderName)){
            unlink($FolderName);
        }
        $subfolder = "/Profilo/";
        $resizeFileName = saveImage($_FILES["ProfileFoto"], $FolderName,$subfolder, 20, 20);
        $db->edit_profile($_SESSION["ID"],$_POST["email"],$_POST["password"],$_POST["tipouser"],$resizeFileName);
        header("Location: index.php");
    }else{
        unset($_POST);
        echo "<script type='text/javascript'>alert('La Password inserita non è abbastanza forte per favore inserire una password che contega A-Z,a-z,0-9,,-');\n
        window.location.assign('edit_profile.php');</script>";
    }
    
}else{
    
    $page="edit_profile-form.php";
    require("Bopleve.php");
}


function ContainsNumbers($String)
{
    return preg_match('/\\d/', $String) > 0;
}
function ContainsUpperCase($String)
{
    return preg_match('/[A-Z]/', $String) > 0;
}
function ContainsPunctuation($String)
{
    return preg_match('/[,.-]/', $String) > 0;
}

?>