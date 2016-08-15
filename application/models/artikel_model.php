<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_model extends CI_Model {

	private $table = 'artikel';
	private $primary = 'id_artikel';
	
	function count() {
		return $this->db->count_all($this->table);
	}

	function get_by_id($id) {
		$this->db->where($this->primary, $id);
		return $this->db->get($this->table);
	}

	function get_artikel_by_cbg($limit=3, $offset=0, $order_column='', $order_type='asc') {
		if (empty($order_column)|| empty($order_type)) {
			$this->db->order_by($this->primary, 'asc');
		} else {
			$this->db->order_by($order_column, $order_type);
			$this->db->limit($limit, $offset);
			return $this->db->get_where($this->table, array('username' => $this->session->userdata('username')));
		}
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