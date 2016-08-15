<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alumni extends CI_Controller {

	private $limit = 7;

	function __construct() {
		parent::__construct();

		$this->load->model('alumni_model','',TRUE);
		$this->load->model('cabang_model','',TRUE);
		$this->load->model('home_model','',TRUE);
	}

	function index($offset=0, $order_column='id', $order_type='desc') {
		if(empty($offset)) $offset = 0;
		if(empty($order_column)) $order_column = 'id';
		if(empty($order_type)) $order_type = 'desc';

		$data['alumni'] = $this->alumni_model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();
		$config['base_url'] = site_url('alumni/index/');
		$config['total_rows'] = $this->alumni_model->count();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$data['recent'] = $this->home_model->artikel_recent();
		$data['pesan'] = $this->home_model->get_all_pesan();
		$data['cabang'] = $this->cabang_model->get_all();
		$data['title'] = 'Alumni';
		$data['judul'] = 'List alumni';
		$data['content'] = 'alumni/index';
		$this->load->view('template/page', $data);
	}

	function add() {
		$this->set_rules();
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'kampus' => $this->input->post('kampus'),
				'kota' => $this->input->post('kota'),
				'angkatan' => $this->input->post('angkatan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status' => $this->input->post('status')
				);
			$this->alumni_model->add($data);
			redirect('alumni/index');
		} else {
			$data['recent'] = $this->home_model->artikel_recent();
			$data['pesan'] = $this->home_model->get_all_pesan();
			$data['cabang'] = $this->cabang_model->get_all();
			$data['title'] = 'Tambah alumni';
			$data['judul'] = 'Tambah data alumni';
			$data['content'] = 'alumni/add';
			$this->load->view('template/page', $data);
		}
	}

	function set_rules() {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('kampus', 'Kampus', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	}
 
}

 ?>