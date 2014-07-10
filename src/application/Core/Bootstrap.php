<?php

/**
* 
*/
class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{

	protected function _initZFDebug()
	{
	    $autoloader = Zend_Loader_Autoloader::getInstance();
	    $autoloader->registerNamespace('ZFDebug');


	    $options = array(
	        'plugins' => array('Variables',
	                           'Database' => array(),
	                           'File' => array('basePath' => '/path/to/project'),
	                           //'Cache' => array('backend' => $cache->getBackend()),
	                           'Exception')
	    );
	    $debug = new ZFDebug_Controller_Plugin_Debug($options);

	    $this->bootstrap('frontController');
	    $frontController = $this->getResource('frontController');
	    $frontController->registerPlugin($debug);
	}
}