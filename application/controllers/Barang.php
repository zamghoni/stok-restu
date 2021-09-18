<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_barang');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'kode', 'label' => 'Kode Barang', 'rules'=> 'required'],
			['field' => 'nama', 'label' => 'Nama Barang', 'rules'=> 'required'],
			['field' => 'satuan', 'label' => 'Satuan', 'rules'=> 'required'],
			['field' => 'jenis', 'label' => 'Jenis', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->getAll();

		$this->load->view('modbarang/barang', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data['satuan'] = $this->m_barang->getSatuan();
			$data['jenis'] = $this->m_barang->getJenis();
			$data['data'] = $this->m_barang->kode_barang()->row_array();
			$this->load->view('modbarang/insert_barang', $data);
		} else {
			$data['id_barang'] = $this->input->post('kode');
			$data['nm_barang'] = $this->input->post('nama');
			$data['stok'] = $this->input->post('stok');
			$data['id_satuan'] = $this->input->post('satuan');
			$data['id_jenis'] = $this->input->post('jenis');

			$this->m_barang->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('barang'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["barang"] = $this->m_barang->getID($id);
			$data['satuan'] = $this->m_barang->getSatuan();
			$data['jenis'] = $this->m_barang->getJenis();
			$this->load->view('modbarang/edit_barang', $data);
		} else {
			$data['nm_barang'] = $this->input->post('nama');
			$data['id_satuan'] = $this->input->post('satuan');
			$data['id_jenis'] = $this->input->post('jenis');

			$this->m_barang->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('barang'));
		}
	}

	public function delete($id)
	{
		$this->m_barang->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('barang'));
	}

}
