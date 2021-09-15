<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Receiving extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_receiving');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'kode', 'label' => 'No. Transaksi', 'rules'=> 'required'],
			['field' => 'tanggal', 'label' => 'Tgl. Masuk', 'rules'=> 'required'],
			['field' => 'supplier', 'label' => 'Supplier', 'rules'=> 'required'],
			['field' => 'barang', 'label' => 'Barang', 'rules'=> 'required'],
			['field' => 'jumlah', 'label' => 'Jumlah Masuk', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['receiving'] = $this->m_receiving->getAll();

		$this->load->view('modreceive/receiving', $data);
	}


	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data['supplier'] = $this->m_receiving->getSupplier();
			$data['barang'] = $this->m_receiving->getBarang();
			$this->load->view('modreceive/insert_receiving', $data);
		} else {
			$data['id_brgmasuk'] = $this->input->post('kode');
			$data['tgl_masuk'] = $this->input->post('tanggal');
			$data['id_supplier'] = $this->input->post('supplier');
			$data['reference'] = $this->input->post('reference');
			$data['id_barang'] = $this->input->post('barang');
			$data['jml_masuk'] = $this->input->post('jumlah');
			$data['userid'] = $this->session->userdata('userid');

			$this->m_receiving->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('receiving'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["receiving"] = $this->m_receiving->getID($id);
			$data['supplier'] = $this->m_receiving->getSupplier();
			$data['barang'] = $this->m_receiving->getBarang();
			$this->load->view('modreceive/edit_receiving', $data);
		} else {
			$data['id_brgmasuk'] = $this->input->post('kode');
			$data['tgl_masuk'] = $this->input->post('tanggal');
			$data['id_supplier'] = $this->input->post('supplier');
			$data['reference'] = $this->input->post('reference');
			$data['id_barang'] = $this->input->post('barang');
			$data['jml_masuk'] = $this->input->post('jumlah');
			$data['userid'] = $this->session->userdata('userid');

			$this->m_receiving->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('receiving'));
		}
	}

	public function delete($id)
	{
		$this->m_receiving->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('receiving'));
	}

}