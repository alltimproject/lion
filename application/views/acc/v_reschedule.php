<div class="card">
  <div class="card-header">
    <a href="<?= base_url('acc/laporan/lapReschedule') ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print All</a>
  </div>
</div>
<div class="table-responsive mailbox-messages animated zoomIn">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th style="font-size:12px;">Tanggal</th>
        <th style="font-size:12px;">No Reschedule</th>
        <th style="font-size:12px;">Email Customer</th>
        <th style="font-size:12px;">Total Reschedule</th>
        <th style="font-size:12px;">Kode Booking</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($get_reschedule as $key): ?>
      <tr>
        <td style="font-size:12px;"><?= $key->tgl_reschedul ?></td>
        <td style="font-size:12px;"><?= $key->no_reschedule ?></td>
        <td style="font-size:12px;"><?= $key->reschedul_email ?></td>
        <td style="font-size:12px;"><?= $key->total_reschedul ?></td>
        <td style="font-size:12px;"><?= $key->kd_booking ?></td>
          <td><a href="<?= base_url('acc/laporan/lap_kode_reschedul/'.$key->no_reschedule) ?> " target="_blank"><i class="fa fa-print"></i></a></td>
      </tr>

      <?php endforeach; ?>
    </tbody>
