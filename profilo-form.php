<form class="form col-sm-12 col-lg-6"> 
  <h1>Questo è il tuo profilo di Bopleve</h2>
  <div class="form-group">
      <img class="profile dropdown-toggle" src="<?php echo $_SESSION["ProfileImage"];?>" data-toggle="dropdown" style="margin-left:2pt;" alt="">
  </div>
  <div class="form-group">
      <p>Nome: <?php echo $_SESSION["nome"]; ?></p>
  </div>
  <div class="form-group">
      <p>Cognome: <?php echo $_SESSION["cognome"]; ?></p>
  </div>
  <div class="form-group">
      <p>Tipo di User: <?php echo $_SESSION["User"]; ?></p>   
  </div>
  <div class="form-group">
      <p>email: <?php echo $_SESSION["email"]; ?></p>
  </div>
  <?php if($_SESSION["User"] == "Promotore"){?>
    <div class="form-group">
      <button type="button" onclick="window.location.href='upload_article.php'" class="btn btn-primary">crea i tuoi eventi</button>
    </div>
    <div class="form-group">
      <button type="button" onclick="window.location.href='modify_article.php'" class="btn btn-primary">modifica i tuoi eventi</button>
    </div>
  <?php } ?>
    <div class="form-group">
      <button type="button" onclick="window.location.href='edit_profile.php'" class="btn btn-primary">modifica il tuo account</button>
    </div>


</form>