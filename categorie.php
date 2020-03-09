
  <h1>Categoria: <?php echo $categoria[0]["Category"]; ?></h1>
  <div class="container-fluid">
    <div class="col">
      <?php foreach ($categoria as $cat): ?>
      <div class="col-md-6 col-xs-10">
        <a href="obtain_article.php?id=<?php echo $cat["ID_Articles"];?>">
          <img height="auto" class="col-12 shared img-responsive" src="<?php echo $cat["Image_Path"]; ?>" alt=""
            class="rounded float-left">
        </a>
        <p>Una didascalia per l'immagine sopra.</p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>


  