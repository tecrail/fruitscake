<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="author" content="tecrail - http://www.tecrail.com"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <?php
        echo $this->Html->css(array('default'));
        echo $this->Html->script(array('jquery-1.4.4.min', 'jquery.animate-colors-min', 'http://maps.google.com/maps/api/js?sensor=false', 'application'));
        echo $scripts_for_layout
        ?>
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

                        <h3>Lorem ipsum dolor sit amet</h3>

                        <p>consectetuer adipiscing elit, sed diam non- ummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim cing elit, sed diam nonummy nibh.</p>
                        
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
