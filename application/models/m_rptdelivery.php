<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rptdelivery extends CI_Model {

	function gettahun(){

		$query = $this->db->query("SELECT YEAR(tgl_keluar) AS tahun FROM brg_keluar GROUP BY YEAR(tgl_keluar) ORDER BY YEAR(tgl_keluar) ASC");

		return $query->result();
	}

	function filterbytanggal($tanggalawal,$tanggalakhir){

		$query = $this->db->query("SELECT brg_keluar.*, barang.* FROM brg_keluar LEFT JOIN barang on barang.id_barang = brg_keluar.id_barang WHERE tgl_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_keluar ASC ");

		return $query->result();
	}

	function filterbybulan($tahun1,$bulanawal,$bulanakhir){

		$query = $this->db->query("SELECT brg_keluar.*, barang.* FROM brg_keluar LEFT JOIN barang on barang.id_barang = brg_keluar.id_barang WHERE YEAR(tgl_keluar) = '$tahun1' and MONTH(tgl_keluar) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_keluar ASC ");

		return $query->result();
	}

	function filterbytahun($tahun2){

		$query = $this->db->query("SELECT brg_keluar.*, barang.* FROM brg_keluar LEFT JOIN barang on barang.id_barang = brg_keluar.id_barang WHERE YEAR(tgl_keluar) = '$tahun2'  ORDER BY tgl_keluar ASC ");

		return $query->result();
	}

}