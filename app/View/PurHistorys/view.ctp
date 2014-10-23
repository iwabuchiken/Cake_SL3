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
    <td class="td_value_mideum"><?php echo $purhistory['PurHistory']['store_id']; ?></td>
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
