<?php

class FrontendHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

    public function menuList($menu = null, $options = array()) {

        $id = isset($options['id']) ? isset($options['id']) : $menu['Menu']['name'] . "FCMenu" ;

        $result = "<ul id='{$id}'>";
        foreach ($menu['Children'] as $child) {
            $result.= "<li id='FCMenu{$child['Menu']['id']}' class=''>{$this->Html->link($child['Menu']['name'], empty($child['Menu']['url']) ? "#" : $child['Menu']['url'] )}</li>";
        }
        $result.= "</ul>";

        return $this->output($result);
    }

}
