<?php
/*
 * Si
 * 
 */
class Si extends AppModel {

	var $name = 'Si';

	public $belongsTo = array(
			'Store' => array(
					'className'    => 'Store',
			)
	);
	
// 	var $hasMany = array(
				
// 			'Category' => array(
						
// 					'className' => 'Category'
// 			)
				
// 	);
	
}