<div class="content-wrapper">
  <section class="content-header">
    <div class="d-flex justify-content-between mb-3">
  <h4>Laporan Pendaftaran Pasien</h4>
  <a href="#" onclick="window.print()" class="btn btn-danger">
    <i class="fas fa-file-pdf"></i> Cetak PDF
  </a>
</div>

  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Tgl Lahir</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Keluhan</th>
              <th>Dokter</th>
              <th>Jadwal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pendaftaran as $p): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->nama ?></td>
              <td><?= $p->tgl_lahir ?></td>
              <td><?= $p->alamat ?></td>
              <td><?= $p->no_hp ?></td>
              <td><?= $p->keluhan ?></td>
              <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
              <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
              <td><?= $p->status ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
