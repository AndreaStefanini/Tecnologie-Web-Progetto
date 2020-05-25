<?php
require_once("database-entrance.php");
$db->remove_article($_POST["delete"]);
unlink($_POST["percorso"]);
echo "success";

?>