<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembagian Task Karyawan</title>
</head>
<body>
<a href="karyawan/tambah_karyawan">Tambah Karyawan</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Divisi</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach($karyawan as $row):
            ?> 
            <tr>
                <td><?= $no++;?></td>
                <td><?= $row['id_divisi']?></td>
                <td><?= $row['nama_karyawan'];?></td>
                <td><?= $row['jenis_kelamin'];?></td>
                <td><?= $row['tempat_lahir'].', '.date("d mm Y", strtotime($tgl_lahir));?></td>
                <td><?= $row['alamat'];?></td>
                <td><?= $row['no_telp'];?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>