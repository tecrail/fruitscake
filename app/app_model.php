<?php

class AppModel extends Model {

    public $actsAs = array(
        'Containable',
        'Search.Searchable'
    );

    public function __construct($id = false, $table = null, $ds = null) {
        $this->useDbConfig = Configure::read('debug') ? 'production' : 'development';
        parent::__construct($id, $table, $ds);
    }

    public function paginateCount($conditions = array(), $recursive = 0, $extra = array()) {
        $parameters = compact('conditions');
        if ($recursive != $this->recursive) {
            $parameters['recursive'] = $recursive;
        }
        if (isset($extra['type']) && isset($this->_findMethods[$extra['type']])) {
            $extra['operation'] = 'count';
            return $this->find($extra['type'], array_merge($parameters, $extra));
        } else {
            return $this->find('count', array_merge($parameters, $extra));
        }
    }

//  public $translateColumns = false;
//  public $recursive = -1;
//  protected $_locale = false;
//
//  function  __construct($id = false, $table = null, $ds = null) {
//    parent::__construct($id, $table, $ds);
//    $this->_locale = DEFAULT_LANGUAGE;
//  }
//
//  function setLocale($lang = 'it'){
//    $this->_locale = $lang;
//  }
//
//  function beforeFind($queryData) {
//    parent::beforeFind($queryData);
//    if($this->translateColumns) {
//      $queryData['fields'] = array("*");
//      foreach ($this->translateColumns as $column) {
//        $queryData['fields'][] = $this->alias.".".$column."_".$this->_locale." AS ".$column;
//      }
//    }
//    return $queryData;
//  }
}