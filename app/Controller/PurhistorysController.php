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

		$this->_index_BuildData_from_SQLite_File();
		
		
		$purhistorys = $this->PurHistory->find('all');
		
		$this->set('purhistorys', $purhistorys);
// // 		$this->set('purhistorys', $this->PurHistory->find('all'));

// 		/**********************************
// 		* test
// 		**********************************/
// 		$hist = $purhistorys[0];
		
// 		$items_str = $hist['PurHistory']['items'];
		
// 		$items_ary = explode(" ", $items_str);
		
// 		$items_1 = $items_ary[0];
		
// 		debug($items_1);
		
// 		$items_1_ary = explode(",", $items_1);
		
// 		debug($items_1_ary);
		
// 		$items_1_id = $items_1_ary[0];
		
// 		debug($items_1_id);
		
// 		$si = $this->get_Si_from_LocalId($items_1_id);
		
// 		debug($si);
		
// 		debug($items_str);
		
// 		debug(explode(" ", $items_str));
		
// 		debug($purhistorys[0]);
		
	}
	
	public function 
	_index_BuildData_from_SQLite_File() {
		
		/*******************************
			open PDO
		*******************************/
		$pdo = Utils::pdo_Get_PDO();
// 		$pdo = $this->_index_Get_PDO();

		/*******************************
			validate: null
		*******************************/
		if ($pdo === null) {
			
			debug("file_db => null");
			
			return ;
			
		}//$pdo === null

		/*******************************
			setup
		*******************************/
		// Set errormode to exceptions
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		/*******************************
			table: purhistorys
		*******************************/
		$tname = "pur_history";
		
// 		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
		
// 			$tname = "pur_history";
// 			// 			$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data\\sl3_backup_20151011_231723.bk";
		
// 		} else {
		
// 			$tname = "pur_histories";
		
// 		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
		
		//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
		$pur_histories = $pdo->query("SELECT Count(*) FROM $tname");
// 		$pur_histories = $file_db->query('SELECT Count(*) FROM ta2');
		
		//ref http://stackoverflow.com/questions/883365/row-count-with-pdo answered May 19 '09 at 15:16
		$cnt_PurHistories = $pur_histories->fetchColumn();	//=> w
			
		debug("cnt_Tweets => ".$cnt_PurHistories);
		
		
		/*******************************
			pdo: close
		*******************************/
		$pdo = null;
		
	}//_index_BuildData_from_SQLite_File()
	
	public function 
	_index_Get_PDO() {

		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
		
			$fdir = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_SL3\\app\\Lib\\data";
			// 			$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data\\sl3_backup_20151011_231723.bk";
		
		} else {
		
			$fdir = "/home/users/2/chips.jp-benfranklin/web/android_app_data/SL3/db";
		
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
		
		$fname = Utils::get_Latest_File__By_FileName($fdir);
		
		$fpath = "$fdir\\$fname";
		
			// 		debug($fname);
		
		
			// 		$fpath = "http://benfranklin.chips.jp/android_app_data/SL3/db/sl3_backup_20151011_231723.bk";
			// 		$fname = "http://benfranklin.chips.jp/FM/Research_2/Research_2.mm";
		
		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
				
			debug("pdo => opened: $fpath");
			
			return $file_db;
				
		}
		
	}//_index_Get_PDO()
	
	public function 
	view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid purhistory'));
		}
	
		$purhistory = $this->PurHistory->findById($id);
		if (!$purhistory) {
			throw new NotFoundException(__('Invalid purhistory'));
		}
		$this->set('purhistory', $purhistory);
		
// 		debug($purhistory);
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

	public function
	add_from_remote() {
		if ($this->request->is('post')) {
	
			$this->PurHistory->create();
	
			$time = Utils::get_CurrentTime();
			
			$this->request->data['PurHistory']['created_at'] = $time;
// 										Utils::get_CurrentTime();
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			$this->request->data['PurHistory']['updated_at'] = $time;
// 										Utils::get_CurrentTime();
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			if ($this->PurHistory->save($this->request->data)) {

				Utils::write_Log(
					Utils::get_dPath_Log(),
					"PurHistory => saved: ".$time,
					__FILE__, __LINE__
				);
				
				$this->Session->setFlash(__('Your purhistory has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			} else {

				Utils::write_Log(
						Utils::get_dPath_Log(),
						"PurHistory => NOT saved: ".$time,
						__FILE__, __LINE__
				);
				
			}
	
			$this->Session->setFlash(__('Unable to add your purhistory.'));
	
		}
	
		// 		} else if ($this->request->is('get')) {
	
		// 			$this->Session->setFlash(__('Sorry. GET method is not available'));
			
		// 		}//if ($this->request->is('post'))
	
	}//add

	public function
	get_Si_from_LocalId
	($local_id) {

		$this->loadModel('Si');
		
		$conditions = array(
				'conditions' => 
						array('Si.local_id' => $local_id)
		);
		
		$si = $this->Si->find('first', $conditions);

		return $si;
		
	}//get_Si_from_LocalId

	public function
	get_SiList_from_Items() {

		/**********************************
		* vars
		**********************************/
		$si_list = array();
		
		$data = $this->request->query;
// 		$data = $this->request->data;
		
// 		debug($data);
		
		@$items_str = $data['items'];
		
		if ($items_str != null) {
			
// 			debug("items => ".$items_str);
			
			$si_list = $this->_conv_Items_Str_to_Si_List($items_str);
			
// 			/**********************************
// 			* report
// 			**********************************/
// 			if ($si_list == null) {
// 				debug("si_list => null");
// 			} else {
				
// 				debug("si_list => ".count($si_list));
				
// 				debug($si_list);
				
// 			}
			
		} else {
			
// 			debug("items => null");
			
			$si_list = null;
			
		}
		
		$this->set("si_list", $si_list);
		
		$this->render("index/_inTable_Si_List", "plain_1");
		
	}//get_SiList_from_Items
	
	public function
	_conv_Items_Str_to_Si_List
	($items_str) {
		/**********************************
		* vars
		**********************************/
		$si_list = array();
		
		/**********************************
		* tokenize
		**********************************/
		$items_ary = explode(" ", $items_str);
		
// 		debug($items_ary);
		
		/**********************************
		* token => null or 0
		**********************************/
		if ($items_ary == null || count($items_ary) < 1) {
			
			return null;
			
		}
		
		/**********************************
		* 
		**********************************/
		foreach ($items_ary as $item) {
			
			$item_ary = explode(",", $item);	// [12, 1]
// 			$item_ary = explode(" ", $item);	// [12, 1]
			
// 			debug($item_ary);
			
			// token => null or 0
			if ($item_ary == null || count($item_ary) < 1) {
					
				continue;
					
			}
			
			$local_id = $item_ary[0];
			
			$si = $this->get_Si_from_LocalId($local_id);
			
			// validate
			if ($si == null) {
				
				continue;
				
			} else {
				
				array_push($si_list, $si);
				
			}
			
		}//foreach ($items_ary as $item)

		return $si_list;
		
	}//_conv_Items_Str_to_Si_List
	
}//class PurHistorysController extends AppController
