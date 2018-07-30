<div class="main main-raised">
  <div class="section">
    <div class="container">
      <div id="content-info"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_info(search)
  {
    $.ajax({
      url: '<?= base_url('home/cari_booking/') ?>'+search,
      type: 'GET',
      dataType: 'JSON',
      success: function(data){
        if(data.jumlah == 0)
        {
          alert('Data tidak ditemukan');
        } else {
            var html = '';
            html += '<h3>Kode Booking : '+data.booking+'</h3><br/>';

            html += '<div class="card">';
                html += '<div class="card-header card-header-danger">';
                    html += '<h4 class="card-title"><i class="fa fa-plane"></i> Penerbangan Detail </h4>';
                html += '</div>';
                html += '<div class="card-body">';
                $.each(data.penerbangan, function(key1, value1){
                  html += '<div class="card">';
                    html += '<div class="card-body">';
                      html += '<h6 class="card-subtitle mb-2 text-muted">'+value1.no_penerbangan+' - '+value1.class+'</h6>';
                      html += '<p class="card-text">'+value1.kota_asal+'<br/>'+value1.tgl_keberangkatan+'</p>';
                      html += '<div class="line-home"></div>';
                      html += '<p class="card-text">'+value1.kota_tujuan+'<br/>'+value1.tgl_tiba+'</p>';
                    html += '</div>';
                  html += '</div>';
                });
                html += '</div>';
            html += '</div></br>';

            html += '<div class="card">';
                html += '<div class="card-header card-header-danger">';
                    html += '<h4 class="card-title"><i class="fa fa-users"></i> Pessenger Detail </h4>';
                html += '</div>';
                html += '<div class="card-body">';
                $.each(data.pessenger, function(k, v){
                  html += '<div class="card">';
                    html += '<div class="card-body">';
                      html += '<h6 class="card-subtitle mb-2 text-muted">E-Ticket '+v.no_tiket+'</h6>';
                      html += '<p class="card-text"><i class="fa fa-user"></i> '+v.nama_pessenger+' - '+v.tipe_pessenger+'</p>';
                    html += '</div>';
                  html += '</div>';
                });
                html += '</div>';
            html += '</div>';



          if(data.refund.length == 0 && data.reschedule.length == 0)
          {
            html += '<div class="pull-right">';
            html += '<a href="#/refund/'+data.booking+'" id="refund" class="btn btn-md btn-danger"><strong>Refund</strong></a> ';
            html += '<a href="#/reschedule/'+data.booking+'" id="reschedule" class="btn btn-md btn-info"><strong>Reschedule</strong></a> ';
            html += '</div>';
          } else if(data.refund.length == 1) {
            html += '<div class="pull-right">';
            html += '<p><i>* Kode booking ini sedang dalam proses Refund. Mohon menunggu email Konfirmasi dari admin kami atau silahkan hubungi Lion Call Center.</i></p>';
            html += '</div>';
          } else if(data.reschedule.length == 1) {
            $.each(data.reschedule, function(k, v){
              html += '<h3>Kode Pembayaran</h3>';
              html += '<div class="input-group">';
                html += '<input type="text" maxlength="10" placeholder="Masukkan Kode Pemayaran" class="form-control" id="kode_pembayaran">';
                html += '<div class="input-group-append">';
                  html += '<button type="button" class="btn btn-md btn-info" data-kd_booking="'+v.kd_booking+'" data-no_reschedule="'+v.no_reschedule+'" id="konfirmasi_pembayaran">Konfirmasi</button>';
                html += '</div>';
              html += '</div>';
            });
          }


          $('.form-search')[0].reset();
          $('#content-info').html(html);

        }
      }, error: function(){
        alert('Data tidak ditemukan');
      }
    });
  }

  $(document).ready(function(){
    load_info('<?= $booking ?>');

    $(document).on('click', '#konfirmasi_pembayaran', function(){
      var kd_pembayaran = $('#kode_pembayaran').val();
      var kd_booking = $(this).data('kd_booking');
      var no_reschedule = $(this).data('no_reschedule');

      $.ajax({
        url: '<?= base_url().'home/konfirmasi_pembayaran' ?>',
        type: 'POST',
        data: {
          kd_booking: kd_booking,
          no_reschedule: no_reschedule,
          kd_pembayaran: kd_pembayaran
        },
        success: function(data){
          alert(data);
          load_info(kd_booking);
        }
      });
    });
  });
</script>
