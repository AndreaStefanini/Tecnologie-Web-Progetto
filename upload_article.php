<?php
session_start();
require_once("database-entrance.php");
function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 1020;
    $resizeHeight = 780;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
return $imageLayer;
}

if(isset($_POST["submit"])) {
if(is_array($_FILES)) {
$fileName = $_FILES['EventFoto']['tmp_name']; 
$sourceProperties = getimagesize($fileName);
$resizeFileName = $_POST["ArticleTitle"];
$uploadPath = "resources/Users/".$_SESSION["nome"].$_SESSION["cognome"]."/Articoli/";
$newpath = "resources/Users/".$_SESSION["nome"].$_SESSION["cognome"]."/Articoli/";
$fileExt = pathinfo($_FILES['EventFoto']['name'], PATHINFO_EXTENSION);
$uploadImageType = $sourceProperties[2];
$sourceImageWidth = $sourceProperties[0];
$sourceImageHeight = $sourceProperties[1];
switch ($uploadImageType) {
    case IMAGETYPE_JPEG:
        $resourceType = imagecreatefromjpeg($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagejpeg($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        $resizeFileName=$newpath.$_POST["ArticleTitle"].'.'. $fileExt;
        break;
    case IMAGETYPE_GIF:
        $resourceType = imagecreatefromgif($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagegif($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        $resizeFileName=$newpath.$_POST["ArticleTitle"].'.'. $fileExt;
        break;
    case IMAGETYPE_PNG:
        $resourceType = imagecreatefrompng($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagepng($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        $resizeFileName=$newpath.$_POST["ArticleTitle"].'.'. $fileExt;
        break;
    default:
        break;
}
$titolo = $_POST["ArticleTitle"];
$data = strtotime($_POST["dataevento"]);
$costo = (double)$_POST["Ticket_Cost"];
$location =$_POST["EventLocation"];
$time=$_POST["TimeEvent"];
$description = $_POST["EventArticle"];
$image_path = strval($resizeFileName);
$categorie = $_POST["Categorie"];
$db->add_article($titolo,$data,$costo,$location,$description,$time,$image_path,$_SESSION["ID"],0,$categorie);
header("Location: index.php");
}
}else{
    $page="article-form.php";
}

require("Bopleve.php");

