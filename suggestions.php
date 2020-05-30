<?php

require_once("database-entrance.php");
$result = $db->get_content();
echo(json_encode($result));




?>