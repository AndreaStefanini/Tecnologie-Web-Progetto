<h1>Ecco il tuo carrello della spesa</h1>
<div class="container-fluid">
<?php foreach($purchases as $purchase): ?>
<div class="row">
    <div style="margin-left:10%;" id="tickets<?php echo $purchase['ID_Articles'];?>"><?php echo $purchase["n_tickets"]; ?></div>
    <div style="margin-left:10%;"><?php echo $purchase["Article_Title"]; ?></div>
    <div id="delete_purchase" style="margin-left:10%;" onclick="delete_purchase(<?php echo $purchase['ID_Articles'];?>);">Rimuovi</div>
    <input type="number" name="n_delete" id="n_delete<?php echo $purchase['ID_Articles'];?>" step=1>
</div>
<div class="row">
    <div class = "col-md-10 col-xs-10">
        <table class="table table-striped table-dark table-sm">
            <thead>
                 <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Prezzo Totale</th>
                    <th scope="col">Numero Biglietti</th>
                </tr>
            </thead>
             <tbody>
                <tr>
                 <th scope="row">1</th>
                    <td><?php echo $purchase["Article_Title"]; ?></td>
                    <td>Otto</td>
                    <td>
                     <div class="def-number-input number-input safari_only">
                     <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                     <input class="quantity" min="0" name="quantity" value=<?php echo $purchase["n_tickets"]; ?> type="number">
                     <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                    </div>

                    </td>
                    </tr>
            </table>
    </div>
</div>

<?php endforeach; ?>
<!-- <button type="button" class="btn btn-primary btn-buy" data-toggle="button" aria-pressed="false">
  Acquista
</button> -->


</div>