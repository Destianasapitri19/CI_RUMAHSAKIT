<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Data Pasien</h1>
      <a href="<?= base_url('pasien_admin/create'); ?>" class="btn btn-primary mb-3">Tambah Pasien</a>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Tgl Lahir</th>
      <th>Alamat</th>
      <th>No HP</th>
      <th>Keluhan</th>
      <th>Dokter</th>
      <th>Jadwal</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($pasien as $p): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p->nama ?></td>
      <td><?= $p->username ?></td>
      <td><?= $p->tgl_lahir ?></td>
      <td><?= $p->alamat ?></td>
      <td><?= $p->no_hp ?></td>
      <td><?= $p->keluhan ?></td>
      <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
      <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
      <td>
        <a href="<?= base_url('pasien_admin/edit/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= base_url('pasien/delete/'.$p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


      </div>
    </div>
  </section>
</div>
