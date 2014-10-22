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
		
		<td><?php echo $si['Si']['created_at']; ?></td>
		<td><?php echo $si['Si']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($si); ?>
