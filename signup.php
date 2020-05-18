<?php
require_once("database-entrance.php");
require_once("utilities/utility-functions.php");
if (isset($_POST["submit"])) {
    if (ContainsNumbers($_POST["password"]) && ContainsUpperCase($_POST["password"]) && ContainsPunctuation($_POST["password"]) && strlen($_POST["password"]) >= 8) {
        $NewFolderName = $_POST["nome"] . $_POST["cognome"];
        mkdir("resources/Users/" . $NewFolderName, 7000);
        mkdir("resources/Users/" . $NewFolderName . "/Articoli", 7000);
        mkdir("resources/Users/" . $NewFolderName . "/Profilo", 7000);
        $subfolder = "/Profilo/";
        $resizeFileName = saveImage($_FILES["ProfileFoto"], $NewFolderName,$subfolder, 20, 20);
        $db->add_user($_POST["nome"], $_POST["cognome"], $_POST["email"], md5($_POST["password"]), $_POST["datanascita"], $_POST["tipouser"], $resizeFileName);
        header("Location: index.php");
    } else {
        unset($_POST);
        echo "<script type='text/javascript'>alert('La Password inserita non è abbastanza forte per favore inserire una password che contega A-Z,a-z,0-9,,-');\n
        window.location.assign('signup.php');</script>";
    }
} else {

    $page = "signup-form.php";
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
