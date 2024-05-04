<?php
class HakAkses {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahHakAkses($namaAkses, $keterangan) {
        $query = "INSERT INTO hakAkses (NamaAkses, Keterangan) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $namaAkses, $keterangan);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ambilSemuaHakAkses() {
        $query = "SELECT * FROM hakAkses";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ambilHakAksesByID($idAkses) {
        $query = "SELECT * FROM hakAkses WHERE idAkses=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idAkses);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateHakAkses($idAkses, $namaAkses, $keterangan) {
        $query = "UPDATE hakAkses SET NamaAkses=?, Keterangan=? WHERE idAkses=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $namaAkses, $keterangan, $idAkses);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusHakAkses($idAkses) {
        $query = "DELETE FROM hakAkses WHERE idAkses=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idAkses);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
