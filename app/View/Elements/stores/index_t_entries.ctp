<!-- 
stores
store
Stores
Store

-->

<?php foreach ($stores as $store): ?>
<tr>
		<td><?php echo $store['Store']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($store['Store']['name'],
							array(
								'controller' => 'stores', 
								'action' => 'view', 
								$store['Store']['id'])
							); ?>
		</td>
		
		<td><?php echo $store['Store']['local_id']; ?></td>
		
		<td><?php echo $store['Store']['created_at']; ?></td>
		<td><?php echo $store['Store']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($store); ?>
