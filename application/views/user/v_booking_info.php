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


          html += '<div class="pull-right">';
          if(data.refund == 0 && data.reschedule == 0)
          {
            html += '<a href="#/refund/'+data.booking+'" id="refund" class="btn btn-md btn-danger"><strong>Refund</strong></a> ';
            html += '<a href="#/reschedule/'+data.booking+'" id="reschedule" class="btn btn-md btn-info"><strong>Reschedule</strong></a> ';
          } else if(data.refund == 1) {
            html += '<p><i>* Kode booking ini sedang dalam proses Refund. Mohon menunggu email Konfirmasi dari admin kami atau silahkan hubungi Lion Call Center.</i></p>';
          } else if(data.reschedule == 1) {
            html += '<p><i>* Kode booking ini sedang dalam proses Reschedule. Mohon menunggu email Konfirmasi dari admin kami atau silahkan hubungi Lion Call Center.</i></p>';
          }
          html += '</div>';

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
  });
</script>
