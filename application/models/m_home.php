<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_home extends CI_Model
{
	
  public function hitungSatuan()
	{   
    $query = $this->db->get('satuan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function hitungJenis()
  {   
    $query = $this->db->get('jenis');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function hitungBarang()
  {   
    $query = $this->db->get('barang');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function hitungSupplier()
  {   
    $query = $this->db->get('supplier');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function hitungReceiving()
  {   
    $query = $this->db->get('brg_masuk');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function hitungDelivery()
  {   
    $query = $this->db->get('brg_keluar');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

}