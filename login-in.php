<?php
require_once("database-entrance.php");

if($db->is_admin($_SESSION["ID"])){
    $articles = $db->articles_to_approve();?>
<h1>Ecco tutti gli eventi in attesa di approvazione:</h1>    
 <?php foreach ($articles as $article) : ?>
    <div class="row logged">
        <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
        <div style="margin-top:5%;"> <?php echo $article["Article_Title"] ?></div>
        <button class="login icon"><img src="resources/approved.png" class="icons" alt="" onclick=""></button>
        <button class="login icon" id="delete_article"><img src="resources/not-approved.png" class=" icons" onClick="window.location.href='delete-article?delete=<?php echo $article['Article_Title'];?>'" alt=""></button>

    </div>
<?php endforeach;    
}else{
    $articles = $db->get_by_author($_SESSION["ID"]);
?>
<h1>Ecco tutti gli eventi da te organizzati:</h1>
<?php
foreach ($articles as $article) :
?>
    <div class="row logged">
        <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
        <div style="margin-top:5%;"> <?php echo $article["Article_Title"] ?></div>
        <button class="login icon"><img src="resources/matita.png" class="icons" alt="" onclick="window.location.replace('modify_article.php?ID=<?php echo $article['ID']; ?>');"></button>
        <button class="login icon" id="delete_article"><img src="resources/bidone.png" class=" icons" onClick="window.location.href='delete-article?delete=<?php echo $article['Article_Title'];?>'" alt=""></button>

    </div>
<?php endforeach; ?>
<div class="row" style="width:100%;">
    <button class="login" style=" margin-left:80%;" onClick="window.location.href='upload_article.php'"><img src="resources/plus.png" class="icons" alt=""></button>
</div>
<?php } ?>