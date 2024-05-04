<?php
include 'class/HakAkses.php';

class HakAksesController {
    private $hakAkses;

    public function __construct($db) {
        $this->hakAkses = new HakAkses($db);
    }

    public function tambahHakAkses($namaAkses, $keterangan) {
        return $this->hakAkses->tambahHakAkses($namaAkses, $keterangan);
    }

    public function ambilSemuaHakAkses() {
        return $this->hakAkses->ambilSemuaHakAkses();
    }

    public function ambilHakAksesByID($id) {
        return $this->hakAkses->ambilHakAksesByID($id);
    }

    public function updateHakAkses($id, $namaAkses, $keterangan) {
        return $this->hakAkses->updateHakAkses($id, $namaAkses, $keterangan);
    }

    public function hapusHakAkses($id) {
        return $this->hakAkses->hapusHakAkses($id);
    }
}
?>
