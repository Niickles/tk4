<?php
class Pelanggan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahPelanggan($namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        $query = "INSERT INTO Pelanggan (NamaPelanggan, JumlahBarang, HargaBarang, TotalHarga, idPengguna) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdddi", $namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaPelanggan() {
        $query = "SELECT * FROM Pelanggan";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilPelangganByID($idPelanggan) {
        $query = "SELECT * FROM Pelanggan WHERE idPelanggan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPelanggan);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePelanggan($idPelanggan, $namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna) {
        $query = "UPDATE Pelanggan SET NamaPelanggan=?, JumlahBarang=?, HargaBarang=?, TotalHarga=?, idPengguna=? WHERE idPelanggan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdddii", $namaPelanggan, $jumlahBarang, $hargaBarang, $totalHarga, $idPengguna, $idPelanggan);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusPelanggan($idPelanggan) {
        $query = "DELETE FROM Pelanggan WHERE idPelanggan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPelanggan);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
