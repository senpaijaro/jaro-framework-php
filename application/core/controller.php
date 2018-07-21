<?php 

class Controller {

	public static function view($viewFile,$data=array()){
		require_once(DOC_ROOT."application/views/$viewFile.php");

	}

	public static function model($modelName){
		require_once(DOC_ROOT."/application/model/$modelName.php");
		return new $modelName();
	}

	public static function load($folder,$file){
		require_once(DOC_ROOT."/application/$folder/$file.php");
	}
}