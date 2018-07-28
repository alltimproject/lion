<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="container">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelola Petugas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Petugas</div>
            </div>

            <form class="form_petugas" method="post" style="margin-left:15px; margin-right:15px;">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="****@liongroup.com">
              </div>
              <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" id="nama_depan" name="nama_depan" class="form-control" placeholder="Input Nama Depan" required>
              </div>
              <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" placeholder="Input Nama Belakang">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" id="password" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label>Pilih Level</label>
                <select class="form-control" name="level" id="level">
                  <option value=""> -- pilih level -- </option>
                  <option value="admin">ADMIN</option>
                  <option value="petugas">PETUGAS</option>
                  <option value="accounting">ACCOUNTING</option>
                </select>
              </div>

              <div class="form-group">
                <a href="javascript:;" class="btn btn-info btn-xs simpan-petugas">SIMPAN</a>
                <a href="javascript:;" class="btn btn-danger btn-xs batal-petugas">BATAL</a>
                <a href="javascript:;" class="btn btn-warning btn-xs update-petugas">UPDATE</a>
              </div>

            </form>

          </div>
        </div>
        <div class="col-md-6">
          <div id="show-petugas"></div>
        </div>

      </div>
    </div>

          <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p class="bg-danger">Anda yakin ingin mengahapus petugas ini ?</p>
            </div>
            <div class="modal-footer">
              <form class="form-hapus" method="post">
                <input type="hidden" name="email" id="email_petugas">
                <a href="javascript:;" class="btn btn-info btn-xs btn-konfirmasi"><i class="fa fa-trash"></i></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>

        </div>
      </div>




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.update-petugas').hide();
      loadpetugas();

      function loadpetugas()
      {
        $.ajax({
          url:'<?= base_url() ?>acc/petugas/show_petugas',
          method:'POST',
          success:function(data){
            $('#show-petugas').html(data);
          }
        });
      }

      $(document).on('click','.simpan-petugas', function(){
        var data = $('.form_petugas').serialize();

        var email         = $('#email').val();
        var nama_depan    = $('#nama_depan').val();
        var nama_belakang = $('#nama_belakang').val();
        var password      = $('#password').val();
        var level         = $('#level').val();


        if(email == '' || nama_depan == '' || nama_belakang == '' || password == '' || level == '' ){
          alert('Ada data yang belum diisi');
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url('acc/petugas/simpan_petuas') ?>',
            data:data,
            success:function(data)
            {
              alert(data);
              $('.form_petugas')[0].reset();
              loadpetugas();
            }
          });
        }
      });

      $(document).on('click','.batal-petugas', function(){
        $('.update-petugas').hide('slow', function(){
          $('.simpan-petugas').show('slow');
          $('.form_petugas')[0].reset();
        });
      });


      //edit function
      $(document).on('click', '.btn-edit', function(){
        $('.simpan-petugas').hide('slow', function(){
          $('.update-petugas').show('slow');
        });

        var email = $(this).attr('data-email');
        var nd    = $(this).attr('data-nd');
        var nb    = $(this).attr('data-nb');
        var level = $(this).attr('data-level');

        $('#email').val(email);
        $('#nama_depan').val(nd);
        $('#nama_belakang').val(nb);
        $('#level').val(level);
      });

      $(document).on('click', '.update-petugas', function(){
        var data = $('.form_petugas').serialize();

        var email         = $('#email').val();
        var nama_depan    = $('#nama_depan').val();
        var nama_belakang = $('#nama_belakang').val();
        var password      = $('#password').val();
        var level         = $('#level').val();

        if(email == '' || nama_depan == '' || nama_belakang == '' || level == '' ){
          alert('Ada data yang belum diisi');
        }else if(password == ''){
          alert('masukan password untuk '+email);
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url('acc/petugas/update_petugas') ?>',
            data:data,
            success:function(data){
              alert(data);
              $('.form_petugas')[0].reset();
              loadpetugas();
              $('.simpan-petugas').show('slow', function(){
                  $('.update-petugas').hide('slow');
              });
            }
          });
        }
      });

      $(document).on('click', '.btn-hapus', function(){
        var email = $(this).attr('data-email');
        $('#email_petugas').val(email);
        $('#myModal').modal('show');
      });

      $(document).on('click','.btn-konfirmasi', function(){
        var data = $('.form-hapus').serialize();
        $.ajax({
          type:'POST',
          url:'<?= base_url('acc/petugas/hapus_user') ?>',
          data:data,
          success:function(data){
            alert(data);
            $('#myModal').modal('hide');
            loadpetugas();
          }
        });
      });



    });
  </script>
