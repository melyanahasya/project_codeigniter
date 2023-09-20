<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$this->load->view('auth/register');
	}

    public function register() {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman registrasi
            $this->load->view('registration');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
        
            // Panggil model untuk menyimpan data ke database
            $this->m_model->register_user($email,$username, $password);

            // Redirect ke halaman sukses atau login
            redirect('auth'); // Gantilah 'login' dengan halaman yang sesuai
        }
    }
}