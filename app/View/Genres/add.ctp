<h1>Add Genre</h1>
	<?php
	
		$opt_input = array(
					
				'onmouseover' => 'this.select()',
				'rows' => '1',
		
				'class'	=> 'add_name'
			
		);
		
		echo $this->Form->create('Genre');
		
		echo $this->Form->input('name', $opt_input);
		
		echo $this->Form->input('code', $opt_input);
	// 	echo $this->Form->input('body', array('rows' => '3'));
		echo $this->Form->end('Save Genre');
	?>