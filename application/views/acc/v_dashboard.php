<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Refund</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a class="nav-link refund-success-link" id="refund-success" href="javascript:;">
                    <i class="fa fa-inbox"></i> Refund Success
                    <span class="badge bg-primary float-right"></span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /. box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Reschedule</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="javascript:;" id="reschedule" class="nav-link reschedule-link">
                    <i class="fa fa-circle-o text-danger"></i>
                    Reschedule
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"></h3>

              <form class="form-tanggal" method="post">
                <div class="row text-center">
                  <div class="col-md-4 text-center">
                    <div class="form-group">
                      <label>Dari</label>
                      <input type="date" name="dari" id="dari" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <div class="form-group">
                      <label>Sampai</label>
                      <input type="date" name="sampai" id="sampai" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <div class="form-group">
                      <a href="javascript:;" class="btn btn-info btn-xs btn-cari"><i class="fa fa-search"></i></a>
                      <a href="javascript:;" class="btn btn-info btn-xs btn-cari-reschedule"><i class="fa fa-search"></i></a>
                      <a href="<?= base_url('acc/dashboard')  ?> " class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> </a>
                    </div>
                  </div>

                </div>
              </form>

              <div class="card-tools">

              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">

              </div>
              <div id="show-refund"></div>
              <div id="tampil-pertanggal"></div>
              <div id="tampil-pertanggal-reschedule"></div>

              <!-- reshcedule -->
              <div id="show-reschedule"></div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
              
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript">
  $(document).ready(function() {
     $('.btn-cari-reschedule').hide();
     $('#show-refund').show();
     $('#show-reschedule').hide();

    $('#show-refund').load('<?= base_url('acc/dashboard/refundSuccess') ?>');
    $('#show-reschedule').load('<?= base_url('acc/dashboard/reschedule') ?>');

    $(document).on('click','.refund-success-link',function(){
        $('.form-tanggal')[0].reset();
        $('#tampil-pertanggal-reschedule').hide();
        $('.btn-cari').show();
        $('.btn-cari-reschedule').hide();
        var menu = $(this).attr('id');
        if(menu == "refund-success")
        {
          //$('#show-refund').load('<?= base_url('acc/dashboard/refundSuccess')  ?>');
          $('#show-refund').show('slow', function(){
            $('#show-reschedule').hide('slow');
          });
          $('.refund-success-link').addClass('active');
          $('.refund-process-link').removeClass('active');
          $('.reschedule-link').removeClass('active');
        }
    });

    $(document).on('click', '.reschedule-link', function(){
        $('.form-tanggal')[0].reset();
        $('#tampil-pertanggal').hide('slow');
        $('.btn-cari').hide();
        $('.btn-cari-reschedule').show();
        $('#show-reschedule').load('<?= base_url('acc/dashboard/reschedule') ?>');
         $('#show-reschedule').show('slow', function(){
           $('#show-refund').hide('slow');
           $('.reschedule-link').addClass('active');
           $('.refund-success-link').removeClass('active');
         });
    });

    $(document).on('click', '.btn-cari', function(){
      $('#tampil-pertanggal').show('slow');
      $('#tampil-pertanggal-reschedule').hide();
      $('#show-refund').hide();
      var data = $('.form-tanggal').serialize();

      $.ajax({
        type:'POST',
        url:'<?= base_url('acc/dashboard/get_pertanggal') ?>',
        data:data,
        success:function(data){
          $('#tampil-pertanggal').html(data);
        }
      });
    });

    $(document).on('click','.btn-cari-reschedule', function(){
      $('#tampil-pertanggal-reschedule').show();
      $('#show-reschedule').hide('slow');
      var data = $('.form-tanggal').serialize();

      $.ajax({
        type:'POST',
        url:'<?= base_url('acc/dashboard/get_pertanggal_reschedule') ?>',
        data:data,
        success:function(data){
          $('#tampil-pertanggal-reschedule').html(data);
        }
      });
    });






  });
  </script>
