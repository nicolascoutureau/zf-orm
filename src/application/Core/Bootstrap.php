<?php

/**
* 
*/
class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{
	// Enregistrement d'un plugin dans le front controller
	protected function _initPlugins()
	{
		$fc = Zend_Controller_Front::getInstance();
		$fc->registerPlugin(new Core_Plugin_Navigation)
		   ->registerPlugin(new Core_Plugin_Auth);
	}	
}