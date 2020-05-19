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
        $add_purchase = $this->connection->prepare("INSERT INTO `carrello`(`COD_Cliente`, `COD_Evento`, `n_tickets` ) VALUES (?,?,?)");
        $add_purchase->bind_param("iii",$id_user,$id_event, $n_ticket);
        $add_purchase->execute();
    }
    public function is_already_purchased($id_cliente, $cod_evento){
        $querypurchased = $this->connection->prepare("SELECT COD_CLIENTE, COD_EVENTO FROM carrello WHERE COD_CLIENTE=? AND COD_EVENTO =? ");
        $querypurchased->bind_param("ii",$id_cliente, $cod_evento );
        $querypurchased->execute();
        $result = $querypurchased->get_result();
        $value = $result->fetch_all(MYSQLI_ASSOC);
        return !empty($value);
    }
    public function add_more_tickets($id_cliente, $cod_evento, $new_tickets){
        $oldtickets = $this->connection->prepare("SELECT n_tickets FROM carrello WHERE COD_Cliente = ? AND COD_Evento = ?");
        $oldtickets->bind_param("ii", $id_cliente, $cod_evento);
        $oldtickets->execute();
        $result = $oldtickets->get_result();
        $oldvalue = $result->fetch_all(MYSQLI_ASSOC);
        $update_tickets= $oldvalue[0]["n_tickets"];
        $update_tickets += $new_tickets;
        $newtickets = $this->connection->prepare("UPDATE carrello SET n_tickets = ? WHERE COD_Cliente = ? AND COD_Evento = ?");
        $newtickets->bind_param("iii", $update_tickets, $id_cliente, $cod_evento);
        $newtickets->execute();
    }
    public function get_purchase($id){
        $purchasequery= $this->connection->prepare("SELECT ID_Articles, Article_Title, Costo_Ticket, n_tickets FROM articles,carrello WHERE articles.ID_Articles=carrello.COD_Evento AND COD_Cliente=? ");
        $purchasequery->bind_param("i",$id);
        $purchasequery->execute();
        $result=$purchasequery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_purchase_acquisti($id){
        $purchasequery= $this->connection->prepare("SELECT ID_Articles, Article_Title, Event_Description, Location_Event, n_tickets, Image_Path,n_tickets,data_acquisto FROM articles,acquisti WHERE articles.ID_Articles=acquisti.COD_Evento AND COD_Cliente=? ");
        $purchasequery->bind_param("i",$id);
        $purchasequery->execute();
        $result=$purchasequery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function update_tickets($id_cliente, $id_ticket, $n_tickets){
        if($n_tickets==0){
            $deletequery = $this->connection->prepare("DELETE FROM `carrello` WHERE COD_Cliente = ? AND COD_Evento = ?");
            $deletequery->bind_param("ii", $id_cliente,$id_ticket);
            $deletequery->execute();
        }else{
            $newtickets = $this->connection->prepare("UPDATE carrello SET n_tickets = ? WHERE COD_Cliente = ? AND COD_Evento = ?");
            $newtickets->bind_param("iii", $n_tickets, $id_cliente, $id_ticket);
            $newtickets->execute();
        }
    }
    public function get_evento_accettato($datadiieri,$id){
        $Qquery= $this->connection->prepare("SELECT ID_Articles,Article_Title,Date_Event From articles WHERE Status=1 AND notifications_status=0 AND date(notification_data)=? AND Author_COD=?");
        $Qquery->bind_param("si",$datadiieri,$id);
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_evento_respinto($datadiieri1, $id){
        $Qquery= $this->connection->prepare("SELECT ID_Articles,Article_Title,Date_Event From articles WHERE Status=0 AND  notifications_status=0 AND date(notification_data)=? AND Author_COD=?");
        $Qquery->bind_param("si",$datadiieri1, $id);
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_evento_soldout($id){
        $Qquery= $this->connection->prepare("SELECT ID_Articles,Article_Title,Date_Event From articles WHERE Status=1 AND Ticket_Available=0 AND Author_COD=?");
        $Qquery->bind_param("i",$id);
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_evento_scadere($datadioggi){
        $Qquery= $this->connection->prepare("SELECT ID_Articles,Article_Title,Date_Event From articles WHERE Status=1 AND DATEDIFF(Date_Event,?)=7");
        $Qquery->bind_param("s",$datadioggi);
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_aquisti($id){
        $Qquery= $this->connection->prepare("SELECT COD_Evento From acquisti WHERE COD_Cliente=?");
        $Qquery->bind_param("i",$id);
        $Qquery->execute();
        $result = $Qquery->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function set_new_status_evento_respinto($id){
        $query=$this->connection->prepare("UPDATE articles SET notifications_status=1 WHERE Author_COD=? AND notifications_status=0");
        $query->bind_param("i", $id);
        $query->execute();
    }
    public function set_new_status_evento_accettato($id){
        $query=$this->connection->prepare("UPDATE articles SET notifications_status=1 WHERE Author_COD=? AND notifications_status=0");
        $query->bind_param("i", $id);
        $query->execute();
    }
    public function set_new_status_evento_soldout($id){
        $query=$this->connection->prepare("UPDATE articles SET Ticket_Available=-1 WHERE Author_COD=? AND Ticket_Available=0");
        $query->bind_param("i", $id);
        $query->execute();
    }
    public function set_new_status_visto($id){
      $query=$this->connection->prepare("UPDATE users SET unseen_notifications=1 WHERE ID=?");
      $query->bind_param("i", $id);
      $query->execute();
    }
    public function set_new_status_non_visto($id){
        $query=$this->connection->prepare("UPDATE users SET unseen_notifications=0 WHERE ID=?");
        $query->bind_param("i", $id);
        $query->execute();
    }
    public function get_notifications_status($id){
        $query= $this->connection->prepare("SELECT unseen_notifications from users WHERE ID=?"); 
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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
    public function get_latest_purchases($id_cliente, $numero_acquisti){
        $retrievePurchase = $this->connection->prepare("SELECT n_tickets,Article_Title,data_acquisto,Date_Event,Location_Event  FROM acquisti,articles WHERE COD_Cliente = ? AND articles.ID_Articles=COD_Evento ORDER BY data_acquisto DESC LIMIT ?");
        $retrievePurchase->bind_param("ii", $id_cliente, $numero_acquisti);
        $retrievePurchase->execute();
        $result = $retrievePurchase->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add_purchase_to_acquisti($id_cliente, $id_evento, $n_tickets){
        $add_to_puchase = $this->connection->prepare("INSERT INTO acquisti(COD_Cliente,COD_Evento,n_tickets) VALUES (?,?,?)");
        $add_to_puchase->bind_param("iii",$id_cliente, $id_evento, $n_tickets);
        $add_to_puchase->execute();

    }
    public function already_bought($id_cliente, $id_evento, $date){
        $alreadybought = $this->connection->prepare("SELECT * FROM acquisti WHERE COD_Cliente=? AND COD_Evento=? AND data_acquisto=? ");
        $alreadybought -> bind_param("iid",$id_cliente, $id_evento, $date );
        $alreadybought->execute();
        $result = $alreadybought->get_result();
        $value = $result->fetch_all(MYSQLI_ASSOC);
        return !empty($value);
    }
    public function update_bought_product($id_cliente, $id_evento, $date, $moretickets){
        $getoldnumber = $this->connection->prepare("SELECT n_tickets FROM acquisti WHERE COD_Cliente =? AND COD_Evento =? AND data_acquisto =?");
        $getoldnumber->bind_param("iid",$id_cliente, $id_evento, $date);
        $getoldnumber->execute();
        $firstqueryresult = $getoldnumber->get_result();
        $updateTickets = $firstqueryresult->fetch_all(MYSQLI_ASSOC)[0]["n_tickets"];
        $updateTickets+=$moretickets;
        $setTickets = $this->connection->prepare("UPDATE acquisti SET n_tickets =? WHERE COD_Cliente =? AND COD_Evento =? AND data_acquisto =?");
        $setTickets->bind_param("iiid",$updateTickets,$id_cliente, $id_evento, $date);
        $setTickets->execute();
    }
    public function move_to_acquisti($id_cliente){
        $retrievecart= $this->connection->prepare("SELECT * FROM carrello WHERE COD_Cliente = ?");
        $retrievecart->bind_param("i",$id_cliente);
        $retrievecart->execute();
        $oggetti = $retrievecart->get_result();
        $currentDate=date("Y-m-d");
        $list = $oggetti->fetch_all(MYSQLI_ASSOC);
        foreach($list as $elem){
            if($this->already_bought($elem["COD_Cliente"],$elem["COD_Evento"],$currentDate)){
                $this->update_bought_product($elem["COD_Cliente"],$elem["COD_Evento"],$currentDate,$elem["n_tickets"]);
            }else{
                $add_to_purchase =$this->connection->prepare("INSERT INTO acquisti(COD_Cliente, COD_Evento, n_tickets, data_acquisto) VALUES (?,?,?,?)");
                $add_to_purchase->bind_param("iiis", $elem["COD_Cliente"],$elem["COD_Evento"],$elem["n_tickets"], $currentDate);
                $add_to_purchase->execute();
            }
        }  
        $DeleteFromCart = $this->connection->prepare("DELETE FROM `carrello` WHERE COD_Cliente = ?");
        $DeleteFromCart->bind_param("i",$id_cliente);
        $DeleteFromCart->execute();
    }
}
?>