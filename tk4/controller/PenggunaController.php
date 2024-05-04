<?php
include 'class/Pengguna.php';

class PenggunaController {
    private $pengguna;

    public function __construct($db) {
        $this->pengguna = new Pengguna($db);
    }

    public function tambahPengguna($namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses) {
        return $this->pengguna->tambahPengguna($namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses);
    }

    public function ambilSemuaPengguna() {
        return $this->pengguna->ambilSemuaPengguna();
    }

    public function ambilPenggunaByID($id) {
        return $this->pengguna->ambilPenggunaByID($id);
    }

    public function updatePengguna($id, $namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses) {
        return $this->pengguna->updatePengguna($id, $namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses);
    }

    public function hapusPengguna($id) {
        return $this->pengguna->hapusPengguna($id);
    }
}
?>
