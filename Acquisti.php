<h1 style="text-align: center;"> I tuoi acquisti</h1>
<?php if(empty($acquisti)){?>
<p style="text-align: center;">Non hai acquistato nulla</p>
<?php}else{?>
  <div class="container-fluid">
        <?php foreach ($acquisti as $acquisto): ?>
          <div class="row">
        <div class="col-md-5 col-xs-10">
          <a href="obtain_article.php?id=<?php echo $acquisto["ID_Articles"];?>">
            <img height="auto" class="col-12 shared img-responsive" src="<?php echo $acquisto["Image_Path"]; ?>" alt=""class="rounded float-left">
          </a>
        </div>
        
        <ul class="col-md-5" style ="margin-top:5%; margin-left:20px; background-color: rgb(255,255,165);" >
          <li><?php echo $acquisto["Article_Title"]; ?></li>
          <li><?php echo $acquisto["data_acquisto"]; ?></li>
          <li><?php echo $acquisto["Location_Event"]; ?></li>
          <li><?php echo $acquisto["Date_Event"]; ?></li>
          <li><?php echo $acquisto["Event_Description"]; ?></li>
          </ul>
          </div>
        <?php endforeach; ?>
    </div>
<?php } ?>