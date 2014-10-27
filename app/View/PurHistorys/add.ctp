<!-- 

PurHistory

-->

<h1>Add PurHistory</h1>
<?php
	
	$opt_input_store_id = array(
				
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: wheat',
			
			
	);

	$opt_input_items = array(
				
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: lightsteelblue'
			
	);

	if (env('SERVER_NAME') !== 'localhost') {	//REF api http://php.net/manual/ja/reserved.variables.server.php
	
		//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
		$opt_form = array(
					
				'url'	=> "http://benfranklin.chips.jp/cake_apps"
				// 			'url'	=> "http://localhost"
				."/Cake_SL3"
				."/purhistorys"
				."/add_from_remote",
					
				// 				'url'	=> 'http://localhost/Cake_SL3/purhistorys/add_from_remote',
				'type'	=> 'post'
		);
			
	} else {
	
		//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
		$opt_form = array(
					
		// 				'url'	=> "http://benfranklin.chips.jp/cake_apps"
				'url'	=> "http://localhost"
				."/Cake_SL3"
				."/purhistorys"
				."/add_from_remote",
					
				// 				'url'	=> 'http://localhost/Cake_SL3/purhistorys/add_from_remote',
				'type'	=> 'post'
		);
			
	
	}
	
// 	//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
// 	$opt_form = array(
			
// 				'url'	=> "http://benfranklin.chips.jp/cake_apps".
// 							"/Cake_SL3/purhistorys/".
// 							"add_from_remote",
			
// // 				'url'	=> 'http://localhost/Cake_SL3/purhistorys/add_from_remote',
// 				'type'	=> 'post'
// 	);
	
	echo $this->Form->create('PurHistory', $opt_form);
// 	echo $this->Form->create('PurHistory');
	echo $this->Form->input('store_id', $opt_input_store_id);
	echo $this->Form->input('items', $opt_input_items);
	echo $this->Form->end('Save PurHistory');
	
?>