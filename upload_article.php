<?php
require_once('database-entrance.php');

    print_r($_FILES["EventFoto"]) ;
    $filename = $_FILES["EventFoto"]["name"];
    $filetype = $_FILES["EventFoto"]["type"];
    $filepath = $_FILES["EventFoto"]["tmp_name"];
    $fileerror = $_FILES["EventFoto"]["error"];
    $filesize = $_FILES["EventFoto"]["size"];
    

    $allowedExt= array("jpeg","jpg", "png");
    $tmpext =explode(".", $filename);
    $fileExt = strtolower(end($tmpext));
    if(in_array($fileExt, $allowedExt)){
        $fileNewDestionation= 'resources/'.$_POST["ArticleTitle"].".".$fileExt;
        move_uploaded_file($filepath, $fileNewDestionation);
        echo " file uploaded successfully";
    }else{
        echo "<script> alert('We are sorry to inform you that the type of image you uploaded is not alllowed, please try again');</script>";
    }



?>