<?php
include 'class/Pembelian.php';

class PembelianController {
    private $pembelian;

    public function __construct($db) {
        $this->pembelian = new Pembelian($db);
    }

    public function tambahPembelian($jumlahPembelian, $hargaBeli, $idPengguna) {
        return $this->pembelian->tambahPembelian($jumlahPembelian, $hargaBeli, $idPengguna);
    }

    public function ambilSemuaPembelian() {
        return $this->pembelian->ambilSemuaPembelian();
    }

    public function ambilPembelianByID($id) {
        return $this->pembelian->ambilPembelianByID($id);
    }

    public function updatePembelian($id, $jumlahPembelian, $hargaBeli, $idPengguna) {
        return $this->pembelian->updatePembelian($id, $jumlahPembelian, $hargaBeli, $idPengguna);
    }

    public function hapusPembelian($id) {
        return $this->pembelian->hapusPembelian($id);
    }
}
?>
