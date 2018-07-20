<?php

	class Database {

		private static $dbhost = "localhost";
		private static $dbuser = "root";
		private static $dbroot = "password!@#$";
		private static $dbname = "test";

		function __construct(){
			
		}

		public static function connection(){
			$conn = new mysqli(self::$dbhost, self::$dbuser, self::$dbroot,self::$dbname);
			if($conn->connect_error){
				die('No database found'. $conn->connect_error);
			}
			return $conn;
		}

	}