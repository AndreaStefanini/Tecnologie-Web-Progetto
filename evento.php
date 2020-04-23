<h1 class="display-4">Evento: <?php echo $articolo["Article_Title"]; ?></h1>
    <div class="container col-lg-10">
        <div clas="row">
            <div class=" event col-sm-12"><a class="col-md-10" href="#">
                    <img class="col-12 altern" id="polaroid" src="<?php echo $articolo['Image_Path']; ?>" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="container col-lg-12">
        <div class="row">
            <div class="container-post  col-sm-3">
                    <h2>Quando</h2>
                    <p><?php echo $articolo["Date_Event"];  ?></p>
            </div>
            <div class="container-post  col-sm-3 ">
                    <h2>Dove</h2>
                    <p><?php echo $articolo["Location_Event"]; ?></p>
            </div>
           
            <div class="container-post col-sm-3 style:>
                    <h2>Costo del Ticket</h2>
                    <p><?php echo $articolo["Costo_Ticket"]; ?></p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="P2RNSP4HBZN7N">
                        <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
                        <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                    </form>
            </div>
            <div class="container-post  col-sm-5 ">
                    <h2>Descrizione evento</h2>
                    <p><?php echo $articolo["Event_Description"]; ?></p>
            </div>
        </div> -->
        <div class="accordion" id="accordionExample">
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          <h2>Descrizione evento</h2>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
      data-parent="#accordionExample">
      <div class="card-body">
      <p><?php echo $articolo["Event_Description"]; ?></p>
      </div>
    </div>
  </div>
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h2>Dove? </h2>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <p><?php echo $articolo["Location_Event"]; ?></p>
      </div>
    </div>
    <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h2>Costo </h2>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <p><?php echo $articolo["Costo_Ticket"]; ?></p>
      <!-- Button trigger modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbandonedCart">Aggiungi al Carrello</button>
<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Aggiunto al carrello con successo
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
          </div>

          <div class="col-9">
            Hai bisogno di puù tempo per prendere la tua decisione?
            non ti preoccupare il tuo biglietto ti aspetta nel carrello.
          </div>
        </div>
      </div>
      
      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-primary">Vai al carrello</a>
        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Acquista
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
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
        <button type="button" class="btn btn-primary">Acquista</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalAbandonedCart-->
      </div>
    </div>
  </div>
</div>

<!-- Card -->
        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d813.3483819864376!2d12.263349521575542!3d44.33721150585204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132cb2ae1a8413df%3A0xe9cd019d306b5891!2sMirabilandia!5e0!3m2!1sit!2sit!4v1580719266044!5m2!1sit!2sit" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->

    </div>
    </div>