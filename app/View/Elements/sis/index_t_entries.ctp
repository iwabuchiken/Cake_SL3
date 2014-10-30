<!-- 
sis
si
Sis
Si

-->

<?php foreach ($sis as $si): ?>
<tr>
		<td><?php echo $si['Si']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($si['Si']['name'],
							array(
								'controller' => 'sis', 
								'action' => 'view', 
								$si['Si']['id'])
							); ?>
		</td>
		
		<td><!-- Store -->
		
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
		
		<td><!-- Genre -->
		
			<?php 
			
				$genre = $this->Si->get_Genre_From_Local_GenreId(
				
						$si['Si']['genre_id']
				
				);
				
				if ($genre != null) {
					// 				if ($store_name != null) {
						
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
			
		</td>
		
		<td><?php echo $si['Si']['price']; ?></td>
		
		<td><?php echo $si['Si']['num']; ?></td>
		
		<td><?php echo $si['Si']['local_id']; ?></td>
		
		<td><?php echo $si['Si']['created_at']; ?></td>
		<td><?php echo $si['Si']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($si); ?>
