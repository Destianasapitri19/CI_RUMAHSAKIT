<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Jadwal Kunjungan Pasien</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Dokter</th>
              <th>Jadwal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($jadwal as $j): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $j->nama ?></td>
                <td><?= $j->nama_dokter ?> (<?= $j->spesialis ?>)</td>
                <td><?= $j->tanggal_kunjungan ?> <?= $j->jam_kunjungan ?></td>
                <td><span class="badge badge-success"><?= ucfirst($j->status) ?></span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
