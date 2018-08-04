<div class="main main-raised">
  <div class="section">
    <div class="container">
      <form class="form-reschedule">
        <div class="wizards">
            <div class="progressbar">
                <div class="progress-line" data-now-value="19.66" data-number-of-steps="5" style="width: 19.66%;"></div> <!-- 19.66% -->
            </div>
            <div class="form-wizard active">
                <div class="wizard-icon"><i class="fa fa-user"></i></div>
                <p>Pilih Tiket</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-plane"></i></div>
                <p>Pilih Rute</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-plane"></i></div>
                <p>Pilih Rute Baru</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-money"></i></div>
                <p>Calc Reschedule</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                <p>Form Reschedule</p>
            </div>
          </div>

          <div class="alert alert-warning"><i class="fa fa-warning"></i></div>

          <fieldset>
            <input type="hidden" name="kd_booking" id="kd_booking" value="<?= $booking ?>">
            <div id="pilih_tiket"></div>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-danger" id="batal">Cancel</button>
                <button type="button" class="btn btn-next" target="pilih-rute">Next</button>
            </div>
          </fieldset>
          <fieldset>
            <div id="pilih_penerbangan"></div>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next" target="pilih-newrute">Next</button>
            </div>
          </fieldset>
          <fieldset>
            <div id="new_rute"></div>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next" target="calc-reschedule">Next</button>
            </div>
          </fieldset>
          <fieldset>
            <input type="hidden" name="harga_lama" id="harga_lama">
            <input type="hidden" name="harga_baru" id="harga_baru">
            <input type="hidden" name="selisih" id="selisih">
            <input type="hidden" name="denda" id="denda">
            <input type="hidden" name="total_reschedule" id="total_reschedule">

            <h3 class="title">Detail Payment</h3>
            <table class="table table-bordered table-hover">
              <tr>
                <th>Previous Payment</th>
                <td align="right" id="payment_lama">0</td>
              </tr>
              <tr>
                <th>Present Payment</th>
                <td align="right" id="payment_baru">0</td>
              </tr>
              <tr>
                <th>Balance Amount</th>
                <td align="right" id="payment_selisih">0</td>
              </tr>
              <tr>
                <th>Reschedule Fee</th>
                <td align="right" id="payment_fee">0</td>
              </tr>
              <tr>
                <th class="active">Total Payment</th>
                <td align="right" id="payment_total">0</td>
              </tr>
            </table>

            <h3 class="title">Payment Info</h3>
            <div class="card">
              <div class="card-body">
                17961631913
                <div class="pull-right">
                  <img src="<?= base_url().'images/BCA.png' ?>" style="width: 50px; width: 50px;">
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                212361361777
                <div class="pull-right">
                  <img src="<?= base_url().'images/Mandiri.png' ?>" style="width: 50px; width: 50px;">
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                81376913113211
                <div class="pull-right">
                  <img src="<?= base_url().'images/BNI.png' ?>" style="width: 50px; width: 50px;">
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                98136138671
                <div class="pull-right">
                  <img src="<?= base_url().'images/BRI.png' ?>" style="width: 50px; width: 50px;">
                </div>
              </div>
            </div>

            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="agreement" type="checkbox">
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                I agree the <a href="<?= base_url().'#/home' ?>" target="_blank">Term And Condition</a>
              </label>
            </div>
            <p><i>* Apabila terdapat selisih atau denda, maka anda harus melakukan transfer ke salah satu rekening yang tertera di atas sebagai konfirmasi perubahan jadwal pada rute anda.</i></p>

            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next" target="form-reschedule">Next</button>
            </div>
          </fieldset>
          <fieldset>
            <h4 class="title"><i class="fa fa-user"></i> Identitas Reschedule</h4>
            <div class="form-group">
              <label>Gelar</label>
              <select class="form-control" name="reschedule_gelar" id="reschedule_gelar">
                <option value="">--Pilih Gelar--</option>
                <option value="Mr. ">Mr. </option>
                <option value="Mrs. ">Mrs. </option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Depan</label>
              <input type="text" name="reschedule_first" id="reschedule_first" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Belakang</label>
              <input type="text" name="reschedule_last" id="reschedule_last" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="reschedule_alamat" id="reschedule_alamat" rows="8" cols="80" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="reschedule_telepon" id="reschedule_telepon" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="reschedule_email" id="reschedule_email" class="form-control">
            </div>

            <h4 class="title">Kode Verifikasi</h4>
            <p>
              Kode verifikasi akan dikirim ke email <b id="email_pic"></b>. Klik <button type="button" class="btn btn-sm btn-primary" id="kirim_kode">Kirim Kode</button> untuk mengirimkan Kode Verifikasi.
            </p>

            <div class="form-group">
              <input type="text" name="kode_verifikasi" id="kode_verifikasi" class="form-control" placeholder="6 Digit Kode Verifikasi" maxlength="6">
            </div>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
            </div>
          </fieldset>
      </form>
    </div>
  </div>
</div>

<div id="flight-dialog"></div>

<script type="text/javascript">

  /* --------------------------- MAIN FUNCTION -------------------------- */

  // PROGRESS BAR ACTIVE
  function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if(direction == 'right') {
      new_value = now_value + ( 100 / number_of_steps );
    }
    else if(direction == 'left') {
      new_value = now_value - ( 100 / number_of_steps );
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
  }

  // MAKE DIALOG NEW ROUTE
  function flight_dialog(no_penerbangan, kota_asal, kota_tujuan, tgl_keberangkatan, kelas)
  {
      var modal_content = `<div id="flight_${no_penerbangan}" class="new_flight" title="Flight for ${no_penerbangan}">`;
      load_flight(no_penerbangan, kota_asal, kota_tujuan, tgl_keberangkatan, kelas);
      modal_content += `<div id="data-penerbangan-${no_penerbangan}" style="height: 400px;  overflow-x: hidden; overflow-y: scroll; margin-bottom: 24px; padding: 16px;"></div>`;
      modal_content += `<div>`;

      $('#flight-dialog').html(modal_content);
  }

  // LOAD DATA NEW FLIGHT
  function load_flight(no_penerbangan, kota_asal, kota_tujuan, tgl_keberangkatan, kelas)
  {
    $.ajax({
      url: '<?= base_url().'home/json_penerbangan' ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        no_penerbangan: no_penerbangan,
        kota_asal: kota_asal,
        kota_tujuan,
        tgl_keberangkatan: tgl_keberangkatan,
        kelas: kelas
      },
      success: function(data){
        var html = '';
        if(data.penerbangan.length > 0)
        {
          $.each(data.penerbangan, function(k, v){
            html += '<div class="card">';
              html += '<div class="card-body">';
                html += '<h6 class="card-subtitle mb-2 text-muted">'+v.no_penerbangan+' - '+v.class;
                html += '<div class="pull-right"><b>Rp. '+v.harga_tiket+'</b></div>';
                html += '</h6>';
                html += '<p class="card-text">'+v.kota_asal+'<br/>'+v.tgl_keberangkatan+'</p>';
                html += '<div class="line-home"></div>';
                html += '<p class="card-text">'+v.kota_tujuan+'<br/>'+v.tgl_tiba+'</p>';
                html += '<div class="pull-right"><button class="btn btn-sm btn-success" id="pilih-new" data-baru="'+v.no_penerbangan+'" data-lama="'+no_penerbangan+'" data-harga="'+v.harga_tiket+'" data-kota_asal="'+v.kota_asal+'" data-kota_tujuan="'+v.kota_tujuan+'" data-kelas="'+v.class+'" data-tgl_keberangkatan="'+v.tgl_keberangkatan+'" data-tgl_tiba="'+v.tgl_tiba+'">Pilih</button></div>'
              html += '</div>';
            html += '</div>';
          });
        } else {
          html += '<center>Tidak ada penerbangan yang ditemukan</center>'
        }

        $('#data-penerbangan-'+no_penerbangan).html(html);
      }
    });
  }
  /* --------------------------------------------------------------------- */

  $(document).ready(function(){
    var kd_booking = $('#kd_booking').val();
    var email_pic;
    var verifikasi;

    /* -------------------------- Main Action ------------------------- */
    $.ajax({
      url: '<?= base_url('home/cari_booking/') ?>'+kd_booking,
      type: 'GET',
      dataType: 'JSON',
      success: function(data){
        if(data.pessenger == '')
        {
          alert('Data tidak ditemukan');
        } else {
            var html_tiket = '';
            var html_rute = '';

            verifikasi = data.verifikasi;
            $.each(data.pessenger, function(k, v){
              html_tiket += '<div class="card">';
                html_tiket += '<div class="card-body">';
                  html_tiket += '<h4 class="card-title">E-Ticket '+v.no_tiket;
                  html_tiket += '<div class="pull-right">';
                    html_tiket += '<label class="checkbox hidden">';
                      html_tiket += '<span class="switch">';
                      html_tiket += '<input type="checkbox" checked class="checkbox check-tiket" name="no_tiket[]" value="'+v.no_tiket+'">';
                        html_tiket += '<span class="switch-container">';
                          html_tiket += '<span class="off"><i class="fa fa-close"></i></span>';
                          html_tiket += '<span class="mid"></span>';
                          html_tiket += '<span class="on"><i class="fa fa-check"></i></span>';
                        html_tiket += '</span>';
                      html_tiket += '</span>';
                    html_tiket += '</label>';
                  html_tiket += '</div>';
                  html_tiket += '</h4>';
                  html_tiket += '<p class="card-text"><i class="fa fa-user"></i> '+v.nama_pessenger+' - '+v.tipe_pessenger+'</p>';
                html_tiket += '</div>';
              html_tiket += '</div>';

              email_pic = v.email;
            });

            html_rute += '<div class="row">';
            $.each(data.penerbangan, function(k1, v1){
              var now = new Date();
              var jam = 60*60*1000;
              var denda = 0;
              var ID = v1.harga_tiket*0.10;
              var selisih = Math.abs(Math.abs(now - new Date(v1.tgl_keberangkatan))/jam);

              if(v1.class == 'Bisnis'){
                if(selisih > 72){
                  denda = 0;
                } else if (selisih <= 72 && selisih > 4) {
                  denda = 0;
                } else if (selisih <= 4) {
                  denda += parseInt((0.90*v1.harga_tiket)+50000+5000+ID);
                }
              } else if(v1.class == 'Ekonomi'){
                if(selisih > 24){
                  denda = 0;
                } else if (selisih <= 24 && selisih > 4) {
                  denda += 0.50*v1.harga_tiket;
                } else if (selisih <= 4) {
                  denda += parseInt((0.90*v1.harga_tiket)+50000+5000+ID);
                }
              } else if(v1.class == 'Promo') {
                if(selisih > 72){
                  denda = 0;
                } else if (selisih <= 72 && selisih > 4) {
                  denda += 0.50*v1.harga_tiket;
                } else if (selisih <= 4) {
                  denda += parseInt((0.90*v1.harga_tiket)+50000+5000+ID);
                }
              }


              html_rute += '<div class="card">';
                html_rute += '<div class="card-body">';
                  html_rute += '<h6 class="card-subtitle mb-2 text-muted">'+v1.no_penerbangan+' - '+v1.class;
                  html_rute += '<div class="pull-right">';
                  html_rute += '<label class="checkbox">';
                    html_rute += '<span class="switch">';
                    html_rute += '<input type="checkbox" class="checkbox check-penerbangan" name="no_penerbangan[]" value="'+v1.no_penerbangan+'" data-kelas="'+v1.class+'" data-kota_asal="'+v1.kota_asal+'" data-kota_tujuan="'+v1.kota_tujuan+'" data-tgl="'+v1.tgl_keberangkatan+'" data-harga="'+v1.harga_tiket+'" data-denda="'+denda+'">';
                      html_rute += '<span class="switch-container">';
                        html_rute += '<span class="off"><i class="fa fa-close"></i></span>';
                        html_rute += '<span class="mid"></span>';
                        html_rute += '<span class="on"><i class="fa fa-check"></i></span>';
                      html_rute += '</span>';
                    html_rute += '</span>';
                  html_rute += '</label>';
                  html_rute += '</div>';
                  html_rute += '</h6>';
                  html_rute += '<p class="card-text">'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</p>';
                  html_rute += '<div class="line-home"></div>';
                  html_rute += '<p class="card-text">'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</p>';
                html_rute += '</div>';
              html_rute += '</div>';
            });
            html_rute += '</div>';

          $('#pilih_tiket').html(html_tiket);
          $('#pilih_penerbangan').html(html_rute);
          $('#dialog-flight').html('');
          $('.hidden').hide();

          // var coba = email_pic.substring(1, 5);
          var coba = email_pic.substr(1, 5);
          $('#email_pic').text(email_pic.replace(coba, "*****"));
        }
      }, error: function(){
        alert('Data tidak ditemukan');
      }
    });

    $('form fieldset:first').fadeIn('slow');
    $('.alert').hide();

    /* -------------------------------------------------------------------- */


    /* --------------------------- Event Action -------------------------- */
      $('#batal').on('click', function(){
        $('.form-reschedule')[0].reset();
        location.hash = '#/booking_info/'+kd_booking;
      });


      $('form .btn-previous').on('click', function() {
        var current_active_step = $(this).parents('form').find('.form-wizard.active');
        var progress_line = $(this).parents('form').find('.progress-line');

        $(this).parents('fieldset').fadeOut(400, function() {
          current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
          bar_progress(progress_line, 'left');
          $(this).prev().fadeIn();
        });
      });

      $('form .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        var current_active_step = $(this).parents('form').find('.form-wizard.active');
        var progress_line = $(this).parents('form').find('.progress-line');
        var target = $(this).attr('target');

        $("html, body").animate({
          scrollTop: $('.main').offset().top
        });

        switch (target) {
          case 'pilih-rute':
            if($('.check-tiket').is(':checked')) {
              next_step = true;
            } else {
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih tiket yang akan direschedule').fadeIn('slow').delay(2500).fadeOut('slow');
            }
          break;

          case 'pilih-newrute':
            if($('.check-penerbangan').is(':checked')) {
              next_step = true;
            } else {
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih penerbangan yang akan direschedule').fadeIn('slow').delay(2500).fadeOut('slow');
            }
          break;

          case 'calc-reschedule':
            var notif;
            var sum = 0;
            var jumlah_tiket = $('.check-tiket:checked').length;

            parent_fieldset.find('.no_penerbangan_baru').each(function(){
              if($(this).val() == ''){
                notif = true;
              } else {
                notif = false;
              }
            });

            parent_fieldset.find('.cobacoba').each(function(){
              var coba = $(this).val();
              var ID = coba*0.10;
              sum += parseInt(coba)+parseInt(50000)+parseInt(5000)+parseInt(ID);
            });


            if(notif == true){
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih Rute baru').fadeIn('slow').delay(2500).fadeOut('slow');
            } else {
              next_step = true;
              var total = jumlah_tiket*sum;
              var harga_lama = $('#harga_lama').val();
              var harga_baru = $('#harga_baru').val(total);
              var denda = $('#denda').val();
              var selisih = total - harga_lama
              if(selisih < 0)
              {
                var selisih_bulat = 0;
                var grand_total = parseInt(selisih_bulat) + parseInt(denda);
              } else {
                var selisih_bulat = selisih;
                var grand_total = parseInt(selisih_bulat) + parseInt(denda);
              }

              $('#selisih').val(selisih);
              $('#total_reschedule').val(grand_total);
              $('#payment_lama').text('Rp. '+harga_lama);
              $('#payment_baru').text('Rp. '+total);
              $('#payment_selisih').text('Rp. '+selisih_bulat);
              $('#payment_fee').text('Rp. '+denda);
              $('#payment_total').text('Rp. '+grand_total);
            }
          break;

          case 'form-reschedule':
            if( $('#agreement').prop("checked") == false ) {
              next_step = false;
                $('.alert').html('<i class="fa fa-warning"></i> Silahkan ceklist apabila anda menyetujui persyaratan.').fadeIn('slow').delay(2500).fadeOut('slow');
            } else {
              next_step = true;
            }
          break;

        }

        if( next_step ) {
          parent_fieldset.fadeOut(400, function() {
            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
            bar_progress(progress_line, 'right');
            $(this).next().fadeIn();
          });
        }
      });

      $(document).on('change', '.check-penerbangan, .check-tiket', function(){
        var jumlah_tiket = $('.check-tiket:checked').length;
        var BF = 0;
        var ID = 0;
        var IWJR = 0;
        var D5 = 0;
        var total = 0;
        var denda = 0;
        var administrasi = false;

        var harga_lama = 0;
        var harga_baru = 0;
        var html_newrute = '';

        $('.check-penerbangan:checked').each(function(){
          var no_penerbangan = $(this).val();
          var kota_asal = $(this).data('kota_asal');
          var kota_tujuan = $(this).data('kota_tujuan');
          var kelas = $(this).data('kelas');
          BF += parseInt($(this).attr('data-harga'));
          denda += parseInt($(this).attr('data-denda'));
          ID = BF*0.10;
          IWJR += 5000;
          D5 += 50000;
          harga_lama = parseInt(BF+ID+IWJR+D5);


          if(denda == 0){
            administrasi = true;
          } else {
            administrasi = false;
          }

          html_newrute += '<div class="card">';
            html_newrute += '<div class="card-body">';
              html_newrute += '<div class="input-group">';
                html_newrute += '<input type="text" placeholder="yyyy-mm-dd" class="form-control datepicker" id="new_date-'+no_penerbangan+'">';
                html_newrute += '<div class="input-group-append">';
                  html_newrute += '<button type="button" data-id="'+no_penerbangan+'" data-kota_asal="'+kota_asal+'" data-kota_tujuan="'+kota_tujuan+'" data-kelas="'+kelas+'" class="btn btn-md btn-info btn-round btn-fab" id="search-route-'+no_penerbangan+'"><i class="fa fa-search"></i></button>';
                html_newrute += '</div>';
              html_newrute += '</div>';
              html_newrute += '<div class="detail-panel" id="detail-panel-'+no_penerbangan+'">';
                html_newrute += '<div class="card">';
                  html_newrute += '<div class="card-body" id="detail-body-'+no_penerbangan+'">';
                  html_newrute += '</div>';
                html_newrute += '</div>';
              html_newrute += '</div>';
              html_newrute += '<input type="hidden" class="no_penerbangan_baru" name="no_penerbangan_baru[]" id="penerbangan-baru-'+no_penerbangan+'">';
              html_newrute += '<input type="hidden" class="cobacoba" id="harga-baru-'+no_penerbangan+'">';
            html_newrute += '</div>';
          html_newrute += '</div>';


          $(document).on('click', '#search-route-'+no_penerbangan, function(){
            var no_penerbangan = $(this).data('id');
            var kota_asal = $(this).data('kota_asal');
            var kota_tujuan = $(this).data('kota_tujuan');
            var tgl_keberangkatan = $('#new_date-'+no_penerbangan).val();
            var kelas = $(this).data('kelas');

            // if(tgl_keberangkatan == '')
            // {
            //   $('.alert').html('<i class="fa fa-warning"></i>Silahkan Pilih Penerbangan Baru').fadeIn('slow').delay(2500).fadeOut('slow');
            // } else {
              flight_dialog(no_penerbangan, kota_asal, kota_tujuan, tgl_keberangkatan, kelas);
              $('#flight_'+no_penerbangan).dialog({
                autoOpen: false,
                modal: true,
                draggable: false,
                width: 1200
              });
              $('#flight_'+no_penerbangan).dialog('open');
            // }
          });
        });

        $('#new_rute').html(html_newrute);
        $('.detail-panel').hide();

        $('.datepicker').datepicker(
          { minDate: -0,
            maxDate: "+1M +10D",
            dateFormat: 'yy-mm-dd'
        });

        if(administrasi == true){
          var biaya_adm = 100000*jumlah_tiket;
          $('#denda').val(biaya_adm+(jumlah_tiket*denda));
        } else {
          $('#denda').val(jumlah_tiket*denda);
        }

        $('#harga_lama').val(harga_lama*jumlah_tiket);
      });

      $(document).on('click', '#pilih-new', function(){
        var no_baru = $(this).data('baru');
        var no_lama = $(this).data('lama');
        var harga = $(this).data('harga');
        var kelas = $(this).data('kelas');
        var kota_asal = $(this).data('kota_asal');
        var kota_tujuan = $(this).data('kota_tujuan');
        var tgl_keberangkatan = $(this).data('tgl_keberangkatan');
        var tgl_tiba = $(this).data('tgl_tiba');

        var html = '';
        html += '<h6 class="card-subtitle mb-2 text-muted">'+no_baru+' - '+kelas+'</h6>';
        html += '<p class="card-text">'+kota_asal+'<br/>'+tgl_keberangkatan+'</p>';
        html += '<div class="line-home"></div>';
        html += '<p class="card-text">'+kota_tujuan+'<br/>'+tgl_tiba+'</p>';


        $('#penerbangan-baru-'+no_lama).val(no_baru);
        $('#harga-baru-'+no_lama).val(harga);
        $('#flight_'+no_lama).dialog('close');
        $('#detail-panel-'+no_lama).show();
        $('#detail-body-'+no_lama).html(html);
      });

      $('#kirim_kode').on('click', function(){
        $.ajax({
          url: '<?= base_url().'home/mailKode' ?>',
          type: 'POST',
          data: {'email_pic': email_pic},
          success: function(data){
            if(data == 'gagal')
            {
              alert('Gagal mengirim verification code');
            } else {
              verifikasi = data;
            }
          },
          error: function(){
            alert('Tidak Dapat Mengakses Halaman...');
          }
        });
      });

      $('.form-reschedule').submit(function(){
        var kd_verifikasi = $('#kode_verifikasi').val();
        var reschedule_gelar = $('#reschedule_gelar').val();
        var reschedule_first = $('#reschedule_first').val();
        var reschedule_last = $('#reschedule_last').val();
        var reschedule_alamat = $('#reschedule_alamat').val();
        var reschedule_telepon = $('#reschedule_alamat').val();
        var reschedule_email = $('#reschedule_email').val();

        if(reschedule_gelar == '' || reschedule_first == '' || reschedule_last == '' || reschedule_alamat == '' || reschedule_telepon == '' || reschedule_email == '' || kd_verifikasi == '') {
          $('.alert').html('<i class="fa fa-warning"></i> Mohon lengkapi data pada Form Reschedule').fadeIn('slow').delay(2500).fadeOut('slow');
        } else if(kd_verifikasi != verifikasi){
          $('.alert').html('<i class="fa fa-warning"></i> Kode Verifikasi tidak dikenali').fadeIn('slow').delay(2500).fadeOut('slow');
        } else {
          $.ajax({
            url: '<?= base_url('home/proses_reschedule') ?>',
            type: 'POST',
            data: $('.form-reschedule').serialize(),
            success: function(data){
              if(data == 'berhasil')
              {
                alert('Berhasil melakukan Reschedule. Silahkan input kode pembayaran');
                location.hash = '#/booking_info/'+kd_booking;
              } else {
                alert('Gagal melakukan Refund');
              }
            },
            error: function(){
              alert('Gagal mengakses halaman');
            }
          });
        }
        return false;
      });

    /* -------------------------------------------------------------------- */

  });
</script>
