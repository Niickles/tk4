<?php
class Pembelian {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahPembelian($jumlahPembelian, $hargaBeli, $idPengguna) {
        $query = "INSERT INTO Pembelian (JumlahPembelian, Hargabeli, idPengguna) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ddi", $jumlahPembelian, $hargaBeli, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaPembelian() {
        $query = "SELECT * FROM Pembelian";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilPembelianByID($idPembelian) {
        $query = "SELECT * FROM Pembelian WHERE idPembelian=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPembelian);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idPengguna) {
        $query = "UPDATE Pembelian SET JumlahPembelian=?, Hargabeli=?, idPengguna=? WHERE idPembelian=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ddii", $jumlahPembelian, $hargaBeli, $idPengguna, $idPembelian);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusPembelian($idPembelian) {
        $query = "DELETE FROM Pembelian WHERE idPembelian=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPembelian);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
