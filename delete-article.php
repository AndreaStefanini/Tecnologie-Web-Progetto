<?php
require_once("database-entrance.php");
if(isset($_GET["delete"])){
    $db->remove_article($_GET["delete"]);
}
echo "<script type='text/javascript'>window.location.replace('login.php');</script>"
?>