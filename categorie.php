<?php require_once ("get_multimedia.php"); ?>
<html lang="it">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="resources/BOPLEVE-MINI.png" type="image/png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="js/pappa.js" type="text/javascript"></script>
  <title>
    Categorie
  </title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="navbar-brand" src="resources/BOPLEVE.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="BOPLEVE.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Categorie
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Concerts</a>
            <a class="dropdown-item" href="#">Festivals</a>
            <a class="dropdown-item" href="#">Serate</a>
            <a class="dropdown-item" href="#">Musei e Cultura</a>
            <a class="dropdown-item" href="#">Altro</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contattaci</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" id="searchbar">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="login" type="submit"
        onclick="window.location.href='Login.html'">Login In</button>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="signup" type="submit"
        onclick="window.location.href='SignUp.html'">Sign Up</button>
    </div>
  </nav>

  <div class="it-grid-list-wrapper it-quilted-grid">
  <div class="grid-row">
    <div class="col-6 col-md-6">
      <div class="it-grid-item-wrapper it-grid-item-overlay">
        <a href="#" class="">
          <div class="img-responsive-wrapper">
            <div class="img-responsive">
              <div class="img-wrapper"><img src="https://via.placeholder.com/400x300/ebebeb/808080/?text=Immagine" alt="image Alt" title="Image Title"></div>
            </div>
          </div>
          <span class="it-griditem-text-wrapper">
            <span class="it-griditem-text">Didascalia</span>
            <svg class="icon">
              <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-code-circle"></use>
            </svg>
          </span>
        </a>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="grid-row">
        <div class="col-6">
          <div class="it-grid-item-wrapper it-grid-item-overlay">
            <a href="#">
              <div class="img-responsive-wrapper">
                <div class="img-responsive">
                  <div class="img-wrapper"><img src="https://via.placeholder.com/400x300/ebebeb/808080/?text=Immagine" alt="image Alt" title="Image Title"></div>
                </div>
              </div>
              <span class="it-griditem-text-wrapper">
                <span class="it-griditem-text">Didascalia</span>
                <svg class="icon">
                  <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-code-circle"></use>
                </svg>
              </span>
            </a>
          </div>
        </div>
        <div class="col-6">
          <div class="it-grid-item-wrapper it-grid-item-overlay">
            <a href="#">
              <div class="img-responsive-wrapper">
                <div class="img-responsive">
                  <div class="img-wrapper"><img src="https://via.placeholder.com/400x300/ebebeb/808080/?text=Immagine" alt="image Alt" title="Image Title"></div>
                </div>
              </div>
              <span class="it-griditem-text-wrapper">
                <span class="it-griditem-text">Didascalia</span>
                <svg class="icon">
                  <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-code-circle"></use>
                </svg>
              </span>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="it-grid-item-wrapper it-grid-item-overlay it-grid-item-double-w">
            <a href="#">
              <div class="img-responsive-wrapper">
                <div class="img-responsive">
                  <div class="img-wrapper"><img src="https://via.placeholder.com/400x300/ebebeb/808080/?text=Immagine" alt="image Alt" title="Image Title"></div>
                </div>
              </div>
              <span class="it-griditem-text-wrapper">
                <span class="it-griditem-text">Didascalia</span>
                <svg class="icon">
                  <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-code-circle"></use>
                </svg>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <footer>
    <div class="row"></div>
    <div class="row col-4">
      <div class="col">
        <p>Termini e Condizioni di Utilizzo</p>
      </div>
    </div>
    <div class="row col-4">
      <div class="col">
        <p>Seguici su social: </p>
      </div>
      <div class="col"><img src="resources/facebook-icon.png" alt=""></div>
      <div class="col"><img src="resources/instagram.png" alt=""></div>
      <div class="col"><img src="resources/twitter.png" alt=""></div>
    </div>
  </footer>
</body>

</html>