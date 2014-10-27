<h1>Add Store</h1>
<?php
	
	$opt_input = array(
				
			'onmouseover' => 'this.select()',
			'rows' => '1',
			'style'		=> 'width: 25%'
			
	);

	if (env('SERVER_NAME') !== 'localhost') {	//REF api http://php.net/manual/ja/reserved.variables.server.php
		
		//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
		$opt_form = array(
					
				'url'	=> "http://benfranklin.chips.jp/cake_apps"
	// 			'url'	=> "http://localhost"
							."/Cake_SL3"
							."/stores"
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
							."/stores"
							."/add_from_remote",
					
				// 				'url'	=> 'http://localhost/Cake_SL3/purhistorys/add_from_remote',
				'type'	=> 'post'
		);
			
		
	}
	
	
// 	echo $this->Form->create('Store', $opt_form);
	echo $this->Form->create('Store');
	echo $this->Form->input('name', $opt_input);
// 	echo $this->Form->input('code', $opt_input);
	echo $this->Form->end('Save Store');
	
?>