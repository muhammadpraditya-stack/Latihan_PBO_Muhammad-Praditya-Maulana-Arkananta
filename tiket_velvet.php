<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik Velvet
    private $bantal_selimut_pack;
    private $layanan_butler;

    public function __construct($data) {
        parent::__construct();
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        
        // Mengisi properti spesifik
        $this->bantal_selimut_pack = $data['bantal_selimut_pack'];
        $this->layanan_butler      = $data['layanan_butler'];
    }

    // Implementasi metode abstrak: Velvet ada tambahan biaya pelayanan premium (misal Rp 30.000)
    public function hitungTotalHarga() {
        $biaya_layanan = 30000;
        return $this->harga_tiket_dasar + $biaya_layanan;
    }

    // Implementasi metode abstrak: Menampilkan fasilitas spesifik Velvet
    public function tampilkanInfoFasilitas() {
        return "Fasilitas: " . $this->bantal_selimut_pack . " | Butler: " . $this->layanan_butler;
    }
}
?>