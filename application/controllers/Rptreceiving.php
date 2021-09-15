<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rptreceiving extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_rptreceiving');
	}

	public function index()
	{
		$data['tahun'] = $this->m_rptreceiving->gettahun();
        
        $this->load->view('laporan/rpt_receiving', $data);
	}

	function filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');


		if ($nilaifilter == 1) {
			
			$data['title'] = "Laporan Barang Masuk";
			$data['subtitle'] = "Periode : ".$tanggalawal.' - '.$tanggalakhir;
			$data['datafilter'] = $this->m_rptreceiving->filterbytanggal($tanggalawal,$tanggalakhir);

			$this->load->view('laporan/print_rptreceiving', $data);

		}elseif ($nilaifilter == 2) {
			
			$data['title'] = "Laporan Barang Masuk";
			$data['subtitle'] =  "Dari bulan : ".$bulanawal.' Sampai bulan : '.$bulanakhir.' '.$tahun1;
			$data['datafilter'] = $this->m_rptreceiving->filterbybulan($tahun1,$bulanawal,$bulanakhir);

			$this->load->view('laporan/print_rptreceiving', $data);

		}elseif ($nilaifilter == 3) {
			
			$data['title'] = "Laporan Barang Masuk";
			$data['subtitle'] = ' Tahun : '.$tahun2;
			$data['datafilter'] = $this->m_rptreceiving->filterbytahun($tahun2);

			$this->load->view('laporan/print_rptreceiving', $data);

		}
	}

}