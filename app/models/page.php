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
                    'normal' => array('width' => 400, 'height' => 'auto', 'name' => 'normal.{$file}.{$ext}', 'autoResize' => true)
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




}
