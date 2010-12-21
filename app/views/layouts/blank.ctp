<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <?php echo $html->css('css.menu')."\n"; ?>
        <?php echo $html->css('cake.generic')."\n"; ?>
        <?php echo $html->css('administration')."\n"; ?>
        <?php echo $scripts_for_layout ?>
        <title><?php echo $title_for_layout?></title>
        <style>
        body { background-color: #fff; }
        </style>
    </head>
    <body>

        <?php if ($session->check('Message.flash'))  $session->flash(); ?>
        <?php echo $content_for_layout ?>

    </body>

</html>