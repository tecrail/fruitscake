<?php

echo $this->Form->input('id');
echo $this->Form->input('menu_id', array('empty' => false));
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('url');
echo $this->Form->input('target', array('type' => 'select', 'options' => array("_self" => __("Current window", true), '_blank' => __("New window", true))));

?>
