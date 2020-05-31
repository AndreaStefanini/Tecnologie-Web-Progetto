<?php
require_once("database-entrance.php");
session_start();

$to_email = $_SESSION["email"];
$subject = "BOPLEVE";
if($_POST["bought"]=="no"){
    $currentDate = date("Y-m-d");
    $db->add_purchase_to_acquisti($_SESSION["ID"],$_POST["id"],$_POST["n_tickets"],$currentDate);
}
if($_POST["numero_eventi"]>1){
    $acquisti = $db->get_latest_purchases($_SESSION["ID"],$_POST["numero_eventi"]);
    $body= "Salve, ". $_SESSION["nome"]. " ". $_SESSION["cognome"].". Hai comprati i seguenti biglietti:". PHP_EOL;
    $lista="";
    $cont = 0;
    foreach($acquisti as $acquisto){
        $lista.=" - ".$_POST[$cont]["n_tickets"]. " biglietto/i per l'evento: ". $acquisto["Article_Title"]. " che si svolgerà in: ".$acquisto["Location_Event"]." per la data del: ".$acquisto["Date_Event"]. PHP_EOL;      
        $cont++;
    }
    $body.=$lista;
    echo $body;
}else{
    
    $acquisto = $db->get_latest_purchases_by_id($_SESSION["ID"],$_POST["id"]);
    if($_POST["n_tickets"]>1){
        $body = "Salve, ".$_SESSION["nome"] ." ".$_SESSION["cognome"].". I ". $_POST["n_tickets"]." biglietti per l'evento: ".$acquisto[0]["Article_Title"]. " sono stati comprati con successo ";
    }else{
        $body = "Salve, ".$_SESSION["nome"] ." ".$_SESSION["cognome"].". Il biglietto per l'evento: ". $acquisto[0]["Article_Title"]." è stato comprato con successo ";
    }
}










if (mail($to_email, $subject, $body)) {
    $status = "success";
    $response = "Email is sent!";
} else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));


?>
