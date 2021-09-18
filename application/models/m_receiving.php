<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_receiving extends CI_Model
{

	Private $table = 'brg_masuk';
	private $primary_key = 'id_brgmasuk';

	public function getAll()
	{
		$this->db->select('*')
			->from('brg_masuk')
			->join('supplier', 'supplier.id_supplier=brg_masuk.id_supplier')
			->join('barang', 'barang.id_barang=brg_masuk.id_barang')
			->order_by('id_brgmasuk', 'DESC');
            $query = $this->db->get();
            return $query->result();
	}

	public function getSupplier()
	{
		$this->db->select('*')
			->from('supplier');
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

	public function no_transaksi()
  {
    $this->db->select_max('id_brgmasuk');
    $this->db->from('brg_masuk');
    $query = $this->db->get();
    return $query;
  }
}
