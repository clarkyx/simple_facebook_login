<?php
/**
* ClientController is responsible for viewing and modifying client information
* 
* ClientController has multiple functionalities which includes:
* -Add, delete and modify client information.
* -Two separate views for manager and employee.
*/
class ClientsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	/**
	* Index handler for manager "index" view.
	*
	* The index() function is responsible for extracting all
	* client information prepare to display them in view page.
	*/
	public function index(){
		$this->set('clients',$this->Client->find('all'));
	}

	/**
	* Index handler for employee "index" view.
	*
	* The indexe() function is responsible for extracting all
	* client information prepare to display them in view page.
	*/
	public function indexe(){
		$this->set('clients',$this->Client->find('all'));
	}

	/**
	* Add client. 
	*
	* The newclient() function is responsible for adding a client
	* into client table. The function is only accessible by manager.
	*
	* @return redirect to index page after successfully add a new client
	*/
	public function newclient(){
		if($this->request->is('post')){
			$this->Client->create();
			if($this->Client->save($this->request->data)){
				$this->Session->setFlash(__('New client information successfully added.'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Cannot add new client information'));
		}
	}
	/**
	* Delete client. 
	*
	* The deleteclient() function is responsible for deleting a client
	* from client table. The function is only accessible by manager.
	*
	* @return redirect to index page after function completed 
	*/
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
	/**
	* Edit client. 
	*
	* The editclient() function is responsible for editing and 
	* updating client information. The function is only accessible by manager.
	*
	* @return redirect to index page after function completed 
	*/
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
			$this->Session->setFlash(__('Unable to Update Client Information.'));
		}

		if(!$this->request->data){
			$this->request->data = $client;
		}
	}
}