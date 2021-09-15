<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Satuan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_satuan');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'kode', 'label' => 'Kode Satuan', 'rules'=> 'required'],
			['field' => 'nama', 'label' => 'Nama Satuan', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['satuan'] = $this->m_satuan->getAll();

		$this->load->view('modsatuan/satuan', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('modsatuan/insert_satuan');
		} else {
			$data['nm_satuan'] = $this->input->post('kode');
			$data['deskripsi'] = $this->input->post('nama');

			$this->m_satuan->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('satuan'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["satuan"] = $this->m_satuan->getID($id);
			$this->load->view('modsatuan/edit_satuan', $data);
		} else {
			$data['nm_satuan'] = $this->input->post('kode');
			$data['deskripsi'] = $this->input->post('nama');

			$this->m_satuan->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('satuan'));
		}
	}

	public function delete($id)
	{
		$this->m_satuan->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('satuan'));
	}

}