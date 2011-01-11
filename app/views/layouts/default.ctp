<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="author" content="tecrail - http://www.tecrail.com"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <?php
        echo $this->Html->css(array('default'));
        echo $this->Html->script(array('jquery-1.4.4.min', 'http://maps.google.com/maps/api/js?sensor=false', 'application'));
        echo $scripts_for_layout
        ?>
        <title><?php echo $title_for_layout; ?></title>
    </head>
    <body>

        <div id="header">

            <?php echo $this->Frontend->menuList($mainFCMenu) ?>

        </div>

        <?php echo $content_for_layout ?>

    </body>
</html>
