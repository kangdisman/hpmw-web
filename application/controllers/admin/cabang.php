<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cabang extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('cabang_model','',TRUE);
	}

	function index() {
        if ($this->session->userdata('logged_in') == TRUE && 
            $this->session->userdata('level')=='Administrator') {
            $data['title'] = 'Cabang';
            $data['cabang'] = $this->cabang_model->get_all();
            $data['content'] = 'admin/cabang/index';
            $this->load->view('template/admin', $data);
        } else {
            redirect('login');   
        }
    }

    function add() {
       if ($this->session->userdata('logged_in') == TRUE) {
            $this->_set_rules();
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'kd_cbg' => $this->input->post('kd_cbg'),
                    'nama_cbg' => $this->input->post('nama_cbg'),
                    'alamat_cbg' => $this->input->post('alamat_cbg'),
                    'th_berdiri' => $this->input->post('th_berdiri'));
                $this->cabang_model->add($data);
                $this->session->set_flashdata('message', 'Data cabang berhasil ditambahkan');
                redirect('admin/cabang');
            } else {
                $data['title'] = 'Tambah cabang';
                $data['content'] = 'admin/cabang/add';
                $this->load->view('template/admin', $data);
            }
        } else {
            redirect('login/index');
        }
    }

    function edit($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
            $data['cabang'] = $this->cabang_model->get_by_id($id)->row_array();
            $data['title'] = 'Edit cabang';
            $data['content'] = 'admin/cabang/edit';
            $this->load->view('template/admin', $data);
        } else {
            redirect('login/index');
        }
	}

	function update($id) {
		$id = $this->input->post('kd_cbg');
		$data = array(
            'nama_cbg' => $this->input->post('nama_cbg'),
            'alamat_cbg' => $this->input->post('alamat_cbg'),
            'th_berdiri' => $this->input->post('th_berdiri'));
		$this->cabang_model->update($id, $data);
		$this->session->set_flashdata('message', 'Data cabang berhasil diupdate');
		redirect('admin/cabang/index');
	}

	function hapus() {
		if ($this->session->userdata('logged_in') == TRUE) {
            $id = $this->uri->segment(4);  
            $cabang = $this->cabang_model->get_by_id($id)->result();
            $this->cabang_model->hapus($id);
            $this->session->set_flashdata('message', 'Data cabang berhasil dihapus');
            redirect('admin/cabang/index', 'refresh');
        } else {
            redirect('login/index');
        }
	}

    function _set_rules() {
    	$this->form_validation->set_rules('kd_cbg', 'Kode Cabang', 'required');
        $this->form_validation->set_rules('nama_cbg', 'Nama Cabang', 'required');
        $this->form_validation->set_rules('alamat_cbg', 'Alamat Cabang', 'required');
        $this->form_validation->set_rules('th_berdiri', 'Tahun Berdiri', 'required');
    }

}

 ?>