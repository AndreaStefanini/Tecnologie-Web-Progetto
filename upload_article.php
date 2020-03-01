<?php
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
$uploadPath = "./resources/";
$fileExt = pathinfo($_FILES['EventFoto']['name'], PATHINFO_EXTENSION);
$uploadImageType = $sourceProperties[2];
$sourceImageWidth = $sourceProperties[0];
$sourceImageHeight = $sourceProperties[1];
switch ($uploadImageType) {
    case IMAGETYPE_JPEG:
        $resourceType = imagecreatefromjpeg($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagejpeg($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        break;
    case IMAGETYPE_GIF:
        $resourceType = imagecreatefromgif($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagegif($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        break;
    case IMAGETYPE_PNG:
        $resourceType = imagecreatefrompng($fileName); 
        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
        imagepng($imageLayer,$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt);
        break;
    default:
        break;
}

$db->add_article($_POST["ArticleTitle"],$_POST["Ticket_Cost"],$_POST["TimeEvent"],$_POST["dataevento"],$_POST["EventLocation"],$uploadPath.$_POST["ArticleTitle"].'.'. $fileExt, 1);
}
}

?>

