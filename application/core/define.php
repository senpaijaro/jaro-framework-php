<?php 

$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('ROOT_DIR',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
define('BASE_URL','http://' . $_SERVER['HTTP_HOST'].URL_ROOT);
define('SITE_URL','https://' . $_SERVER['HTTP_HOST'].URL_ROOT);

