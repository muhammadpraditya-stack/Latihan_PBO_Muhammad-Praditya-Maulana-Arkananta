<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik IMAX
    private $kacamata_3d_id;
    private $efek_gerak_fitur;

    // Konstruktor untuk memetakan data
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

    // =========================================================================
    // FUNCTION SELECT WHERE (Mengambil data khusus studio IMAX)
    // =========================================================================
    public function selectIMAX() {
        $query = "SELECT * FROM tiket WHERE jenis_studio = 'IMAX'";
        $result = $this->koneksi->query($query);
        
        $daftar_tiket = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar_tiket[] = new TiketIMAX($row);
            }
        }
        return $daftar_tiket;
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET IMAX
    // =========================================================================
    public function hitungTotalHarga() {
        $biaya_teknologi = 35000;
        return ($this->jumlah_kursi * $this->harga_tiket_dasar) + $biaya_teknologi;
    }

    // Implementasi menampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        $kacamata = ($this->kacamata_3d_id) ? $this->kacamata_3d_id : "Tidak Ada";
        return "Kacamata 3D ID: " . $kacamata . " | Efek Gerak: " . $this->efek_gerak_fitur;
    }

    // Fungsi Getter untuk menampilkan data di HTML utama
    public function getid() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwal() { return $this->jadwal_tayang; }
    public function getKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->harga_tiket_dasar; }
}
?>