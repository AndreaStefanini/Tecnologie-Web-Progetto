<?php

class Databasefunctions{

   private $database;

   public function__costruct($servername, $username, $password, $dbname){
      
     mysql_connect($servername,$username,$password);
     mysql_select_db($dbname);
    
    
    
    
    
    /*$this->database=new mysqli_connect($servername, $username, $password, $dbname);
       if($this->database->connect_error){
           die("errore di connessione al server");
       }*/
   }

   public function checklogin($email,$password){
    /*$stmt = $this->db->prepare("SELECT Email, Password FROM autore WHERE Email = ? AND Password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);*/

    $sql="SELECT * FROM utenti WHERE  Email="$email" AND Password="$password" limit 1";
    $result=mysql_query($sql);
    return $result;
   }






}




?>