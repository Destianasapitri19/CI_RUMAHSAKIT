<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran Pasien</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Pendaftaran Pasien</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Keluhan</th>
                <th>Dokter</th>
                <th>Jadwal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pendaftaran as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama ?></td>
                <td><?= $p->tgl_lahir ?></td>
                <td><?= $p->alamat ?></td>
                <td><?= $p->no_hp ?></td>
                <td><?= $p->keluhan ?></td>
                <td><?= $p->nama_dokter ?> (<?= $p->spesialis ?>)</td>
                <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
                <td><?= ucfirst($p->status) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
