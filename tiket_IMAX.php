<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata_3d_id;
    private $efek_gerak_fitur;

    public function __construct($data) {
        parent::__construct();
        $this->id_tiket          = $data['id_tiket'];
        $this->nama_film         = $data['nama_film'];
        $this->jadwal_tayang     = $data['jadwal_tayang'];
        $this->jumlah_kursi      = $data['jumlah_kursi'];
        $this->harga_tiket_dasar = $data['harga_dasar_tiket'];
        $this->kacamata_3d_id    = $data['kacamata_3d_id'];
        $this->efek_gerak_fitur  = $data['efek_gerak_fitur'];
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET IMAX
    // =========================================================================
    public function hitungTotalHarga() {
        // Total Harga = (jumlah kursi * harga dasar tiket) + biaya teknologi IMAX
        $biaya_teknologi = 35000;
        return ($this->jumlah_kursi * $this->harga_tiket_dasar) + $biaya_teknologi;
    }

    public function tampilkanInfoFasilitas() {
        $kacamata = ($this->kacamata_3d_id) ? $this->kacamata_3d_id : "Tidak Termasuk";
        return "Kacamata 3D ID: " . $kacamata . " | Efek Gerak: " . $this->efek_gerak_fitur;
    }
}
?>