<?php 

class Alumni extends CI_Controller {

	private $limit = 10;

	function __construct() {
		parent::__construct();

		$this->load->model('alumni_model','',TRUE);
	}

	function index($offset=0, $order_column='id', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {
			if(empty($offset)) $offset = 0;
			if(empty($order_column)) $order_column = 'id';
			if(empty($order_type)) $order_type = 'desc';

			$data['alumni'] = $this->alumni_model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/alumni/index/');
			$config['total_rows'] = $this->alumni_model->count();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Alumni';
			$data['content'] = 'admin/alumni/index';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function add() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->_set_rules();
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
					'status' => $this->input->post('status'));
				$this->alumni_model->add($data);
				redirect('admin/alumni/index');
			} else {
				$data['title'] = 'Tambah data';
				$data['content'] = 'admin/alumni/add';
				$this->session->set_flashdata('message', 'Data alumni berhasil ditambahkan');
				$this->load->view('template/admin', $data);
			}
		} else {
			redirect('login/index');
		}
	}

	function edit($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['alumni'] = $this->alumni_model->get_by_id($id)->row_array();
			$data['title'] = 'Edit data';
			$data['content'] = 'admin/alumni/edit';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function update($id) {
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'kampus' => $this->input->post('kampus'),
			'kota' => $this->input->post('kota'),
			'angkatan' => $this->input->post('angkatan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'status' => $this->input->post('status'));
		$this->session->set_flashdata('message', 'Data alumni berhasil diupdate');
		$this->alumni_model->update($id, $data);
		redirect('admin/alumni/index');
	}

	function hapus() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);  
			$alumni = $this->alumni_model->get_by_id($id)->result();
			$this->alumni_model->hapus($id);
			$this->session->set_flashdata('message', 'Data alumni berhasil dihapus');
			redirect('admin/alumni/index', 'refresh');
		} else {
			redirect('login/index');
		}
	}

	function _set_rules() {
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