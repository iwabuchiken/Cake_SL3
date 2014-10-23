<?php
/*
 * PurHistorys
* purhistorys
* PurHistory
* purhistory
*/

class PurHistorysController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('purhistorys', $this->PurHistory->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid purhistory'));
		}
	
		$purhistory = $this->PurHistory->findById($id);
		if (!$purhistory) {
			throw new NotFoundException(__('Invalid purhistory'));
		}
		$this->set('purhistory', $purhistory);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->PurHistory->create();
			
			$this->request->data['PurHistory']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['PurHistory']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->PurHistory->save($this->request->data)) {
				$this->Session->setFlash(__('Your purhistorys has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your purhistorys.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid purhistory id'));
		}
	
		$purhistory = $this->PurHistory->findById($id);
	
		if (!$purhistory) {
			throw new NotFoundException(__("Can't find the purhistory. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->PurHistory->delete($id)) {
			// 		if ($this->PurHistory->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"PurHistory deleted => %s",
					$purhistory['PurHistory']['items']));
	
			return $this->redirect(
					array(
							'controller' => 'purhistorys',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("PurHistory can't be deleted => %s",
							$purhistory['PurHistory']['items']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'purhistorys',
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
		if ($this->PurHistory->deleteAll(array('PurHistory.id >=' => 1))) {
			// 		if ($this->Category->deleteAll(array('id >=' => 1))) {
	
			$this->Session->setFlash(__('PurHistorys all deleted'));
			return $this->redirect(array('action' => 'index'));
	
		} else {
	
			$this->Session->setFlash(__('PurHistorys not deleted'));
			return $this->redirect(array('action' => 'index'));
	
		}
	
	}//delete_all
	
}