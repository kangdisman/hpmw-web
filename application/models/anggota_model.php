<?php 

class Anggota_model extends CI_Model {

	private $table = 'anggota';
	private $primary = 'id_angg';

	function count() {
		return $this->db->count_all($this->table);
	}

	function get_by_id($id) {
		$this->db->where($this->primary, $id);
		return $this->db->get($this->table);
	}

	function get_paged_list($limit=3, $offset=0, $order_column='', $order_type='desc') {
		if (empty($order_column)|| empty($order_type)) {
			$this->db->order_by($this->primary, 'desc');
		} else {
			$this->db->order_by($order_column, $order_type);
			$this->db->limit($limit);
			$this->db->offset($offset);
			return $this->db->get_where($this->table, array('kd_cbg' => $this->session->userdata('kd_cbg')));
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