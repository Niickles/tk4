<?php
class Supplier {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahSupplier($namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        $query = "INSERT INTO Supplier (NamaSupplier, JumlahBarang, HargaBarang, TotalHarga, idPengguna) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdddi", $namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaSupplier() {
        $query = "SELECT * FROM Supplier";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilSupplierByID($idSupplier) {
        $query = "SELECT * FROM Supplier WHERE idSupplier=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idSupplier);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateSupplier($idSupplier, $namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        $query = "UPDATE Supplier SET NamaSupplier=?, JumlahBarang=?, HargaBarang=?, TotalHarga=?, idPengguna=? WHERE idSupplier=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdddii", $namaSupplier, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna, $idSupplier);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusSupplier($idSupplier) {
        $query = "DELETE FROM Supplier WHERE idSupplier=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idSupplier);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
