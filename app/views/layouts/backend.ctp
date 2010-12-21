<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <?php echo $this->Html->css(array('css.menu', 'cake.generic', 'backend')) ; ?>
        <?php echo $this->Html->script(array('backend')); ?>
        <?php echo $scripts_for_layout ?>
        <title><?php echo $title_for_layout ?></title>
    </head>
    <body>
        <div class="outer-container">
            <div class="inner-container">
                <div class="graybox">
                    <div class="left">Backend :: <?php //echo BASE_TITLE ?></div>
                    <?php if ($this->params["action"] != 'admin_login'): ?>
                        <div class="right"><?php echo $this->Html->link('Logout', '/admin/users/logout') ?></div>
                    <?php endif ?>
                        <div class="clear">&nbsp;</div>
                    </div>

                    <div class="clear">&nbsp;</div>
                    <p>&nbsp;</p>

                <?php echo $this->element('admin_menu'); ?>

                        <div class="main">

                            <div class="content">

                        <?php if ($this->Session->check('Message.flash'))
                            echo $this->Session->flash(); ?>

                        <?php echo $content_for_layout ?>

                    </div>

                    <div class="clear">&nbsp;</div>
                    <p>&nbsp;</p>

                </div>

                <div class="footer">

                    <span class="left">

                        Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> &amp; <a href="http://validator.w3.org/check?uri=referer">XHTML</a>

                    </span>

                    <span class="right">

                        <a href="http://www.tecrail.com" target="_blank">Made in tecrail</a>

                    </span>

                    <div class="clearer"></div>

                </div>

            </div>

        </div>

    </body>

</html>