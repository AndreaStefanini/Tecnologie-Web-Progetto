<?php
class database {
    public $connection;

    public function __construct(){
        $this->connection = new mysqli('localhost', 'root', '', 'bopleve');
        if($this->connection->connect_error){
            die("An error occurred during the connection to the database, please retry". $this->connection->connect_error);
        }
    }
    public function add_user($nome, $cognome, $email, $userpassword, $data_nascita, $usertype){
       $insertquery=$this->connection->prepare("INSERT INTO users(Nome,Cognome,email,password,Data_Nascita,Tipo_User) VALUES(?,?,?,?,?,?)");
       $insertquery->bind_param('ssssss',$nome,$cognome,$email,$userpassword,$data_nascita,$usertype);
       $insertquery->execute();

    }
    public function login($email, $password){
        $login=$this->connection->prepare("SELECT Nome, Cognome FROM Users WHERE email= ? and password= ?");
        $login->bind_param("ss", $email, $password);
        $login->execute();
        $result = $login->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add_article($title,$costo,$time,$date,$location,$image_path){
        $article = $this->connection->prepare("INSERT INTO articles(Article_tile,Cost_Ticket,Time_Event,Date_Event,Location_Event,Image_Event) VALUES(?,?,?,?,?,?)");
        $article->bind_param("sibbss",$title,$costo,$time,$date,$location,$image_path);
        $article->execute();
        $result = $article->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_article($idarticle){
        $get=$this->connection->prepare("SELECT Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Image_Path FROM articles WHERE ID_Article=?");
        $get->bind_param("i",$idarticle);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all();
    }

    public function getRandomPosts($n=2){
        $stmt = $this->connection->prepare("SELECT ID_Articles, Article_title, Image_Path FROM articles ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>