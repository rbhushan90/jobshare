<?php
class UsersController extends AppController {

	var $name = 'Users';
		
	//Add (Registrierung) kann auch ohne Login erfolgen
	function beforeFilter(){
		$this->Auth->authorize = 'controller';

		//übernimmt die Funktionen vom beforeFilter von app_controller.php
		parent::beforeFilter();
		//fügt zusätzliche beforeFilter dazu
		$this->Auth->allow('add');
	}
	
	//Definiert die Methoden für die Benutzer
	function isAuthorized() {
		if ($this->action == 'logout' || $this->action == 'login'){
			return true;
		}
		
		if ($this->action == 'view' || $this->action == 'edit'){
			return true;
		}
		
		if ($this->action == 'index'){
			if ($this->Auth->user('group_id') == '2' || $this->Auth->user('group_id') == '3'){
				return true;
			} else {
				return false;
			}
		}
		
		if ($this->action == 'delete'){
			if ($this->Auth->user('group_id') == '2'){
				return true;
			} else {
				return false;
			}
		}
	}
	
	//Login und Logout Funktion
	function login(){
		
	}
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	//CRUD Funktionen
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>