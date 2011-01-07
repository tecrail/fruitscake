<?php

class Photo extends AppModel {

    public $name = 'Photo';
    public $order = array('Photo.modified' => 'DESC');
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
        'image' => array(
            'valid_upload' => array(
                'rule' => array('validateUploadedFile'),
                'message' => 'File non valido',
                'allowEmpty' => true
            ),
            'validFile' => array(
                'rule' => array('validateFileExtension', array('gif', 'jpg', 'jpeg', 'png')),
                'message' => 'File non valido, inserire solo file jpg/jpeg, gif o png',
                'allowEmpty' => true
            )
        ),
        'photo_gallery_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
        'PhotoGallery' => array(
            'className' => 'PhotoGallery',
            'foreignKey' => 'photo_gallery_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $actsAs = array(
        'CakeAttachment.Upload' => array(
            'image' => array(
                'field' => 'image',
                'dir' => "{IMAGES}photos",
                'uniqidAsFilenames' => true,
                'thumbsizes' => array(
                    'thumb' => array('width' => 200, 'height' => 'auto', 'name' => 'thumb.{$file}.{$ext}', 'autoResize' => true),
                    'normal' => array('width' => 400, 'height' => 'auto', 'name' => 'normal.{$file}.{$ext}', 'autoResize' => true)
                )
            )
        )
    );

}

