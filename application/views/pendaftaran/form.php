<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Pendaftaran Pasien</h1>
        </div>
    </section>

    <section class="content">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('pendaftaran/simpan'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
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
                        <label>Pilih Dokter</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php foreach($dokter as $d): ?>
                                <option value="<?= $d->id ?>"><?= $d->nama_dokter ?> (<?= $d->spesialis ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                </form>
            </div>
        </div>
    </section>
</div>
