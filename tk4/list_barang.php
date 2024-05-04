<?php
include 'koneksi.php';
include 'controller/BarangController.php';

$barangController = new BarangController($db);
$daftarBarang = $barangController->ambilSemuaBarang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <a href="tambah_barang.php">Tambah Barang Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Satuan</th>
                <th>ID Pengguna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarBarang as $barang) { ?>
                <tr>
                    <td><?php echo $barang['idBarang']; ?></td>
                    <td><?php echo $barang['NamaBarang']; ?></td>
                    <td><?php echo $barang['Keterangan']; ?></td>
                    <td><?php echo $barang['Satuan']; ?></td>
                    <td><?php echo $barang['idPengguna']; ?></td>
                    <td>
                        <a href="edit_barang.php?id=<?php echo $barang['idBarang']; ?>">Edit</a>
                        <a href="konfirmasi_hapus_barang.php?id=<?php echo $barang['idBarang']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
