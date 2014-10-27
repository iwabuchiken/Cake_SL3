<!-- 

PurHistorys
purhistorys
PurHistory
purhistory

-->

<h1><?php echo h($purhistory['PurHistory']['items']); ?></h1>

<table class="table_show">
  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $purhistory['PurHistory']['id']; ?></td>
  </tr>
  <tr>
    <td class="td_label_narrow">Store</td>
    
    <td class="td_value_mideum">
    
    	<?php 
    	
    		$store = $this->PurHistory->get_Store_From_Local_StoreId(
    				
	    			$purhistory['PurHistory']['store_id']
	    	
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
			
				$msg = "ID = ".$purhistory['PurHistory']['store_id'];
					
				echo $msg;
				
			}

// 			echo $this->Html->link($msg,
// 					array(
// 							'controller' => 'stores',
// 							'action' => 'view',
// 							$purhistory['Store']['id'])
// 			);

// 			echo $msg;
			
//     		echo $purhistory['PurHistory']['store_id']; 
    		
    	?>
    	
    </td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">Items</td>
    
    <td class="td_value_mideum">
    
    		<?php 
    		
    			echo $purhistory['PurHistory']['items']; 
    			
    		?>
    		
    </td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $purhistory['PurHistory']['created_at']; ?></td>
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete PurHistory',
					array(
							'controller' => 'purhistorys', 
							'action' => 'delete', 
							$purhistory['PurHistory']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $purhistory['PurHistory']['items'])
	
				);
	?>

</p>
