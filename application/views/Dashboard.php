<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Dashboard Admin</h1>
    </div>
  </section>

  <section class="content">
    <div class="row">

      <!-- Total Pendaftaran -->
      <div class="col-lg-3 col-6">
        <a href="<?= base_url('pendaftaran_admin'); ?>" style="text-decoration: none;">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $total_pendaftaran ?></h3>
              <p>Total Pendaftaran</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-medical"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Diterima -->
      <div class="col-lg-3 col-6">
        <a href="<?= base_url('pasien_terdaftar'); ?>" style="text-decoration: none;">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $diterima ?></h3>
              <p>Pasien Diterima</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-circle"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Ditolak -->
      <div class="col-lg-3 col-6">
        <a href="<?= base_url('pendaftaran_admin?status=ditolak'); ?>" style="text-decoration: none;">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $ditolak ?></h3>
              <p>Pasien Ditolak</p>
            </div>
            <div class="icon">
              <i class="fas fa-times-circle"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Proses -->
      <div class="col-lg-3 col-6">
        <a href="<?= base_url('pendaftaran_admin?status=proses'); ?>" style="text-decoration: none;">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $proses ?></h3>
              <p>Sedang Dalam Proses</p>
            </div>
            <div class="icon">
              <i class="fas fa-spinner"></i>
            </div>
          </div>
        </a>
      </div>

    </div>
  </section>
</div>
