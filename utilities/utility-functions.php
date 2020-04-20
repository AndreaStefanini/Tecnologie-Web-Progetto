<?php
session_start();
function resizeImage($resourceType, $image_width, $image_height, $newwidth, $newheight)
{
    $resizeWidth = $newwidth;
    $resizeHeight = $newheight;
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
            imagejpeg($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
            $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            break;
        case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($fileName);
            $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight,$newwidth, $newheight);
            imagegif($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
            $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            break;
        case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($fileName);
            $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight,$newwidth, $newheight);
            imagepng($imageLayer, $uploadPath . $fotoname . '.' . $fileExt);
            $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            break;
        default:
            break;
    }
    return $resizeFileName;
}
