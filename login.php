<<<<<<< HEAD
<?php
require_once("database-entrance.php");

if(isset($_POST["email"])&& isset($_POST["password"])){
    $result=$db->login($_POST["email"],$_POST["password"]);
    if(count($result)==0){
       echo "Error";
    }else{
        //echo "Welcome: " . $result[0]["Nome"];
        session_start();
        //$_SESSION["ID"]= $result["ID"];
        $_SESSION["email"]= $result["email"];
        
        header("Location: ../BOPLEVE.html");
        exit();

    }
}

=======
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

>>>>>>> e51dff561a371100e48a042b7a527d01d8cd312d
?>