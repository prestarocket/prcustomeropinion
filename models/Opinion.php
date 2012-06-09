<?php

/**
 * ObjectModel for opinion database table. 
 * @author Alexandre Segura <mex.zktk@gmail.com>
 */
class Opinion extends ObjectModel {
	
	public $id_opinion;
	public $id_customer;
	public $opinion;
	public $active;
	
	public static $definition = array(
  		'table' 	=> 'opinion',
  		'primary' 	=> 'id_opinion',
  		'multilang' => false,
 		'fields' => array(
   			'id_opinion' => array(
   				'type' => ObjectModel :: TYPE_INT
			),
			'id_customer' => array(
   				'type' => ObjectModel :: TYPE_INT, 
   				'required' => true
			),
			'opinion' => array(
   				'type' => ObjectModel :: TYPE_STRING, 
   				'required' => true
			), 
			'active' => array(
   				'type' 		=> ObjectModel :: TYPE_BOOL, 
   				'required' 	=> true
			)
  		),
	);
	
	public static function findAll() {
		$sql = 'select * from ' . _DB_PREFIX_ . 'opinion where active = 1';
		if ($rows = Db :: getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql)) {
			return ObjectModel :: hydrateCollection(__CLASS__, $rows);
		}
		return array();
	}
	
	public function getCustomerName() {
		$customer = new Customer($this->id_customer);
		return $customer->firstname . ' ' . $customer->lastname;
	}
	
}