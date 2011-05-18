<?php
class MytasksController extends AppController {

	var $name = 'Mytasks';
	
	function beforeFilter(){
		$this->Auth->authorize = 'controller';

		//übernimmt die Funktionen vom beforeFilter von app_controller.php
		parent::beforeFilter();
	}
	
	//Definiert die Methoden für die Benutzer
	function isAuthorized() {
		if ($this->action == 'index' || $this->action == 'add' || $this->action == 'edit' || $this->action == 'view' || $this->action == 'indexopen' || $this->action == 'indexmy' || $this->action == 'indexclosed'){
			if ($this->Auth->user('group_id') == '1' || $this->Auth->user('group_id') == '2' || $this->Auth->user('group_id') == '3'){
				return true;
			} else {
				return false;
			}
		}
		
		if ($this->action == 'delete'){
			if ($this->Auth->user('group_id') == '2' || $this->Auth->user('group_id') == '3'){
				return true;
			} else {
				return false;
			}
		}
	}
	
	//Funktionen
	function indexopen() {
		$this->set('mytasks', $this->Mytask->findAllByStateId('1'), $this->paginate());
		//$this->render('index');		
	}
	
	function indexmy() {
		$this->set('mytasks', $this->Mytask->findAllByUserId("$users_id"), $this->paginate());
		//$this->render('index');
	}		
	
	function indexclosed() {
		$this->set('mytasks', $this->Mytask->findAllByStateId('2'), $this->paginate());
	}
	
	//CRUD Funktionen
	function index() {
		$this->Mytask->recursive = 0;
		$this->set('mytasks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mytask', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mytask', $this->Mytask->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Mytask->create();
			if ($this->Mytask->save($this->data)) {
				$this->Session->setFlash(__('The mytask has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mytask could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Mytask->User->find('list');
		$prios = $this->Mytask->Prio->find('list');
		$states = $this->Mytask->State->find('list');
		$this->set(compact('users', 'prios', 'states'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mytask', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Mytask->save($this->data)) {
				$this->Session->setFlash(__('The mytask has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mytask could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Mytask->read(null, $id);
		}
		$users = $this->Mytask->User->find('list');
		$prios = $this->Mytask->Prio->find('list');
		$states = $this->Mytask->State->find('list');
		$this->set(compact('users', 'prios', 'states'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mytask', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Mytask->delete($id)) {
			$this->Session->setFlash(__('Mytask deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mytask was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>