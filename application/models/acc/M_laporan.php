<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model{

function getRefundsuccess()
{
  $this->db->select('*');
  $this->db->from('tb_refund');

  $this->db->where('tb_refund.refund_status', 'Verify');
  return $this->db->get();
}

function get_refund_kode($get_kode)
{
  $this->db->select('*');
  $this->db->from('tb_refund');
  $this->db->where('no_refund', $get_kode);
  return $this->db->get();
}

}
