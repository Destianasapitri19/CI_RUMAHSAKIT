<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Data Pasien</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <a href="<?= base_url('pasien_admin/create'); ?>" class="btn btn-primary mb-3">Tambah Pasien</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pasien as $p): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama ?></td>
                <td><?= $p->username ?></td>
                <td>
                  <a href="<?= base_url('pasien_admin/edit/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= base_url('pasien_admin/delete/'.$p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
