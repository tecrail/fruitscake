<div class="left descr">
    <h1><?php echo Configure::read('App.baseTitle') ?></h1>
    <p>
        Accesso area di amminstrazione.<br/>
        <?php echo $this->Html->link(__('reset password', true), array('action' => 'reset_password', 'admin' => true));?>
    </p>
    <?php echo $this->element('flash'); ?>
</div>
<div class="right">
    <fieldset>
        <legend><?php __d('users', 'Login') ?></legend>
        <?php
        echo $this->Form->create($model, array('action' => 'login'));
        echo $this->Form->input('email', array('label' => __d('users', 'Email', true)));
        echo $this->Form->input('passwd', array('label' => __d('users', 'Password', true)));
        echo __d('users', 'Remember Me') . $this->Form->checkbox('remember_me');
        echo $this->Form->hidden('User.return_to', array('value' => $return_to));
        echo $this->Form->end(__d('users', 'Submit', true));
        ?>
    </fieldset>
</div>