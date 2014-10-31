<?php 

	if ($si_list != null) {

?>

<table id="inTable_Si_List">
	<tr>
		<td>
<?php 
		if(count($si_list) == 1) {
			
			echo "1";
			
			echo ". ";
			
			echo $si_list[0]['Si']['name'];
				
			echo " (id = ".$si_list[0]['Si']['local_id'].")";
			
		} else {
			
			$i = 0;
			
			for (; $i < count($si_list) - 1; $i++) {
// 			for (; $i < count($si_list); $i++) {
	
				echo $i + 1;
				
				echo ". ";
				
				echo $si_list[$i]['Si']['name'];
			
				echo " (id = ".$si_list[$i]['Si']['local_id'].")";
				
				echo "<br>";
				
			}
			
			echo $i + 1;
			
			echo ". ";
			
			echo $si_list[$i]['Si']['name'];
				
			echo "(id = ".$si_list[$i]['Si']['local_id'].")";
			
		}//if(count($si_list) == 1)
		
	} else {

		echo "null";
		
	}

?>

		</td>
	</tr>
</table>