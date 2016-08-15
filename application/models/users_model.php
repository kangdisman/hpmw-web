<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	private $table = 'users';
	private $primary = 'username';

	function get_all() {
		$this->db->order_by($this->primary, 'desc');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function add($data) {
		$this->db->insert($this->table, $data);
	}

	function hapus($id) {
		$this->db->where($this->primary, $id);
		return $this->db->delete($this->table);
	}

	function validasi_password($username, $password){
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		if($query->num_rows){
			return $query->result_array();
		} else {
			return false;
		}
	}

	function ubah_password($username, $data) {
		$this->db->where('username', $username);
		$update = $this->db->update('users', $data);
	}

}

 ?>