<h1 style="text-align: center;"> Categoria: <?php echo $_GET["categories"]; ?></h1>
<?php
if(empty($categoria)){?>
<p style="text-align: center;">Non ci sono ancora eventi questa categoria,<br> se sei un promotore ti inviamo a crearne nuovi, se sei un cliente ti preghiamo di riprovare in un altro momento.</p>
<?php
}else{
?>
  <div class="container-fluid">
        <?php foreach ($categoria as $cat): ?>
          <div class="row">
        <div class="col-md-5 col-xs-10">
          <a href="obtain_article.php?id=<?php echo $cat["ID_Articles"];?>">
            <img height="auto" class="col-12 shared img-responsive" src="<?php echo $cat["Image_Path"]; ?>" alt=""
              class="rounded float-left">
          </a>
        </div>
        
        <ul style ="margin-top:5%; margin-left:20px; background-color: rgb(255,255,165);" class="col-md-5">
          <li><?php echo $cat["Article_Title"]; ?></li>
          <li><?php echo $cat["Costo_Ticket"]; ?></li>
          <li><?php echo $cat["Location_Event"]; ?></li>
          <li><?php echo $cat["Date_Event"]; ?></li>
          <li><?php echo $cat["Event_Description"]; ?></li>
        </p>
        </div>
        <?php endforeach; ?>
    </div>
      <?php } ?>

  