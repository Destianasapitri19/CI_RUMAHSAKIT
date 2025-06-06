<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1>Tambah Pasien Sekaligus Pendaftaran</h1>
    </div>
  </section>

  <!-- Form Content -->
  <section class="content">
    <div class="card">
      <div class="card-body">

        <!-- Tampilkan validasi error -->
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form action="<?= base_url('pasien_admin/store'); ?>" method="post">
          
          <h5>Akun Pasien</h5>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
          </div>

          <hr>

          <h5>Data Pendaftaran</h5>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>
          <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Jam Kunjungan</label>
            <input type="time" name="jam_kunjungan" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Dokter</label>
            <select name="dokter_id" class="form-control" required>
              <option value="">-- Pilih Dokter --</option>
              <?php foreach($dokter as $d): ?>
                <option value="<?= $d->id ?>"><?= $d->nama_dokter ?> (<?= $d->spesialis ?>)</option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Tombol -->
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('pasien_admin'); ?>" class="btn btn-secondary">Kembali</a>
        </form>

      </div>
    </div>
  </section>
</div>
