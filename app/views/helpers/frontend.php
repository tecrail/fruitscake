<?php

class FrontendHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

    public function menuList($menu = null, $options = array()) {

        $id = isset($options['id']) ? isset($options['id']) : $menu['Menu']['name'] . "FCMenu" ;

        $result = "<ul id='{$id}'>";
        foreach ($menu['Children'] as $child) {
            $result.= "<li id='FCMenu{$child['Menu']['id']}' class=''>{$this->Html->link($child['Menu']['name'], empty($child['Menu']['url']) ? "#" : $child['Menu']['url'] )}</li>";
        }
        $result.= "<li class='clear'>&nbsp;</li>";
        $result.= "</ul>";

        return $this->output($result);
    }

		public function l10n_date($date) {
			return strftime('%d/%m/%Y', mktime(0,0,0, substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4)));
		}

}
