<h1 class="titolo_pagina">Evento: <?php echo $articolo["Article_Title"]; ?></h1>
<div class="container col-lg-10">
  <div clas="row">
    <div class=" event col-sm-12"><a class="col-md-12" href="#">
        <img class="col-11 altern" id="polaroid" src="<?php echo $articolo['Image_Path']; ?>" alt="">
      </a>
    </div>
  </div>
</div>
<div class="accordion" id="accordionExample">
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h2>Descrizione evento</h2>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <p><?php echo $articolo["Event_Description"]; ?></p>
      </div>
    </div>
  </div>
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h2>Quando? </h2>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p><?php echo $articolo["Date_Event"];  ?></p>
      </div>
    </div>
  </div>
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h2>Dove? </h2>
        </button>
      </h5>
    </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <p><?php echo $articolo["Location_Event"]; ?></p>
      </div>
      </div>
    <div class="card z-depth-0 bordered">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h2>Costo </h2>
          </button>
        </h5>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
        <div class="card-body">
          <?php if($articolo['Ticket_Available']==0){?>
          <h1> SOLD-OUT </h1>
          <?php }else{ ?>
          <p>€<?php echo $articolo["Costo_Ticket"]; ?></p>
          N° biglietti: <input type="number" name="n_ticket" min="1" max="<?php $articolo['Ticket_Available']; ?>" id="n_ticket" step=1 value="1">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbandonedCart" onclick="add_to_cart(<?php echo $articolo['ID_Articles'] ;?>);">Aggiungi al Carrello</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Acquista
          </button>
          <?php } ?>
          <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="heading">Aggiunto al carrello con successo
                  </p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-3">
                      <p></p>
                      <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
                    </div>
                    <div class="col-9">
                      Hai bisogno di più tempo per prendere la tua decisione?
                      non ti preoccupare il tuo biglietto ti aspetta nel carrello.
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-center">
                  <a type="button" class="btn btn-primary" onclick="window.location.href='cart-manager.php'">Vai al carrello</a>
                  <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                </div>
              </div>
            </div>
          </div>
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
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="confirmPurchase_and_sendEmail('<?php echo $articolo['Article_Title'];?>','<?php echo $articolo['ID_Articles'];?>');">Acquista</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>