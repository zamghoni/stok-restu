<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Delivery extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect (base_url("login"));
		}

		$this->load->model('m_delivery');
		$this->load->library('form_validation');
	}

	private function rules()
	{
		return [
			['field' => 'kode', 'label' => 'No. Transaksi', 'rules'=> 'required'],
			['field' => 'tanggal', 'label' => 'Tgl. Keluar', 'rules'=> 'required'],
			['field' => 'barang', 'label' => 'Barang', 'rules'=> 'required'],
			['field' => 'jumlah', 'label' => 'Jumlah Keluar', 'rules'=> 'required']
		];
	}

	public function index()
	{
		$data['delivery'] = $this->m_delivery->getAll();

		$this->load->view('moddelive/delivery', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data['barang'] = $this->m_delivery->getBarang();
			$data['data'] = $this->m_delivery->no_transaksi()->row_array();
			$this->load->view('moddelive/insert_delivery', $data);
		} else {
			$data['id_brgkeluar'] = $this->input->post('kode');
			$data['tgl_keluar'] = $this->input->post('tanggal');
			$data['id_barang'] = $this->input->post('barang');
			$data['jml_keluar'] = $this->input->post('jumlah');
			$data['userid'] = $this->session->userdata('userid');

			$this->m_delivery->insert($data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil disimpan")</script>');

			redirect(base_url('delivery'));
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules($this->rules());

		if ($this->form_validation->run() === FALSE) {
			$data["delivery"] = $this->m_delivery->getID($id);
			$data['barang'] = $this->m_delivery->getBarang();
			$this->load->view('moddelive/edit_delivery', $data);
		} else {
			$data['id_brgkeluar'] = $this->input->post('kode');
			$data['tgl_keluar'] = $this->input->post('tanggal');
			$data['id_barang'] = $this->input->post('barang');
			$data['jml_keluar'] = $this->input->post('jumlah');
			$data['userid'] = $this->session->userdata('userid');

			$this->m_delivery->edit($id, $data);
			$this->session->set_flashdata('pesan', '<script>alert("Data berhasil diubah")</script>');

			redirect(base_url('delivery'));
		}
	}

	public function delete($id)
	{
		$this->m_delivery->delete($id);
		$this->session->set_flashdata('pesan', '<script>alert("Data berhasil dihapus")</script>');

		redirect(base_url('delivery'));
	}

}
