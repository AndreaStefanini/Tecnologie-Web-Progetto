<h1 class="titolo_pagina">Ecco il tuo carrello della spesa</h1>
<div class="container-fluid">
<?php if(count($purchases)>0){?>
    <table class="table table-striped table-dark table-sm">
        <thead>
            <tr>
                <th scope="col"># Evento</th>
                <th scope="col">Titolo</th>
                <th scope="col">Prezzo Totale (€)</th>
                <th scope="col">Numero Biglietti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchases as $purchase) : ?>
                <tr>
                    <td scope="row"><?php echo $purchase["ID_Articles"]; ?></td>
                    <td><a href="obtain_article.php?id=<?php echo $purchase["ID_Articles"]; ?>"><?php echo $purchase["Article_Title"]; ?></a></td>
                    <td class="total_price" id="total_price<?php echo $purchase["ID_Articles"]; ?>"><?php echo $purchase["Costo_Ticket"] * $purchase["n_tickets"]; ?></td>
                    <td>
                        <div class="def-number-input-white number-input-white safari_only">
                            <button onclick="update_number_ticket(<?php echo $purchase['ID_Articles'];?>, 'minus');" class="minus" ></button>
                            <input class="quantity" min="0" max="<?php echo $purchase['n_tickets'];?>" name="tickets" id="n_ticket<?php echo $purchase["ID_Articles"]; ?>" disabled="disabled" value="<?php echo $purchase['n_tickets'];?>" type="number">
                            <button onclick="update_number_ticket(<?php echo $purchase['ID_Articles'];?>,'plus');" class="plus"></button>
                        </div>
                        <button class="btn btn-outline-light btn-delete-car" onclick="delete_from_cart(<?php echo $purchase['ID_Articles']; ?>);" >Rimuovi</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
      <button type="button" class="btn btn-primary btn-Cont" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_final_amount();">
            Acquista
          </button>
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Procedi all'acquisto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h1>Dati Fatturazione</h1>
                  <div class="form-group">
                    <label for="labelNomeCognome">Nome Cognome</label>
                    <input placeholder="Nome Cognome:" type="nomecognome" class="form-control frm" id="nomecognome" name="nome">
                  </div>
                  <div class="form-group">
                    <label for="labelCarta">Numero carta:</label>
                    <input placeholder="n° carta:" type="numerocarta" class="form-control frm" id="numeroCarta" name="numero carta">
                  </div>
                  <div class="form-group">
                    <label for="labelScadenza">Scade:</label>
                    <input placeholder="MM/AA" type="scadenza" class="form-control frm" id="scadenza" name="scadenza">
                  </div>
                  <div class="form-group">
                    <label for="labelCvv">Cvv:</label>
                    <input placeholder="000" type="CVV" class="form-control frm" id="cvv" name="cvv">
                  </div>
                  <h3 >Il costo dei biglietti è € <h3 class="total_amount"></h3> </h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="buy_from_cart();">Acquista</button>
                </div>
              </div>
            </div>
          </div>
          <a href="index.php" class="btn-Cont"><button type="button" class="btn btn-secondary" data-dismiss="modal">Scegli altri biglietti</button></a>
    <?php }else{?>
    <div style="text-align:center;background-color: rgb(255,255,165); font-size:21pt; margin-top:15%;">Non hai nulla nel carrello, guardati intorno e vedi se ti intriga qualcosa e aggiungilo al carrello!</div>
    <?php } ?>
</div>