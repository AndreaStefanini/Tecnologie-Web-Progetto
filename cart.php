<h1>Ecco il tuo carrello della spesa</h1>
<div class="container-fluid">
    <table class="table table-striped table-dark table-sm" style="width:100%;">
        <thead>
            <tr>
                <th scope="col"># Evento</th>
                <th scope="col">Titolo</th>
                <th scope="col">Prezzo Totale</th>
                <th scope="col">Numero Biglietti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchases as $purchase) : ?>
                <tr>
                    <td scope="row">
                        </th><?php echo $purchase["ID_Articles"]; ?></td>
                    <td><a href="obtain_article.php?id=<?php echo $purchase["ID_Articles"]; ?>"><?php echo $purchase["Article_Title"]; ?></a></td>
                    <td>€ <?php echo $purchase["Costo_Ticket"] * $purchase["n_tickets"]; ?></td>
                    <td>
                        <div class="def-number-input number-input safari_only">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                            <input class="quantity" min="0" name="tickets" value=<?php echo $purchase["n_tickets"]; ?> type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary btn-buy" data-toggle="button" aria-pressed="false">
        Acquista
    </button>


</div>