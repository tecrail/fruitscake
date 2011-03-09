<h1><?php __('lbl_newsletter');?></h1>

<h2><?php __('lbl_subscribe_newsletter');?></h2>

<div class="page_content">

    <p style="text-align:center;"><?php __('lbl_text_subscribe_newsletter_of_site');?> <?php echo Configure::read("App.baseTitle") ?>.</p>

    <div class="newsletter_form_subscription">

        <?php echo $this->Form->create('NewsletterUser', array('action' => 'index'));?>

        <?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

        <?php
        echo $this->Form->input('first_name', array('label' => __('lbl_first_name', true)));
        echo $this->Form->input('last_name', array('label' => __('lbl_last_name', true)));
        echo $this->Form->input('email', array('label' => __('lbl_email', true)));
        echo $this->Form->input('languages', array('label' => __('lbl_language', true), 'options' => $options_languages));
        ?>

        <?php echo $this->Form->end(__('lbl_subscription', true));?>

    </div>

    <?php echo $this->Html->link(__('lbl_delete_from_newsletter', true), array('controller' => 'newsletter_users', 'action' => 'unsubscription')); ?>

</div>
<div class="clear"></div>
<div class="hr"></div>