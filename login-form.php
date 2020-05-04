<form class="form col-sm-12 col-lg-6" method="POST" action="login.php">
          <h1>Benvenuto, fai l'accesso sei hai già un account altrimenti registrati!</h1>
            <div class="form-group">
              <label for="labelCognome">Email:</label>
              <input placeholder="Email address:" type="email" class="form-control frm" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="labelCognome">Password:</label>
              <input placeholder="Password:" type="password" class="form-control frm" id="password" name="password">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Ricordati chi sono</label>
            </div>
            <button id="submit" type="submit" class="btn btn-primary">Accedi</button>
            <div class="row">Se non sei ancora registrato, <a href="signup.php">  clicca qui. </a></div> 
          </form>