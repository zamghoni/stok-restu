<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('form_login');
	}

	function cek_login(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('form_login');
		}else{
			$userid = $this->input->post('username');
			$password = sha1($this->input->post('password'));

			$validate = $this->Login_model->validate($userid,$password);
		    if($validate->num_rows() > 0){
		        $data  = $validate->row_array();
		        $nama  = $data['nm_petugas'];
		        $level = $data['level'];
		        $data_session = array(
		            'userid'  => $userid,
		            'nm_petugas' => $nama,
		            'level'     => $level,
		            'status' 	=> "login"
		        );
				$this->session->set_userdata($data_session);
				redirect(base_url("Home"));
			}else{
				$this->session->set_flashdata('pesan', '<script>alert("Username atau Password salah")</script>');

				redirect(base_url("Login"));
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url("Login"));
	}
}