<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketReguler extends Tiket {
    private $tipe_audio;
    private $lokasi_baris;

    public function __construct($data) {
        parent::__construct(); 
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        $this->tipe_audio        = $data['tipe_audio'];
        $this->lokasi_baris      = $data['lokasi_baris'];
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET REGULER
    // =========================================================================
    public function hitungTotalHarga() {
        // Total Harga = jumlah kursi * harga dasar tiket
        return $this->jumlah_kursi * $this->harga_tiket_dasar;
    }

    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipe_audio . " | Baris Kursi: " . $this->lokasi_baris;
    }
}
?>