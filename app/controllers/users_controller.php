<?php
class UsersController extends AppController {

	var $name = 'Users';

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			if($this->Auth->password($this->data['User']['password_check'])==$this->data['User']['password']){
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('Su usuario ha sido registrado', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('No se ha podio registrar. Por favor intente nuevamente.', true));
				}
			}
			else{
				$this->Session->setFlash('Los passwords no coinciden');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	
	
	/**
	 * 
	 *   Cosas de Authentication
	 * 
	 */
	function login(){
		
	}
	
	
	function logout(){
		$this->Auth->logout();
		$this->Session->setFlash('Ha salido de su cuenta');
		$this->redirect('/pages/home');
	}

}
?>