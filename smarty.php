<?php

// load Smarty library
require('libs/SmartyBC.class.php');

class Smarty_app extends SmartyBC {

   function __construct()
   {
        parent::__construct();
		
        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        $this->setConfigDir('configs/');
        $this->setCacheDir('cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'HC.Admin');
		$this->caching = false;
   }

}
?>