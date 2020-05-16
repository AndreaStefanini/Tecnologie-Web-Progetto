<?php
session_start();
require_once("database-entrance.php");
if(($_SESSION["ID"]=="")){
    echo "non puoi aggiungere il prodotto al carrello se non esegui l'accesso con il tuo account";
}else{
    echo "hai fatto l'accesso e puoi togliere dei ticket di troppo"
    $db->update_tickets($_SESSION["ID"], $_POST["id"], $_POST["n_ticket"]);
    /*$return_value =$db->get_purchase($_SESSION["ID"]);
    $result = array();
    $arraysize =0;
    while($arraysize < count($return_value)){
        $id_a = $return_value[$arraysize]["ID_Articles"];
        $id_e = $return_value[$arraysize][" Article_Title"];
        $n_tickets = $return_value[$arraysize]["n_tickets"];
        $result[] = array(
                        "id_articolo" => $id_a,
                        "nome_evento" => $id_e,
                        "n_tickets" => $n_tickets
                        );
    }
    print_r($result);*/
}
?>
