<?php
    session_start();
        require('database-entrance.php');
        if(($_SESSION["ID"]=="")){
        echo "<script type='text/javascript'>alert('non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account');</script>";
        echo "<script type='text/javascript'> window.location.assing('index.php');</script>";
    }else{
        if($db->is_already_purchased($_SESSION["ID"], $_POST["ticket"])){
            $db->add_more_tickets($_SESSION["ID"], strval($_POST["ticket"]),strval($_POST["n_ticket"]));
        }else{
            $db->add_purchase($_SESSION["ID"], strval($_POST["ticket"]), strval($_POST["n_ticket"])); 
             
        }
        echo (count($db->get_purchase($_SESSION["ID"])));
    }
