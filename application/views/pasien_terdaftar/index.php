<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Pasien Terdaftar</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Dokter</th>
              <th>Jadwal</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pasien as $p): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->nama ?></td>
              <td><?= $p->alamat ?></td>
              <td><?= $p->no_hp ?></td>
              <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
              <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
