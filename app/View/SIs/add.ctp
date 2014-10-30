<h1>Add Si</h1>
<?php

	if (env('SERVER_NAME') !== 'localhost') {	//REF api http://php.net/manual/ja/reserved.variables.server.php
	
		//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
		$opt_form = array(
					
				'url'	=> "http://benfranklin.chips.jp/cake_apps"
				// 			'url'	=> "http://localhost"
				."/Cake_SL3"
				."/sis"
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
				."/sis"
				."/add_from_remote",
					
				// 				'url'	=> 'http://localhost/Cake_SL3/purhistorys/add_from_remote',
				'type'	=> 'post'
		);
	
	}


	$opt_input = array(
				
			'onmouseover' => 'this.select()',
			'rows' => '3'
			
	);

	$opt_input_name = array(
	
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: wheat',
				
				
	);
	
	$opt_input_store_id = array(
	
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: lightsteelblue'
		
	);
	
	$opt_input_genre_id = array(
	
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: mediumaquamarine'
		
	);
	
	$opt_input_price = array(
	
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: gainsboro'
		
	);
	
	$opt_input_num = array(
	
			'onmouseover'	=> 'this.select()',
			'rows' => '1',
			'style'			=> 'width: 25%; background: gold'
		
	);
	
// 	echo $this->Form->create('Si', $opt_form);
	echo $this->Form->create('Si');
	
	echo $this->Form->input('name', $opt_input_name);
	echo $this->Form->input('store_id', $opt_input_store_id);
	echo $this->Form->input('genre_id', $opt_input_genre_id);
	echo $this->Form->input('price', $opt_input_price);
	echo $this->Form->input('num', $opt_input_num);
	
	echo $this->Form->input('local_id', $opt_input_num);
	
	echo $this->Form->end('Save Si');
	
?>