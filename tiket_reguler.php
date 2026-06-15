<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketReguler extends Tiket {
    // Properti tambahan spesifik Reguler
    private $tipe_audio;
    private $lokasi_baris;

    // Konstruktor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        parent::__construct(); // Jalankan koneksi database induk
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        
        // Mengisi properti spesifik
        $this->tipe_audio        = $data['tipe_audio'];
        $this->lokasi_baris      = $data['lokasi_baris'];
    }

    // Implementasi metode abstrak: Reguler tidak ada biaya tambahan
    public function hitungTotalHarga() {
        return $this->harga_tiket_dasar;
    }

    // Implementasi metode abstrak: Menampilkan fasilitas spesifik Reguler
    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipe_audio . " | Baris Kursi: " . $this->lokasi_baris;
    }
}
?>