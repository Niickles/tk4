<?php
class Penjualan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahPenjualan($jumlahPenjualan, $hargaJual, $idPengguna) {
        $query = "INSERT INTO Penjualan (JumlahPenjualan, HargaJual, idPengguna) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ddi", $jumlahPenjualan, $hargaJual, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaPenjualan() {
        $query = "SELECT * FROM Penjualan";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilPenjualanByID($idPenjualan) {
        $query = "SELECT * FROM Penjualan WHERE idPenjualan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPenjualan);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePenjualan($idPenjualan, $jumlahPenjualan, $hargaJual, $idPengguna) {
        $query = "UPDATE Penjualan SET JumlahPenjualan=?, HargaJual=?, idPengguna=? WHERE idPenjualan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ddii", $jumlahPenjualan, $hargaJual, $idPengguna, $idPenjualan);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusPenjualan($idPenjualan) {
        $query = "DELETE FROM Penjualan WHERE idPenjualan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPenjualan);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
