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

    /**
     * Adds a new record
     *
     * @param array post data, should be Controller->data
     * @return array
     */
    public function add($postData = null) {
        if (!empty($postData)) {
            $this->create();
            if ($this->save($postData)) {
                return true;
            }
        }
    }

    /**
     * Edits an existing record
     *
     * @param string $id ID
     * @param array $postData controller post data usually $this->data
     * @return mixed True on successfully save else post data as array
     */
    public function edit($id = null, $postData = null) {
        $record = $this->find('first', array(
                    'contain' => array(),
                    'conditions' => array(
                        $this->alias . '.' . $this->primaryKey => $id)));

        $this->set(Inflector::camelize($this->alias), $record);
        if (empty($record)) {
            throw new OutOfBoundsException(__('Invalid ' . $this->alias, true));
        }

        if (!empty($postData)) {
            $this->set($postData);
            $result = $this->save(null, true);
            if ($result) {
                $this->data = $result;
                return true;
            } else {
                return $postData;
            }
        }
    }

}