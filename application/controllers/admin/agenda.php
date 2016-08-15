<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('agenda_model','',TRUE);
	}

	function index() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['agenda'] = $this->agenda_model->get_agenda_by_cbg();
			$data['title'] = 'Agenda';
			$data['content'] = 'admin/agenda/index';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index', 'refresh');
		}
		
	}

    function add() {
        if ($this->session->userdata('logged_in') == TRUE) {
        	$this->_set_rules();
	        if ($this->form_validation->run() == TRUE) {
	            $data = array(
	                'id_agenda' => $this->input->post('id_agenda'),
	                'agenda' => $this->input->post('agenda'),
	                'tanggal' => $this->input->post('tanggal'),
	                'tempat' => $this->input->post('tempat'),
	                'kd_cbg' => $this->session->userdata('kd_cbg'));
	            $this->agenda_model->add($data);
	            $this->session->set_flashdata('message', 'Agenda berhasil ditambahkan');
	            redirect('admin/agenda/index');
	        } else {
	            $data['title'] = 'Tambah agenda';
	            $data['content'] = 'admin/agenda/add';
	            $this->load->view('template/admin', $data);
	        }
        } else {
        	redirect('login/index');
        }
    }

	function edit($id) {
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['agenda'] = $this->agenda_model->get_by_id($id)->row_array();
			$data['title'] = 'Edit agenda';
			$data['content'] = 'admin/agenda/edit';
			$this->load->view('template/admin', $data);
		} else {
			redirect('login/index');
		}
	}

	function update($id) {
		$id = $this->input->post('id_agenda');
		$data = array(
	        'agenda' => $this->input->post('agenda'),
	        'tanggal' => $this->input->post('tanggal'),
	        'tempat' => $this->input->post('tempat'),
	        'kd_cbg' => $this->session->userdata('kd_cbg'));
		$this->agenda_model->update($id, $data);
		$this->session->set_flashdata('message', 'Agenda berhasil diupdate');
		redirect('admin/agenda/index');
	}

	function hapus() {
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(4);  
			$agenda = $this->agenda_model->get_by_id($id)->result();
			$this->agenda_model->hapus($id);
			$this->session->set_flashdata('message', 'Agenda berhasil dihapus');
			redirect('admin/agenda/index', 'refresh');
		} else {
			redirect('login/index');
		}
	}

	function _set_rules() {
		$this->form_validation->set_rules('agenda', 'Agenda', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
	}
 
}

 ?>