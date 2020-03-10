
<?php 
require_once("database-entrance.php");
$articles = $db->get_by_author($result[0]["ID"]);


foreach ($articles as $article):
?>
<div> <?php echo $article["Article_Title"] ?></div>
<?php endforeach; ?>