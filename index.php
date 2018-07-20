<?php 

session_start();
ob_start();
date_default_timezone_set('Etc/GMT-8');
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
define('URL','http://' . $_SERVER['HTTP_HOST'].URL_ROOT);

require_once('./application/config/routes.php');

function __autoload($class_name){
	$route = './application/core/'.$class_name.'.php';
	$controller = './application/controller/'.$class_name.'.php';
	$model = './application/model/'.$class_name.'.php';
	if(file_exists($route)){
		require_once($route);
	} else if (file_exists($controller)) {
		require_once($controller);
	} else if (file_exists($model)) {
		require_once($model);
	}
	
}