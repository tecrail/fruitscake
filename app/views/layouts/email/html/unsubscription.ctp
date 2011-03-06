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
        <p>This email was sent automatically in response to a request to unsubscribe.</p>
        <br/>
        <?php echo $content_for_layout; ?>
        <br/>
    </body>
</html>