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
  <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="js/pappa.js" type="text/javascript"></script>
  <title>
    BOPLEVE
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
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="login" type="submit"
        onclick="window.location.href='Login.html'">Login In</button>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="signup" type="submit"
        onclick="window.location.href='SignUp.html'">Sign Up</button>
    </div>
  </nav>
  <h1 class="display-4">Eventi in Primo Piano:</h1>
  <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="Event-handler?id=<?php echo $topevents[0]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[0]["Image_Path"];?>" alt=""></a>
      </div>
      <div class="carousel-item">
        <a href="Event-handler?id=<?php echo $topevents[1]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[1]["Image_Path"];?>" alt=""></a>
      </div>
      <div class="carousel-item">
        <a href="Event-handler?id=<?php echo $topevents[2]["ID_Articles"]; ?>"><img class="altern" src="<?php echo $topevents[2]["Image_Path"];?>" alt=""></a>
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
  <h1 class="display-4">Prossimi eventi disponibili:</h1>
  <div class="container-fluid">
    <div class="row">
      <?php foreach($TemplateParam as $article):?>
      <div class="col-md-6 col-xs-10">
        <a href="obtain_article.php?id=<?php echo $article['ID_Articles'];?>">
          <img height="auto" class="col-12 shared img-responsive" src="<?php echo $article['Image_Path']; ?>" alt=""
            class="rounded float-left">
        </a>
    </div>
    <?php endforeach?>
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