<?php
// app/Model/User.php
App::uses('AppModel','Model');
pp::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message'=>'Requires a username'
				)
			),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message'=>'Requires a password'
				)
			),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'user')),
				'message'=>'Please enter a valid role',
				'allowEmpty' => false
			)
		)
	);

	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
}