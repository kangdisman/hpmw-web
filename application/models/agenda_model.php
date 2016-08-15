<?php 

class Agenda_model extends CI_Model {

	private $table = 'agenda';
	private $primary = 'id_agenda';

	function get_by_id($id) {
		$this->db->where($this->primary, $id);
		return $this->db->get($this->table);
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

	function get_agenda_by_cbg() {
		$query = $this->db->get_where($this->table, array('kd_cbg' => $this->session->userdata('kd_cbg')));
		return $query->result();
	}

}
	
 ?>