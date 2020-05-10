<?php
    require_once('database-entrance.php');
    session_start();
    if(($_SESSION["ID"]=="")){
        echo "<script type='text/javascript'>alert('non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account');</script>";
        echo "<script type='text/javascript'> window.location.assing('index.php');</script>";
    }else{
        if($db->is_already_purchased($_SESSION["ID"], $_POST["ticket"])!=0){
            $db->add_more_tickets($_SESSION["ID"], $_POST["ticket"],$_POST["n_ticket"]);
            return true;
        }else{
            $db->add_purchase($_SESSION["ID"], $_POST["ticket"], $_POST["n_ticket"]); 
            return false;    
        }
        echo "<script type='text/javascript'> window.location.reload();</script>";
    }
    header("Location: index.php");
?>
