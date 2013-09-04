<?php

class User extends AppModel {
	public $validate = array(
		'username' => array('usernameEmpty' => array('rule' => 'notEmpty', 'message' => 'Username is required'), 'usernameUnique' => array('rule' => 'isUnique', 'message' => 'username should be unique')),
		'email'	=> array('emailEmpty' => array('rule' => 'notEmpty', 'message' => 'email is required'), 'emailUnique' => array('rule' => 'isUnique', 'message' => 'email should be unique')),
		'password' => array('rule' => 'notEmpty', 'message' => 'password is required'),
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
	}
}