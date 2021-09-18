<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_supplier extends CI_Model
{

	Private $table = 'supplier';
	private $primary_key = 'id_supplier';

	public function getAll()
	{
		return $this->db->get($this->table)->result();
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

	public function kode_supplier()
  {
    $this->db->select_max('id_supplier');
    $this->db->from('supplier');
    $query = $this->db->get();
    return $query;
  }

}
