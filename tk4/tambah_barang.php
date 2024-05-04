<?php
include 'koneksi.php';
include 'controller/BarangController.php';

$barangController = new BarangController($db);

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaBarang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $idPengguna = $_POST['id_pengguna'];

    $result = $barangController->tambahBarang($namaBarang, $keterangan, $satuan, $idPengguna);

    if ($result) {
        header("Location: list_barang.php");
        exit();
    } else {
        $error = "Gagal menambahkan barang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Baru</title>
</head>
<body>
    <h1>Tambah Barang Baru</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" required><br><br>
        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" required><br><br>
        <label for="satuan">Satuan:</label>
        <input type="text" name="satuan" id="satuan" required><br><br>
        <label for="id_pengguna">ID Pengguna:</label>
        <input type="text" name="id_pengguna" id="id_pengguna" required><br><br>
        <button type="submit">Tambah Barang</button>
    </form>
    <?php echo $error; ?>
</body>
</html>
