<?php
session_start();
require_once("database-entrance.php");
if(($_SESSION["ID"]=="")){
    echo "<script type='text/javascript'>alert('non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account');</script>";
    echo "<script type='text/javascript'> window.location.assing('index.php');</script>";
}else{
    $db->delete_purchase($_SESSION["ID"], $_POST["ticket"]);     
    echo "<script type='text/javascript'> window.location.reload();</script>";
}
?>
