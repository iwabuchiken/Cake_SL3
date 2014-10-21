<!-- /* -->
<!--  * SIs -->
<!-- * sis -->
<!-- * SI -->
<!-- * si -->
<!-- */ -->

<h1>SIs (<a href="#bottom">Bottom</a><a name="top"></a>)</h1>
<table>

	<?php echo $this->element('sis/index_t_headers'); ?>

		<!-- Here is where we loop through our $sis array, printing out post info -->

	<?php echo $this->element('sis/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add si",
							array(
								'controller' => 'sis', 
								'action' => 'add')
							); 
?>


(<a href="#top">Top</a><a name="bottom"></a>)

<?php 

// 	echo $this->Html->link(
// 				    'Add SI',
// 				    array('controller' => 'sis', 'action' => 'add')
// 	); 

?>
