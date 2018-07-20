<?php 

class UserMod extends Model{
	
	function insertUser(){
		$data = array(
			'tfname' => self::post('txtfname'),
			'tmname' => self::post('txtmname'),
			'tlname' => self::post('txtlname')
		);
		echo $res = self::insert('tbluser',$data);
		return ($res) ? $res : false;
	}
}