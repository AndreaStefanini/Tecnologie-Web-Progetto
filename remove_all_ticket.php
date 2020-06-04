<?php
require_once("database-entrance.php");
session_start();
if(($_SESSION["ID"]=="")){
    echo "non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account";
}else{
    $db->remove_ticket_from_cart($_SESSION["ID"], $_POST["id"]);
}?>
