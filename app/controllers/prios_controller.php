<?php
class PriosController extends AppController {

	var $name = 'Prios';

	function index() {
		$this->Prio->recursive = 0;
		$this->set('prios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid prio', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('prio', $this->Prio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Prio->create();
			if ($this->Prio->save($this->data)) {
				$this->Session->setFlash(__('The prio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prio could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid prio', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Prio->save($this->data)) {
				$this->Session->setFlash(__('The prio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Prio->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for prio', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Prio->delete($id)) {
			$this->Session->setFlash(__('Prio deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Prio was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>