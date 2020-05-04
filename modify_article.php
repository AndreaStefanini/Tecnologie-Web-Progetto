<?php
    require_once("database-entrance.php");
    if(!empty($_POST["submit"])){
        //da aggiornare i paramentri per matchare l'ordine, inoltre penso di voler spostare le funzioni per ridimensionare l'immagine in una pagina di function utility
        $db->update_article($_POST["ArticleTitle"],$_POST["dataevento"],$_POST["Ticket_Cost"],$_POST["EventArticle"],$_POST["TimeEvent"],$NewImg,$_POST["EventDescription"],$_POST["foto"], $id);
        header("Location: login.php");
    }else{
        $id = $_GET["ID"];
        $result = $db->get_article($id);
       
    }
?>
<form class="form needs-validation col-sm-12 col-lg-6" method="POST" action="#" enctype="multipart/form-data">
        <h1>Inserisci tutti i dettagli per Modificare il tuo Articolo/Evento</h1>
        <div class="form-group">
          <label for="labelEmail">Titolo Articolo:</label>
          <input type="title" name="ArticleTitle" class="input form-control" id="ArticleTitle" placeholder="Titolo..." value="<?php echo $result[0]["Article_Title"]; ?>" required >
          <div class="submessages">Inserisci qui il titolo dell'articolo...</div>
          <div class="invalid-feedback">
            Per favore inserisci il titolo dell'articolo.
          </div>
        </div>
        <div class="form-group">
          <label for="labelPassword">Descrizione Evento:</label>
          <textarea name="EventArticle" class="form-control" id="EventDescription" rows ="4" placeholder="Descrivi brevemente il tipo di Evento che vuoi publicizzare " required></textarea>
          <div class="invalid-feedback">
            Per favore inserisci una descrizione dell'evento.
          </div>
        </div>
        <div class="form-group">
          <label for="labelNome">Costo del ticket:</label>
          <input type="number" step=0.01 name="Ticket_Cost" class="input form-control" id="cost1" placeholder="Costo ticket...">
          <div class="submessages">Inserisci il costo del ticket, 0.00 se gratuito</div>
          <div class="invalid-feedback">
            Inserisci il Costo del ticket.
          </div>
        </div>
        <div class="form-group">
          <label for="labelNome">Orario di Inizio Evento:</label>
          <input type="time" name="TimeEvent" class=" input form-control" id="time1" placeholder="Inzio Evento...">
          <div class="submessages">Inserisci l'orario dell'inzio dell'evento nel seguente formato hr:min:sec (secondi solo se necessario)</div>
          <div class="invalid-feedback">
            Inserisci l'inizio orario evento.
          </div>
        </div>
        <div class="form-group">
          <label for="labelCognome">Location dell'Evento:</label>
          <input type="location" name="EventLocation" class="input form-control" id="location1" placeholder="Location..." required>
          <div class="submessages">Inserisci la città / e la nazione che opsita l'evento...</div>
          <div class="invalid-feedback">
            Inserisci per favore il luogo dell'evento.
          </div>
        </div>
        <div class="form-group">
          <label for="labelDataEvent">Data dell'Evento:</label>
          <input type="date" name="dataevento" class="form-control" id="date1" placeholder="gg/mm/aa" required>
        </div>
        <label for="labelCategoryEvent">Scegli la categoria dell'Evento:</label>
        <select id="Categorie" name="Categorie"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
          <option value="Concerti">Concerti</option>
          <option value="Festivals">Festivals</option>
          <option value="Serate">Serate</option>
          <option value="Musei e Cultura">Musei e Cultura</option>
          <option value="Altro">Altro</option>
        </select>
        <div class="form-group">
            <label for="fotoEvento">Inserisci un foto dell'Evento:</label>
            <input type="file" class="form-control-file" id="CaricaFoto" name="EventFoto" required>
        </div>
        <button id="submit" type="submit" name="submit" class="btn btn-primary">Crea Evento</button>
      </form>


<?php 
 $page = "modify_article.php";
require_once("Bopleve.php"); 
?>      