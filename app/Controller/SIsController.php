<?php
/*
 * Sis	
 * sis
 * Si
 * si
 */
// class SIsController extends AppController {
class SisController extends AppController {
// class SisController extends AppController {
	public $helpers = array('Html', 'Form');

	public $components = array('Paginator');
	
	public function index() {
		
		/**********************************
		 * paginate
		**********************************/
		$page_limit = 10;
		
		$opt_order = array(
		// 						'Token.id' => 'asc',
				'Si.id' => 'asc',
		
		);
		
		$opt_conditions = '';
		
		$this->paginate = array(
				// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
				// 				'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
				'limit' => $page_limit,
				'order' => $opt_order,
				'conditions'	=> $opt_conditions
				// 				'order' => array(
				// 						'id' => 'asc'
				// 				)
		);
		
		$this->set('sis', $this->paginate('Si'));
		
		$num_of_sis = count($this->Si->find('all'));
		$this->set('num_of_sis', $num_of_sis);
		
		$this->set('num_of_pages', (int) ceil($num_of_sis / $page_limit));
		
// 		$this->set('sis', $this->Si->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid si'));
		}
	
		$si = $this->Si->findById($id);
		if (!$si) {
			throw new NotFoundException(__('Invalid si'));
		}
		$this->set('si', $si);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Si->create();
			
			$this->request->data['Si']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Si']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Si->save($this->request->data)) {
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
	
		$si = $this->Si->findById($id);
	
		if (!$si) {
			throw new NotFoundException(__("Can't find the si. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Si->delete($id)) {
			// 		if ($this->Si->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"Si deleted => %s",
					$si['Si']['name']));
	
			return $this->redirect(
					array(
							'controller' => 'sis',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Si can't be deleted => %s",
							$si['Si']['name']));
	
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
		if ($this->Si->deleteAll(array('Si.id >=' => 1))) {
			// 		if ($this->Category->deleteAll(array('id >=' => 1))) {
	
			$this->Session->setFlash(__('Sis all deleted'));
			return $this->redirect(array('action' => 'index'));
	
		} else {
	
			$this->Session->setFlash(__('Sis not deleted'));
			return $this->redirect(array('action' => 'index'));
	
		}
	
	}//delete_all

	public function
	add_from_remote() {
		if ($this->request->is('post')) {
	
			$this->Si->create();
	
			$this->request->data['Si']['created_at'] =
			Utils::get_CurrentTime();
			// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			$this->request->data['Si']['updated_at'] =
			Utils::get_CurrentTime();
			// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			if ($this->Si->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your si has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			}
	
			$this->Session->setFlash(__('Unable to add your si.'));
	
		}
	
		// 		} else if ($this->request->is('get')) {
	
		// 			$this->Session->setFlash(__('Sorry. GET method is not available'));
			
		// 		}//if ($this->request->is('post'))
	
	}//add_from_remote
	
}//class SisController extends AppController