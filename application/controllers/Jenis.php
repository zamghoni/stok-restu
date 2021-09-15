<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Jenis extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_jenis');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'nama', 'label' => 'Nama Jenis', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['jenis'] = $this->m_jenis->getAll();

		$this->load->view('modjenis/jenis', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('modjenis/insert_jenis');
		} else {
			$data['nm_jenis'] = $this->input->post('nama');

			$this->m_jenis->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('jenis'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["jenis"] = $this->m_jenis->getID($id);
			$this->load->view('modjenis/edit_jenis', $data);
		} else {
			$data['nm_jenis'] = $this->input->post('nama');

			$this->m_jenis->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('jenis'));
		}
	}

	public function delete($id)
	{
		$this->m_jenis->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('jenis'));
	}

}