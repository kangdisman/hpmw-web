<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function count_all_pesan() {
		return $this->db->count_all('pesan');
	}

	function get_all_pesan($limit=3, $offset=0, $order_column='', $order_type='asc') {
		if (empty($order_column)|| empty($order_type)) {
			$this->db->order_by('id_pesan', 'asc');
		} else {
			$this->db->order_by($order_column, $order_type);
			return $this->db->get('pesan', $limit, $offset);
		}
	}

	function hapus_pesan($id) {
		$this->db->where('id_pesan', $id);
		return $this->db->delete('pesan');
	}
	
	function get_profil_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get('profil');
	}

	function get_profil_by_cbg() {
		$query = $this->db->get_where('profil', array('kd_cbg' => $this->session->userdata('kd_cbg')));
		return $query->result();
	}

	function add_profil($data) {
		return $this->db->insert('profil', $data);
	}

	function update_profil($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('profil', $data);
	}

	function count_all_komentar() {
		return $this->db->count_all('comment');
	}

	function get_all_komentar($limit=3, $offset=0, $order_column='', $order_type='asc') {
		if (empty($order_column)|| empty($order_type)) {
			$this->db->order_by('id_comment', 'asc');
		} else {
			$this->db->order_by($order_column, $order_type);
			return $this->db->get('comment', $limit, $offset);
		}
	}

	function hapus_komentar($id) {
		$this->db->where('id_comment', $id);
		return $this->db->delete('comment');
	}

	function get_all_foto($limit=3, $offset=0, $order_column='', $order_type='asc') {
		if (empty($order_column) || empty($order_type)) {
			$this->db->order_by('id', 'asc');
		} else {
			$this->db->order_by($order_column, $order_type);
			return $this->db->get('foto', $limit, $offset);
		}
	}

	function add_foto($data) {
		return $this->db->insert('foto', $data);
	}

	function hapus_foto($id) {
		$this->db->where('id', $id);
		$this->db->delete('foto');
	}

	function count_all_foto() {
		return $this->db->count_all('foto');
	}

	function get_foto_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get('foto');
	} 


}

 ?>