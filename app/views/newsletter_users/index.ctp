<h1><?php __('lbl_newsletter');?></h1>

<h2><?php __('lbl_subscribe_newsletter');?></h2>

<div class="page_content">

    <p style="text-align:center;"><?php __('lbl_text_subscribe_newsletter');?>.</p>

    <div class="newsletter_form_subscription">

        <?php echo $form->create('NewsletterUser', array('action' => 'index'));?>

        <?php if ($session->check('Message.flash')) $session->flash(); ?>

        <?php
        echo $form->input('first_name', array('label' => __('lbl_first_name', true)));
        echo $form->input('last_name', array('label' => __('lbl_last_name', true)));
        echo $form->input('email', array('label' => __('lbl_email', true)));
        echo $form->input('languages', array('label' => __('lbl_language', true), 'options' => $options_languages));
        ?>

        <?php echo $form->end(__('lbl_subscription', true));?>

    </div>

    <?php echo $html->link(__('lbl_delete_from_newsletter', true), array('controller' => 'newsletter_users', 'action' => 'unsubscription')); ?>

</div>
<div class="clear"></div>
<div class="hr"></div>