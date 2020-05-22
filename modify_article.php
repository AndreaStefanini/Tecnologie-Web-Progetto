<?php
    session_start();
    require_once("database-entrance.php");
        $id = $_GET["ID"];
        $result = $db->get_article($id);
        $page = "changes-form.php";
        $_SESSION["id_change"]=$_GET["ID"];
        require_once("Bopleve.php");       
    
?>
