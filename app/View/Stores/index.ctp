<!-- 
Stores
stores
Store
store
-->

<h1>Stores (<a href="#bottom">Bottom</a><a name="top"></a>)</h1>
<table>

	<?php echo $this->element('stores/index_t_headers'); ?>

		<!-- Here is where we loop through our $stores array, printing out post info -->

	<?php echo $this->element('stores/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add store",
							array(
								'controller' => 'stores', 
								'action' => 'add')
							); 
?>


(<a href="#top">Top</a><a name="bottom"></a>)

<?php 

// 	echo $this->Html->link(
// 				    'Add Store',
// 				    array('controller' => 'stores', 'action' => 'add')
// 	); 

?>
