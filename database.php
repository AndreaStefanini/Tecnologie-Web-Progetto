<?php
class database {
    public $connection;

    public function __construct(){
        $this->connection = new mysqli('localhost', 'root', '', 'bopleve');
        if($this->connection->connect_error){
            die("An error occurred during the connection to the database, please retry". $this->connection->connect_error);
        }
    }
    public function add_user($nome, $cognome, $email, $userpassword, $data_nascita, $usertype, $profileimage){
       $insertquery=$this->connection->prepare("INSERT INTO users(Nome,Cognome,email,password,Data_Nascita,Tipo_User, ProfileImage) VALUES(?,?,?,?,?,?,?)");
       $insertquery->bind_param('sssssss',$nome,$cognome,$email,$userpassword,$data_nascita,$usertype,$profileimage);
       $insertquery->execute();

    }
    public function login($email, $password){
        $login=$this->connection->prepare("SELECT ID ,Nome, Cognome, Tipo_User, ProfileImage FROM users WHERE email= ? and password= ?");
        $login->bind_param("ss", $email, $password);
        $login->execute();
        $result = $login->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add_article($title,$date,$costo,$location,$description,$time,$image_path,$author,$num_click,$categoria, $tickets){
        $add_article = $this->connection->prepare("INSERT into articles(Article_Title,Date_Event,Costo_Ticket,Location_Event,Event_Description,Time_Event,Image_Path,Author_COD,num_click,Category,Ticket_Available) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $add_article -> bind_param("ssdssssiisi", $title, $date, $costo, $location,$description, $time, $image_path, $author, $num_click,$categoria,$tickets);
        $add_article-> execute();
    }
    public function get_article($idarticle){
        $get=$this->connection->prepare("SELECT ID_Articles,Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Event_Description,Image_Path FROM articles WHERE ID_Articles=?");
        $get->bind_param("i",$idarticle);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_random_posts($n){
        $get_post = $this->connection->prepare("SELECT ID_Articles, Article_Title, Image_Path FROM articles WHERE Status=1 ORDER BY RAND() LIMIT ?");
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
        $querytop = $this->connection->prepare("SELECT ID_Articles, Image_Path FROM articles WHERE Status=1 ORDER BY num_click DESC LIMIT 3");
        $querytop ->execute();
        $result = $querytop -> get_result();
        return $result -> fetch_all(MYSQLI_ASSOC);
    }
    public function get_by_categories($categoria){
        $querycat = $this->connection->prepare("SELECT ID_Articles,Article_Title,Costo_Ticket,Date_Event,Time_Event,Location_Event,Event_Description,Image_Path, Category FROM articles WHERE Category = ? AND Status=1");
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
        $get=$this->connection->prepare("SELECT ID_Articles,Article_Title,Image_Path FROM articles WHERE Author_COD=?");
        $get->bind_param("i",$author);
        $get->execute();
        $result=$get->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function remove_article($title){
        $remove = $this->connection->prepare("DELETE FROM articles WHERE Article_Title = ?");
        $remove->bind_param("s", $title);
        $remove->execute();
    }
    public function remove_outdated_articles($date){
        $remove_outdated=$this->connection->prepare("DELETE FROM articles WHERE Date_Event< ?");
        $remove_outdated->bind_param("s", $date);
        $remove_outdated->execute();
    }
    public function get_content(){
        $query_suggestion=$this->connection->prepare("SELECT Article_Title FROM articles");
        $query_suggestion->execute();
        $result = $query_suggestion->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function update_article($id,$title,$date,$costo,$location,$description,$time,$image_path,$author,$category){
        $updatequery = $this->connection->prepare("UPDATE articles SET Article_Title = ?, Date_Event = ?, Costo_Ticket = ?, Location_Event = ?, Time_Event = ?, Image_Path = ?, Event_Description = ?, Author_COD =?, Category = ? Status = 0 WHERE ID=?");
        $updatequery->bind_param("ssissssi",$title,$date,$costo,$location,$time,$image_path,$description, $author, $category,$id );
        $updatequery->execute();
    }
    public function edit_profile($id,$email,$userpassword,$usertype,$profileimage){
        $editquery=$this->connection->prepare("UPDATE users SET email = ?, password= ?, Tipo_User = ?, ProfileImage = ? WHERE ID = ?");
        $editquery->bind_param('sssss',$email,$userpassword,$usertype,$profileimage,$id);
        $editquery->execute();
    }
    public function add_purchase($id_user, $id_event, $n_ticket){
        $add_purchase = $this->connection->prepare("INSERT INTO `acquisti`(`COD_Cliente`, `COD_Evento`, `n_tickets` ) VALUES (?,?,?)");
        $add_purchase->bind_param("iii",$id_user,$id_event, $n_ticket);
        $add_purchase->execute();
    }
    public function is_already_purchased($id_cliente, $cod_evento){
        $querypurchased = $this->connection->prepare("SELECT COD_CLIENTE, COD_EVENTO FROM acquisti WHERE COD_CLIENTE=? AND COD_EVENTO =? ");
        $querypurchased->bind_param("ii",$id_cliente, $cod_evento );
        $querypurchased->execute();
        $result = $querypurchased->get_result();
        $value = $result->fetch_all(MYSQLI_ASSOC)[0];
        return count($value);
    }
    public function add_more_tickets($id_cliente, $cod_evento, $new_tickets){
        $oldtickets = $this->connection->prepare("SELECT n_tickets FROM acquisti WHERE COD_Cliente = ?, COD_Evento = ?");
        $oldtickets->bind_param("ii", $id_cliente, $cod_evento);
        $oldtickets->execute();
        $result = $oldtickets->get_result();
        $oldvalue = strval($result->fetch_all(MYSQLI_ASSOC)[0]);
        $oldvalue += $new_tickets;
        $newtickets = $this->connection->prepare("UPDATE acquisti SET n_tickets = ? WHERE COD_Cliente = ? AND COD_Evento = ?");
        $newtickets->bind_param("iii", $oldvalue, $id_cliente, $cod_evento);
        $newtickets->execute();
    }
    public function get_purchase($id){
        $purchasequery= $this->connection->prepare("SELECT ID_Articles, Article_Title FROM articles,acquisti WHERE articles.ID_Articles=acquisti.COD_Evento AND COD_Cliente=? ");
        $purchasequery->bind_param("i",$id);
        $purchasequery->execute();
        $result=$purchasequery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function delete_purchase($id_cliente, $id_ticket){
        $deletequery = $this->connection->prepare("DELETE FROM `acquisti` WHERE COD_Cliente = ? and COD_Evento = ?");
        $deletequery->bind_param("ii", $id_cliente,$id_ticket);
        $deletequery->execute();
    }
    public function get_new_event(){
        $Qquery= $this->connection->prepare("SELECT ID_Articles,Article_Title,Date_Event From articles WHERE notifications_status = 0");
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_num_unseen_noti(){
       $query= $this->connection->prepare("SELECT * from articles WHERE notifications_status = 0"); 
       $query->execute();
       $result = $query->get_result();
       return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function set_new_status(){
        $query= $this->connection->prepare("UPDATE articles SET notifications_status = 1 WHERE notifications_status = 0");
        $query->execute();
    }
    public function is_admin($id){
        $adminquery = $this->connection->prepare("SELECT * FROM Users WHERE ID = ?");
        $adminquery->bind_param("i",$id);
        $adminquery->execute();
        $result = $adminquery->get_result();
        $condition = $result->fetch_all(MYSQLI_ASSOC);
        if($condition[0]["Tipo_User"] == "Admin"){
            return True;
        }
        return False;
    }
    public function articles_to_approve(){
        $approvequery = $this->connection->prepare("SELECT * FROM articles WHERE Status = 0");
        $approvequery->execute();
        $result = $approvequery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function update_status($id_article,$newstatus){
        $statusquery = $this->connection->prepare("UPDATE articles SET Status = ? WHERE ID_Articles = ?;");
        $statusquery->bind_param("ii",$newstatus,$id_article);
        $statusquery->execute();
    }
    public function get_id_by_name_and_author($articletitle, $author){
        $idquery = $this->connection->prepare("SELECT ID_Articles FROM articles WHERE Article_Title = ? AND Author_COD = ?");
        $idquery ->bind_param("si", $articletitle, $author);
        $idquery -> execute();
        $result = $idquery -> get_result();
        return $result -> fetch_all(MYSQLI_ASSOC);

    }
}
?>