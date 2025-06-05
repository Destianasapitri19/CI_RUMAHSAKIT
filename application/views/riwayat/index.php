<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Riwayat Pendaftaran Anda</h1>
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
              <th>Dokter</th>
              <th>Jadwal</th>
              <th>Keluhan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($riwayat as $r): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $r->nama ?></td>
              <td><?= $r->nama_dokter ?> (<?= $r->spesialis ?>)</td>
              <td><?= $r->tanggal_kunjungan ?> <?= $r->jam_kunjungan ?></td>
              <td><?= $r->keluhan ?></td>
              <td>
                <span class="badge badge-<?= 
                  $r->status == 'proses' ? 'warning' :
                  ($r->status == 'diterima' ? 'success' : 'danger') ?>">
                  <?= $r->status ?>
                </span>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
