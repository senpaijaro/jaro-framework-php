
<?php 
include 'database.php';

class Model extends Database
{
	private $db;
	
	function __construct(){
		parent::__construct();
		$this->db = $this->connection();
	}

	public function insert($table,$data){
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
			$result = $this->db->query($sql);
			return ($result) ? $result->insert_id : $sql.'<br>'.$this->db->error;
		}else{
			die('Data is not array'. $data);
		}
	}

	public function update($table,$data,$condition){
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
			$result = $this->db->query($sql);
			return ($result) ? true : $sql.'<br>'.$this->db->error;
		}else{
			die('Data is not an array or Condition is not an array');
		}
	}

	public function delete($table,$condition){
		if(is_array($condition)){
			$count =  0;
			$where = "";
			foreach ($condition as $key => $val) {
				$pre    = ($count++ > 0) ? ' AND ' : '';
				$fields = $key." = ";
				$where .= $pre.$fields."'".$val."'";
			}
			$sql = "DELETE FROM $table WHERE $where";
			$result = $this->db->query($sql);
			return ($result) ? true : $sql.'<br>'.$this->db->error;
		}else{
			die('Condition is not an array');
		}
	}

	public function select($table,$condition="",$select='*'){
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
			$result = $this->db->query($sql);
			return ($result) ? $result : $sql.'<br>'.$this->db->error;
		}else{
			die('Condition is empty');
		}
	}

	public function row($fields, $data){
		if($fields != "" && is_object($data)){
			while ($row = $data->fetch_object()) {
				return $row->$fields;
			}
		}else{
			die('Data is not array or fields is empty');
		}
	}

	public function getQuery($sql=""){
		if($sql == ""){
			$result = $this->db->query($sql);
			return ($result) ? $result : $sql.'<br>'.$this->db->error;
		}else{
			die('No sql')
		}
	}

	public function post($data){
		return $this->db->real_escape_string($_POST[$data]);
	}

	public function get(){
		return  $this->db->real_escape_string($_GET[$data]);
	}
	
}

$data = new Model();

$user = array(
	"tfname" => 'Jasasdde',
	"tmname" => 'Malaascasste',
	"tlname" => 'Bataasdl'
);
$condition = array(
	'tid' => 14
);

$result = $data->select('tbluser',$condition);
echo $data->row('tfname',$result);