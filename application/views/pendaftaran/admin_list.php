<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Pendaftaran Pasien</h1>
        </div>
    </section>

    <section class="content">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Keluhan</th>
                            <th>Dokter</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pendaftaran as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->nama_pasien ?></td>
                            <td><?= $p->tgl_lahir ?></td>
                            <td><?= $p->alamat ?></td>
                            <td><?= $p->no_hp ?></td>
                            <td><?= $p->keluhan ?></td>
                            <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
                            <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
                            <td>
                                <span class="badge badge-<?= 
                                    $p->status == 'proses' ? 'warning' : 
                                    ($p->status == 'diterima' ? 'success' : 'danger')
                                ?>">
                                    <?= $p->status ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($p->status == 'proses'): ?>
                                    <a href="<?= base_url('pendaftaran_admin/update_status/'.$p->id.'/diterima'); ?>" class="btn btn-success btn-sm">Setujui</a>
                                    <a href="<?= base_url('pendaftaran_admin/update_status/'.$p->id.'/ditolak'); ?>" class="btn btn-danger btn-sm">Tolak</a>
                                <?php else: ?>
                                    <em>Tidak ada aksi</em>
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
