<?php

class Genre extends AppModel {

	var $name = 'Genre';

	var $hasMany = array(
				
			'Si' => array(
						
					'className' => 'Si'
			)
				
	);
	
}