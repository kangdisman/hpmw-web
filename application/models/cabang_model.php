<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	private $table = 'cabang';
	private $primary = 'kd_cbg';

	function get_by_id($id) {
		$this->db->where($this->primary, $id);
		return $this->db->get($this->table);
	}

	function get_all() {
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function add($data) {
		return $this->db->insert($this->table, $data);
	}

	function update($id, $data) {
		$this->db->where($this->primary, $id);
		$this->db->update($this->table, $data);
	}

	function hapus($id) {
		$this->db->where($this->primary, $id);
		$this->db->delete($this->table);
	}

}
	
 ?>