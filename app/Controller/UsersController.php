<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register', 'logout');
	}

	public function index(){
		$this->set('users', $this->paginate());
	}

	public function register(){
		if($this->request->is('post')){
			$this->User->create();
			$data['username'] = $this->request->data['User']['username'];
			$data['password'] = $this->request->data['User']['password'];
			if($this->request->data['User']['manager']){
				if($this->request->data['User']['reference']){
					$reference = $this->request->data['User']['reference'];
					if ($reference == '111'){
						$data['role'] = 'manager';

						if ($this->User->save($data)){
							$this->Session->setFlash(__('Welcome Manager'));
							return $this->redirect(array('action'=>'index'));
						}
					}else{
						$this->Session->setFlash(__('Wrong Reference Code'));
						return $this->redirect(array('action'=>'register'));
					}
				}
			}

			$data['role'] = 'employee';
			
			if ($this->User->save($data)){
				$this->Session->setFlash(__('Your account successfully registered'));
				return $this->redirect(array('action'=>'index'));
			}

			$this->Session->setFlash(
				__('Account creation failed, please try again'));
		}
	}

	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){
				$role = $this->Auth->user('role');
				if($role=='manager'){
					$this->Auth->loginRedirect = array('controller'=>'clients', 'action'=>'index');
				}
				if($role=='employee'){
					$this->Auth->loginRedirect = array('controller'=>'clients', 'action'=>'indexe');
				}
				return $this->redirect($this->Auth->loginRedirect);
			}
			$this->Session->setFlash(__('Wrong username and password combination, please try again'));
		}
	}

	public function logout(){
		return $this->redirect($this->Auth->logoutRedirect);
	}

}