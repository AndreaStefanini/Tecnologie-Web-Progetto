<<<<<<< HEAD
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

=======
<?php
require_once("database-entrance.php");
if(isset($_POST["email"])&& isset($_POST["password"])){
    $result=$db->login($_POST["email"],$_POST["password"]);
    if(count($result)==0){
       echo "<script type ='text/javascript'> alert('I dati inseriti non sono corretti, riprova'); </script> ";
       require("login.php");
    }else{
        echo "<script type ='text/javascript'> alert('Benvenuto'); </script> ";
        session_start();
    
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["nome"] = $result[0]["Nome"];
        $_SESSION["cognome"] = $result[0]["Cognome"];
        $_SESSION["ID"] = $result[0]["ID"];
        $_SESSION["User"] = $result[0]["Tipo_User"];
        $_SESSION["ProfileImage"] = $result[0]["ProfileImage"];
        $page = "login-in.php";
    }
}else{
    $page= "login-form.php";
}

   

    
require("Bopleve.php");


>>>>>>> 36f9451fa73a2f55ddb570e3e63a3d78235f6b9d
?>