<div class="pages form">
<?php echo $this->Form->create('Page', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Edit Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Backend->htmlEditor('description');
                echo $this->Backend->imageInput('image', empty($this->data['Page']['image']) ? array() : array(
                    'preview' => array("url" => "/img/pages/thumb." . $this->data['Page']['image']),
                    'delete' => true
                ));
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php echo $this->element('backend/left_navigator'); ?>
