<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Petugas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_petugas');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'nama', 'label' => 'Nama Petugas', 'rules'=> 'required'],
			['field' => 'level', 'label' => 'Level Petugas', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['petugas'] = $this->m_petugas->getAll();

		$this->load->view('modpetugas/petugas', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('modpetugas/insert_petugas');
		} else {
			$data['userid'] = $this->input->post('username');
			$data['nm_petugas'] = $this->input->post('nama');
			$data['password'] = sha1($this->input->post('pass'));
			$data['level'] = $this->input->post('level');

			$this->m_petugas->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('petugas'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["petugas"] = $this->m_petugas->getId($id);
			$this->load->view('modpetugas/edit_petugas', $data);
		} else {
			$data['nm_petugas'] = $this->input->post('nama');
			$data['level'] = $this->input->post('level');

			$this->m_petugas->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('petugas'));
		}
	}

	public function delete($id)
	{
		$this->m_petugas->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('petugas'));
	}

}