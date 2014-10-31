<!-- 
purhistorys
purhistory
PurHistorys
PurHistory

-->

<?php foreach ($purhistorys as $purhistory): ?>
<tr>
		<td>
			<?php 
			
				echo $this->Html->link($purhistory['PurHistory']['id'],
							array(
								'controller' => 'purhistorys', 
								'action' => 'view', 
								$purhistory['PurHistory']['id'])
							); 
				
			?>
			
		</td>
		
		<td>
			<?php

				$store = $this->PurHistory->get_Store_From_Local_StoreId(
									
						$purhistory['PurHistory']['store_id']
						
				);
				
// 				$store_name = $purhistory['Store']['name'];

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
				
// 				if ($store != null) {
// // 				if ($store_name != null) {

// 					echo $store['Store']['name'];
					
// 				} else {

// 					echo $purhistory['PurHistory']['store_id'];;
					
// 				}
				
			
// 				echo $purhistory['Store']['name'];
// 				echo $purhistory['PurHistory']['store_id'];
			?>
		</td>
		
		<td id="td_items_<?php echo $purhistory['PurHistory']['id']?>">
			<span 
    			 
    			onclick='modify_content(
    				"<?php echo $purhistory['PurHistory']['items']?>",
    				"td_items_<?php echo $purhistory['PurHistory']['id']?>"
    				)'
    			
    			style="text-decoration:underline"
    		>
    			
    					<?php echo $purhistory['PurHistory']['items'] ?>
    					
    		</span>
    		
			<?php 
			
			
// 				echo $purhistory['PurHistory']['items']; 
				
			?>
			
		</td>
		
		<td><?php echo $purhistory['PurHistory']['amount']; ?></td>
		
		<td><?php echo $purhistory['PurHistory']['local_created_at']; ?></td>
		<td><?php echo $purhistory['PurHistory']['created_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($purhistory); ?>
