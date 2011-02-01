<div id="text">
    <div class="newsletter">
        <?php if ($session->check('Message.flash')) $session->flash(); ?>
        <h2><?php __('lbl_delete_from_newsletter');?></h2>
        <?php echo $form->create('NewsletterUser', array('action' => 'delete'));?>
        <?php echo $form->input('first_name',array('label' => __('lbl_first_name', true))); ?>
        <?php echo $form->input('last_name',array('label' => __('lbl_last_name', true)));?>
        <?php echo $form->input('email',array('label' => __('lbl_email', true)));?>
        <?php echo $form->end(__('lbl_next', true));?>
    </div>
</div>

<div class="clear"></div>
<div class="hr"></div>
