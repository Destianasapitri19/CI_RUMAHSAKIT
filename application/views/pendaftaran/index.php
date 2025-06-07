<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Data Pendaftaran</h1>
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
              <th>Keluhan</th>
              <th>Jadwal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pendaftaran as $p): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->nama ?></td>
              <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
              <td><?= $p->keluhan ?></td>
              <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
              <td>
                <?php if ($p->status == 'proses'): ?>
                  <span class="badge badge-warning">Proses</span>
                <?php elseif ($p->status == 'diterima'): ?>
                  <span class="badge badge-success">Diterima</span>
                <?php elseif ($p->status == 'ditolak'): ?>
                  <span class="badge badge-danger">Ditolak</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
