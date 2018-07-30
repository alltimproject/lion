<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN SYSTEM | LION AIR</title>
    <link href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url().'assets/style.css'?>">
    <script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= base_url().'assets/jquery/jquery.min.js' ?>"></script>
  </head>
  <body>

    <div class="container">
        <div class="card card-container" style="background-color:rgb(43, 62, 101, 0.2)">
          <h3 class="text-center">ATM</h3>
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-payment" method="post">
                <div class="form-group">
                  <label> Pilih Bank </label>
                  <select class="form-control" name="bank">
                    <option value="BCA">BCA</option>
                    <option value="MANDIRI">MANDIRI</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Total Pembayaran</label>
                  <input type="number" class="form-control" name="total_pembayaran">
                </div>
                <a href="javascript:;" class="btn btn-lg btn-primary btn-block btn-signin btn-bayar" type="submit">BAYAR SEKARANG</a>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->


          <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <center><h2 id="kodepem"></h2></center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>



  </body>
</html>
<script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
<script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){


        $(document).on('click', '.btn-bayar', function(){
          var kode = $('#kode_pembayaran').val();

          var data  = $('.form-payment').serialize();
          $.ajax({
            type:'POST',
            url:'<?= base_url('payment/bayar') ?>',
            data:data,
            success:function(data){
              $('#kodepem').html(data);
              $('#myModal').modal('show');
            }
          });



        });



    })
  </script>
