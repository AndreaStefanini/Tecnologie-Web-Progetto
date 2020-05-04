
<h1>Eventi più cliccati:</h1>
  <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="obtain_article.php?id=<?php echo $topevents[0]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[0]["Image_Path"];?>" alt=""></a>
      </div>
      <div class="carousel-item">
        <a href="obtain_article.php?id=<?php echo $topevents[1]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[1]["Image_Path"];?>" alt=""></a>
      </div>
      <div class="carousel-item">
        <a href="obtain_article.php?id=<?php echo $topevents[2]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[2]["Image_Path"];?>" alt=""></a>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <hr>
  <h1>Prossimi eventi disponibili:</h1>
  <div class="container-fluid">
    <div class="row">
      <?php foreach($TemplateParam as $article):?>
      <div class="col-md-4 col-xs-10 ordering-image">
      <p class="titolo"><?php echo $article["Article_Title"];?></p>
        <a href="obtain_article.php?id=<?php echo $article['ID_Articles'];?>">
          <img height="auto" class="col-12 shared img-responsive" src="<?php echo $article['Image_Path']; ?>" alt=""
            class="rounded float-left">
        </a>
        </div>
        <div class="col-md-2 ordering-arrow">
          <p class="title"><?php echo $article["Article_Title"];?></p>
          <img class="arrows" src="resources/arrows.png"  alt="">
          <p id="description">Per saperne di più, clicca l'immagine</p>
        </div>
        <?php endforeach?>
      </div>
  </div>