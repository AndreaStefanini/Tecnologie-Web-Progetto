<?php
require_once("database-entrance.php");
session_start();

$to_email = $_SESSION["email"];
$subject = "BOPLEVE";
$body = "Salve, Il biglietto è stato comprato con successo ";

if (mail($to_email, $subject, $body)) {
    $status = "success";
    $response = "Email is sent!";
} else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));


?>
