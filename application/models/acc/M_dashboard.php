<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  function getRefund()
  {
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->where('refund_status', 'Verify');
    return $this->db->get();
  }

  function pertanggal_laporan($from,$to)
  {
    return $this->db->query("SELECT * FROM tb_refund WHERE tgl_refund BETWEEN '$from' AND '$to '");
  }

}
