<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  function cariPessenger($where)
  {
    $this->db->select('*');
    $this->db->from('tb_booking');
    $this->db->join('tb_pessenger', 'tb_pessenger.kd_booking = tb_booking.kd_booking', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function cariPenerbangan($where)
  {
    $this->db->select('*');
    $this->db->from('tb_detail');
    $this->db->join('tb_booking', 'tb_booking.kd_booking = tb_detail.kd_booking', 'left');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_detail.no_penerbangan', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function cariPessengerResc($where)
  {
    $this->db->select('*');
    $this->db->from('tb_reschedul');
    $this->db->join('tb_reschedul_pessenger', 'tb_reschedul_pessenger.no_reschedule = tb_reschedul.no_reschedule', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function cariPenerbanganResc($where)
  {
    $this->db->select('*');
    $this->db->from('tb_reschedul');
    $this->db->join('tb_reschedul_detail', 'tb_reschedul_detail.no_reschedule = tb_reschedul.no_reschedule', 'left');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_reschedul_detail.no_penerbangan', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function cariRefund($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->join('tb_booking', 'tb_booking.kd_booking = tb_refund.kd_booking', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function saveRefund($result)
  {
    return $this->db->insert('tb_refund', $result);
  }

  function saveRefundPessenger($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_refund_pessenger', $result);
    }
  }

  function saveRefundDetail($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_refund_detail', $result);
    }
  }

  function cariReschedule($where)
  {
    $this->db->select('*');
    $this->db->from('tb_reschedul');
    $this->db->join('tb_booking', 'tb_booking.kd_booking = tb_reschedul.kd_booking', 'left');

    $this->db->where($where);

    return $this->db->get();
  }

  function cariNewPenerbangan($where, $like, $where2 = null)
  {
    $this->db->select('*');
    $this->db->from('tb_penerbangan');
    $this->db->like('tgl_keberangkatan', $like);
    $this->db->where($where);

    if($where2 != null){
      $this->db->where($where2);
    }

    return $this->db->get();
  }

  function cariPembayaran($where)
  {
    $this->db->select('*');
    $this->db->from('tb_bank_account');
    $this->db->where($where);

    return $this->db->get();
  }

  function saveReschedule($result)
  {
    return $this->db->insert('tb_reschedul', $result);
  }

  function saveReschedulePessenger($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_reschedul_pessenger', $result);
    }
  }

  function saveRescheduleDetail($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_reschedul_detail', $result);
    }
  }

  function updateRute($where, $data)
  {
    $this->db->where($where);
    $this->db->update('tb_detail', $data);
  }

  function updateStatus($where, $status)
  {
    $this->db->where($where);
    $this->db->update('tb_reschedul', $status);
  }


}
