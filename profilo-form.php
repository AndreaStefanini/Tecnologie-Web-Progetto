<form > 
<?php $tipo= "Promotore"; ?>
<div class="profilo">
  <h1>Questo è il tuo profilo di Bopleve</h2>
  <div class="form-group">
      <img class="profile dropdown-toggle" src="<?php echo $_SESSION["ProfileImage"];?>" data-toggle="dropdown" style="margin-left:2pt;" alt="">
  </div>
  <div class="form-group">
      <p><?php echo $_SESSION["nome"]; ?></p>
  </div>
  <div class="form-group">
      <p><?php echo $_SESSION["cognome"]; ?></p>
  </div>
  <div class="form-group">
      <p><?php echo $_SESSION["User"]; ?></p>   
  </div>
  <div class="form-group">
      <p><?php echo $_SESSION["email"]; ?></p>
  </div>
  <?php if($_SESSION["User"] == $tipo){?>
    <div class="form-group">
      <button type="button" onclick="window.location.href='login-in.php'">modifica i tuoi eventi</button>
    </div>
    <div class="form-group">
      <button type="button" onclick="window.location.href='edit_profile.php'">modifica il tuo account</button>
      <!-- da sistemare il link-->
    </div>
  <?php } ?>
</div>

</form>