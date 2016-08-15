<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $limit = 10;

	function __construct() {
		parent::__construct();

		$this->load->model('dashboard_model','',TRUE);
	}

	function index() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['title'] = 'Dashboard';
			$data['content'] = 'admin/dashboard';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login');
		}
	}

	function profil() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['profil'] = $this->dashboard_model->get_profil_by_cbg();
			$data['title'] = 'Profil';
			$data['content'] = 'admin/profil/index';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function add_profil() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->_set_rules();
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'id' => $this->input->post('id'),
					'judul' => $this->input->post('judul'),
					'profil' => $this->input->post('profil'),
					'kd_cbg' => $this->session->userdata('kd_cbg'));
				$this->dashboard_model->add_profil($data);
				$this->session->set_flashdata('message', 'Profil organisasi anda berhasil ditambahkan');
				redirect('admin/dashboard/profil');
			} else {
				$data['title'] = 'Tambah profil';
				$data['content'] = 'admin/profil/add';
				$this->load->view('template/admin', $data);
			}
		} else {
			redirect('login/index');
		}
	}

	function edit_profil($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['profil'] = $this->dashboard_model->get_profil_by_id($id)->row_array();
			$data['title'] = 'Edit profil';
			$data['content'] = 'admin/profil/edit';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function update_profil($id) {
		$id = $this->input->post('id');
		$data = array(
			'judul' => $this->input->post('judul'),
			'profil' => $this->input->post('profil'));
		$this->dashboard_model->update_profil($id, $data);
		$this->session->set_flashdata('message', 'Profil berhasil diupdate');
		redirect('admin/dashboard/profil');
	}

	function pesan($offset=0, $order_column='id_pesan', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {
			if (empty($offset)) $offset = 0;
			if (empty($order_column)) $order_column = 'id_pesan';
			if (empty($order_type)) $order_type = 'desc';

			$data['pesan'] = $this->dashboard_model->get_all_pesan($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/dashboard/pesan/');
			$config['total_rows'] = $this->dashboard_model->count_all_pesan();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Pesan';
			$data['content'] = 'admin/pesan';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function hapus_pesan() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);
			$pesan = $this->dashboard_model->hapus_pesan($id);
			$this->dashboard_model->hapus_pesan($id);
			$this->session->set_flashdata('message', 'Pesan berhasil dihapus');
			redirect('admin/dashboard/pesan');
		} else {
			redirect('login/index');
		}
	}

	function komentar($offset=0, $order_column='id_comment', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {
			if (empty($offset)) $offset = 0;
			if (empty($order_column)) $order_column = 'id_comment';
			if (empty($order_type)) $order_type = 'desc';

			$data['komentar'] = $this->dashboard_model->get_all_komentar($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/dashboard/komentar/');
			$config['total_rows'] = $this->dashboard_model->count_all_komentar();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Komentar';
			$data['content'] = 'admin/komentar';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function hapus_komentar() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);
			$komentar = $this->dashboard_model->hapus_komentar($id);
			$this->dashboard_model->hapus_komentar($id);
			$this->session->set_flashdata('message', 'Komentar berhasil dihapus');
			redirect('admin/dashboard/komentar');
		} else {
			redirect('login/index');
		}
	}

	function galeri($offset=0, $order_column='id', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {
			if (empty($offset)) $offset = 0;
			if (empty($order_column)) $order_column = 'id';
			if (empty($order_type)) $order_type = 'desc';

			$data['foto'] = $this->dashboard_model->get_all_foto($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/dashboard/galeri/');
			$config['total_rows'] = $this->dashboard_model->count_all_foto();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Galeri foto';
			$data['content'] = 'admin/foto/index';
			$this->load->view('template/admin', $data);
			} else {
				redirect('login/index');
			}
	}

	function tambah_foto() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				$foto = "";
			} else {
				$foto = $this->upload->file_name;
			}

			$this->form_validation->set_rules('nama_foto', 'Nama foto', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'id' => $this->input->post('id'),
					'nama_foto' => $this->input->post('nama_foto'),
					'foto' => $foto);			
				$this->dashboard_model->add_foto($data);
				$this->session->set_flashdata('message', 'Foto kegiatan berhasil ditambahkan');
				redirect('admin/dashboard/galeri');
			} else {
				$data['title'] = 'Tambah foto kegiatan';
				$data['content'] = 'admin/foto/add';
				$this->load->view('template/admin', $data);
			}
		} else {
			redirect('login/index');
		}
	}

	function hapus_foto() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);
			$foto = $this->dashboard_model->get_foto_by_id($id)->result();
			foreach ($foto as $key => $row) :
				unlink('foto'.$row->foto);
			endforeach;
			$this->dashboard_model->hapus_foto($id);
			$this->session->set_flashdata('message', 'Foto berhasil dihapus');
			redirect('admin/dashboard/galeri');
		} else {
			redirect('login/index');
		}
	}

	function _set_rules() {
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('profil', 'Profil', 'required');
	}

}

 ?>