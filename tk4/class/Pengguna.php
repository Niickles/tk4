<?php
class Pengguna {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahPengguna($namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses) {
        $query = "INSERT INTO Pengguna (NamaPengguna, NamaDepan, NamaBelakang, NoHP, Alamat, idAkses) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaPengguna() {
        $query = "SELECT * FROM Pengguna";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilPenggunaByID($idPengguna) {
        $query = "SELECT * FROM Pengguna WHERE idPengguna=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPengguna);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePengguna($idPengguna, $namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses) {
        $query = "UPDATE Pengguna SET NamaPengguna=?, NamaDepan=?, NamaBelakang=?, NoHP=?, Alamat=?, idAkses=? WHERE idPengguna=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssi", $namaPengguna, $namaDepan, $namaBelakang, $noHP, $alamat, $idAkses, $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusPengguna($idPengguna) {
        $query = "DELETE FROM Pengguna WHERE idPengguna=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idPengguna);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
