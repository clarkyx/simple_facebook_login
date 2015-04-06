<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register');
	}

	public function index(){
		$this->set('users', $this->paginate());
	}

	public function register(){
		if($this->request->is('post')){
			$this->User->create();
			if ($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Your account successfully registered'));
				return $this->redirect(array('action'=>'index'));
			}

			$this-.Session->setFlash(
				__('Account creation failed, please try again'));
		}
	}

}