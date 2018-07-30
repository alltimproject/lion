<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">

          <div class="col-sm-6 animated fadeInUp">

            <h1 class="m-0 text-dark">Data Refund</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
     <div class="row">
         <div class="col-lg-6 col-6 animated bounceInLeft">
           <!-- small box -->
           <div class="small-box bg-primary">
             <div class="inner">
               <h3><?= $refund_success ?></h3>

               <p>Refund success</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
           </div>
         </div>

         <div class="col-lg-6 col-6 animated bounceInRight">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3><?= $refund_cancel ?></h3>

               <p>Refund Cancel</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
           </div>
         </div>
      </div>

      <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card animated fadeInUp">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3 ">Data Refund</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Success</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Cancel</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div id="refund-success"></div>
                    <div id="refund-success-detail"></div>

                </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div id="refund-proses"></div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    <script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript">
    refundsuccess();
    refundproses();

      function refundsuccess()
      {

        $.ajax({
          url:'<?= base_url('adm/refund/success_refund') ?>',
          method:'POST',
          success:function(data){
            $('#refund-success').html(data);
          }
        });
      }

      function refundproses()
      {
        $.ajax({
          url:'<?= base_url('adm/refund/proses_refund') ?>',
          method:'POST',
          success:function(data){
            $('#refund-proses').html(data);
          }
        });
      }


      $(document).on('click', '.btn-detail', function(){
        $('#refund-success').hide('slow', function(){
            $('#refund-success-detail').show('slow');
        });


        $(document).on('click', '.btn-back', function(){
          $('#refund-success-detail').hide('slow', function(){
            $('#refund-success').show('slow');
          });

          refundsuccess();
        });

      });

    </script>
