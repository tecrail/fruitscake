<div class="menus tree">
    <h2><?php __('Menus'); ?></h2>
    <?php
    $this->Html->script(
            array(
                '/js/backend/jquery.treeview',
                '/js/backend/jquery.contextmenu',
                '/js/backend/admin_tree'),
            array('inline' => false));
    $this->Html->css(
            array(
                '/css/backend/jquery.treeview',
                '/css/backend/jquery.contextmenu',
                '/css/backend/basic'),
            null,
            array('inline' => false));
    $this->Html->scriptBlock('App.pagesAdminIndex.init();');
    ?>

    <div id="menu-menu">
        <?php if (empty($menus)) : ?>
            <p class="error-message">
            <?php
            echo String::insert(
                    __('No menus were added yet. :add-a-new-one now!', true),
                    array('add-a-new-one' => $this->Html->link(__('Add a new one', true), array('action' => 'add'))));
            ?>
        </p>
        <?php
            else :
                echo $this->Tree->generate($menus, array('element' => 'menus/tree_item', 'class' => 'menutree', 'id' => 'menutree'));
            endif;
        ?>
            <ul class="actions">
                <li><?php echo $this->Html->link(__('Add menu', true), array('action' => 'add')); ?></li>
            </ul>
        </div>

        <div id="placeholder"></div>

        <ul id="actions-list" class="contextMenu">
            <li class="view"><?php echo $this->Html->link(__('View', true), array('action' => 'view', 'admin' => true)); ?></li>
            <li class="add separator"><?php echo $this->Html->link(__('Add a child', true), array('action' => 'add')); ?></li>
            <li class="edit"><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit')); ?></li>
            <li class="delete separator"><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete')); ?></li>
        </ul>

    </div>

<?php echo $this->element('backend/left_navigator'); ?>
