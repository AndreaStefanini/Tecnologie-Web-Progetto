<?php

require_once("database-entrance.php");
$result = $db->get_content();
$out = array();
foreach($result as $article){
    $out += array("titolo"=>$article["Article_Title"]);
}
echo(json_encode($result));




?>