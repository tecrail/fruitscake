<div class="photos form">
<?php echo $this->Form->create('Photo', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Add Photo'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Backend->htmlEditor('description');
		echo $this->Form->input('published');
		echo $this->Backend->imageInput('image');
		echo $this->Form->input('photo_gallery_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Photos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Photo Galleries', true), array('controller' => 'photo_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>