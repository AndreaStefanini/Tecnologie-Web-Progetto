<?php
session_start();
require_once("database-entrance.php");
if(($_SESSION["ID"]=="")){
    echo "non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account";
}else{
    $db->delete_purchase($_SESSION["ID"], $_POST["delete_ticket"], $_POST["n_delete"]);
}
?>
