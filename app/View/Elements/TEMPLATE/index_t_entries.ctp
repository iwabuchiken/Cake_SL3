<!-- 
genres
genre
Genres
Genre

-->

<?php foreach ($genres as $genre): ?>
<tr>
		<td><?php echo $genre['Genre']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($genre['Genre']['name'],
							array(
								'controller' => 'genres', 
								'action' => 'view', 
								$genre['Genre']['id'])
							); ?>
		</td>
		
		<td><?php echo $genre['Genre']['code']; ?></td>
		
		<td><?php echo $genre['Genre']['created_at']; ?></td>
		<td><?php echo $genre['Genre']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($genre); ?>
