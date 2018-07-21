<?php 
session_start();
ob_start();

require_once './application/core/constant.php' ;
if(is_array($define)){
	foreach ($define as $key => $value) {
		define($key,$value);
	}
}

function __autoload($class_name){
	$autoload = array(
		"core" => CORE."$class_name.php",
		"controller" => CONTROLLER."$class_name.php",
		"model" => MODEL."$class_name.php"
	);
	foreach ($autoload as $key => $value){ 
		if(file_exists($value)){
			require_once $value;
		}
	}

}

$controller = new Controller();
$controller->load('config','routes');
