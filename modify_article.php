<?php
    session_start();
    require_once("database-entrance.php");
    require_once("utilities/utility-functions.php");
    if(!empty($_POST["submit"])){
        $result = $db->get_article($id);
        if(!empty($_POST["EventFoto"])){
            $subfolder = "/Articoli/".$_POST["ArticleTitle"];
            $newimg = saveImage($_FILES['EventFoto'],$_SESSION["nome"].$_SESSION["cognome"],$subfolder,1020,780);
            $db->update_article($_GET["ID"],$_POST["ArticleTitle"],$_POST["dataevento"],$_POST["Ticket_Cost"],$_POST["EventLocation"],$_POST["EventDescription"],$_POST["TimeEvent"],$newimg, $_SESSION["ID"], $_POST["Category"]);
        }else{
            $db->update_article($_GET["ID"],$_POST["ArticleTitle"],$_POST["dataevento"],$_POST["Ticket_Cost"],$_POST["EventLocation"],$_POST["EventDescription"],$_POST["TimeEvent"],$result[0]["Image_Path"], $_SESSION["ID"], $_POST["Category"]);

        }
        //da aggiornare i paramentri per matchare l'ordine, inoltre penso di voler spostare le funzioni per ridimensionare l'immagine in una pagina di function utility.        header("Location: login.php");
    }else{
        $id = $_GET["ID"];
        $result = $db->get_article($id);
        $page = "article-form.php";
    }
    require_once("Bopleve.php");       
?>