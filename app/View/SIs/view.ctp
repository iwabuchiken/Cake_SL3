<!-- 
Si
si

-->

<h1><?php echo h($si['Si']['name']); ?></h1>

<table class="table_show">
  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $si['Si']['id']; ?></td>
  </tr>
  <tr>
    <td class="td_label_narrow">name</td>
    <td class="td_value_mideum"><?php echo $si['Si']['name']; ?></td>
  </tr>
  
  <tr><!-- Store -->
    <td class="td_label_narrow">Store</td>
    
    <td class="td_value_mideum">
    	<?php 

	    	$store = $this->Si->get_Store_From_Local_StoreId(
	    	
	    			$si['Si']['store_id']
	    	
	    	);
	    	
	    	if ($store != null) {
	    		// 				if ($store_name != null) {
	    	
	    		$msg = $store['Store']['name'];
	    	
	    		echo $this->Html->link($msg,
	    				array(
	    						'controller' => 'stores',
	    						'action' => 'view',
	    						$store['Store']['id'])
	    		);
	    	
	    		// 				debug($store);
	    	
	    	} else {
	    	
	    		$msg = "ID = ".$si['Si']['store_id'];
	    	
	    		echo $msg;
	    	
	    	}
    		
    	?>
    </td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $si['Si']['created_at']; ?></td>
  </tr>
  
  <tr><!-- Genre -->
    <td class="td_label_narrow">Genre</td>
    
    <td class="td_value_mideum">
    	<?php 

	    	$genre = $this->Si->get_Genre_From_Local_GenreId(
	    	
	    			$si['Si']['genre_id']
	    	
	    	);
	    	
	    	if ($genre != null) {
	    		// 				if ($genre_name != null) {
	    	
	    		$msg = $genre['Genre']['name'];
	    	
	    		echo $this->Html->link($msg,
	    				array(
	    						'controller' => 'genres',
	    						'action' => 'view',
	    						$genre['Genre']['id'])
	    		);
	    	
	    		// 				debug($store);
	    	
	    	} else {
	    	
	    		$msg = "ID = ".$si['Si']['genre_id'];
	    	
	    		echo $msg;
	    	
	    	}
    		
    	?>
    </td><!-- Genre -->
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">Price</td>
    <td class="td_value_mideum"><?php echo $si['Si']['price']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Num</td>
    <td class="td_value_mideum"><?php echo $si['Si']['num']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $si['Si']['created_at']; ?></td>
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete Si',
					array(
							'controller' => 'sis', 
							'action' => 'delete', 
							$si['Si']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $si['Si']['name'])
	
				);
	?>

</p>
