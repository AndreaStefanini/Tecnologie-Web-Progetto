
<?php 
require_once("database-entrance.php");
$articles = $db->get_by_author($result[0]["ID"]);


foreach ($articles as $article):
?>
<div class="row" style = "margin-left:10%; margin-top:10%">
    <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
    <div> <?php echo $article["Article_Title"] ?></div>
    <img src="resources/matita.png" style="margin-left:1%;" class="carrello" alt="">
    <img src="resources/bidone.png"  class = "carrello" alt="">
</div>
<?php endforeach; ?>