<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_barang extends CI_Model
{

	Private $table = 'barang';
	private $primary_key = 'id_barang';

	public function getAll()
	{
		$this->db->select('*')
			->from('barang')
			->join('satuan', 'satuan.id_satuan=barang.id_satuan')
			->join('jenis', 'jenis.id_jenis=barang.id_jenis')
			->order_by('id_barang', 'DESC');
            $query = $this->db->get();
            return $query->result();
	}

	public function getSatuan()
	{
		$this->db->select('*')
			->from('satuan');
            $query = $this->db->get();
            return $query->result();
	}

	public function getjenis()
	{
		$this->db->select('*')
			->from('jenis');
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

	public function kode_barang()
  {
    $this->db->select_max('id_barang');
    $this->db->from('barang');
    $query = $this->db->get();
    return $query;
  }

}
