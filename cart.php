<h1>Ecco il tuo carrello della spesa</h1>
<div class="container-fluid">
<?php foreach($purchases as $purchase): ?>
<div class="row">
    <div style="margin-left:10%;" id="tickets<?php echo $purchase['ID_Articles'];?>"><?php echo $purchase["n_tickets"]; ?></div>
    <div style="margin-left:10%;"><?php echo $purchase["Article_Title"]; ?></div>
    <div id="delete_purchase" style="margin-left:10%;" onclick="delete_purchase(<?php echo $purchase['ID_Articles'];?>);">Rimuovi</div>
    <input type="number" name="n_delete" id="n_delete<?php echo $purchase['ID_Articles'];?>" step=1>
</div>
<?php endforeach; ?>
</div>