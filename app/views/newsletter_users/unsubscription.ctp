<h2><?php __('lbl_delete_from_newsletter'); ?></h2>

<p><?php __('lbl_remove_me_from_the_newsletter_text'); ?></p><br/>

<div class="newsletter_form_subscription">

    <?php echo $this->Form->create('NewsletterUser', array('action' => 'unsubscription', 'class' => 'new_comment')); ?>

    <?php if ($this->Session->check('Message.flash')) {
        $this->Session->flash();
    } ?>

    <?php echo $this->Form->input('email'); ?>

    <?php echo $this->Form->end(__('lbl_send', true)); ?>

</div>

<div class="clear"></div>

<div class="hr"></div>