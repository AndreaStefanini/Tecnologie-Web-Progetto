<?php
require_once("database-entrance.php");
if(isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["nome"]) && isset($_GET["datanascita"]) && isset($_GET["tipouser"])){
    $db->add_user($_GET["nome"],$_GET["cognome"],$_GET["email"],$_GET["password"],$_GET["datanascita"],$_GET["tipouser"]);
}
?>