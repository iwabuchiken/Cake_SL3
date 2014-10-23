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

	echo $this->Form->create('PurHistory');
	echo $this->Form->input('store_id', $opt_input_store_id);
	echo $this->Form->input('items', $opt_input_items);
	echo $this->Form->end('Save PurHistory');
	
?>