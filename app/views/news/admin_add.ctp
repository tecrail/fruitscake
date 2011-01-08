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

<?php echo $this->element("backend/left_navigator") ?>
