<?php
include 'class/Pelanggan.php';


class PelangganController {
    private $pelanggan;

    public function __construct($db) {
        $this->pelanggan = new Pelanggan($db);
    }

    public function tambahPelanggan($namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        return $this->pelanggan->tambahPelanggan($namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
    }

    public function ambilSemuaPelanggan() {
        return $this->pelanggan->ambilSemuaPelanggan();
    }

    public function ambilPelangganByID($id) {
        return $this->pelanggan->ambilPelangganByID($id);
    }

    public function updatePelanggan($id, $namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        return $this->pelanggan->updatePelanggan($id, $namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
    }

    public function hapusPelanggan($id) {
        return $this->pelanggan->hapusPelanggan($id);
    }
}
?>