<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Laporan Pendaftaran Pasien</h1>
      <button onclick="window.print()" class="btn btn-primary btn-sm mt-2"><i class="fas fa-print"></i> Cetak</button>
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
              <td><?= $p->nama_pasien ?></td>
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
