<?php
include 'class/Barang.php';

class BarangController {
    private $barang;

    public function __construct($db) {
        $this->barang = new Barang($db);
    }

    public function tambahBarang($namaBarang, $keterangan, $satuan, $idPengguna) {
        return $this->barang->tambahBarang($namaBarang, $keterangan, $satuan, $idPengguna);
    }

    public function ambilSemuaBarang() {
        return $this->barang->ambilSemuaBarang();
    }

    public function ambilBarangByID($id) {
        return $this->barang->ambilBarangByID($id);
    }

    public function updateBarang($id, $namaBarang, $keterangan, $satuan, $idPengguna) {
        return $this->barang->updateBarang($id, $namaBarang, $keterangan, $satuan, $idPengguna);
    }

    public function hapusBarang($id) {
        return $this->barang->hapusBarang($id);
    }
}
?>
