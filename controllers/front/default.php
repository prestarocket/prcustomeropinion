<?php

class PrCustomerOpinionDefaultModuleFrontController extends ModuleFrontController {
	
	public function initContent() {
		
		parent :: initContent();
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($opinion = Tools :: getValue('opinion', false)) {
				
				
				$opinionObj = new Opinion();
				$opinionObj->id_customer = $this->context->customer->id;
				$opinionObj->active = false;
				$opinionObj->opinion = $opinion;
				$opinionObj->add();
				
				$link = new Link();
				Tools :: redirect($link->getModuleLink('prcustomeropinion', 'default'));
				
			}
			
		}
		
		$opinions = Opinion :: findAll();
		$this->context->smarty->assign('opinions', $opinions);
		
		$this->setTemplate('form.tpl');
		
	}
	
}