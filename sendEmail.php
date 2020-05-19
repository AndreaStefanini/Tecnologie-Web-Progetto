<?php
require_once("database-entrance.php");
session_start();

$to_email = $_SESSION["email"];
$subject = "BOPLEVE";

if($_POST["numero_eventi"]>1){
    $acquisti = get_purchase_from_acquisti($_SESSION["ID"],$_POST["numero_evneti"]);
    $body= "Salve, ". $_SESSION["nome"]. " ". $_SESSION["cognome"].". Hai comprati i seguenti biglietti:".<br>;
    $lista ="";
    foreach($acquisti as $acquisto):
        $lista += $acquisto["n_tickets"]. " ". "biglietto/i per l'evento: ". $acquisto["Article_Title"];      
    endforeach;
    $body+=$lista;
}else{
    if($_POST["n_tickets"]>1){
        $body = "Salve, ".$_SESSION["nome"] ." ".$_SESSION["cognome"].". I ". $_POST["n_tickets"]." biglietti per l'evento: ".$_POST["event"]. " sono stati comprati con successo ";
    }else{
        $body = "Salve, ".$_SESSION["nome"] ." ".$_SESSION["cognome"].". Il biglietto per l'evento: ".$_POST["event"]." è stato comprato con successo ";
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
