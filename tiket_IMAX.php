<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik IMAX
    private $kacamata_3d_id;
    private $efek_gerak_fitur;

    public function __construct($data) {
        parent::__construct();
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        
        // Mengisi properti spesifik
        $this->kacamata_3d_id    = $data['kacamata_3d_id'];
        $this->efek_gerak_fitur  = $data['efek_gerak_fitur'];
    }

    // Implementasi metode abstrak: IMAX ada tambahan biaya teknologi (misal Rp 15.000)
    public function hitungTotalHarga() {
        $biaya_tambahan = 15000;
        return $this->harga_tiket_dasar + $biaya_tambahan;
    }

    // Implementasi metode abstrak: Menampilkan fasilitas spesifik IMAX
    public function tampilkanInfoFasilitas() {
        $kacamata = ($this->kacamata_3d_id) ? $this->kacamata_3d_id : "Tidak Termasuk";
        return "Kacamata 3D ID: " . $kacamata . " | Efek Gerak: " . $this->efek_gerak_fitur;
    }
}
?>