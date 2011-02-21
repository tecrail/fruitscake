<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <style type="text/css">
            body * {
                font-size: 8pt;
                font-family: verdana;
            }
            h1 { font-size: 10pt; }
        </style>
        <title></title>
    </head>
    <body>
        <h1><strong><?php echo Configure::read('App.baseTitle') ?></strong></h1>
        <p>Questa email è stata inviata dal sito internet in seguito ad una richiesta di informazioni:</p>
        <br/>
        <?php echo $content_for_layout; ?>
        <br/>
        <hr/>
        <p>Messaggio inviato dall'IP: <?php echo $_SERVER['REMOTE_ADDR']; ?> il <?php echo date("d/m/Y"); ?> alle ore <?php echo date('H:i:s'); ?></p>
    </body>
</html>