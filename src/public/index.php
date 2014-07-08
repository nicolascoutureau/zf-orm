<?php


define('APP_ENV', getenv('APPLICATION_ENV')?: 'production');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('PUBLIC_PATH', SRC_PATH . DS . 'public');
define('VENDOR_PATH', ROOT_PATH . DS . 'vendor');
define('APP_PATH', SRC_PATH . DS . 'application');
define('LIB_PATH', ROOT_PATH . DS . 'library');

require_once VENDOR_PATH . DS . 'autoload.php';

//$autoloader = Zend_Loader_Autoloader::getInstance();
	

// Gestion des erreurs
if('development' === APP_ENV){
	\php_error\reportErrors();
}else {
	set_exception_handler(array('Iplib\Error', 'handleException'));
	set_error_handler(array('Iplib\Error', 'handleError'));
}
	

$application = new Zend_Application(
    APP_ENV,
	APP_PATH.DS.'Core'.DS.'configs'.DS.'application.ini'
);
    
$application->bootstrap();
$application->run();

   



