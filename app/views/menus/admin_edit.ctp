<div class="menus form">

    <?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php __d('menus', 'Edit Menu'); ?></legend>
        <?php echo $this->element( empty($this->data['Menu']['menu_id']) ? "backend/menus/edit_root_menu" : "backend/menus/edit_menu" ); ?>
    </fieldset>
    <?php echo $this->Form->end(__d('menus', 'Submit', true)); ?>

</div>
    
<?php //echo $this->element('backend/left_navigator'); ?>

<?php
$id = $this->params['pass'] && isset ($this->params['pass'][0]) ? $this->params['pass'][0] : false;
?>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        
        <?php if ($this->params['action'] != 'admin_index'): ?>
        <li><?php echo $this->Backend->actionLink(__('List ' . $model, true), array('action' => 'admin_index')); ?></li>
        <?php endif ?>
        
        <?php if ( $id && $this->params['action'] != 'admin_edit'): ?>
        <li><?php echo $this->Backend->actionLink(__('Edit ' . $model, true), array('action' => 'edit', $id)); ?></li>
        <?php endif ?>
        
        <?php if ($this->params['action'] != 'admin_add'): ?>
        <li><?php echo $this->Backend->actionLink(__('New ' . $model, true), array('action' => 'add')); ?></li>
        <?php endif ?>

        <?php if ( $id && $this->params['action'] != 'admin_delete' && !empty($this->data['Menu']['menu_id'])): ?>
        <li><?php echo $this->Backend->actionLink(__('Delete', true), array('action' => 'delete', $id), null, sprintf(__('Are you sure you want to delete # %s?', true), $id)); ?></li>
        <?php endif ?>

    </ul>
</div>
