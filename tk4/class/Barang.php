<?php
class Barang {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahBarang($namaBarang, $keterangan, $satuan, $idPengguna) {
        $query = "INSERT INTO Barang (NamaBarang, Keterangan, Satuan, idPengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $namaBarang, $keterangan, $satuan, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaBarang() {
        $query = "SELECT * FROM Barang";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilBarangByID($idBarang) {
        $query = "SELECT * FROM Barang WHERE idBarang=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBarang);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateBarang($idBarang, $namaBarang, $keterangan, $satuan, $idPengguna) {
        $query = "UPDATE Barang SET NamaBarang=?, Keterangan=?, Satuan=?, idPengguna=? WHERE idBarang=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssii", $namaBarang, $keterangan, $satuan, $idPengguna, $idBarang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusBarang($idBarang) {
        $query = "DELETE FROM Barang WHERE idBarang=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBarang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
