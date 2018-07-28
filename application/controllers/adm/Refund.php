<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refund extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tanggal');
    $this->load->helper('acakhuruf');
    $this->load->model('admin/m_refund');
    //Codeigniter : Write Less Do More
    $this->load->model('admin/m_dashboard');
    $this->load->model('admin/m_tiket');
  }

  //get all refund
  function getAllrefund()
  {
    $data = $this->m_refund->getrefundall();
    echo json_encode($data);
  }
  //---------------

  //---------------
  function getlRefundstatus($id)
  {
    $where = array(
      'refund_status' => $id
    );
    $data = $this->m_refund->getdetailRefund($where);
    echo json_encode($data);
  }
  //----------------

  function index()
  {
    $data['title'] = 'Refund';
    $this->load->view('admin/include/header', $data);
    $data['refund_success'] = $this->m_refund->refund_success()->num_rows();
    $data['refund_cancel']  = $this->m_refund->refund_proses()->num_rows();
    $this->load->view('admin/v_refund', $data);
    $this->load->view('admin/include/footer');
  }

  // action gagal refund ---------------------------------------------------------------------------------
  function actionrefund()
  {
    if(isset($_POST['cancelrefund'])){
      $namalengkap = $this->input->post('namalengkap');
      $emailuser   = $this->input->post('email');
      $norefund    = $this->input->post('no_refund');

        $config = [
 							'useragent' => 'CodeIgniter',
 							'protocol'  => 'smtp',
 							'mailpath'  => '/usr/sbin/sendmail',
 							'smtp_host' => 'ssl://smtp.gmail.com',
 							'smtp_user' => 'lionairsystem@gmail.com',   // Ganti dengan email gmail Anda.
 							'smtp_pass' => 'lionais1234',             // Password gmail Anda.
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

        $this->email->to($emailuser);
        $this->email->from('lionair','customer lion');
        $this->email->subject('Permintaan refund dibatalkan');

        $kd_booking = $this->input->post('kode_booking');
        $where = array(
          'tb_booking.kd_booking' => $kd_booking
        );
        $data['namalengkap']        = $namalengkap;
        $data['no_refund']          = $norefund;
        $html = $this->load->view('mail/v_email_refund_cancel', $data, TRUE);
        $this->email->message($html);
        if($this->email->send() ){
          $this->m_refund->cancelrefund();
          redirect(base_url('adm/dashboard'));
        }else{
          redirect(base_url('adm/dashboard'));
        }
    }
  }
  // action gagal refund ---------------------------------------------------------------------------------




  // data tiket == data penerbangan ----------------------------------------------------------------------
  function confirm_match_updatebooking()
  {
    if(isset($_POST['confirmrefund'])){
      //EKSEKUSI TO EMAIL PARSING//---------------------
      $kd_booking   = $this->input->post('kd_booking');
      $namalengkap  = $this->input->post('namalengkap');
      $emailuser    = $this->input->post('email');
      $norefund     = $this->input->post('no_refund');
      $refund_total = $this->input->post('total');
      //------------------------------------------------
      $whererefund = array(
        'tb_refund_pessenger.no_refund' => $norefund
      );
      $wherekdbooking = array(
          'tb_detail.kd_booking' => $kd_booking
      );
        $config = [
              'useragent' => 'CodeIgniter',
              'protocol'  => 'smtp',
              'mailpath'  => '/usr/sbin/sendmail',
              'smtp_host' => 'ssl://smtp.gmail.com',
              'smtp_user' => 'lionairsystem@gmail.com',   // Ganti dengan email gmail Anda.
              'smtp_pass' => 'lionais1234',             // Password gmail Anda.
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
        $this->email->to($emailuser);
        $this->email->from('lionair','Lion Air');
        $this->email->subject('Permintaan refund Berhasil');

        $norefund_md5 = md5($norefund);
        $data['url']                = 'http://localhost/lionsystem/tiket/datatiket/gettiket?secure_code='.$norefund_md5;
        $data['total_refund']       = $refund_total;
        $data['no_refund']          = $norefund;
        $data['namalengkap']        = $namalengkap;
        $data['daftar_tiket']       = $this->m_dashboard->getrefundtiket($whererefund, $kd_booking);
        $data['daftar_penerbangan'] = $this->m_refund->getpenerbanganRefund($norefund, $wherekdbooking);
        $html = $this->load->view('mail/v_email_refund_success_match', $data, TRUE);
        $this->email->message($html);

        if($this->email->send() ){
          $this->session->set_flashdata('notifadmin', 'Konfirmasi refund berhasil, email telah dikirim kepada pemilik kode booking');

          $this->m_refund->update_confirm_match_updatebooking();
          redirect(base_url('adm/dashboard'));
        }else{
        $this->session->set_flashdata('notifadmin','Gagal Melakukan refund, email tidak dapat kami kirim, silahkan check koneksi internet');
        redirect(base_url('adm/dashboard'));

        }
      }
  }
  // end data tiket == data penerbangan -------------------------------------------------------------------

  // flight == flight and pessenger < pessenger -----------------------------------------------------------
  function confirm_matchpenerbangan_updatebooking()
  {
    if(isset($_POST['confirmrefundmatchpener'])){
      //EKSEKUSI TO EMAIL PARSING//---------------------
      $kd_booking   = $this->input->post('kd_booking');
      $namalengkap  = $this->input->post('namalengkap');
      $emailuser    = $this->input->post('email');
      $norefund     = $this->input->post('no_refund');
      $refund_total = $this->input->post('total');
      //------------------------------------------------
      $whererefund = array(
        'tb_refund_pessenger.no_refund' => $norefund
      );
      $wherekdbooking = array(
          'tb_detail.kd_booking' => $kd_booking
      );

        $config = [
              'useragent' => 'CodeIgniter',
              'protocol'  => 'smtp',
              'mailpath'  => '/usr/sbin/sendmail',
              'smtp_host' => 'ssl://smtp.gmail.com',
              'smtp_user' => 'lionairsystem@gmail.com',   // Ganti dengan email gmail Anda.
              'smtp_pass' => 'lionais1234',             // Password gmail Anda.
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
        $this->email->to($emailuser);
        $this->email->from('lionair','Lion Air');
        $this->email->subject('Permintaan refund Berhasil');

        $norefund_md5 = md5($norefund);
        $data['url']                = 'http://localhost/lionsystem/tiket/datatiket/gettiket?secure_code='.$norefund_md5;
        $data['total_refund']       = $refund_total;
        $data['no_refund']          = $norefund;
        $data['namalengkap']        = $namalengkap;
        $data['daftar_tiket']       = $this->m_dashboard->getrefundtiket($whererefund, $kd_booking);
        $data['daftar_penerbangan'] = $this->m_refund->getpenerbanganRefund($norefund, $wherekdbooking);
        $html = $this->load->view('mail/v_email_refund_success_match', $data, TRUE);
        $this->email->message($html);

        if($this->email->send() ){
            $this->m_refund->confirm_matchpenerbangan_updatebooking();
            $this->m_refund->updatePessenger();
            $this->m_refund->insertdetail();
            $this->session->set_flashdata('notifadmin', 'Konfirmasi refund berhasil, email telah dikirim kepada pemilik kode booking');

            redirect(base_url('adm/dashboard'));
        }else{
            $this->session->set_flashdata('notifadmin','Gagal Melakukan refund, email tidak dapat kami kirim, silahkan check koneksi internet');
        redirect(base_url('adm/dashboard'));
          }
      //redirect(base_url('adm/dashboard'));
    }
  }
  //--------------------------------------------------------------------------------------------------------------------------------------------------

  // pessenger == pessenger && flight < flight  ------------------------------------------------------------------------------------------------------
  function confirm_matchpessenger_updatebooking()
  {
    if(isset($_POST['confirmrefund'])){

      //EKSEKUSI TO EMAIL PARSING//---------------------
      $kd_booking   = $this->input->post('kd_booking');
      $namalengkap  = $this->input->post('namalengkap');
      $emailuser    = $this->input->post('email');
      $norefund     = $this->input->post('no_refund');
      $refund_total = $this->input->post('total');
      //------------------------------------------------
      $whererefund = array(
        'tb_refund_pessenger.no_refund' => $norefund
      );
      $wherekdbooking = array(
          'tb_detail.kd_booking' => $kd_booking
      );
        $config = [
              'useragent' => 'CodeIgniter',
              'protocol'  => 'smtp',
              'mailpath'  => '/usr/sbin/sendmail',
              'smtp_host' => 'ssl://smtp.gmail.com',
              'smtp_user' => 'lionairsystem@gmail.com',   // Ganti dengan email gmail Anda.
              'smtp_pass' => 'lionais1234',             // Password gmail Anda.
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
        $this->email->to($emailuser);
        $this->email->from('lionair','Lion Air');
        $this->email->subject('Permintaan refund Berhasil');

        $norefund_md5 = md5($norefund);
        $data['url']                = 'http://localhost/lionsystem/tiket/datatiket/gettiket?secure_code='.$norefund_md5;
        $data['total_refund']       = $refund_total;
        $data['no_refund']          = $norefund;
        $data['namalengkap']        = $namalengkap;
        $data['daftar_tiket']       = $this->m_dashboard->getrefundtiket($whererefund,$kd_booking);
        $data['daftar_penerbangan'] = $this->m_refund->getpenerbanganRefund($norefund, $wherekdbooking);
        $html = $this->load->view('mail/v_email_refund_success_match', $data, TRUE);
        $this->email->message($html);

        if($this->email->send() ){
            $this->m_refund->deletedetailmaster();
            $this->m_refund->confirm_matchpenerbangan_updatebooking();
            $this->m_refund->insertdetail();
            $this->m_refund->updatePessenger();
            $this->session->set_flashdata('notifadmin', 'Konfirmasi refund berhasil, email telah dikirim kepada pemilik kode booking');

            $this->m_refund->insertPessenger();
            // redirect(base_url('adm/dashboard'));
            $this->session->set_flashdata('notifadmin', 'Konfirmasi refund berhasil, email telah dikirim kepada pemilik kode booking');

            redirect(base_url('adm/dashboard'));
        }else{
            $this->session->set_flashdata('notifadmin','Gagal Melakukan refund, email tidak dapat kami kirim, silahkan check koneksi internet');
        redirect(base_url('adm/dashboard'));
        }
    }
  }
  // end pessenger == pessenger && flight < flight  -----------------------------------------------------------------
  function match_all()
  {
    if(isset($_POST['confirmrefund']) )
    {
            //EKSEKUSI TO EMAIL PARSING//---------------------
            $acakhuruf    = $this->input->post('acakhuruf');
            $kd_booking   = $this->input->post('kd_booking');
            $namalengkap  = $this->input->post('namalengkap');
            $emailuser    = $this->input->post('email');
            $norefund     = $this->input->post('no_refund');
            $refund_total = $this->input->post('total');
            //------------------------------------------------
            $whererefund = array(
              'tb_refund_pessenger.no_refund' => $norefund
            );
            $wherekdbooking = array(
                'tb_detail.kd_booking' => $kd_booking
            );

            $config = [
                  'useragent' => 'CodeIgniter',
                  'protocol'  => 'smtp',
                  'mailpath'  => '/usr/sbin/sendmail',
                  'smtp_host' => 'ssl://smtp.gmail.com',
                  'smtp_user' => 'lionairsystem@gmail.com',   // Ganti dengan email gmail Anda.
                  'smtp_pass' => 'lionais1234',             // Password gmail Anda.
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
              $this->email->to($emailuser);
              $this->email->from('lionair','Lion Air');
              $this->email->subject('Permintaan refund Berhasil');

              $norefund_md5 = md5($norefund);
              $data['newKodebooking']     = $acakhuruf;
              $data['url']                = 'http://localhost/lionsystem/tiket/datatiket/gettiket?secure_code='.$norefund_md5;
              $data['total_refund']       = $refund_total;
              $data['no_refund']          = $norefund;
              $data['namalengkap']        = $namalengkap;
              $data['daftar_tiket']       = $this->m_dashboard->getrefundtiket($whererefund,$kd_booking);
              $data['daftar_penerbangan'] = $this->m_refund->getpenerbanganRefund($norefund, $wherekdbooking);
              $html = $this->load->view('mail/v_email_refund_matchAll', $data, TRUE);
              $this->email->message($html);
              if($this->email->send() )
              {
                  $this->m_refund->match_insert_new_kodebooking();
                  $this->session->set_flashdata('notifadmin', 'Konfirmasi refund berhasil, email telah dikirim kepada pemilik kode booking');

                  redirect(base_url('adm/dashboard'));
              }
            }
          }

  //--------------------------------------------------------------------------------------------------
  function success_refund()
  {
    $selectRefund = $this->m_refund->refund_success();
    $output = '
          <div class="card">
             <div class="card-header bg-primary">
               <h3 class="card-title">Data refund success</h3>
             </div>

             <div class="card-body p-0">
               <table class="table table-condensed">
                 <tr>
                   <th>No</th>
                   <th>No. refund</th>
                   <th>Tanggal refund</th>
                   <th>Kode booking</th>
                   <th>Email Pengaju</th>
                   <th>Total refund</th>
                   <th>Status refund</th>
                   <th>Konfirmasi oleh</th>
                   <th>Opsi</th>
                   <th></th>
                 </tr>
      ';
      if($selectRefund->num_rows() > 0 ){

        $no = 1;
        foreach($selectRefund->result() as $key){
          if($key->refund_status == "verify"){
            $status = 'Berhasil';
          }
          $output .= '
                    <tr>
                      <td>'.$no++.'</td>
                      <td>'.$key->no_refund.'</td>
                      <td>'.$key->tgl_refund.'</td>
                      <td>'.$key->kd_booking.'</td>
                      <td>'.$key->refund_email.'</td>
                      <td>Rp.'.number_format($key->total_refund) .'</td>
                      <td>'.$key->refund_status.'</td>
                      <td>'.$key->confirm_by.'</td>
                      <td>
                        <form class="form-detail" method="post">
                            <input type="hidden" id="'.$key->no_refund.'" name="no_refund" value="'.$key->no_refund.'">
                            <input type="hidden" id="'.$key->refund_status.'" name="status_refund" value="'.$key->refund_status.'">
                            <a href="javascript:;" class="btn btn-info btn-xs btn-detail"><i class="fa fa-info"></i></a>
                        </form>
                       </td>
                    </tr>
          ';
        }
      }else{
        $output .= '
                    <tr>
                      <td colspan="8" class="text-center"><h4> Data Tidak Ada </h4> </td>
                    </tr>
        ';
      }


   $output .= '
          </table>
        </div>

      </div>
   ';

    echo $output;
  }

  function proses_refund()
  {


    $selectproses = $this->m_refund->refund_proses();
    $output = '
          <div class="card">
             <div class="card-header bg-warning">
               <h3 class="card-title">Data refund Cancel</h3>
             </div>

             <div class="card-body p-0">
               <table class="table table-condensed">
                 <tr>
                   <th>No</th>
                   <th>No. refund</th>
                   <th>Tanggal refund</th>
                   <th>Kode booking</th>
                   <th>Email Pengaju</th>
                   <th>Total refund</th>
                   <th>Status refund</th>
                   <th>Konfirmasi oleh</th>
                   <th></th>
                 </tr>
      ';

    if($selectproses->num_rows() > 0 ){
      $no = 1;
      foreach($selectproses->result() as $key){
        $output .= '
                  <tr>
                    <td>'.$no++.'</td>
                    <td>'.$key->no_refund.'</td>
                    <td>'.$key->tgl_refund.'</td>
                    <td>'.$key->kd_booking.'</td>
                    <td>'.$key->refund_email.'</td>
                    <td>Rp '. number_format($key->total_refund) .'</td>
                    <td>'.$key->refund_status.'</td>
                    <td>'.$key->confirm_by.'</td>
                  </tr>
        ';
      }
    }else{
      $output .= '
                  <tr>
                    <td colspan="8" class="text-center"><h4> Data Tidak Ada </h4> </td>
                  </tr>
      ';
    }
   $output .= '
          </table>
        </div>

      </div>
   ';


    echo $output;
  }

  function success_detail()
  {
    $no_refund = $this->input->post('no_refund');
    $status    = $this->input->post('status_refund');

    $selectPenumpang   = $this->m_refund->refund_penumpang($no_refund);
    $selectPenerbangan = $this->m_refund->refund_penerbangan($no_refund);

    $output = '
    <div class="row">

      <div class="col-md-5">
          <div class="card">
              <div class="card-header bg-danger">
                <h3 class="card-title">Penumpang</h3>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>No. Tiket</th>
                    <th>Nama Penumpang</th>
                  </tr>
      ';
      $no = 1;
      foreach($selectPenumpang->result() as $key_penumpang){
        $output .= '
              <tr>
                <td>'.$no++.' </td>
                <td>'.$key_penumpang->no_tiket.'</td>
                <td>'.$key_penumpang->nama_pessenger.'</td>

              </tr>
        ';
      }
      $output .= '
                </table>
              </div>
            </div>
      </div>
      ';

      $output .= '
      <div class="col-md-2 text-center">
        <img src="'.base_url('assets/img/arah.png').' " class="img-responsive" alt="" width="180px;">
      </div>
      ';

      $output .= '
      <div class="col-md-5">
      <div class="card">
          <div class="card-header bg-danger">
            <h3 class="card-title">Penerbangan</h3>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <tr>
                <th>No. Penerbangan</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan </th>
              </tr>
      ';

      foreach($selectPenerbangan->result() as $key_penerbangan){
        $output .= '
                <tr>
                  <td>'.$key_penerbangan->no_penerbangan.'</td>
                  <td>'.$key_penerbangan->kota_asal.'</td>
                  <td>'.$key_penerbangan->kota_tujuan.' </td>
                </tr>
        ';
      }

      $output .= '
            </table>
          </div>
        </div>
      </div>
    </div>

     ';

     $output .= ' <a href="javascript:;" class="btn btn-danger btn-back"><i class="fa fa-arrow-circle-left fa-4x" > <i></a>';



     echo $output;
  }





}
