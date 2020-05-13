<?php
require_once("database-entrance.php");
?>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="resources/BOPLEVE-MINI.png" type="image/png" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="js/frontend.js" type="text/javascript"></script>
  <title>
    BOPLEVE
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="navbar-brand" src="resources/BOPLEVE.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorie
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="obtain-category.php?categories=Concerti">Concerti</a>
            <a class="dropdown-item" href="obtain-category.php?categories=Festivals">Festivals</a>
            <a class="dropdown-item" href="obtain-category.php?categories=Serate">Serate</a>
            <a class="dropdown-item" href="obtain-category.php?categories=Musei e Cultura">Musei e Cultura</a>
            <a class="dropdown-item" href="obtain-category.php?categories=Altro">Altro</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contattaci
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item">andreastefanini98@gmail.com</a>
            <a class="dropdown-item">albertorossi@gmail.com</a>
            <a class="dropdown-item">baronienrico@gmail.com</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" id="searchbar" method="GET" action="search_backend.php">
        <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search" name="title" list="event-suggestion">
        <datalist id="event-suggestion">
        </datalist>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <?php if (!empty($_SESSION["email"])) {
      $purchases = $db->get_purchase($_SESSION["ID"]); 
      //$num_noti = $db->get_new_event(); 
      $unseen= $db->get_notifications_status($_SESSION["ID"]);?>
        <div class="dropdown ">
          <div id="bell" href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php if($unseen[0]["unseen_notifications"] == "0"){ ?>
          <label id="labelbell"></label>
          <?php } ?>
          </div>
          <div class=" dropdown-menu dropdown-menu-right" id="notification"></div>
        </div>
      <div id="cart" onclick="window.location.href='cart-manager.php'"><?php echo count($purchases); ?></div>
      <p class="hiding" style="margin-bottom:0;"><?php echo $_SESSION["nome"] . " " . $_SESSION["cognome"]; ?></p>
      <div class="dropdown">
        <img class="carrello dropdown-toggle" src="<?php echo $_SESSION["ProfileImage"]; ?>" data-toggle="dropdown" style="margin-left:2pt;" alt="">
            <div class="dropdown-menu dropdown-menu-right">
            <?php if($_SESSION["User"]!="Cliente"){?>
            <div class="dropdown-item" onclick="window.location.href='login.php'">Main Page</div>
            <?php } ?>
            <div class="dropdown-item" onclick="">Acquisti</div>
            <div class="dropdown-item" onclick="window.location.href='profilo.php'">Profilo</div>
            <div class="dropdown-item" id="logout">Logout</div>
        </div>
      </div>
    <?php } else { ?>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="login" type="submit" onclick="window.location.href='login.php'">Login In</button>
      <button class="btn btn-outline-dark my-2 my-sm-0" id="signup" type="submit" onclick="window.location.href='signup.php'">Sign Up</button> 
    <?php } ?>
  </nav>
  <?php
  require_once($page);
  ?>
  
  <footer class="page-footer font-small special-color-white pt-4" style="padding-bottom:1pt;">
    <div class="container">
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a class="btn-floating btn-fb mx-1">
            <i class="fab fa-facebook-f fa-3x"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-tw mx-1">
            <i class="fab fa-twitter fa-3x"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-gplus mx-1">
            <i class="fab fa-google-plus-g fa-3x"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-li mx-1">
            <i class="fab fa-linkedin-in fa-3x"> </i>
          </a>
        </li>
      </ul>
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <p> Rossi A, Baroni E, Stefanini A</p>
    </div>
  </footer>

  <script>
    $(document).ready(function(){
        function load_unseen_notification(view = ''){
              $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data){
                   document.getElementById("notification").innerHTML= data.notification;
                   document.getElementById("labelbell").innerHTML= data.unseen_notification;

                }
               });

        };

          load_unseen_notification();

        $(document).on('click', '#bell', function(){
          document.getElementById("labelbell").style.display = 'none';
          load_unseen_notification('yes');    
        });
         
        setInterval(function(){
          load_unseen_notification();;
        }, 5000);

    });
  </script>
</body>

</html>