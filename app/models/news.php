<?php

class News extends AppModel {

    public $name = 'News';
    public $validate = array(
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
        'published' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date_from' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date_to' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//		'language_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
        'Language' => array(
            'className' => 'Language',
            'foreignKey' => 'language_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
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
                'dir' => "{IMAGES}news",
                'uniqidAsFilenames' => true,
                'thumbsizes' => array(
                    'thumb' => array('width' => 200, 'height' => 'auto', 'name' => 'thumb.{$file}.{$ext}', 'autoResize' => true),
                    'normal' => array('width' => 400, 'height' => 'auto', 'name' => 'normal.{$file}.{$ext}', 'autoResize' => true)
                )
            )
        )
    );
    public $displayField = 'title';
    public $order = array('News.modified' => 'DESC');
    public $publishedConditions = "News.published = 1 AND News.date_from <= {Date('Y-m-d')} AND News.date_to >= {Date('Y-m-d')}";
    
    public static function publishedConditions() {
        return "News.published = 1 AND News.date_from <= '" . Date('Y-m-d') . "' AND News.date_to >= '" . Date('Y-m-d') . "'";
    }
    
    public function published($options = array()) {
        $publishedConditions = News::publishedConditions();
        
        if (isset($options['conditions']) && is_array($options['conditions'])) {
            $options['conditions'] = array_push($options['conditions'], $publishedConditions);
        } elseif (isset($options['conditions']) && !is_array($options['conditions'])) {
            $options['conditions'] = "{$options['conditions']} AND {$publishedConditions}";
        } else {
            $options['conditions'] = $publishedConditions;
        }
        
        return $this->find('all', $options);
    }


}
