<?php
include 'class/Supplier.php';

class SupplierController {
    private $supplier;

    public function __construct($db) {
        $this->supplier = new Supplier($db);
    }

    public function tambahSupplier($namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        return $this->supplier->tambahSupplier($namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
    }

    public function ambilSemuaSupplier() {
        return $this->supplier->ambilSemuaSupplier();
    }

    public function ambilSupplierByID($id) {
        return $this->supplier->ambilSupplierByID($id);
    }

    public function updateSupplier($id, $namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        return $this->supplier->updateSupplier($id, $namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
    }

    public function hapusSupplier($id) {
        return $this->supplier->hapusSupplier($id);
    }
}
?>