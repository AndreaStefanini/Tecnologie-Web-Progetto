<?php
function saveImage($image, $fotoname,$subfolder)
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
            
            if($subfolder=="/Profilo/"){
                imagejpeg($resourceType, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagejpeg($resourceType, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($fileName);
           
            if($subfolder=="/Profilo/"){
                imagegif($resourceType, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagegif($resourceType, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($fileName);
            
            if($subfolder=="/Profilo/"){
                imagepng($resourceType, $uploadPath . $fotoname . '.' . $fileExt);
                $resizeFileName = $newpath . $fotoname . '.' . $fileExt;
            }else{
                imagepng($resourceType, $uploadPath . '.' . $fileExt);
                $resizeFileName = $newpath . '.' . $fileExt;
            }
            break;
        default:
            break;
    }
    return $resizeFileName;
}
