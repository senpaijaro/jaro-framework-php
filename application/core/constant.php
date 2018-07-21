<?php 
date_default_timezone_set('Etc/GMT-8');
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));

$define = array(
	"DOC_ROOT" => substr($_SERVER['SCRIPT_FILENAME'],0,$chop),
	"URL_ROOT" => substr($_SERVER['SCRIPT_NAME'],0,$chop),
	"URL" 	   => 'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,$chop),

	"CORE"    => './application/core/',
	"CONTROLLER" => './application/controller/',
	"MODEL"    => './application/model/'
);


