<?php
require_once("database-entrance.php");

if ($db->is_admin($_SESSION["ID"])) {
    $articles = $db->articles_to_approve(); ?>
    <h1>Ecco tutti gli eventi in attesa di approvazione:</h1>
    <?php foreach ($articles as $article) : ?>
        <div class="row logged">
            <div class="col-4">
                <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
            </div>
            <div class="col-4">
                <ul>
                    <li style="margin-top:5%;">Titolo Articolo: <?php echo $article["Article_Title"] ?></li>
                    <li style="margin-top:5%;">Descrizione dell'evento: <?php echo $article["Event_Description"] ?></li>
                    <li style="margin-top:5%;">Costo del ticket: €<?php echo $article["Costo_Ticket"] ?></li>
                    <li style="margin-top:5%;">Luogo dell'evento: <?php echo $article["Location_Event"] ?></li>
                    <li style="margin-top:5%;">Orario di inizio: <?php echo $article["Time_Event"] ?></li>
                    <li style="margin-top:5%;">Categoria dell'evento: <?php echo $article["Category"] ?></li>

                </ul>
            </div>
            <div class="col-4">
                <button class="login icon"><img src="resources/approved.png" class="icons" alt="" onclick="window.location.href='approve_article.php?article=<?php echo intval($article['ID_Articles']); ?>&status=1'"></button>
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
                                <button type="button" class="btn btn-primary" onclick="window.location.href='approve_article.php?article=<?php echo intval($article['ID_Articles']); ?>&status=2'">Respingi articolo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="login icon" id="delete_article"><img src="resources/bidone.png" class=" icons" onClick="window.location.href='delete-article?delete=<?php echo $article['Article_Title']; ?>'" alt=""></button>
            </div>
            </div>
    <?php endforeach;
} else {
    $articles = $db->get_by_author($_SESSION["ID"]);
    ?>
    <h1>Ecco tutti gli eventi da te organizzati:</h1>
    <?php
    foreach ($articles as $article) :
    ?>
        <div class="row logged">
            <img src="<?php echo $article["Image_Path"]; ?>" alt="" class="shared">
            <div style="margin-top:5%;"> <?php echo $article["Article_Title"] ?></div>
            <button class="login icon"><img src="resources/matita.png" class="icons" alt="" onclick="window.location.replace('modify_article.php?ID=<?php echo $article['ID']; ?>');"></button>
            <button class="login icon" id="delete_article"><img src="resources/bidone.png" class=" icons" onClick="window.location.href='delete-article?delete=<?php echo $article['Article_Title']; ?>'" alt=""></button>

        </div>
    <?php endforeach; ?>
    <div class="row" style="width:100%;">
        <button class="login" style=" margin-left:80%;" onClick="window.location.href='upload_article.php'"><img src="resources/plus.png" class="icons" alt=""></button>
    </div>
<?php } ?>