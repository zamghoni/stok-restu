<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_grafik extends CI_Model
{
function statistik_receiving() { 
	$sql = $this->db->query("
		
		select
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=01) AND (YEAR(tgl_masuk)=2021))),0) AS `Januari`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=02) AND (YEAR(tgl_masuk)=2021))),0) AS `Februari`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=03) AND (YEAR(tgl_masuk)=2021))),0) AS `Maret`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=04) AND (YEAR(tgl_masuk)=2021))),0) AS `April`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=05) AND (YEAR(tgl_masuk)=2021))),0) AS `Mei`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=06) AND (YEAR(tgl_masuk)=2021))),0) AS `Juni`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=07) AND (YEAR(tgl_masuk)=2021))),0) AS `Juli`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=08) AND (YEAR(tgl_masuk)=2021))),0) AS `Agustus`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=09) AND (YEAR(tgl_masuk)=2021))),0) AS `September`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=10) AND (YEAR(tgl_masuk)=2021))),0) AS `Oktober`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=11) AND (YEAR(tgl_masuk)=2021))),0) AS `November`,
		ifnull((SELECT count(id_brgmasuk) FROM (brg_masuk)WHERE((Month(tgl_masuk)=12) AND (YEAR(tgl_masuk)=2021))),0) AS `Desember`
		from brg_masuk GROUP BY Month(tgl_masuk) and YEAR (tgl_masuk)");
		  
		return $sql;  
	}
}