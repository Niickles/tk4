<?php
include 'koneksi.php';
include 'controller/BarangController.php';

$barangController = new BarangController($db);

$idBarang = $_GET['id'];

$barang = $barangController->ambilBarangByID($idBarang);

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaBarang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $idPengguna = $_POST['id_pengguna'];

    $result = $barangController->updateBarang($idBarang, $namaBarang, $keterangan, $satuan, $idPengguna);

    if ($result) {
        header("Location: list_barang.php");
        exit();
    } else {
        $error = "Gagal mengupdate barang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
</head>
<body>
    <h1>Update Barang</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $idBarang); ?>">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required><br><br>
        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" value="<?php echo $barang['keterangan']; ?>" required><br><br>
        <label for="satuan">Satuan:</label>
        <input type="text" name="satuan" id="satuan" value="<?php echo $barang['satuan']; ?>" required><br><br>
        <label for="id_pengguna">ID Pengguna:</label>
        <input type="text" name="id_pengguna" id="id_pengguna" value="<?php echo $barang['id_pengguna']; ?>" required><br><br>
        <button type="submit">Update Barang</button>
    </form>
    <?php echo $error; ?>
</body>
</html>
