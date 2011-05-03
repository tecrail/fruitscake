<?php

class Page extends AppModel {

    public $name = 'Page';
    public $validate = array(
//        'slug' => array(
//            'notempty' => array(
//                'rule' => array('notempty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    public $actsAs = array(
        'Utils.Sluggable' => array(
            'method' => 'multibyteSlug',
            'separator' => '-',
            'update' => true
        ),
        'CakeAttachment.Upload' => array(
            'image' => array(
                'field' => 'image',
                'dir' => "{IMAGES}pages",
                'uniqidAsFilenames' => true,
                'thumbsizes' => array(
                    'thumb' => array('width' => 200, 'height' => 'auto', 'name' => 'thumb.{$file}.{$ext}', 'autoResize' => true),
                    'normal' => array('width' => 400, 'height' => 'auto', 'name' => 'normal.{$file}.{$ext}', 'autoResize' => true),
                    'page' => array('width' => 580, 'height' => 'auto', 'name' => 'page.{$file}.{$ext}', 'autoResize' => true)
                )
            )
        )
    );
    public $displayField = 'title';

    /**
     * Constructor
     *
     * @param string $id ID
     * @param string $table Table
     * @param string $ds Datasource
     */
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
    }

    function afterSave() {
        parent::afterSave(true);
        if ($this->data['Page']['homepage']) {
            $this->updateAll(array("{$this->alias}.homepage" => 0), array("{$this->alias}.{$this->primaryKey} != {$this->id}"));
        }
        return true;
    }

    function getHomepage() {
        if(!$page = $this->find('first', array('conditions' => "{$this->alias}.homepage = 1"))) {
            $page = $this->find('first', array('conditions' => "{$this->alias}.published = 1"));
        }
        
        return $page;
    }

}
