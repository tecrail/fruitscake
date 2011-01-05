<?php

class Menu extends AppModel {

    public $name = 'Menu';
    public $actsAs = array(
        'Tree' => array('parent' => 'menu_id'),
        'Utils.Sluggable' => array('label' => 'name')
    );
    public $belongsTo = array(
        'ParentMenu' => array('className' => 'Menu',
            'foreignKey' => 'menu_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'ChildMenu' => array(
            'className' => 'Menu',
            'foreignKey' => 'menu_id',
            'dependent' => false
        )
    );
    public $validate = array();

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'name' => array(
                'required' => array('rule' => array('notEmpty'), 'required' => true, 'allowEmpty' => false, 'message' => __d('categories', 'Please enter a category name', true))));
    }

    public function add($data = null) {
        if (!empty($data)) {
            $this->create();
            $result = $this->save($data);
            if ($result !== false) {
                $this->data = array_merge($data, $result);
                return true;
            } else {
                throw new OutOfBoundsException(__d('categories', 'Could not save the category, please check your inputs.', true));
            }
            return $return;
        }
    }

    public function edit($id = null, $data = null) {
        $conditions = array("{$this->alias}.{$this->primaryKey}" => $id);
        $menu = $this->find('first', array(
                    'contain' => array('ParentMenu'),
                    'conditions' => $conditions)
        );

        if (empty($menu)) {
            throw new OutOfBoundsException(__('Invalid Menu', true));
        }
        $this->set($menu);

        if (!empty($data)) {
            $this->set($data);
            $result = $this->save(null, true);
            if ($result) {
                $this->data = $result;
                return true;
            } else {
                return $data;
            }
        } else {
            return $menu;
        }
    }

    /**
     * Returns the record of a Category.
     *
     * @param string $slug, category slug.
     * @return array
     * @throws OutOfBoundsException If the element does not exists
     */
    public function view($slug = null) {
        $menu = $this->find('first', array(
                    'contain' => array('ParentMenu'),
                    'conditions' => array(
                        'or' => array(
                            'Menu.id' => $slug,
                            'Menu.slug' => $slug))));

        if (empty($menu)) {
            throw new OutOfBoundsException(__('Invalid Menu', true));
        }

        return $menu;
    }

    /**
     * Validates the deletion
     *
     * @param string $id, category id 
     * @param string $userId, user id
     * @param array $data, controller post data usually $this->data
     * @return boolean True on success
     * @throws OutOfBoundsException If the element does not exists
     */
    public function delete($id = null, $data = array()) {
        $menu = $this->find('first', array(
                    'conditions' => array(
                        "{$this->alias}.{$this->primaryKey}" => $id
                        )));

        if (empty($menu)) {
            throw new OutOfBoundsException(__('Invalid Menu', true));
        }

        $this->data['menu'] = $menu;
        if (!empty($data)) {
            $data['Menu']['id'] = $id;
            $tmp = $this->validate;
            $this->validate = array(
                'id' => array('rule' => 'notEmpty'),
                'confirm' => array('rule' => '[1]')
            );

            $this->set($data);
            if ($this->validates()) {
                if ($this->delete($data['Menu']['id'])) {
                    return true;
                }
            }
            $this->validate = $tmp;
            throw new Exception(__('You need to confirm to delete this Menu', true));
        }
    }

}
