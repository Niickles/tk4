<?php
include 'koneksi.php';
include 'controller/PenggunaController.php';

$penggunaController = new PenggunaController($db);

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaPengguna = $_POST['nama_pengguna'];
    $namaDepan = $_POST['nama_depan'];
    $namaBelakang = $_POST['nama_belakang'];
    $noHP = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $idAkses = $_POST['id_akses'];

    $result = $penggunaController->tambahPengguna($namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses);

    if ($result) {
        header("Location: list_pengguna.php");
        exit();
    } else {
        $error = "Gagal menambahkan pengguna.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna Baru</title>
</head>
<body>
    <h1>Tambah Pengguna Baru</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama_pengguna">Nama Pengguna:</label>
        <input type="text" name="nama_pengguna" id="nama_pengguna" required><br><br>
        <label for="nama_depan">Nama Depan:</label>
        <input type="text" name="nama_depan" id="nama_depan" required><br><br>
        <label for="nama_belakang">Nama Belakang:</label>
        <input type="text" name="nama_belakang" id="nama_belakang" required><br><br>
        <label for="no_hp">Nomor HP:</label>
        <input type="text" name="no_hp" id="no_hp" required><br><br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required><br><br>
        <label for="id_akses">ID Akses:</label>
        <input type="text" name="id_akses" id="id_akses" required><br><br>
        <button type="submit">Tambah Pengguna</button>
    </form>
    <?php echo $error; ?>
</body>
</html>
