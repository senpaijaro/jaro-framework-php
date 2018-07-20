<?php 
require_once(DOC_ROOT.'/application/model/AboutUs.php');

class AboutUsContrl extends Controller{


	public static $user;
	public static $data = array();

	public static function user(){
		return new UserMod();
	}
	
	public static function listUser(){
		self::$data['fname'] = 'Jade';
		self::$data['lname'] = 'Batal';
		if(isset($_POST['btnadd'])){
			$res  = self::user()->insertUser();
			return ($res) ? self::$data : false;
		}
	}
}
