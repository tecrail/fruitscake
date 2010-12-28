<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <?php echo $this->Html->css(array('backend/css.menu', 'backend/cake.generic', 'backend/login')); ?>
        <?php echo $this->Html->script(array('backend/application')); ?>
        <?php echo $scripts_for_layout ?>
        <title><?php echo $title_for_layout ?></title>
    </head>
    <body>

        <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
            <tr>
                <td valign="middle">

                    <div class="outer-container">
                        <div class="inner-container">
                            <div class="graybox">
                                <div class="left">Backend :: <?php echo $this->Html->link(Configure::read('App.baseTitle'), '/', array('target' => '_blank')) ?></div>
                                <div class="clear">&nbsp;</div>
                            </div>

                            <div class="clear">&nbsp;</div>

                            <div class="main">

                                <div class="content">

                                    <?php echo $content_for_layout ?>
                                    <div class="clear">&nbsp;</div>

                                </div>

                                <div class="clear">&nbsp;</div>

                            </div>

                            <div class="footer">

                                <span class="left">

                                    Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> &amp; <a href="http://validator.w3.org/check?uri=referer">XHTML</a>

                                </span>

                                <span class="right">

                                    <a href="http://www.tecrail.com" target="_blank">Powered by tecrail</a>

                                </span>

                                <div class="clear">&nbsp;</div>

                            </div>

                        </div>

                    </div>

                </td>
            </tr>
        </table>

    </body>

</html>