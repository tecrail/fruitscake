<div class="left descr">
    <h1><?php echo Configure::read('App.baseTitle') ?></h1>
    <p>Accesso area di amminstrazione</p>
    <?php echo $this->element('flash'); ?>
</div>
<div class="right">
    <fieldset>
        <legend><?php __d('users', 'Forgot your password?') ?></legend>
        <p>
            <?php __d('users', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?>
        </p>
        <?php
            echo $this->Form->create($model, array('url' => array('admin' => true, 'action' => 'reset_password')));
            echo $this->Form->input('email', array('label' => __d('users', 'Your Email', true)));
            echo $this->Form->submit(__d('users', 'Submit', true));
            echo $this->Form->end();
        ?>
    </fieldset>
</div>