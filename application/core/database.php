<?php

	class Database{

		private $dbhost = "localhost";
		private $dbuser = "root";
		private $dbroot = "password!@#$";
		private $dbname = "test";

		function __construct(){
			
		}

		public function connection(){
			$conn = new mysqli($this->dbhost, $this->dbuser, $this->dbroot, $this->dbname);
			if($conn->connect_error){
				die('No database found'. $conn->connect_error);
			}
			return $conn;
		}

	}