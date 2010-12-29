<div class="users form">
<?php echo $this->Form->create($model);?>
	<fieldset>
 		<legend><?php __d('users', 'Add User');?></legend>
	<?php
		echo $this->Form->input('username');
                echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                echo $this->Form->input('email');
                echo $this->Form->input('passwd', array('type' => 'password'));
                echo $this->Form->input('temppassword', array('type' => 'password'));
                echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action'=>'index'));?></li>
	</ul>
</div>
