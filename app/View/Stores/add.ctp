<h1>Add Store</h1>
<?php
	
	$opt_input = array(
				
			'onmouseover' => 'this.select()',
			'rows' => '1',
			'style'		=> 'width: 25%'
			
	);

	echo $this->Form->create('Store');
	echo $this->Form->input('name', $opt_input);
// 	echo $this->Form->input('code', $opt_input);
	echo $this->Form->end('Save Store');
	
?>