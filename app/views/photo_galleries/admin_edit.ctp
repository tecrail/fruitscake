<div class="photoGalleries form">
<?php echo $this->Form->create('PhotoGallery');?>
	<fieldset>
 		<legend><?php __('Edit Photo Gallery'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Backend->htmlEditor('description');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PhotoGallery.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PhotoGallery.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Photo Galleries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Photos', true), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo', true), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>