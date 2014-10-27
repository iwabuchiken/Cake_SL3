<?php
/*
 * Stores
* stores
* Store
* store
*/

class StoresController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('stores', $this->Store->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid store'));
		}
	
		$store = $this->Store->findById($id);
		if (!$store) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->set('store', $store);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Store->create();
			
			$this->request->data['Store']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Store']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('Your stores has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your stores.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid store id'));
		}
	
		$store = $this->Store->findById($id);
	
		if (!$store) {
			throw new NotFoundException(__("Can't find the store. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Store->delete($id)) {
			// 		if ($this->Store->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"Store deleted => %s",
					$store['Store']['name']));
	
			return $this->redirect(
					array(
							'controller' => 'stores',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Store can't be deleted => %s",
							$store['Store']['name']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'stores',
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
		if ($this->Store->deleteAll(array('Store.id >=' => 1))) {
			// 		if ($this->Category->deleteAll(array('id >=' => 1))) {
	
			$this->Session->setFlash(__('Stores all deleted'));
			return $this->redirect(array('action' => 'index'));
	
		} else {
	
			$this->Session->setFlash(__('Stores not deleted'));
			return $this->redirect(array('action' => 'index'));
	
		}
	
	}//delete_all

	public function
	add_from_remote() {
		if ($this->request->is('post')) {
	
			$this->Store->create();
	
			$this->request->data['Store']['created_at'] =
			Utils::get_CurrentTime();
			// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			$this->request->data['Store']['updated_at'] =
			Utils::get_CurrentTime();
			// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			if ($this->Store->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your store has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			}
	
			$this->Session->setFlash(__('Unable to add your store.'));
	
		}
	
		// 		} else if ($this->request->is('get')) {
	
		// 			$this->Session->setFlash(__('Sorry. GET method is not available'));
			
		// 		}//if ($this->request->is('post'))
	
	}//add
	
}