<h1 class="titolo_pagina"> I tuoi acquisti</h1>
<?php 
if(empty($acquisti)){?>
<p style="text-align:center;background-color: rgb(255,255,165); font-size:21pt; margin-top:15%;"> Non hai ancora effettuato acquisti, fatti un giro per il sito e vedi se qualcosa ti attrae!</p>
<?php
} else { ?>
<div class="container-fluid">
<?php foreach($acquisti as $acquisto): ?>
  <div class="row">
    <div class="col-md-5 col-xs-10">
      <a href="obtain_article.php?id=<?php echo $acquisto['ID_Articles']; ?>">
        <img src="<?php echo $acquisto['Image_Path']; ?>" class="col-12 shared img-responsive rounded float-left" height="auto" alt="">
      </a>
    </div>  
    <ul class="col-md-5" style ="margin-top:5%; margin-left:20px; background-color: rgb(255,255,165);">
      <li>Titolo: <?php echo $acquisto['Article_Title']; ?></li>
      <li>Luogo dell'evento: <?php echo $acquisto['Location_Event']; ?></li>
      <li>Data dell'evento: <?php echo $acquisto['Date_Event']; ?></li>
      <li>Descrizione dell'evento: <?php echo $acquisto['Event_Description']; ?></li>
      <li>Data dell'acquisto del/dei biglietto/biglietti: <?php echo $acquisto['data_acquisto']; ?></li>
      <li>Numero di biglietti acquistati: <?php echo $acquisto['n_tickets']; ?></li>
    </ul>
  </div>
<?php endforeach; ?>
</div>
<?php
}
?>
