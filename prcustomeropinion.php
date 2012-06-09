<?php

require_once _PS_MODULE_DIR_ . 'prcustomeropinion/models/Opinion.php';

/**
 * 
 * @author Alexandre Segura <mex.zktk@gmail.com>
 */
class PrCustomerOpinion extends Module {
	
	public function __construct() {
		
		$this->name 		= 'prcustomeropinion';
		$this->tab 			= 'front_office_features';
		$this->version 		= 1.0;
		$this->author 		= 'Alexandre Segura';
		$this->displayName 	= $this->l('Customer Opinion');
		$this->description 	= $this->l('Customer Opinion - Example module for PrestaShop 1.5');
		
		parent :: __construct();
		
	}
	
	public function install() {
		return parent :: install()
			&& $this->resetDb()
			&& $this->registerHook('leftColumn')
			;
	}
	
	private function resetDb() {
		
		$prefix = _DB_PREFIX_;
		$engine = _MYSQL_ENGINE_;
		
		$statements = array();
		
		$statements[] 	= "DROP TABLE IF EXISTS `${prefix}opinion`";
		$statements[] 	= "CREATE TABLE `${prefix}opinion` ("
						. '`id_opinion` int(10) unsigned NOT NULL AUTO_INCREMENT,'
						. '`id_customer` int(10) unsigned NOT NULL,'
						. '`opinion` enum("AVERAGE","GOOD","VERY_GOOD") NOT NULL,'
						. '`active` tinyint(1) unsigned DEFAULT "0",'
						. 'PRIMARY KEY (`id_opinion`)'
						. ") ENGINE=$engine"
						;

		foreach ($statements as $statement) {
			if (!Db :: getInstance()->Execute($statement)) {
				return false;
			}
		}
		
		return true;
						
	}
	
	public function hookDisplayLeftColumn($params) {
		return $this->display(__FILE__, 'left-column.tpl');
	}
	
}