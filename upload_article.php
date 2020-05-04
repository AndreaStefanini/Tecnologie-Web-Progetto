<?php
session_start();
require_once("database-entrance.php");
require_once("utilities/utility-functions.php");

if (isset($_POST["submit"])) {
    $titolo = $_POST["ArticleTitle"];
    $data = $_POST["dataevento"];
    $costo = (float) $_POST["Ticket_Cost"];
    $location = $_POST["EventLocation"];
    $time = $_POST["TimeEvent"];
    $description = $_POST["EventArticle"];
    $subfolder = "/Articoli/".$_POST["ArticleTitle"];
    $image_path = saveImage($_FILES['EventFoto'],$_SESSION["nome"].$_SESSION["cognome"],$subfolder,1020,780);
    $categorie = $_POST["Categorie"];
    $db->add_article($titolo, $data, $costo, $location, $description, $time, $image_path, $_SESSION["ID"], 0, $categorie);
    echo "<script type='text/javascript'>window.location.replace('login.php');</script>";
} else {
    $page = "article-form.php";
}

require("Bopleve.php");


