<h1><?php __('lbl_newsletter');?></h1>

<h2><?php __('lbl_delete_from_newsletter');?></h2>

<p style="text-align: justify;"><?php __('lbl_remove_me_from_the_newsletter_text');?></p><br/>

<div class="newsletter_form_subscription">

    <?php echo $form->create('NewsletterUser', array('action' => 'unsubscription', 'class' => 'new_comment'));?>

    <?php if ($session->check('Message.flash')) $session->flash(); ?>

    <?php echo $form->input('email');?>

    <?php echo $form->end(__('lbl_send', true));?>

</div>

<div class="clear"></div>
<div class="hr"></div>