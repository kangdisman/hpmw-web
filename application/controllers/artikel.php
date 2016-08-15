<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	private $limit = 5;

	function __construct() {
		parent::__construct();

		$this->load->model('cabang_model','',TRUE);
		$this->load->model('home_model','',TRUE);
	}

	function index() {
		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['artikel'] = $this->home_model->get_all_artikel();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['title'] = 'Artikel';
		$data['judul'] = 'Daftar artikel';
		$data['content'] = 'artikel/index';
		$this->load->view('template/page', $data);
	}

	function readmore($id = null) {
		if (empty($id))
			$id = $this->input->post('id_artikel');

		$this->_set_rules();
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id_artikel' => $this->input->post('id_artikel'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'url' => $this->input->post('url'),
				'comment' => $this->input->post('comment'),
				'date' => date('Y-m-d'));
			$this->home_model->komentar($data);
		}
		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['artikel'] = $this->home_model->readmore($id);
		$data['comment'] = $this->home_model->get_komentar_by_artikel($id);
		$data['title'] = 'Readmore artikel';
		$data['judul'] = '';
		$data['content'] = 'artikel/readmore';
		$this->load->view('template/page', $data);
	}

	function _set_rules() {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('comment', 'Komentar', 'required');
	}

}

 ?>