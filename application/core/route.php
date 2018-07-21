<?php 

class Route
{
	public static $validUrl = array();

	public static function set($route, $function){
		self::$validUrl[] = $route;
		if($_GET['url'] == $route){
			$function->__invoke();
		}else{
			die('404');
		}
	}
}