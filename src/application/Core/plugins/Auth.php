<?php


/**
* 
*/
class Core_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{

	public function routeShutdown(Zend_Controller_Request_Abstract $request)
	{
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$request->setModuleName('Core')
					->setControllerName('Index')
					->setActionName('signin')
					->setDispatched(true);	
		}
		
	}
}