
<div id="<?php echo $data['Menu']['id']; ?>" class="menu-item">
    <?php echo $this->Backend->actionLink($data['Menu']['name'], array('controller' => 'menus', 'action' => 'edit', $data['Menu']['id']), array('class' => 'menu-tree-link')); ?>
    <div class="actions">
        <?php echo $this->Backend->actionLink(__('Up', true), array('action' => 'move_up', $data['Menu']['id'])); ?>
        <?php echo $this->Backend->actionLink(__('Down', true), array('action' => 'move_down', $data['Menu']['id'])); ?>
        <?php echo $this->Backend->actionLink(__('View', true), array('action' => 'view', $data['Menu']['id'])); ?>
        <?php echo $this->Backend->actionLink(__('Edit', true), array('action' => 'edit', $data['Menu']['id'])); ?>
        <?php echo $this->Backend->actionLink(__('Delete', true), array('action' => 'delete', $data['Menu']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $data['Menu']['id'])); ?>
    </div>
    <div class="clear">&nbsp;</div>
</div>