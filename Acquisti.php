
    <h1 style="text-align: center;"> I tuoi acquisti</h1>
<?php
if(empty($purchases)){?>
<p style="text-align: center;">Non hai acquistato nulla</p>
<?php
}else{
?>
  <div class="container-fluid">
        <?php foreach ($purchases as $purchase): ?>
          <div class="row">
        <div class="col-md-5 col-xs-10">
          <a href="obtain_article.php?id=<?php echo $purchase["ID_Articles"];?>">
            <img height="auto" class="col-12 shared img-responsive" src="<?php echo $purchase["Image_Path"]; ?>" alt=""
              class="rounded float-left">
          </a>
        </div>
        
        <ul style ="margin-top:5%; margin-left:20px; background-color: rgb(255,255,165);" class="col-md-5">
          <li><?php echo $purchase["Article_Title"]; ?></li>
          <li><?php echo $purchase["Costo_Ticket"]; ?></li>
          <li><?php echo $purchase["Location_Event"]; ?></li>
          <li><?php echo $purchase["Date_Event"]; ?></li>
          <li><?php echo $purchase["Event_Description"]; ?></li>
        </p>
        </div>
        <?php endforeach; ?>
    </div>
      <?php } ?>