<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('home_model','',TRUE);
		$this->load->model('cabang_model','',TRUE);
		$this->load->model('anggota_model','',TRUE);
	}

	function index() {
		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['title'] = 'Anggota';
		$data['judul'] = 'Daftar anggota tiap-tiap cabang';
		$data['content'] = 'anggota/pilih';
		$this->load->view('template/page', $data);
	}

	function cabang($kd_cbg = null) {

		if (empty($kd_cbg))
			$kd_cbg = $this->input->post('kd_cbg');

		$data['anggota'] = $this->home_model->get_anggota_by_cbg($kd_cbg);
		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['title'] = 'Anggota';
		$data['judul'] = "";
		$data['content'] = 'anggota/index';
		$this->load->view('template/page', $data);
	}

}

 ?>