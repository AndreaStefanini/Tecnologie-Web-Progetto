<?php
require_once("database-entrance.php");
$db->update_status($_GET["article"]);
echo "<script type='text/javascript'>window.location.assign('login.php');</script>";
?>