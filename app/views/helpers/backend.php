<?php
class BackendHelper extends AppHelper {

    public $helpers = array('Html');

    public function actionLink($title, $url = null, $options = array(), $confirmMessage = false) {
        return $this->Html->link($title, $url, $options, $confirmMessage);
    }

}
