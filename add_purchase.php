<?php
    require_once('database-entrance.php');
    session_start();
    if(empty($_SESSION)){
        echo "<script type='text/javascript'>alert('non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account');</script>";
        //echo "<script type='text/javascript'>window.location.replace('obtain_article.php?id=". $_GET["cod"]."');</script>";
    }else{
        $db->add_purchase($_SESSION["ID"], $_GET["cod"]);
    }
?>
