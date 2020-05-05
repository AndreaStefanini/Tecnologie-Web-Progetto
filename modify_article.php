<?php
    require_once("database-entrance.php");
    require_once("utilities/utility-functions.php");
    if(!empty($_POST["submit"])){
        //da aggiornare i paramentri per matchare l'ordine, inoltre penso di voler spostare le funzioni per ridimensionare l'immagine in una pagina di function utility
        $db->update_article($_GET["ID"],$_POST["ArticleTitle"],$_POST["dataevento"],$_POST["Ticket_Cost"],$_POST["EventArticle"],$_POST["TimeEvent"],$NewImg,$_POST["EventDescription"],$_POST["foto"], $$_SESSION["ID"], $_POST["Category"]);
        header("Location: login.php");
    }else{
        $id = $_GET["ID"];
        $result = $db->get_article($id);
        $page = "article-form.php";
    }
    require_once("Bopleve.php");       
?>