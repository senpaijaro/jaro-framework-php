<?php 

class Model extends Database{

	public static function post($data){
		return self::connection()->real_escape_string($_POST[$data]);
	}

	public static function insert($table,$data){
		if(is_array($data) && $table != ""){
			$count = 0;
			$field = "";
			$seperator = "";
			$values = "";
			foreach ($data as $key => $val) {
				if($count++ > 0){
					$seperator = ',';
				}
				$field .= $seperator.$key ;
				$values .= $seperator."'".$val."'";
			}
			$sql = "INSERT INTO $table (".$field.") VALUES (".$values.")";
			return ($result) ? self::connection()->insert_id : false;
		}else{
			die('Incorrect synstax please check your parameters (insert)');
		}
	}

	public static function update($table,$data,$condition){
		if(is_array($data) && is_array($condition)){
			$count = $counts = 0;
			$field = $seperator = $values = $where = "";
			foreach ($data as $key => $val) {
				$seperator = ($count++ > 0) ? ', ' : '';
				$field   = $key." = " ;
				$values .= $seperator.$field."'".$val."'";
			}
			foreach ($condition as $key => $val) {
				$pre    = ($counts++ > 0) ? ' AND ' : '';
				$fields = $key." = ";
				$where .= $pre.$fields."'".$val."'";
			}
			$sql = "UPDATE $table SET $values WHERE $where";
			$result = self::connection()->query($sql);
			return ($result) ? true : $sql.'<br>'.$this->db->error;
		}else{
			die('Data is not an array or Condition is not an array');
		}
	}

	public static function delete($table,$condition){
		if(is_array($condition)){
			$count =  0;
			$where = "";
			foreach ($condition as $key => $val) {
				$pre    = ($count++ > 0) ? ' AND ' : '';
				$fields = $key." = ";
				$where .= $pre.$fields."'".$val."'";
			}
			$sql = "DELETE FROM $table WHERE $where";
			$result = self::connection()->query($sql);
			return ($result) ? true : $sql.'<br>'.$this->db->error;
		}else{
			die('Condition is not an array');
		}
	}

	public static function select($table,$condition="",$select='*'){
		if($table != ""){
			$count    =  0;
			$where    = "";
			$continue = "";
			if(is_array($condition)){
				foreach ($condition as $key => $val) {
					$pre    = ($count++ > 0) ? ' AND ' : '';
					$fields = $key." = ";
					$where .= $pre.$fields."'".$val."'";
				}
				$continue = "WHERE $where" ;
			}
		 	$sql = "SELECT $select FROM $table $continue";
			$result = self::connection()->query($sql);
			return ($result) ? $result : $sql.'<br>'.$this->db->error;
		}else{
			die('Condition is empty');
		}
	}

	public static function row($fields, $data){
		if($fields != "" && is_object($data)){
			while ($row = $data->fetch_object()) {
				return $row->$fields;
			}
		}else{
			die('Data is not array or fields is empty');
		}
	}

	public static function query($sql=""){
		if($sql == ""){
			$result = self::connection()->query($sql);
			return ($result) ? $result : $sql.'<br>'.$this->db->error;
		}else{
			die('No sql');
		}
	}

	public function last_id($table,$field=array()){
		if($table != "" && $field != ""){
			$result = self::connection()->query("SELECT $field FROM $table WHERE $field");
			return ($result) ? $result : $sql.'<br>'.$this->db->error;
		}else{
			die('Parameters is missing ');
		}
	}
}