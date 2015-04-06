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

	public function deleteclient(){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		try {
			$curclient = $this->clients->findById($id);
		} catch (Exception $e){
			$this->Session->setFlash(__('client is already been removed'));
		}

		if($this->Post->delete($id)){
			$this->Session->setFlash(__('Deleted client %s.', h($curclient->$companyname)));
		}else{
			$this->Session->setFlash(__('Cannot delete client %s',h($curclient->$companyname)));
		}

		return $this->redirect(array('action'=>'index'));
	}
}