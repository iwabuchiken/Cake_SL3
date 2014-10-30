<!-- /* -->
<!--  * SIs -->
<!-- * sis -->
<!-- * SI -->
<!-- * si -->
<!-- */ -->

<h1>

	SIs (<a href="#bottom">Bottom</a><a name="top"></a>)
	
	(total = <?php echo $num_of_sis; ?>, pages = <?php echo $num_of_pages; ?>)
	
</h1>

<?php echo $this->element('sis/_index_pagination')?>

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

<br>
<br>

<?php 

	echo $this->Html->link(
				    'Delete all',
				    array('controller' => 'sis', 'action' => 'delete_all'),
					null,
					__("Delete all SIs?")
	); 

?>

<br>
<br>

(<a href="#top">Top</a><a name="bottom"></a>)

<?php 

// 	echo $this->Html->link(
// 				    'Add SI',
// 				    array('controller' => 'sis', 'action' => 'add')
// 	); 

?>
