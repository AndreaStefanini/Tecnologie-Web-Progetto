
<?php 
require_once("database-entrance.php");
$articles = $db->get_by_author($result[0]["ID"]);


foreach ($articles as $article):
?>
<div class="row logged" >
    <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
    <div> <?php echo $article["Article_Title"] ?></div>
    <button class="login"><img src="resources/matita.png" class="icons"  alt=""></button>
    <button class="login"><img src="resources/bidone.png"  class= " icons" onClick="" alt=""></button>
    
</div>
<?php endforeach; ?>
<button class="login" style="float:right; margin-right:10%;" onClick ="window.location.href='upload_article.php'"><img src="resources/plus.png" class="icons"   alt=""></button>