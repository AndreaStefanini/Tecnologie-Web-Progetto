<?php
require_once("database-entrance.php");
function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 35;
    $resizeHeight = 35;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
return $imageLayer;
}
if(isset($_POST["submit"])){
    if(ContainsNumbers($_POST["password"]) && ContainsUpperCase($_POST["password"]) && ContainsPunctuation($_POST["password"]) && strlen($_POST["password"])>=8){
        $NewFolderName = $_POST["nome"].$_POST["cognome"];
        mkdir("resources/Users/".$NewFolderName, 7000);
        mkdir("resources/Users/".$NewFolderName."/Articoli", 7000);
        mkdir("resources/Users/".$NewFolderName."/Profilo", 7000);
        if(is_array($_FILES)) {
            $fileName = $_FILES['ProfileFoto']['tmp_name']; 
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = $NewFolderName;
            $uploadPath = "resources/Users/".$NewFolderName."/Profilo/";
            $newpath = "resources/Users/".$NewFolderName."/Profilo/";
            $fileExt = pathinfo($_FILES['ProfileFoto']['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagejpeg($imageLayer,$uploadPath.$NewFolderName.'.'. $fileExt);
                    $resizeFileName=$newpath.$NewFolderName.'.'. $fileExt;
                    break;
                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($fileName); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagegif($imageLayer,$uploadPath.$NewFolderName.'.'. $fileExt);
                    $resizeFileName=$newpath.$NewFolderName.'.'. $fileExt;
                    break;
                case IMAGETYPE_PNG:
                    $resourceType = imagecreatefrompng($fileName); 
                    $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                    imagepng($imageLayer,$uploadPath.$NewFolderName.'.'. $fileExt);
                    $resizeFileName=$newpath.$NewFolderName.'.'. $fileExt;
                    break;
                default:
                    break;
            } 
            
            $db->add_user($_POST["nome"],$_POST["cognome"],$_POST["email"],$_POST["password"],$_POST["datanascita"],$_POST["tipouser"],$resizeFileName);
            header("Location: index.php");
        }
    }else{
        echo "<script type='text/javascript'>alert('La Password inserita non è abbastanza forte per favore inserire una password che contega A-Z,a-z,0-9,,-');</script>";
        unset($_POST);
        header("Location: signup.php");
    }
}else{
        
        $page = "signup-form.php";
        require("Bopleve.php");
    }



function ContainsNumbers($String){
    return preg_match('/\\d/', $String) > 0;
}
function ContainsUpperCase($String){
    return preg_match('/[A-Z]/', $String) >0;
}
function ContainsPunctuation($String){
    return preg_match('/[,.-]/',$String) > 0;
}
?>