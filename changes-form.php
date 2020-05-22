<form class="form needs-validation col-sm-12 col-lg-6" method="POST" action="upload_updated_article.php" >
        <h1>Inserisci tutti i dettagli per Modificare il tuo Articolo/Evento</h1>
        <div class="form-group">
          <label for="labelNome">Numero di ticket disponibili:</label>
          <input type="number" step=1 name="Ticket_Number" class="input form-control" id="1" placeholder="Numero di ticket disponibili..." value="<?php echo $result[0]["Ticket_Available"]; ?>">
          <div class="submessages">Inserisci il numero di ticket disponibili</div>
          <div class="invalid-feedback">
            Inserisci il numero di ticket disponibili.
          </div>
        </div>
        <div class="form-group">
          <label for="labelNome">Costo del ticket:</label>
          <input type="number" step=0.01 name="Ticket_Cost" class="input form-control" id="cost1" placeholder="Costo ticket..." value="<?php echo $result[0]["Costo_Ticket"]; ?>">
          <div class="submessages">Inserisci il costo del ticket, 0.00 se gratuito</div>
          <div class="invalid-feedback">
            Inserisci il Costo del ticket.
          </div>
        </div>
        <div class="form-group">
          <label for="labelNome">Orario di Inizio Evento:</label>
          <input type="time" name="TimeEvent" class=" input form-control" id="time1" placeholder="Inzio Evento..." value="<?php echo date('H:i', strtotime($result[0]["Time_Event"]));?>">
          <div class="submessages">Inserisci l'orario dell'inzio dell'evento nel seguente formato hr:min:sec (secondi solo se necessario)</div>
          <div class="invalid-feedback">
            Inserisci l'inizio orario evento.
          </div>
        </div>
        <div class="form-group">
          <label for="labelCognome">Location dell'Evento:</label>
          <input type="location" name="EventLocation" class="input form-control" id="location1" placeholder="Location..." value="<?php echo $result[0]["Location_Event"]; ?>" >
          <div class="submessages">Inserisci la città / e la nazione che opsita l'evento...</div>
          <div class="invalid-feedback">
            Inserisci per favore il luogo dell'evento.
          </div>
        </div>
        <div class="form-group">
          <label for="labelDataEvent">Data dell'Evento:</label>
          <input type="date" name="dataevento" class="form-control" id="date1" placeholder="gg/mm/aa" value="<?php echo $result[0]["Date_Event"]; ?>" >
        </div>
        <input id="submit" type="submit" name="submit"class="btn btn-primary" value="Modifica articolo">
      </form>