<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	function get_profil_by_cbg($kd_cbg) {
		$query = $this->db->query("SELECT * FROM profil WHERE kd_cbg='$kd_cbg'");
		return $query->result();
	}

	function get_agenda_by_cbg($kd_cbg) {
		$query = $this->db->query("SELECT * FROM agenda WHERE kd_cbg='$kd_cbg'");
		return $query->result();
	}

	function get_anggota_by_cbg($kd_cbg) {
		$query = $this->db->query("SELECT * FROM anggota WHERE kd_cbg='$kd_cbg' ORDER BY id_angg DESC");
		return $query->result();
	}

	function artikel_recent() {
		$query = $this->db->query("SELECT
            artikel.id_artikel,
            artikel.judul,
            artikel.content,
            artikel.date,
            users.full_name
            FROM artikel, users
            WHERE artikel.username=users.username ORDER BY id_artikel DESC LIMIT 4");
        return $query->result();
	}


	function get_all_artikel() {
		$query = $this->db->query("SELECT
            artikel.id_artikel,
            artikel.judul,
            artikel.content,
            artikel.date,
            users.full_name
            FROM artikel, users
            WHERE artikel.username=users.username ORDER BY id_artikel DESC");
        return $query->result();
	}

	function readmore($id) {
		$query = $this->db->query("SELECT
			artikel.id_artikel,
			artikel.judul,
			artikel.content,
			artikel.date,
			users.full_name
			FROM artikel, users
			WHERE artikel.username=users.username AND artikel.id_artikel=$id");
		return $query->result();
	}

	function komentar($data) {
		$this->db->insert('comment', $data);
	}

	function get_komentar_by_artikel($id) {
		$this->db->where('id_artikel', $id);
		$query = $this->db->get('comment');
		return $query->result();
	}

	function add_pesan($data) {
		return $this->db->insert('pesan', $data);
	}

	function get_all_pesan() {
		$this->db->order_by('id_pesan', 'desc');
		$this->db->limit(5);
		$query = $this->db->get('pesan');
		return $query->result();
	}

	function get_all_foto() {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('foto');
		return $query->result();
	}

}
	
 ?>