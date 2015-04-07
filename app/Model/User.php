<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
* Basic user model
*
* User model includes two main parts: 
* Part one: user information validation
* 	username: required
* 	password: required
* 	role : manager|employee
* Part two: password blowfish hash
*/
Class User extends AppModel{
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule'=> array('notEmpty'),
				'message'=> 'Need a user name'
				)
			),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Need a password'
				)
			),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('manager', 'employee')),
				'message' => 'Please choose a valid role',
				'allowEmpty' => false
			)
		)
	);

	public function beforeSave($options=array()){
		if(isset($this->data[$this->alias]['password'])){
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
				);
		}
		return true;
	}
}