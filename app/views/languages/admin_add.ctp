<div class="languages form">
<?php echo $this->Form->create('Language');?>
	<fieldset>
 		<legend><?php __('Add Language'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('locale');
		echo $this->Form->input('slug');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Languages', true), array('action' => 'index'));?></li>
	</ul>
</div>