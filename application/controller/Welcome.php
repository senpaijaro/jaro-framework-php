<?php 

class Welcome extends Controller {

	function __construct(){
		echo 'test';
	}

	public static $data;


	public static function ListOfUser(){
		$user = self::model('WelcomeMod');
		self::$data['fname'] = 'Jade';
		self::$data['lname'] = 'Batal';
		self::$data['user']  = $user->listOfUser();
		return (self::$data['user']) ? self::$data : false;
	}


}