<?php
include 'koneksi.php';
include 'controller/PembelianController.php';

$pembelianController = new PembelianController($db);

$idPembelian = $_GET['id'];

$pembelian = $pembelianController->ambilPembelianByID($idPembelian);

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlahPembelian = $_POST['jumlah_pembelian'];
    $hargaBeli = $_POST['harga_beli'];
    $idPengguna = $_POST['id_pengguna'];

    $result = $pembelianController->updatePembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idPengguna);

    if ($result) {
        header("Location: list_pembelian.php");
        exit();
    } else {
        $error = "Gagal mengupdate pembelian.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pembelian</title>
</head>
<body>
    <h1>Update Pembelian</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $idPembelian); ?>">
        <label for="jumlah_pembelian">Jumlah Pembelian:</label>
        <input type="text" name="jumlah_pembelian" id="jumlah_pembelian" value="<?php echo $pembelian['jumlah_pembelian']; ?>" required><br><br>
        <label for="harga_beli">Harga Beli:</label>
        <input type="text" name="harga_beli" id="harga_beli" value="<?php echo $pembelian['harga_beli']; ?>" required><br><br>
        <label for="id_pengguna">ID Pengguna:</label>
        <input type="text" name="id_pengguna" id="id_pengguna" value="<?php echo $pembelian['id_pengguna']; ?>" required><br><br>
        <button type="submit">Update Pembelian</button>
    </form>
    <?php echo $error; ?>
</body>
</html>
