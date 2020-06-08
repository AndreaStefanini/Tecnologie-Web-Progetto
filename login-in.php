<?php
require_once("database-entrance.php");


if ($db->is_admin($_SESSION["ID"])) {
    $articles = $db->articles_to_approve(); ?>
    <h1 class="titolo_pagina">Ecco tutti gli eventi in attesa di approvazione:</h1>
    <div class="container-fluid">
    <?php foreach ($articles as $article) : ?>
        <div class="row logged">
            <div class="col-md-5">
            <img height="auto" class="col-12 shared img-responsive rounded float-left" src="<?php echo $article["Image_Path"]; ?>" alt="">
            </div>
            <div class="col-4">
                <ul style ="margin-top:6%; background-color: rgb(255,255,165);" class="col-md-12">
                    <li style="margin-top:3%;">Titolo Articolo: <?php echo $article["Article_Title"] ?></li>
                    <li style="margin-top:3%;">Descrizione dell'evento: <?php echo $article["Event_Description"] ?></li>
                    <li style="margin-top:3%;">Costo del ticket: €<?php echo $article["Costo_Ticket"] ?></li>
                    <li style="margin-top:3%;">Luogo dell'evento: <?php echo $article["Location_Event"] ?></li>
                    <li style="margin-top:3%;">Orario di inizio: <?php echo date("H:i",strtotime($article["Time_Event"])) ?></li>
                    <li style="margin-top:3%;">Categoria dell'evento: <?php echo $article["Category"] ?></li>
                </ul>
                <button class="login icon"><img src="resources/approved.png" class="icons" alt="" onclick="approve_article(<?php echo intval($article['ID_Articles']); ?>,<?php echo $article['Author_COD'];?>);"></button>
                <button class="login icon" id="delete_article" data-toggle="modal" data-target="#deleteModal"><img src="resources/not-approved.png" class=" icons"  alt=""></button>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Respingi articolo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <textarea name="deletereasons" id="reasons" cols="60" rows="10" placeholder="Inserisci per favore le tue motivazioni, per le quali vuoi respingere questo articolo"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="reject_article(<?php echo intval($article['ID_Articles']);?>,<?php echo $article['Author_COD'];?>);">Respingi articolo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="login icon" id="delete_article"><img src="resources/bidone.png" class=" icons" onClick="delete_article(<?php echo $article['ID_Articles']; ?>,'<?php echo $article['Image_Path']; ?>');" alt=""></button>
            </div>         
            </div>        
    <?php endforeach;?>
    </div>
<?php } else {
    $articles = $db->get_by_author($_SESSION["ID"]);
    ?>
    <h1 class="titolo_pagina">Ecco tutti gli eventi da te organizzati:</h1>
    <div class="container-fluid">
    <?php
    foreach ($articles as $article):
    ?>
        <div class="row logged">
            <div class="col-md-5">
                <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="col-12 shared img-responsive rounded float-left">
            </div>
            <div class="organaized col-md-4">
                <h2><div style="margin-top:5%;"> <?php echo $article["Article_Title"] ?></div></h2>
                <p>Modifica Evento:
                <button class="login icon"><img src="resources/matita.png" class="icons" alt="" onclick="window.location.replace('modify_article.php?ID=<?php echo $article['ID_Articles']; ?>');"></button>
                </p>
                <?php if($article["Status"]!=1):?>
                <p>Elimina Evento:
                <button class="login icon" id="delete_article"><img src="resources/bidone.png" class=" icons" onClick="delete_article(<?php echo $article['ID_Articles']; ?>,'<?php echo $article['Image_Path']; ?>');" alt=""></button>
                </p>
                <?php endif; ?>
                <p style="width:fit-content;">Stato dell'evento:
                <?php if($article["Status"]==1):?>
                <img class="icons" src="resources/approved.png" alt="">
                <?php elseif($article["Status"]==2): ?>
                <img class="icons" src="resources/not-approved.png" alt="">
                <?php else: ?>
                In attesa di approvazione da parte dell'admin.
                <?php endif; ?>
                </p>
            </div>
        </div>
    <?php endforeach;?>
    <div class="botton-new">
    <h2 class="add" style="background-color: rgb(255,255,165); width:fit-content; display:inline-block;">Aggiungi Nuovo Evento:
    </h2>
    <button class="login"  onClick="window.location.href='upload_article.php'"><img src="resources/plus.png" class="icons" alt=""></button>
    </div>
    </div>
<?php } ?>