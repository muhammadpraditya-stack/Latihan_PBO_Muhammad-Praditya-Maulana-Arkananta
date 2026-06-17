<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    private $bantal_selimut_pack;
    private $layanan_butler;

    public function __construct($data) {
        parent::__construct();
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        $this->bantal_selimut_pack = $data['bantal_selimut_pack'];
        $this->layanan_butler      = $data['layanan_butler'];
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET VELVET
    // =========================================================================
    public function hitungTotalHarga() {
        // Total Harga = (jumlah kursi * harga dasar tiket) * 1.50 (Surcharge 50%)
        return ($this->jumlah_kursi * $this->harga_tiket_dasar) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas: " . $this->bantal_selimut_pack . " | Butler: " . $this->layanan_butler;
    }
}
?>