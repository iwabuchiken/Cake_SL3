<h1><?php echo h($store['Store']['name']); ?></h1>

<table class="table_show">
  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $store['Store']['id']; ?></td>
  </tr>
  <tr>
    <td class="td_label_narrow">name</td>
    <td class="td_value_mideum"><?php echo $store['Store']['name']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Local ID</td>
    <td class="td_value_mideum"><?php echo $store['Store']['local_id']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $store['Store']['created_at']; ?></td>
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete Store',
					array(
							'controller' => 'stores', 
							'action' => 'delete', 
							$store['Store']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $store['Store']['name'])
	
				);
	?>

</p>
