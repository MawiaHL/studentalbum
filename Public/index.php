<?php
/**
	 * Front controller
	 *
	 * Developer: Mawia HL
	 * Note: You may need not to change this file
	 * 		 but if you want to add more functionalities, you may modify and add
	 *
	 * 
 */
require dirname(__DIR__) . '/vendor/autoload.php';
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
$router = new Core\Router();
$router->add('', ['controller' => 'students', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->dispatch($_SERVER['QUERY_STRING']);