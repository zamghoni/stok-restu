<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_delivery extends CI_Model
{
	
	Private $table = 'brg_keluar';
	private $primary_key = 'id_brgkeluar';

	public function getAll()
	{
		$this->db->select('*')
			->from('brg_keluar')
			->join('barang', 'barang.id_barang=brg_keluar.id_barang')
			->order_by('id_brgkeluar', 'DESC');
            $query = $this->db->get();
            return $query->result();
	}

	public function getBarang()
	{
		$this->db->select('*')
			->from('barang');
            $query = $this->db->get();
            return $query->result();
	}

	public function getID($id)
	{
		return $this->db->get_where($this->table, array($this->primary_key => $id))->result();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function edit($id, $data)
	{
		$this->db->update($this->table, $data, array($this->primary_key => $id));
	}

	public function delete($id)
	{
		$this->db->delete($this->table, array($this->primary_key => $id));
	}
}