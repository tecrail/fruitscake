<script type="text/javascript">
    $(document).ready(function() {
        $('#UserChangePassword').change(function(){
            if($(this).attr('checked')) {
                $('#change_password_box').fadeIn('fast').find('input').each(function() {
                    $(this).attr('disabled', false);
                });
            } else {
                $('#change_password_box').fadeOut('fast').find('input').each(function() {
                    $(this).attr('disabled', 'disabled');
                });
            }
        });
    });
</script>
<div class="users form">
    <?php echo $this->Form->create($model); ?>
    <fieldset>
        <legend><?php __d('users', 'Edit User'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('username');
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('email');
        echo $this->Form->input('change_password', array('type' => 'checkbox'));
        ?>
        <div id="change_password_box" style="display: <?php echo (isset($this->data['User']['change_password']) && $this->data['User']['change_password']) ? 'block' : 'none' ?>">

            <fieldset>
                <legend><?php __d('users', 'Change password'); ?></legend>
                <?php
                echo $this->Form->input('passwd', array('type' => 'password', 'disabled' => (isset($this->data['User']['change_password']) && $this->data['User']['change_password']) ? false: 'disabled' ));
                echo $this->Form->input('temppassword', array('type' => 'password', 'disabled' =>  (isset($this->data['User']['change_password']) && $this->data['User']['change_password']) ? false : 'disabled' ));
                ?>
            </fieldset>
            
        </div>
        <?php
                echo $this->Form->input('active');
        ?>
            </fieldset>
    <?php echo $this->Form->end('Submit'); ?>
            </div>
            <div class="actions">
                <ul>
                    <li><?php echo $this->Html->link(__d('users', 'Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
                    <li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action' => 'index')); ?></li>
    </ul>
</div>
