<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	private $limit = 5;

	function __construct() {
		parent::__construct();

		$this->load->helper('smiley');
		$this->load->model('artikel_model','',TRUE);
	}

	function index($offset=0, $order_column='id_artikel', $order_type='desc') {
		if ($this->session->userdata('logged_in') == TRUE) {
			if(empty($offset)) $offset = 0;
			if(empty($order_column)) $order_column = 'id_artikel';
			if(empty($order_type)) $order_type = 'desc';

			$data['artikel'] = $this->artikel_model->get_artikel_by_cbg($this->limit, $offset, $order_column, $order_type)->result();
			$config['base_url'] = site_url('admin/artikel/index/');
			$config['total_rows'] = $this->artikel_model->count();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = 'Artikel';
			$data['content'] = 'admin/artikel/index';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index', 'refresh');
		}
		
	}

    function add() {
       	if ($this->session->userdata('logged_in') == TRUE) {
       		$this->_set_rules();
	        if ($this->form_validation->run() == TRUE) {
	            $date = date('Y-m-d');
	            $data = array(
	                'id_artikel' => $this->input->post('id_artikel'),
	                'judul' => $this->input->post('judul'),
	                'content' => $this->input->post('content'),
	                'date' => $date,
	                'username' => $this->session->userdata('username'));
	            $this->artikel_model->add($data);
	            $this->session->set_flashdata('message', 'Artikel berhasil ditambahkan');
	            redirect('admin/artikel/index');
	        } else {
	            $data['title'] = 'Tambah artikel';
	            $data['content'] = 'admin/artikel/add';
	            $this->load->view('template/admin', $data);
	        }
       } else {
       	redirect('login/index');
       }
    }

	function edit($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['artikel'] = $this->artikel_model->get_by_id($id)->row_array();
			$data['title'] = 'Edit artikel';
			$data['content'] = 'admin/artikel/edit';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function update($id) {
		$id = $this->input->post('id_artikel');
		$data = array(
            'judul' => $this->input->post('judul'),
            'content' => $this->input->post('content'));
		$this->artikel_model->update($id, $data);
		$this->session->set_flashdata('message', 'Artikel berhasil di update');
		redirect('admin/artikel/index');
	}

	function hapus() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);  
			$artikel = $this->artikel_model->get_by_id($id)->result();
			$this->artikel_model->hapus($id);
			$this->session->set_flashdata('message', 'Artikel berhasil di hapus');
			redirect('admin/artikel/index', 'refresh');
		} else {
			redirect('login/index');
		}
	}

	function _set_rules() {
		$this->form_validation->set_rules('judul', 'Judul artikel', 'required');
        $this->form_validation->set_rules('content', 'Isi artikel', 'required');
	}
 
}

 ?>