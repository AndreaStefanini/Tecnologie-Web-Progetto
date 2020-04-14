<?php
function get_data(){
    require_once("database-entrance.php");
    $result = $db->get_content();
    return $result;
}
get_data();

?>