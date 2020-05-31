<?php 
require_once("database-entrance.php");
session_start();
if($_SESSION["ID"]==""){
    echo "devo eseguire prima il login per acquistare qualche biglietto";
}else{
    $id = $db->move_to_acquisti($_SESSION["ID"]);
    if(!empty($id)){
        echo $id;
    }
    
}
?>