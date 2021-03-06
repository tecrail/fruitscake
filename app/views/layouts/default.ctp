<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="author" content="tecrail - http://www.tecrail.com"/>
        <meta name="description" content="<?php echo $title_for_layout; ?>"/>
        <meta name="keywords" content=""/>
        <?php
        echo $this->Html->css(array('/shadowbox/shadowbox', 'default'));
        //echo $this->Html->script(array('jquery-1.5.2.min', 'jquery.animate-colors-min', '/shadowbox/shadowbox', 'http://maps.google.com/maps/api/js?sensor=false', 'modernizr-1.7.min', 'application'));
        echo $this->Html->script(array('jquery-1.5.2.min', 'jquery.animate-colors-min', '/shadowbox/shadowbox', 'modernizr-1.7.min', 'application'));
        echo $scripts_for_layout
        ?>
        <?php echo $this->Html->css(array('ie')); ?>
        <title><?php echo $title_for_layout; ?></title>
    </head>
    <body>

        <div id="header">

            <div class="center">

                <div class="menu">
                    <?php echo $this->Frontend->menuList($mainFCMenu) ?>
                </div>

                <div id="banners">

                    <div class="overlay">
                        <div class="logo_bg"><?php echo $this->Html->link(" ", "/", array('id' => 'logo')) ?></div>
                    </div>

                    <div id="slideshow">
                        <?php echo $this->Html->image("banner00.jpg") ?>
                    </div>

                </div>

            </div>

        </div>

        <div id="container">

            <div class="center">

                <div id="navigator">

                    <?php echo $this->Frontend->menuList($navigatorFCMenu) ?>

                    </div>

                    <div id="content">

                        <div class="top">

                        <?php echo $content_for_layout ?>

                    </div>
                    <div class="bottom">

                        <?php echo $this->element('company_info') ?>
                    </div>

                </div>

                <div class="clear">&nbsp;</div>

            </div>

        </div>

        <div id="footer">

            <div class="center">

                credits: <?php echo $this->Html->link("tecrail.com", "http://www.tecrail.com") ?>

            </div>

        </div>

    </body>
</html>
