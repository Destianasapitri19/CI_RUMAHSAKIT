<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Data Pasien</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('pasien_admin/update/'.$pasien->id); ?>" method="post">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $pasien->nama ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= $pasien->username ?>" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?= base_url('pasien_admin'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
