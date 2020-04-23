<form class="form col-sm-12 col-lg-6" method="POST" action="signup.php" enctype="multipart/form-data">
    <h1>qui puoi modificare il tuo account</h1>
    <p>questi sono i tuoi dati ....<p>
    <div class="form-group" style = "margin-top:25px;">
      <label for="labelEmail">Email address:</label>
      <input type="email" name="email" class="input form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group" style = "margin-top:25px;">
      <label for="labelPassword">Password:</label>
      <input type="password" name="password" class="input form-control" id="password1" placeholder="Password">
    </div>
    <label for="labelTipoDiUser">Tipologia di Utente:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tipouser" id="exampleRadios1" value="Promotore">
      <label class="form-check-label" for="exampleRadios1">
        Promotore di Eventi
      </label>
    </div>   
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tipouser" id="exampleRadios2" value="Cliente">
      <label class="form-check-label" for="exampleRadios2">
        Cliente
      </label>
    </div>
    <div class="form-group" style = "margin-top:25px;"> 
        <label for="ProfileFoto">modifica la tua foto di Profilo:</label>
        <input type="file" class="form-control-file" id="CaricaFoto" name="ProfileFoto" required>
    </div>
    <button id="submit" type="submit" name="submit"class="btn btn-primary">Modifica il tuo account</button>
</form>