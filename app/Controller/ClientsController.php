<?php
class ClientsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	public function index(){
		$this->set('clients',$this->Client->find('all'));
	}

	public function newclient(){
		if($this->request->is('post')){
			$this->Client->create();
			if($this->Client->save($this->request->data)){
				$this->Session->setFlash(__('New client information successfuly added.'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Cannot add new client information'));
		}
	}

	public function deleteclient($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Client->delete($id)){
			$this->Session->setFlash('Client Deleted.');
		}else{
			$this->Session->setFlash('Cannot delete client.');
		}

		return $this->redirect(array('action'=>'index'));
	}

	public function editclient($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid client'));
		}

		$client = $this->Client->findById($id);
		if(!$client){
			throw new NotFoundException(__('Invalid client'));
		}


		if($this->request->is(array('put', 'post'))){
			$this->Client->id = $id;
			if($this->Client->save($this->request->data)){
				$this->Session->setFlash(__('Client Information Succcessfully Updated.'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to Update Client Information.'))
		}

		if(!$this->request->data){
			$this->request->data = $client;
		}
	}
}