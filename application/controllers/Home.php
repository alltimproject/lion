<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    $this->load->helper('user');
  }

  function index()
  {
    $data['title'] = 'Home | Lion Air';
    $this->load->view('user/v_home', $data);
  }

  function home()
  {
    $this->load->view('user/v_term_condition');
  }

  function booking_info($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_booking_info', $data);
  }

  function refund($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_form_refund', $data);
  }

  function reschedule($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_form_reschedule', $data);
  }

  function cari_booking($kd_booking)
  {
    $where = array(
			'tb_booking.kd_booking' => strtoupper($kd_booking),
      'tb_booking.status' => 'Confirmed'
		);

    $where2 = array(
      'tb_booking.kd_booking' => strtoupper($kd_booking),
      'tb_booking.status' => 'Confirmed',
      'tb_refund.refund_status' => 'onproses'
    );

    $where3 = array(
      'tb_booking.kd_booking' => strtoupper($kd_booking),
      'tb_booking.status' => 'Confirmed',
      'tb_reschedul.reschedul_status' => 'onproses'
    );

    $data['booking'] = strtoupper($kd_booking);

    $data['pessenger'] = $this->m_user->cariPessenger($where)->result();
    $data['jumlah'] = $this->m_user->cariPessenger($where)->num_rows();
    $data['penerbangan'] = $this->m_user->cariPenerbangan($where)->result();

    $data['refund'] = $this->m_user->cariRefund($where2)->result();
    $data['reschedule'] = $this->m_user->cariReschedule($where3)->result();

    $data['verifikasi'] = sprintf("%03s", kodeVerifikasi(6));

    echo json_encode($data);
  }

  function konfirmasi_pembayaran()
  {
    $kd_pembayaran = $this->input->post('kd_pembayaran');
    $no_reschedule = $this->input->post('no_reschedule');
    $kd_booking = $this->input->post('kd_booking');

    $where = array(
      'kd_pembayaran' => $kd_pembayaran
    );

    $where2 = array(
      'no_reschedule' => $no_reschedule
    );

    $where3 = array(
      'tb_booking.kd_booking' => $kd_booking
    );

    $where4 = array(
      'tb_reschedul.no_reschedule' => $no_reschedule
    );

    $pembayaran = $this->m_user->cariPembayaran($where);
    $reschedule = $this->m_user->cariReschedule($where2);

    $pessenger = $this->m_user->cariPessenger($where3);
    $detail = $this->m_user->cariPenerbangan($where3);
    $resc_pessenger = $this->m_user->cariPessengerResc($where4);
    $resc_detail = $this->m_user->cariPenerbanganResc($where4);

    if($pembayaran->num_rows() == 1){
      foreach($pembayaran->result() as $key)
      {
        $fetch_pembayaran = $key->kd_pembayaran;
        $total_pembayaran = $key->total_pembayaran;
      }

      foreach($reschedule->result() as $key)
      {
        $total_reschedule = $key->total_reschedul;
        $email = $key->email;
      }

      if($kd_pembayaran == $fetch_pembayaran && $total_pembayaran == $total_reschedule){


        // if($pessenger->num_rows() == $resc_pessenger->num_rows() && $detail->num_rows() == $resc_detail->num_rows())
        // {

          $data = array();
          $data1 = array();
          foreach($resc_detail->result() as $key)
          {
            $data1[] = $key->no_penerbangan;
            $data[] = $key->no_penerbangan_baru;
          }

          for($i = 0; $i < count($data); $i++)
          {
            $kondisi = array(
              'no_penerbangan' => $data1[$i]
            );

            $update = array(
              'no_penerbangan' => $data[$i]
            );

            $this->m_user->updateRute($kondisi, $update);
          }


          $status = array(
            'reschedul_status' => 'Verify'
          );

          $cek = $this->m_user->updateStatus($where2, $status);
          $config = [
                'useragent' => 'CodeIgniter',
                'protocol'  => 'smtp',
                'mailpath'  => '/usr/sbin/sendmail',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_user' => 'kampungsiagabencana2018@gmail.com',   // Ganti dengan email gmail Anda.
                'smtp_pass' => 'kampungsiaga2018',             // Password gmail Anda.
                'smtp_port' => 465,
                'smtp_keepalive' => TRUE,
                'smtp_crypto' => 'SSL',
                'wordwrap'  => TRUE,
                'wrapchars' => 80,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'validate'  => TRUE,
                'crlf'      => "\r\n",
                'newline'   => "\r\n",
            ];
          $config['mailtype'] = 'html';

          $this->email->initialize($config);
          $this->email->from('lionsystem@gmail.com','Lion System');
          $this->email->to($email);
          $this->email->subject('Permintaan Reschedule');
          $output['detail'] = $detail->result();
          $output['tiket'] = $pessenger->result();
          $output['kode'] = $kd_booking;
          $message = $this->load->view('mail/v_email_reschedule', $output,  TRUE);
          $this->email->message($message);
            $cek2 = $this->email->send();
          // if($cek){
          //
          //   // if($cek2){
          //   //   echo "Berhasil melakukan Reschedule";
          //   // } else {
          //   //   echo "Tidak berhasil mengirim email";
          //   // }
          // } else {
          //   echo "Tidak berhasil melakukan Reschedule";
          // }

          
        // }else if($pessenger->num_rows() != $resc_pessenger->num_rows() && $detail->num_rows() == $resc_detail->num_rows())
        // {
        //   echo "SPLIT1";
        // } else if($pessenger->num_rows() == $resc_pessenger->num_rows() && $detail->num_rows() != $resc_detail->num_rows())
        // {
        //   echo "SPLIT2";
        // }else if($pessenger->num_rows() != $resc_pessenger->num_rows() && $detail->num_rows() != $resc_detail->num_rows())
        // {
        //   echo "SPLIT3";
        // }
        // echo 'Pessenger :'.$pessenger->num_rows().' - '.$resc_pessenger->num_rows().' & Penerbangan :'.$detail->num_rows().' - '.$resc_detail->num_rows();

      } else {
        echo "Total pembayaran tidak sesuai dengan Total Reschedule";
      }

    }else {
      echo "Kode Pembayaran tidak ditemukan";
    }

  }

  function json_penerbangan()
  {
    $no_penerbangan = $this->input->post('no_penerbangan');
    $kota_asal = $this->input->post('kota_asal');
    $kota_tujuan = $this->input->post('kota_tujuan');
    $tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
    $kelas = $this->input->post('kelas');

    if($kelas == 'Promo'){
      $where2 = "no_penerbangan != '$no_penerbangan'";
    } elseif($kelas == 'Ekonomi'){
      $where2 = "class != 'Promo' AND no_penerbangan != '$no_penerbangan'";
    } elseif($kelas == 'Bisnis'){
      $where2 = "class = 'Bisnis' AND no_penerbangan != '$no_penerbangan'";
    }

    $where = array(
      'kota_asal' => $kota_asal,
      'kota_tujuan' => $kota_tujuan
    );

    $data['penerbangan'] = $this->m_user->cariNewPenerbangan($where, $tgl_keberangkatan, $where2)->result();
    echo json_encode($data);
  }

  function proses_refund()
  {
    $post = $this->input->post();
    $tiket = array();
    $penerbangan = array();
    // $total_post = count($post['no_tiket']);

    $kode = 'RF'.sprintf("%03s", buatKode(4));

    $data = array(
      'no_refund' => $kode,
      'kd_booking' => $this->input->post('kd_booking'),
      'refund_name' => $this->input->post('refund_gelar').' '.$this->input->post('refund_first').' '.$this->input->post('refund_last'),
      'refund_alamat' => $this->input->post('refund_alamat'),
      'refund_telepon' => $this->input->post('refund_telepon'),
      'refund_email' => $this->input->post('refund_email'),
      'total_refund' => $this->input->post('total_refund'),
      'refund_status' => 'onproses',
      'nama_bank' => $this->input->post('nama_bank'),
      'cabang' => $this->input->post('cabang'),
      'no_rekening' => $this->input->post('no_rekening'),
      'nama_rekening' => $this->input->post('nama_rekening')
    );

    foreach($post['no_tiket'] AS $key => $val)
    {
      $tiket[] = array(
        'no_refund' => $kode,
        'no_tiket' => $post['no_tiket'][$key]
      );
    }

    foreach($post['no_penerbangan'] AS $key => $val)
    {
      $penerbangan[] = array(
        'no_refund' => $kode,
        'no_penerbangan' => $post['no_penerbangan'][$key]
      );
    }

    $cek = $this->m_user->saveRefund($data);
    if($cek) {
      $cek2 = $this->m_user->saveRefundPessenger($tiket);
      if($cek2) {
        $cek3 = $this->m_user->saveRefundDetail($penerbangan);
        if($cek3) {
          echo "berhasil";
        } else {
          echo "gagal";
        }
      } else {
        echo "gagal";
      }
    } else {
      echo "gagal";
    }
  }

  function proses_reschedule()
  {
    $post = $this->input->post();
    $tiket = array();
    $penerbangan = array();

    $kode = 'RS'.sprintf("%03s", buatKode(4));

    $data = array(
      'no_reschedule' => $kode,
      'kd_booking' => $this->input->post('kd_booking'),
      'total_reschedul' => $this->input->post('total_reschedule'),
      'reschedul_name' => $this->input->post('reschedule_gelar').' '.$this->input->post('reschedule_first').' '.$this->input->post('reschedule_last'),
      'reschedul_alamat' => $this->input->post('reschedule_alamat'),
      'reschedul_telepon' => $this->input->post('reschedule_telepon'),
      'reschedul_email' => $this->input->post('reschedule_email'),
      'reschedul_status' => 'onproses'
    );

    foreach($post['no_tiket'] AS $key => $val)
    {
      $tiket[] = array(
        'no_reschedule' => $kode,
        'no_tiket' => $post['no_tiket'][$key]
      );
    }

    foreach($post['no_penerbangan'] AS $key => $val)
    {
      $penerbangan[] = array(
        'no_reschedule' => $kode,
        'no_penerbangan' => $post['no_penerbangan'][$key],
        'no_penerbangan_baru' => $post['no_penerbangan_baru'][$key]
      );
    }

    $cek = $this->m_user->saveReschedule($data);
    if($cek) {
      $cek2 = $this->m_user->saveReschedulePessenger($tiket);
      if($cek2) {
        $cek3 = $this->m_user->saveRescheduleDetail($penerbangan);
        if($cek3){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      } else {
        echo "gagal";
      }
    } else {
      echo "gagal";
    }
  }

  function mailKode()
  {

    $kode = sprintf("%03s", kodeVerifikasi(6));
    $email_pic = $this->input->post('email_pic');

    $config = [
          'useragent' => 'CodeIgniter',
          'protocol'  => 'smtp',
          'mailpath'  => '/usr/sbin/sendmail',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_user' => 'kampungsiagabencana2018@gmail.com',   // Ganti dengan email gmail Anda.
          'smtp_pass' => 'kampungsiaga2018',             // Password gmail Anda.
          'smtp_port' => 465,
          'smtp_keepalive' => TRUE,
          'smtp_crypto' => 'SSL',
          'wordwrap'  => TRUE,
          'wrapchars' => 80,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'validate'  => TRUE,
          'crlf'      => "\r\n",
          'newline'   => "\r\n",
      ];
    $config['mailtype'] = 'html';

    $this->email->initialize($config);
    $this->email->from('lionsystem@gmail.com','Lion System');
    $this->email->to($email_pic);
    $this->email->subject('Lion Verification Code');
    $output['kd_verifikasi'] = $kode;
    $message = $this->load->view('user/v_email_verifikasi', $output,  TRUE);
    $this->email->message($message);
    $cek = $this->email->send();

    if($cek)
    {
      echo $kode;
    } else {
      echo "gagal";
      // show_error($this->email->print_debugger());
    }
  }



}
