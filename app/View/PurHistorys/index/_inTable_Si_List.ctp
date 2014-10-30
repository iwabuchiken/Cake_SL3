<!-- 

PurHistory

-->

<!-- <h1>Good</h1> -->

<?php 

	if ($si_list != null) {
		
// 		debug(count($si_list));
		
		for ($i = 0; $i < count($si_list); $i++) {
?>

<tr>

	<td>
	
		<?php 
		
			echo $i + 1;
		
		?>
		
	</td>

	<td>
	
		<?php 
		
			echo $si_list[$i]['Si']['name'];
		
		?>
		
	</td>
	
	<td>
	
		<?php 
		
			echo $si_list[$i]['Si']['local_id'];
		
		?>
	
	</td>

</tr>


<?php
		}
		
	} else {

		echo "null";
		
	}
	


?>