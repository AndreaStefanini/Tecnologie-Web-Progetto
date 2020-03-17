<form class="form col-sm-12 col-lg-6" method="POST" action="signup.php" enctype="multipart/form-data">
    <h1>Benvenuto,effetua la registrazione in BOPLEVE!</h1>
    <div class="form-group">
      <label for="labelEmail">Email address:</label>
      <input type="email" name="email" class="input form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="labelPassword">Password:</label>
      <input type="password" name="password" class="input form-control" id="password1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="labelNome">Nome:</label>
      <input type="name" name="nome" class=" input form-control" id="name1" placeholder="Nome...">
    </div>
    <div class="form-group">
      <label for="labelCognome">Cognome:</label>
      <input type="surname" name="cognome" class="input form-control" id="surname1" placeholder="Cognome...">
    </div>
    <div class="form-group">
      <label for="labelDataNascita">Data di nascita:</label>
      <input type="date" name="datanascita" class="form-control" id="date1" placeholder="gg/mm/aa">
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
    <div class="form-group">
        <label for="ProfileFoto">Inserisci una foto di Profilo:</label>
        <input type="file" class="form-control-file" id="CaricaFoto" name="ProfileFoto" required>
    </div>
    <button id="submit" type="submit" name="submit"class="btn btn-primary">Submit</button>
  </form>