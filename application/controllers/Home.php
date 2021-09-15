<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->model('m_grafik');
		$this->load->model('m_home');
	}

	public function index() {  
	   
	   foreach($this->m_grafik->statistik_receiving()->result_array() as $row) {
			$data['hasil'][]=(float)$row['Januari'];
			$data['hasil'][]=(float)$row['Februari'];
			$data['hasil'][]=(float)$row['Maret'];
			$data['hasil'][]=(float)$row['April'];
			$data['hasil'][]=(float)$row['Mei'];
			$data['hasil'][]=(float)$row['Juni'];
			$data['hasil'][]=(float)$row['Juli'];
			$data['hasil'][]=(float)$row['Agustus'];
			$data['hasil'][]=(float)$row['September'];
			$data['hasil'][]=(float)$row['Oktober'];
			$data['hasil'][]=(float)$row['November'];
			$data['hasil'][]=(float)$row['Desember'];
		}
           //echo json_encode($data);
		$data['satuan'] = $this->m_home->hitungSatuan();
		$data['jenis'] = $this->m_home->hitungJenis();
		$data['barang'] = $this->m_home->hitungBarang();
		$data['supplier'] = $this->m_home->hitungSupplier();
		$data['receiving'] = $this->m_home->hitungReceiving();
		$data['delivery'] = $this->m_home->hitungDelivery();
		$this->load->view('home', $data);			
	}
}