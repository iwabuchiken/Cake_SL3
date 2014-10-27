<?php

class Store extends AppModel {

	var $name = 'Store';

	var $hasMany = array(
				
			'Si' => array(
						
					'className' => 'Si'
			)
				
	);
	
}