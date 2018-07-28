<div class="card">
  <div class="card-header">
    <a href="<?= base_url('acc/laporan/refundSuccess') ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print All</a>
  </div>
</div>
<div class="table-responsive mailbox-messages animated zoomIn">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th style="font-size:12px;">Tanggal</th>
        <th style="font-size:12px;">No Refund</th>
        <th style="font-size:12px;">Email Customer</th>
        <th style="font-size:12px;">Total Refund</th>
        <th style="font-size:12px;">Kode Booking</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($data as $key):?>
    <tr>
      <td style="font-size:12px;"><?= $key->tgl_refund ?> </td>
      <td style="font-size:12px;"><a href="" ><?= $key->no_refund ?> </a></td>
      <td style="font-size:12px;"><b><?= $key->refund_email ?> </b> - <?= $key->refund_name ?>, <?= $key->refund_alamat ?>
      </td>
      <td style="font-size:12px;"> Rp. <?= number_format($key->total_refund);  ?></td>
      <td style="font-size:12px;"><b><?= $key->kd_booking ?></b></td>
      <td>
        <a href="<?= base_url('acc/laporan/lap_kode_refund/'.$key->no_refund) ?> "><i class="fa fa-print"></i></a>
      </td>
    </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <!-- /.table -->
</div>
