<!-- 
Genres
genres
Genre
genre
-->

<h1>Genres (<a href="#bottom">Bottom</a><a name="top"></a>)</h1>
<table>

	<?php echo $this->element('genres/index_t_headers'); ?>

		<!-- Here is where we loop through our $genres array, printing out post info -->

	<?php echo $this->element('genres/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add genre",
							array(
								'controller' => 'genres', 
								'action' => 'add')
							); 
?>

<br>
<br>

<?php 

	echo $this->Html->link(
				    'Delete all',
				    array('controller' => 'genres', 'action' => 'delete_all'),
					null,
					__("Delete all genres?")
	); 

?>

(<a href="#top">Top</a><a name="bottom"></a>)

<?php 

// 	echo $this->Html->link(
// 				    'Add Genre',
// 				    array('controller' => 'genres', 'action' => 'add')
// 	); 

?>
