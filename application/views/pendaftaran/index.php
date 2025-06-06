<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1>Data Pendaftaran</h1>
    </div>
  </section>

  <!-- Konten Utama -->
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
              <th>Aksi</th>
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
                <td><?= ucfirst($p->status) ?></td>
                <td>
                  <?php if ($p->status == 'proses'): ?>
                    <a href="<?= base_url('pendaftaran_admin/setujui/'.$p->id); ?>" class="btn btn-success btn-sm">Setujui</a>
                    <a href="<?= base_url('pendaftaran_admin/tolak/'.$p->id); ?>" class="btn btn-danger btn-sm">Tolak</a>
                  <?php else: ?>
                    <span class="text-muted">-</span>
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