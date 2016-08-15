<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('users_model','',TRUE);
		$this->load->model('cabang_model','',TRUE);
	}

	function index() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['users'] = $this->users_model->get_all();
			$data['title'] = 'Users';
			$data['content'] = 'admin/users/index';
			$this->load->view('template/admin', $data);
		}
	}

	function add() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->_set_rules();
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'full_name' => $this->input->post('full_name'),
					'level' => $this->input->post('level'),
					'kd_cbg' => $this->input->post('kd_cbg'));
				$this->users_model->add($data);
				$this->session->set_flashdata('message', 'User baru berhasil ditambahkan');
				redirect('admin/users/index');
			} else {
				$data['cabang'] = $this->cabang_model->get_all();
				$data['title'] = 'Tambah user';
				$data['content'] = 'admin/users/add';
				$this->load->view('template/admin', $data);
			}
		} else {
			redirect('login/index');
		}
	}

	function hapus() {
		$id = $this->uri->segment(4);
		$this->users_model->hapus($id);
		$this->session->set_flashdata('message', 'Users berhasil dihapus');
		redirect('admin/users/index');
	}

	function ubah_password() {
		$this->form_validation->set_rules('curent_password', 'Password sekarang', 'matches[curent_password]required');
        $this->form_validation->set_rules('new_password', 'Password baru', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi password', 'matches[new_password]|required');

		if ($this->form_validation->run() == TRUE) {

			$username = $this->session->userdata('username');
			$curent_password = md5($this->input->post('curent_password'));
			$cek = $this->users_model->validasi_password($username, $curent_password);
			if ($cek !== FALSE) {
				$data = array('password' => md5($this->input->post('new_password')));
				$this->users_model->ubah_password($username, $data);
				redirect('admin/dashboard/index');
			} else {
				$this->session->set_flashdata('message', 'Maaf, username dan password anda salah');
				redirect('login/index');
			}
		
		} else {
			$data['title'] = 'Ubah password';
			$data['content'] = 'admin/users/ubah_password';
			$this->load->view('template/admin', $data);
		}

	}

	function _set_rules() {
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('full_name','Nama lengkap','required');
		$this->form_validation->set_rules('level','Level akses','required');
		$this->form_validation->set_rules('kd_cbg','Kode cabang','required');
	}

}

 ?>