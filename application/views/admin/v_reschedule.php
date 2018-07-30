<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">

          <div class="col-sm-6 animated fadeInUp">

            <h1 class="m-0 text-dark">Data Reschedule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
        <div class="col-lg-6 col-6 animated bounceInLeft">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>2</h3>

              <p>Total Reschedule</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>

      
     </div>

     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <div class="card-title">

             </div>

             <table class="table table-striped table-hover table-hover">
               <tr>
                 <th>No. Reschedule</th>
                 <th>Tgl Reschedule</th>
                 <th>Total Reschedule</th>
                 <th>Email Pengaju</th>
                 <th>Reschedule Status</th>
               </tr>
               <?php $no = 1; foreach($data_reschedule->result() as $key):?>
                 <tr>
                   <td><?= $no++ ?></td>
                   <td><?= $key->tgl_reschedul ?></td>
                   <td><?= $key->total_reschedul ?></td>
                   <td><?= $key->reschedul_email ?> </td>
                   <td><?= $key->reschedul_status ?></td>
                 </tr>

               <?php endforeach; ?>
             </table>

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
