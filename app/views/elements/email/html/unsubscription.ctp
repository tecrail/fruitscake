<p><?php echo __("To stop receiving newsletters from") ?> <?php echo Configure::read('App.baseTitle') ?>, <?php echo __("click the following link") ?>:</p>

<p>
    <?php
    echo $html->link(
            __("Click here to proceed to the elimination from the newsletter"),
            "http://{$_SERVER['HTTP_HOST']}/newsletter_users/confirm_unsubscription/{$newsletterUser['NewsletterUser']['id']}/key:{$key}"
    );
    ?>
</p>
