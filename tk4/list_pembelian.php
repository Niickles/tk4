<?php
include 'koneksi.php';
include 'controller/PembelianController.php';

$pembelianController = new PembelianController($db);
$daftarPembelian = $pembelianController->ambilSemuaPembelian();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
</head>
<body>
    <h1>Daftar Pembelian</h1>
    <a href="tambah_pembelian.php">Tambah Pembelian Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Jumlah Pembelian</th>
                <th>Harga Beli</th>
                <th>ID Pengguna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarPembelian as $pembelian) { ?>
                <tr>
                    <td><?php echo $pembelian['idPembelian']; ?></td>
                    <td><?php echo $pembelian['JumlahPembelian']; ?></td>
                    <td><?php echo $pembelian['Hargabeli']; ?></td>
                    <td><?php echo $pembelian['idPengguna']; ?></td>
                    <td>
                        <a href="edit_pembelian.php?id=<?php echo $pembelian['idPembelian']; ?>">Edit</a>
                        <a href="konfirmasi_hapus_pembelian.php?id=<?php echo $pembelian['idPembelian']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
