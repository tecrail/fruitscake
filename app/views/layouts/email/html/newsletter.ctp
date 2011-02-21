<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <title>Newsletter</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <style type="text/css">
            h1 { font-size: 10pt; }
            .titolo {
                font-size: 10pt;
                font-weight: bold;
                color: #990000;
            }
            .sottotitolo {color: #990000}
            .firma {
                color: #990000;
                margin-right:60%;
                border-top:groove;
                text-align:right;
            }
        </style>
    </head>
    <body>
        <table border="0">
            <tr>
                <td width="165"><img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/img/logo.jpg" width="165" height="160"></td>
                <td align="center" width="300"><h1><?php echo Configure::read('App.baseTitle'); ?></h1><br/>
                    <h1>Newsletter</h1>
            </tr>
        </table>
        <p><?php echo $content_for_layout; ?><br/></p>
        <div class="firma"><p><strong><i><?php echo Configure::read('App.baseTitle'); ?></i></strong></p></div>
        <table width="600">
            <tr>
                <td><p><b><?php echo __('Attention! Do not respond to this email as sent by an automated system.') ?></b><br>
                        <?php echo __('For information and requests write to') ?>: <a href="mailto:<?php echo Configure::read('App.infoEmail'); ?>"><?php echo Configure::read('App.infoEmail'); ?></a> <br>
                        <?php echo __('This communication is addressed to users on the site ') ?><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>" target="_blank"><?php echo $_SERVER['HTTP_HOST'] ?></a>. <?php echo __('You received this message because you registered on the site') ?> <?php echo $_SERVER['HTTP_HOST'] ?> <?php echo __("Under Law 196/2003 on privacy. If you've never written it is possible that someone has made a recording using your information. You can report it to ") ?> <a href="mailto:<?php echo Configure::read('App.infoEmail'); ?>"><?php echo Configure::read('App.infoEmail'); ?></a><br>
                        <br>
                        <?php echo __('If you do not wish to receive further messages, you can unsubscribe at') ?>: <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/newsletters/unsubscription" target="_blank">http://<?php echo $_SERVER['HTTP_HOST'] ?>/newsletters/unsubscription</a><br>
                    </p></td>
            </tr>
        </table>
    </body>
</html>
