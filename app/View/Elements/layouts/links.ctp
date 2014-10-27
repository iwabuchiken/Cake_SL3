<br>
<br>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo $this->Html->link(
								'Si',
								array('controller' => 'sis', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Pur history',
								array('controller' => 'purhistorys', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
	
		<td>
		
			<?php echo $this->Html->link(
								'Stores',
								array('controller' => 'stores', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
	
	</tr>

</table>
