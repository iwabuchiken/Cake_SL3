<!-- 
PurHistorys
purhistorys
PurHistory
purhistory
-->


<h1>PurHistorys (<a href="#bottom">Bottom</a><a name="top"></a>)</h1>
<table>

	<?php echo $this->element('purhistorys/index_t_headers'); ?>

		<!-- Here is where we loop through our $purhistorys array, printing out post info -->

	<?php echo $this->element('purhistorys/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add purhistory",
							array(
								'controller' => 'purhistorys', 
								'action' => 'add')
							); 
?>


(<a href="#top">Top</a><a name="bottom"></a>)

<?php 

// 	echo $this->Html->link(
// 				    'Add PurHistory',
// 				    array('controller' => 'purhistorys', 'action' => 'add')
// 	); 

?>
