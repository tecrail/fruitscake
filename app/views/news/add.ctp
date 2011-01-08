<div class="news form">
<?php echo $this->Form->create('News');?>
	<fieldset>
 		<legend><?php __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('short_description');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('date');
		echo $this->Form->input('date_from');
		echo $this->Form->input('date_to');
		echo $this->Form->input('language_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Languages', true), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language', true), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>