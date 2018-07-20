<?php 

class Controller {

	public static function view($viewFile,$data){
		require_once(DOC_ROOT."application/views/$viewFile.php");

	}

}