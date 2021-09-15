<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Supplier extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_supplier');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'kode', 'label' => 'Kode Supplier', 'rules'=> 'required'],
			['field' => 'nama', 'label' => 'Nama Supplier', 'rules'=> 'required'],
			['field' => 'telp', 'label' => 'No. Telephone', 'rules'=> 'required'],
			['field' => 'alamat', 'label' => 'Alamat', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['supplier'] = $this->m_supplier->getAll();

		$this->load->view('modsupplier/supplier', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('modsupplier/insert_supplier');
		} else {
			$data['id_supplier'] = $this->input->post('kode');
			$data['nm_supplier'] = $this->input->post('nama');
			$data['no_telp'] = $this->input->post('telp');
			$data['alamat'] = $this->input->post('alamat');

			$this->m_supplier->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('supplier'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["supplier"] = $this->m_supplier->getID($id);
			$this->load->view('modsupplier/edit_supplier', $data);
		} else {
			$data['id_supplier'] = $this->input->post('kode');
			$data['nm_supplier'] = $this->input->post('nama');
			$data['no_telp'] = $this->input->post('telp');
			$data['alamat'] = $this->input->post('alamat');

			$this->m_supplier->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('supplier'));
		}
	}

	public function delete($id)
	{
		$this->m_supplier->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('supplier'));
	}

}