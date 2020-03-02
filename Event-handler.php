
<html lang="it">

<head>
    <title>
        Events
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="resources/BOPLEVE-MINI.png" type="image/png" />
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/pappa.js" type="text/javascript"></script>
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
                    <a class="nav-link" href="BOPLEVE.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button class="btn btn-outline-dark my-2 my-sm-0" id="login" type="submit" onclick="window.location.href='Login.html'">Login In</button>
            <button class="btn btn-outline-dark my-2 my-sm-0" id="signup" type="submit" onclick="window.location.href='Login.html'">Sign Up</button>
        </div>
    </nav>

    <h1 class="display-4">Evento: <?php echo $TemplateParam["Article_Title"]; ?></h1>
    <div class="container">
        <div clas="row">
            <div class=" event col-sm-12"><a class="col-md-10" href="Event.html">
                    <img class="col-12 altern" id="polaroid" src="<?php echo $TemplateParam['Image_Path']; ?>" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="container-post col-md-3 col-xs-6">
                <div class="postit">
                    <h2>Quando</h2>
                    <p><?php echo $TemplateParam["Date_Event"];  ?></p>
                </div>
            </div>
            <div class="container-post col-md-3 col-xs-6">
                <div class="postit">
                    <h2>Dove</h2>
                    <p><?php echo $TemplateParam["Location_Event"]; ?></p>
                </div>
            </div>
            <div class="container-post col-md-3 col-xs-6">
                <div class="postit">
                    <h2>Descrizione evento</h2>
                    <p><?php echo $TemplateParam["Event_Description"]; ?></p>
                </div>
            </div>
            <div class="container-post col-md-3 col-xs-6">
                <div class="postit">
                    <h2>Costo del Ticket</h2>
                    <p><?php echo $TemplateParam["Costo_Ticket"]; ?></p>
                    <!-- bottone aggiungi al carrello -->
                    <!-- Button trigger modal -->

                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="P2RNSP4HBZN7N">
                        <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
                        <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Aggiungi al carrello</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    vuoi aggiungere l'evento ciccio bello al carrello?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-primary">Aggiungi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d813.3483819864376!2d12.263349521575542!3d44.33721150585204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132cb2ae1a8413df%3A0xe9cd019d306b5891!2sMirabilandia!5e0!3m2!1sit!2sit!4v1580719266044!5m2!1sit!2sit" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    </div>
    </div>

    <footer>
        <div class="row col-4"></div>
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