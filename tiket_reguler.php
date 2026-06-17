<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketReguler extends Tiket {
    // Properti tambahan spesifik Reguler
    private $tipe_audio;
    private $lokasi_baris;

    // Konstruktor untuk memetakan data
    public function __construct($data) {
        parent::__construct(); // Menjalankan koneksi database induk
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        
        // Mengisi properti spesifik
        $this->tipe_audio        = $data['tipe_audio'];
        $this->lokasi_baris      = $data['lokasi_baris'];
    }

    // =========================================================================
    // FUNCTION SELECT WHERE (Mengambil data khusus studio Reguler)
    // =========================================================================
    public function selectReguler() {
        $query = "SELECT * FROM tiket WHERE jenis_studio = 'Reguler'";
        $result = $this->koneksi->query($query);
        
        $daftar_tiket = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Mengubah setiap baris data menjadi objek TiketReguler
                $daftar_tiket[] = new TiketReguler($row);
            }
        }
        return $daftar_tiket;
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET REGULER
    // =========================================================================
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->harga_tiket_dasar;
    }

    // Implementasi menampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipe_audio . " | Baris: " . $this->lokasi_baris;
    }

    // Fungsi Getter untuk menampilkan data di HTML utama
    public function getid() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwal() { return $this->jadwal_tayang; }
    public function getKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->harga_tiket_dasar; }
}
?>