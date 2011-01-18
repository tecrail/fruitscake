<div class="menus form">

    <?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php __d('menus', 'Edit Menu'); ?></legend>
        <?php echo $this->element( empty($this->data['Menu']['menu_id']) ? "backend/menus/edit_root_menu" : "backend/menus/edit_menu" ); ?>
    </fieldset>
    <?php echo $this->Form->end(__d('menus', 'Submit', true)); ?>

</div>
    
<?php echo $this->element('backend/left_navigator'); ?>
