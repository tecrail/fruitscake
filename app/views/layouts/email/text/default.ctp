<?php echo Configure::read('App.baseTitle') ?>
Questa email è stata inviata dal sito internet in seguito ad una richiesta di informazioni:


<?php echo $content_for_layout; ?>

__________________________________________________________________________________________________
Messaggio inviato dall'ip: <?php echo $_SERVER['REMOTE_ADDR']; ?> il <?php echo date("d/m/Y"); ?> alle ore <?php echo date('H:i:s'); ?>