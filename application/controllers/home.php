<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('home_model','',TRUE);
		$this->load->model('cabang_model','',TRUE);
	}

	function index() {
		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['title'] = 'Selamat datang';
		$data['judul'] = 'Selamat datang di website HPMW';
		$data['content'] = 'welcome';
		$this->load->view('template/home', $data);
	}

	function profil($kd_cbg = null) {
		if (empty($kd_cbg))
			$kd_cbg = $this->input->post('kd_cbg');

		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['profil'] = $this->home_model->get_profil_by_cbg($kd_cbg);
		$data['title'] = 'Profil organisasi';
		$data['judul'] = '';
		$data['content'] = 'profil';
		$this->load->view('template/page', $data);
	}

	function agenda($kd_cbg = null) {
		if (empty($kd_cbg))
			$kd_cbg = $this->input->post('kd_cbg');

		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['agenda'] = $this->home_model->get_agenda_by_cbg($kd_cbg);
		$data['title'] = 'Agenda organisasi';
		$data['judul'] = '';
		$data['content'] = 'agenda';
		$this->load->view('template/page', $data);
	}

	function add_pesan() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'id_pesan' => $this->input->post('id_pesan'),
                'nama' => $this->input->post('nama'),
                'pesan' => $this->input->post('pesan')
            );
            $this->home_model->add_pesan($data);
            redirect('home/index');
        }
    }

    function galeri() {
    	$data['foto'] = $this->home_model->get_all_foto();
    	$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
    	$data['title'] = 'Foto kegiatan';
		$data['judul'] = 'Foto-foto kegiatan himpunan pelajar mahasiswa wapulaka';
		$data['content'] = 'galeri';
		$this->load->view('template/page', $data);
    }

}

 ?>