<?php

class userCtrl{
	
	function __construct(){

	}

	public function index(){
		echo $this->view('index');
	}

}


// $data = new userCtrl();

//  $data->index();