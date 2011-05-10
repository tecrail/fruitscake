<?php

class LayoutHelper extends AppHelper {
    
    protected $_variable = null;

    function __construct($options = null) {
        if($options && $options['variables']) {
            $this->_variable = $options['variables'];
        }
        parent::__construct($options);
        
    }

    public function variable($key = false) {
        if($key) {            
            return (isset($this->_variable[$key]) && !empty($this->_variable[$key])) ? $this->_variable[$key] : Configure::read("App.{$key}");           
        } else {            
            return false;            
        }
    }

}