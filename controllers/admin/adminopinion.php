<?php

class AdminOpinionController extends ModuleAdminController {
	
	public function __construct() {
		
	 	$this->table 		= 'opinion';
	 	$this->className 	= 'Opinion';
	 	
		parent :: __construct();
		
		$this->fields_list = array(
			'id_opinion' => array(
				'title' 	=> '#' 
			), 
			'id_customer' => array(
				'title' 	=> $this->module->l('Customer'), 
				'callback' 	=> 'getCustomerName'
			), 
			'opinion' => array(
				'title' 	=> $this->module->l('Opinion')
			), 
			'active' => array(
				'title' 	=> $this->module->l('Valider'),
				'active' 	=> 'status'
			)
		);
		
		$this->actions = array('delete');
		
	}
	
	public function getCustomerName($echo, $row) {
		$id_customer = $row['id_customer'];
		$customer = new Customer($id_customer);
		return $customer->firstname . ' ' . $customer->lastname;
	}
	
	
	
}