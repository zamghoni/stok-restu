<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rptreceiving extends CI_Model {

	function gettahun(){

		$query = $this->db->query("SELECT YEAR(tgl_masuk) AS tahun FROM brg_masuk GROUP BY YEAR(tgl_masuk) ORDER BY YEAR(tgl_masuk) ASC");

		return $query->result();
	}

	function filterbytanggal($tanggalawal,$tanggalakhir){

		$query = $this->db->query("SELECT brg_masuk.*, supplier.*, barang.* FROM brg_masuk LEFT JOIN supplier ON supplier.id_supplier = brg_masuk.id_supplier LEFT JOIN barang on barang.id_barang = brg_masuk.id_barang WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk ASC ");

		return $query->result();
	}

	function filterbybulan($tahun1,$bulanawal,$bulanakhir){

		$query = $this->db->query("SELECT brg_masuk.*, supplier.*, barang.* FROM brg_masuk LEFT JOIN supplier ON supplier.id_supplier = brg_masuk.id_supplier LEFT JOIN barang on barang.id_barang = brg_masuk.id_barang WHERE YEAR(tgl_masuk) = '$tahun1' and MONTH(tgl_masuk) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_masuk ASC ");

		return $query->result();
	}

	function filterbytahun($tahun2){

		$query = $this->db->query("SELECT brg_masuk.*, supplier.*, barang.* FROM brg_masuk LEFT JOIN supplier ON supplier.id_supplier = brg_masuk.id_supplier LEFT JOIN barang on barang.id_barang = brg_masuk.id_barang WHERE YEAR(tgl_masuk) = '$tahun2'  ORDER BY tgl_masuk ASC ");

		return $query->result();
	}

}