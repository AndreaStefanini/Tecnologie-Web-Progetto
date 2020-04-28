<h1>Ecco il tuo carrello della spesa</h1>
<?php foreach($purchases as $purchase): ?>
<div class="row">
    <div style="margin-left:10%;"><?php echo $purchase["Article_Title"]; ?></div>
    <div id="delete_purchase" style="margin-left:10%;" onclick="delete_purchase(<?php echo $purchase['ID_Articles'];?>);">Rimuovi</div>
</div>
<?php endforeach; ?>