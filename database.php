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
        $login=$this->connection->prepare("SELECT ID ,Nome, Cognome FROM users WHERE email= ? and password= ?");
        $login->bind_param("ss", $email, $password);
        $login->execute();
        $result = $login->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add_article($title,$date,$costo,$location,$description,$time,$image_path,$author,$num_click,$categoria){
        $add_article = $this->connection->prepare("INSERT into articles(Article_Title,Date_Event,Costo_Ticket,Location_Event,Event_Description,Time_Event,Image_Path,Author_COD,num_click,Category) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $add_article -> bind_param("ssdssssiis", $title, $date, $costo, $location,$description, $time, $image_path, $author, $num_click,$categoria);
        $add_article-> execute();
    }
    public function get_article($idarticle){
        $get=$this->connection->prepare("SELECT Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Event_Description,Image_Path FROM articles WHERE ID_Articles=?");
        $get->bind_param("i",$idarticle);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_random_posts($n){
        $get_post = $this->connection->prepare("SELECT ID_Articles, Article_Title, Image_Path FROM articles ORDER BY RAND() LIMIT ?");
        $get_post->bind_param("i", $n);
        $get_post->execute();
        $result = $get_post->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function update_number_of_clicks($idarticle){
        $queryclick = $this->connection->prepare("SELECT num_click FROM articles WHERE ID_Articles = ?");
        $queryclick->bind_param("i", $idarticle);
        $queryclick->execute();
        $result = $queryclick->get_result();
        $numclicks = $result->fetch_all(MYSQLI_ASSOC);
        $newnum=(int)$numclicks[0]["num_click"];
        $newnum++;
        $queryupdate = $this->connection->prepare("UPDATE articles SET num_click=? WHERE ID_Articles=?");
        $queryupdate->bind_param("ii", $newnum, $idarticle);
        $queryupdate->execute();
    }
    public function get_top_three_events(){
        $querytop = $this->connection->prepare("SELECT ID_Articles, Image_Path FROM articles ORDER BY num_click DESC LIMIT 3");
        $querytop ->execute();
        $result = $querytop -> get_result();
        return $result -> fetch_all(MYSQLI_ASSOC);
    }
    public function get_by_categories($categoria){
        $querycat = $this->connection->prepare("SELECT ID_Articles,Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Event_Description,Image_Path, Category FROM articles WHERE Category = ?");
        $querycat->bind_param("s",$categoria);
        $querycat->execute();
        $result = $querycat->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_by_name($title){
        $get=$this->connection->prepare("SELECT Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Event_Description,Image_Path FROM articles WHERE Article_Title=?");
        $get->bind_param("s",$title);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_by_author($author){
        $get=$this->connection->prepare("SELECT Article_Title,Image_Path FROM articles WHERE Author_COD=?");
        $get->bind_param("i",$author);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>