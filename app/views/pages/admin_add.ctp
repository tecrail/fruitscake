<div class="pages form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
 		<legend><?php __('Add Page'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Backend->htmlEditor('description');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php echo $this->element('backend/left_navigator'); ?>
