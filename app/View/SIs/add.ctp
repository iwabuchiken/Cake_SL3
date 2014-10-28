<h1>Add Si</h1>
<?php
	
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
	
	echo $this->Form->create('Si');
	echo $this->Form->input('name', $opt_input_name);
	echo $this->Form->input('store_id', $opt_input_store_id);
	echo $this->Form->input('genre_id', $opt_input_genre_id);
	echo $this->Form->input('price', $opt_input_price);
	echo $this->Form->input('num', $opt_input_num);
	echo $this->Form->end('Save Si');
	
?>