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
    <input type="text" name="nama" class="form-control" value="<?= $pasien->nama ?>" required>
  </div>

  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" value="<?= $pasien->tgl_lahir ?>" required>
  </div>

  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?= $pasien->alamat ?>" required>
  </div>

  <div class="form-group">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control" value="<?= $pasien->no_hp ?>" required>
  </div>

  <div class="form-group">
    <label>Keluhan</label>
    <textarea name="keluhan" class="form-control" required><?= $pasien->keluhan ?></textarea>
  </div>

  <div class="form-group">
    <label>Dokter</label>
    <select name="dokter_id" class="form-control" required>
      <?php foreach ($dokter as $d): ?>
        <option value="<?= $d->id ?>" <?= $d->id == $pasien->dokter_id ? 'selected' : '' ?>>
          <?= $d->nama_dokter ?> (<?= $d->spesialis ?>)
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Tanggal Kunjungan</label>
    <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $pasien->tanggal_kunjungan ?>" required>
  </div>

  <div class="form-group">
    <label>Jam Kunjungan</label>
    <input type="time" name="jam_kunjungan" class="form-control" value="<?= $pasien->jam_kunjungan ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

      </div>
    </div>
  </section>
</div>
