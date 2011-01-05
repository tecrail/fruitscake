<div class="menus form">

    <?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php __d('menus', 'Edit Menu'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('menu_id', array('empty' => true));
        echo $this->Form->input('name');
        echo $this->Form->input('description');
        echo $this->Form->input('url');
        echo $this->Form->input('target', array('value' => '_blank'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__d('menus', 'Submit', true)); ?>

</div>
    
<?php echo $this->element('backend/left_navigator'); ?>
