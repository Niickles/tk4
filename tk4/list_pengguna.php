<?php
include 'koneksi.php';
include 'controller/PenggunaController.php';

$penggunaController = new PenggunaController($db);
$daftarPengguna = $penggunaController->ambilSemuaPengguna();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="tambah_pengguna.php">Tambah Pengguna Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>ID Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarPengguna as $pengguna) { ?>
                <tr>
                    <td><?php echo $pengguna['id']; ?></td>
                    <td><?php echo $pengguna['nama_pengguna']; ?></td>
                    <td><?php echo $pengguna['nama_depan']; ?></td>
                    <td><?php echo $pengguna['nama_belakang']; ?></td>
                    <td><?php echo $pengguna['no_hp']; ?></td>
                    <td><?php echo $pengguna['alamat']; ?></td>
                    <td><?php echo $pengguna['id_akses']; ?></td>
                    <td>
                        <a href="edit_pengguna.php?id=<?php echo $pengguna['id']; ?>">Edit</a>
                        <a href="konfirmasi_hapus_pengguna.php?id=<?php echo $pengguna['id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
