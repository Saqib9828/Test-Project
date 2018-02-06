<?php
class Test_model extends CI_Model{
function __construct(){
	parent::__construct();
	}
	public function insert($data){
		if ($this->db->insert("register", $data)) {
		return true;
		}
	}
	public function check_login($data){
		$condition = "username =" . "'" . $data['username'] . "' AND " . "pass =" . "'" . $data['pass'] . "'";
		$this->db->select('*');
		$this->db->from('register');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return true;
		} else {
		return false;
		}
	}

}
?>