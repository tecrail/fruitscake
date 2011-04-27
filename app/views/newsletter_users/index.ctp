<h2><?php __('lbl_subscribe_newsletter'); ?></h2>

<div class="content_description newsletters">

    <?php
    if ($this->Session->check('Message.flash')) {
        echo $this->Session->flash();
    }
    ?>


    <p><?php __('lbl_text_subscribe_newsletter_of_site'); ?> <?php echo Configure::read("App.baseTitle") ?>.</p>

    <div class="newsletter_form_subscription">

        <?php echo $this->Form->create('NewsletterUser', array('action' => 'index')); ?>

        <?php if ($this->Session->check('Message.flash'))
            $this->Session->flash(); ?>

        <?php
        echo $this->Form->input('first_name', array('label' => __('lbl_first_name', true)));
        echo $this->Form->input('last_name', array('label' => __('lbl_last_name', true)));
        echo $this->Form->input('email', array('label' => __('lbl_email', true)));
//        echo $this->Form->input('languages', array('label' => __('lbl_language', true), 'options' => $options_languages));
        echo $this->Form->input('languages', array('type' => 'hidden', 'value' => 1));
        ?>

<?php echo $this->Form->end(__('lbl_subscription', true)); ?>

    </div>

    <p>&nbsp;</p>

<?php echo $this->Html->link(__('lbl_delete_from_newsletter', true) . " &raquo;", array('controller' => 'newsletter_users', 'action' => 'unsubscription'), array('escape' => false)); ?>

</div>
<div class="clear"></div>
<div class="hr"></div>