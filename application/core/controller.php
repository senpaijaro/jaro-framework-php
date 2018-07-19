<?php 

class Controller{
	
	function __construct(argument){
		
	}

	public function view($view){
		$dir = ROOT_DIR.'views/'.$view.'.php';
		$files = str_replace('controller/', '', $dir);
		(file_exists($files)) ? include_once($files) : "";
	}
	
}