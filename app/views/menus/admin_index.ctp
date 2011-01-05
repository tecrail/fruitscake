<div class="menus index">
    <h2><?php __('Menus'); ?></h2>

    <?php echo $this->Tree->generate($menus, array('element' => 'backend/tree_item', 'class' => 'menu_tree', 'id' => 'menu_tree')); ?>


</div>

<?php echo $this->element('backend/left_navigator'); ?>
