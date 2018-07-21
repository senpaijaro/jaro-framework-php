<?php 

class WelcomeMod extends Model{
	
	function listOfUser(){
		$res = self::select('tbluser');
		return ($res) ? $res : false;
	}
}