<?php
session_start();
require_once("database-entrance.php");
if(($_SESSION["ID"]=="")){
    echo "non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account";
}else{
    $db->update_tickets($_SESSION["ID"], $_POST["id"], $_POST["n_ticket"]);
    echo "fatto!";
}
?>
