<?php 
require_once("database-entrance.php");
$result = $db->get_by_name($_GET["title"]);
if(!empty($result)){
    $articolo = $result[0];
    $page="evento.php";
    require("Bopleve.php");
}else{
    echo "<script type='text/javascript'> alert('Nessun evento è stato trovato sotto quel nome, riprova');</script>";
    header("location: index.php");
}








?>