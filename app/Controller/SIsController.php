<?php
/*
 * SIs	
 * sis
 * SI
 * si
 */
class SIsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('sis', $this->SI->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid si'));
		}
	
		$si = $this->SI->findById($id);
		if (!$si) {
			throw new NotFoundException(__('Invalid si'));
		}
		$this->set('si', $si);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->SI->create();
			
			$this->request->data['SI']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['SI']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->SI->save($this->request->data)) {
				$this->Session->setFlash(__('Your sis has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your sis.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid si id'));
		}
	
		$si = $this->SI->findById($id);
	
		if (!$si) {
			throw new NotFoundException(__("Can't find the si. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->SI->delete($id)) {
			// 		if ($this->SI->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"SI deleted => %s",
					$si['SI']['name']));
	
			return $this->redirect(
					array(
							'controller' => 'sis',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("SI can't be deleted => %s",
							$si['SI']['name']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'sis',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid text'));
		}
	
		/****************************************
			* Langs data
		****************************************/
		$this->loadModel('Lang');
			
		$langs = $this->Lang->find('all');
			
		// 			debug($langs);
			
		$select_Langs = array();
			
		foreach ($langs as $lang) {
	
			$lang_Name = $lang['Lang']['name'];
			$lang_Id = $lang['Lang']['id'];
	
			$select_Langs[$lang_Id] = $lang_Name;
	
		}
			
		// 			debug($select_Langs);
			
		$this->set('select_Langs', $select_Langs);
	
		/****************************************
			* Text
		****************************************/
		$text = $this->Text->findById($id);
		if (!$text) {
			throw new NotFoundException(__('Invalid text'));
		}
	
		// 		debug($this->request);
	
		// 		if ($this->request->is(array('text', 'put'))) {
			
		$this->Text->id = $id;
			
		if ($this->Text->save($this->request->data)) {
	
			$this->Session->setFlash(__('Your text has been updated.'));
			return $this->redirect(
					array(
							'action' => 'view',
							$id));
	
		}//if ($this->Text->save($this->request->data))
			
		$this->Session->setFlash(__('Unable to update your text.'));
			
			// 		} else {
	
		// 			$this->Session->setFlash(__(
		// 					"Sorry. \$this->request->is(array('text', 'put')) => Not true"));
	
		// 		}//if ($this->request->is(array('text', 'put')))
	
		if (!$this->request->data) {
			$this->request->data = $text;;
		}
	
	}//public function edit($id = null)

	public function
	delete_all() {
	
		//REF http://book.cakephp.org/2.0/ja/core-libraries/helpers/html.html
		if ($this->SI->deleteAll(array('SI.id >=' => 1))) {
			// 		if ($this->Category->deleteAll(array('id >=' => 1))) {
	
			$this->Session->setFlash(__('SIs all deleted'));
			return $this->redirect(array('action' => 'index'));
	
		} else {
	
			$this->Session->setFlash(__('SIs not deleted'));
			return $this->redirect(array('action' => 'index'));
	
		}
	
	}//delete_all
	
}