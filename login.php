<?php
require_once("database-entrance.php");

if(isset($_GET["email"])&& isset($_GET["password"])){
    $result=$db->login($_GET["email"],$_GET["password"]);
    if(count($result)==0){
       echo "Error";
    }else{
        echo "Welcome: " . $result[0]["Nome"];
    }
}

?>