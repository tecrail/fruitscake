<div class="menus form">

    <?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php __d('menus', 'Edit Menu'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('menu_id', array('empty' => true));
        echo $this->Form->input('name');
        echo $this->Backend->htmlEditor('description');
        echo $this->Form->input('url');
        echo $this->Form->input('target', array('type' => 'select', 'options' => array("_self" => __("Current window", true), '_blank' => __("New window", true))));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__d('menus', 'Submit', true)); ?>

</div>
    
<?php echo $this->element('backend/left_navigator'); ?>
