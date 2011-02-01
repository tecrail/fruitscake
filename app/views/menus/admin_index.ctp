<div class="menus index">
    
    <h2><?php __('Menus'); ?></h2>

    <div id="menu_tree_header">
        <div class="left"><?php __("Menu Item") ?></div>
        <div class="right">
            <?php __("Actions") ?>
        </div>
        <div class="clear">&nbsp;</div>
    </div>

    <?php echo $this->Tree->generate($menus, array('element' => 'backend/menus/tree_item', 'class' => 'menu_tree', 'id' => 'menu_tree')); ?>

</div>

<?php echo $this->element('backend/left_navigator'); ?>
