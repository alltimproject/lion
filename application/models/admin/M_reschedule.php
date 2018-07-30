<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reschedule extends CI_Model{

  function get_reschedule()
  {
    return $this->db->get('tb_reschedul');
  }

  function get_reschedule_kode($kode)
  {
    $this->db->select('*');
    $this->db->from('tb_reschedul');
    $this->db->where('no_reschedule', $kode);
    return $this->db->get();
  }

}
