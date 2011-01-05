<?php
$id = $this->params['pass'] && isset ($this->params['pass'][0]) ? $this->params['pass'][0] : false;
?>
<div class="actions">
    <ul>
        
        <?php if ($this->params['action'] != 'admin_index'): ?>
        <li><?php echo $this->Html->link(__('List ' . $model, true), array('action' => 'admin_index')); ?></li>
        <?php endif ?>
        
        <?php if ( $id && $this->params['action'] != 'admin_edit'): ?>
        <li><?php echo $this->Html->link(__('Edit ' . $model, true), array('action' => 'edit', $id)); ?></li>
        <?php endif ?>
        
        <?php if ($this->params['action'] != 'admin_add'): ?>
        <li><?php echo $this->Html->link(__('New ' . $model, true), array('action' => 'add')); ?></li>
        <?php endif ?>

        <?php if ( $id && $this->params['action'] != 'admin_delete'): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $id), null, sprintf(__('Are you sure you want to delete # %s?', true), $id)); ?></li>
        <?php endif ?>

    </ul>
</div>