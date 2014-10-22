<!-- 
purhistorys
purhistory
PurHistorys
PurHistory

-->

<?php foreach ($purhistorys as $purhistory): ?>
<tr>
		<td><?php echo $purhistory['PurHistory']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($purhistory['PurHistory']['store_id'],
							array(
								'controller' => 'purhistorys', 
								'action' => 'view', 
								$purhistory['PurHistory']['id'])
							); ?>
		</td>
		
		<td><?php echo $purhistory['PurHistory']['items']; ?></td>
		
		<td><?php echo $purhistory['PurHistory']['created_at']; ?></td>
		<td><?php echo $purhistory['PurHistory']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($purhistory); ?>
