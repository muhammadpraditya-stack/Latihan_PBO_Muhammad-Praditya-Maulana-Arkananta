<?php
// Menyisipkan file induk abstract class
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik Velvet
    private $bantal_selimut_pack;
    private $layanan_butler;

    // Konstruktor untuk memetakan data
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

    // =========================================================================
    // FUNCTION SELECT WHERE (Mengambil data khusus studio Velvet)
    // =========================================================================
    public function selectVelvet() {
        $query = "SELECT * FROM tiket WHERE jenis_studio = 'Velvet'";
        $result = $this->koneksi->query($query);
        
        $daftar_tiket = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar_tiket[] = new TiketVelvet($row);
            }
        }
        return $daftar_tiket;
    }

    // =========================================================================
    // METHOD OVERRIDING: LOGIKA BISNIS TIKET VELVET
    // =========================================================================
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->harga_tiket_dasar) * 1.50;
    }

    // Implementasi menampilkan info fasilitas
    public function tampilkanInfoFasilitas() {
        return "Fasilitas: " . $this->bantal_selimut_pack . " | Butler: " . $this->layanan_butler;
    }

    // Fungsi Getter untuk menampilkan data di HTML utama
    public function getid() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwal() { return $this->jadwal_tayang; }
    public function getKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->harga_tiket_dasar; }
}
?>