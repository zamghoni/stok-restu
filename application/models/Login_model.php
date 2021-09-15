<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login_model extends CI_Model
{
	function validate($userid,$password){
    $this->db->where('userid',$userid);
    $this->db->where('password',$password);
    $result = $this->db->get('petugas');
    return $result;
  }
}