<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Pendaftaran Pasien</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 6px; text-align: left; }
        h3 { text-align: center; }
    </style>
</head>
<body>

    <h3>LAPORAN PENDAFTARAN PASIEN</h3>

    <table>
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
