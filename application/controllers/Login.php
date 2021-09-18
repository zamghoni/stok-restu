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

	public function forget_password()
	{
		$this->load->view('forget_password');
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
			$petugas = $this->db->get_where('petugas',['userid' => $userid])->row_array();
			if ($petugas) {
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
					redirect('home','refresh');
				} else {
					$this->session->set_flashdata('error','<center>Login gagal, <br> Password salah</center>');
					redirect('login','refresh');
				}
			} else {
				$this->session->set_flashdata('error','<center>Login gagal, <br> Username '.$this->input->post('username').' tidak terdaftar</center>');
        redirect('login','refresh');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url("Login"));
	}
}
