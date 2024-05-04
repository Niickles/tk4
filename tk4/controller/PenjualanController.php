<?php
include 'class/Penjualan.php';

class PenjualanController {
    private $penjualan;

    public function __construct($db) {
        $this->penjualan = new Penjualan($db);
    }

    public function tambahPenjualan($jumlahPenjualan, $hargaJual, $idPengguna) {
        return $this->penjualan->tambahPenjualan($jumlahPenjualan, $hargaJual, $idPengguna);
    }

    public function ambilSemuaPenjualan() {
        return $this->penjualan->ambilSemuaPenjualan();
    }

    public function ambilPenjualanByID($id) {
        return $this->penjualan->ambilPenjualanByID($id);
    }

    public function updatePenjualan($id, $jumlahPenjualan, $hargaJual, $idPengguna) {
        return $this->penjualan->updatePenjualan($id, $jumlahPenjualan, $hargaJual, $idPengguna);
    }

    public function hapusPenjualan($id) {
        return $this->penjualan->hapusPenjualan($id);
    }
}
?>