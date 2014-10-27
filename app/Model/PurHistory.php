<?php

class PurHistory extends AppModel {
// class PurHistorty extends AppModel {

	var $name = 'PurHistory';
// 	var $name = 'PurHistorty';

// 	var $hasMany = array(
				
// 			'Category' => array(
						
// 					'className' => 'Category'
// 			)
				
// 	);
	
	public $belongsTo = array(
			'Store' => array(
					'className'    => 'Store',
			)
	);
	
	
}