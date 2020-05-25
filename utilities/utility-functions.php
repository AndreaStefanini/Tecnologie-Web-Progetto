<?php
function resizeImage($resourceType, $image_width, $image_height, $newwidth, $newheight)
{
    $resizeWidth = $image_width;
    $resizeHeight = $image_height;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}
function saveImage($image, $fotoname,$subfolder, $newwidth, $newheight)
{
    $fileName = $image['tmp_name'];
    $sourceProperties = getimagesize($fileName);
    $resizeFileName = $fotoname;
    $uploadPath = "resources/Users/" . $fotoname.$subfolder;
    $newpath = "resources/Users/" . $fotoname.$subfolder;
    $fileExt = pathinfo($image['name'], PATHINFO_EXTENSION);
    $uploadImageType = $sourceProperties[2];
    $sourceImageWidth = $sourceProperties[0];
    $sourceImageHeight = $sourceProperties[1];
    switch ($uploadImageType) {
        case IMAGETYPE_JPEG:
            $resourceType = imagecreatefromjpeg($fileName);
            $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight,$newwidth, $newheight);
            
            if($subfolder=="/Profilo/"){
                imagejpeg($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagejpeg($imageLayer, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($fileName);
            $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight,$newwidth, $newheight);
           
            if($subfolder=="/Profilo/"){
                imagegif($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagegif($imageLayer, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($fileName);
            $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight,$newwidth, $newheight);
            
            if($subfolder=="/Profilo/"){
                imagepng($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagepng($imageLayer, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        default:
            break;
    }
    return $resizeFileName;
}
