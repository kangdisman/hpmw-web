<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	private $limit = 8;

	function __construct() {
		parent::__construct();

		$this->load->model('anggota_model','',TRUE);
	}

	function index($offset=0, $order_column='id_angg', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {

			if(empty($offset)) $offset = 0;
			if(empty($order_column)) $order_column = 'id_angg';
			if(empty($order_type)) $order_type = 'desc';

			$data['anggota'] = $this->anggota_model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/anggota/index/');
			$config['total_rows'] = $this->anggota_model->count();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Anggota';
			$data['content'] = 'admin/anggota/index';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index', 'refresh');
		}
	}

    function add() {
        $this->_set_rules();
        if ($this->form_validation->run() == TRUE) {
            $data = array(
				'id_angg' => $this->session->userdata('kd_cbg').'-'.$this->input->post('id_angg'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),
				'jurusan' => $this->input->post('jurusan'),
				'angkatan' => $this->input->post('angkatan'),
				'kampus' => $this->input->post('kampus'),
				'alamat_asal' => $this->input->post('alamat_asal'),
				'alamat_skrg' => $this->input->post('alamat_skrg'),
				'kd_cbg' => $this->session->userdata('kd_cbg'));
            $this->anggota_model->add($data);
            $this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan');
            redirect('admin/anggota/index');
        } else {
            $data['title'] = 'Tambah anggota';
            $data['content'] = 'admin/anggota/add';
            $this->load->view('template/admin', $data);
        }
    }

	function edit($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['anggota'] = $this->anggota_model->get_by_id($id)->row_array();
			$data['title'] = 'Edit anggota';
			$data['content'] = 'admin/anggota/edit';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function update($id) {
		$id = $this->input->post('id_angg');
		$data = array(
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'jurusan' => $this->input->post('jurusan'),
			'angkatan' => $this->input->post('angkatan'),
			'kampus' => $this->input->post('kampus'),
			'alamat_asal' => $this->input->post('alamat_asal'),
			'alamat_skrg' => $this->input->post('alamat_skrg'),
			'kd_cbg' => $this->session->userdata('kd_cbg'));
		$this->anggota_model->update($id, $data);
		$this->session->set_flashdata('message', 'Data anggota berhasil diupdate');
		redirect('admin/anggota/index');
	}

	function hapus() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);  
			$anggota = $this->anggota_model->get_by_id($id)->result();
			$this->anggota_model->hapus($id);
			$this->session->set_flashdata('message', 'Data anggota berhasil dihapus');
			redirect('admin/anggota/index', 'refresh');
		} else {
			redirect('login/index');
		}
	}

	function _set_rules() {
		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('kampus', 'Nama Universitas', 'required');
		$this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'required');
		$this->form_validation->set_rules('alamat_skrg', 'Alamat Sekarang', 'required');
	}
 
}

 ?>