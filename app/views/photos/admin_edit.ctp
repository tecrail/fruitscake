<div class="photos form">
<?php echo $this->Form->create('Photo', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Edit Photo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Backend->imageInput('image', array('preview' => array('url' => '/img/photos/thumb.' . $this->data['Photo']['image'])));
		echo $this->Form->input('photo_gallery_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Photo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Photo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Photos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Photo Galleries', true), array('controller' => 'photo_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>