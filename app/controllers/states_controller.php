<?php
class StatesController extends AppController {

	var $name = 'States';
	
	function beforeFilter(){
		$this->Auth->authorize = 'controller';

		//übernimmt die Funktionen vom beforeFilter von app_controller.php
		parent::beforeFilter();
	}
	
	//Definiert die Methoden für die Benutzer
	function isAuthorized() {
		if ($this->action == 'index' || $this->action == 'add' || $this->action == 'edit' || $this->action == 'view'){
			if ($this->Auth->user('group_id') == '2'){
				return true;
			} else {
				return false;
			}
		}
	}

	function index() {
		$this->State->recursive = 0;
		$this->set('states', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid state', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('state', $this->State->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->State->create();
			if ($this->State->save($this->data)) {
				$this->Session->setFlash(__('The state has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid state', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->State->save($this->data)) {
				$this->Session->setFlash(__('The state has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->State->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for state', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->State->delete($id)) {
			$this->Session->setFlash(__('State deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('State was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>