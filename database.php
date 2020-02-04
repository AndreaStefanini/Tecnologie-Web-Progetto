<?php
class database {
    public $connection;

    public function connect_to_database(){
        $this->connection = new mysqli('localhost', 'root', '', 'bopleve');
        if($this->connection->connect_error){
            die("An error occurred during the connection to the database, please retry". $this->connection->connect_error);
        }
    }
    public function add_user($nome, $cognome, $email, $userpassword, $data_nascita, $usertype){
       $insertquery=$this->connection->prepare("INSERT INTO users(Nome,Cognome,email,password,Data_Nascita,Tipo_User) VALUES(?,?,?,?,?,?)");
       $insertquery->bind_param("s,s,s,s,d,s",$nome,$cognome,$email,$userpassword,$data_nascita,$usertype);
       $insertquery->execute();
    }
    public function login($email, $password){
        
    }
}
?>