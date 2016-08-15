<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('login_model','',TRUE);
    }

    function index() {
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('admin/dashboard');
        } else {
            $data['title'] = 'Please Login';
            $data['header'] = 'Please Enter Your Account';
            $this->load->view('admin/login', $data);
        }
    }

    function validate() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek = $this->login_model->validate($username, $password);
            if ($cek !== false) {
                $data = array(
                    'username' => $cek[0]['username'], 
                    'level' => $cek[0]['level'],
                    'kd_cbg' => $cek[0]['kd_cbg'],
                    'full_name' => $cek[0]['full_name'],
                    'logged_in' => TRUE);
                $test = $this->session->set_userdata($data);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('message', 'Maaf, username dan atau password anda salah');
                redirect('login/index');
            }
        } else {
            $data['title'] = 'Please Login';
            $data['header'] = 'Please Enter Your Account';
            $this->load->view('admin/login', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}

?>