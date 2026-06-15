<?php
// Menyisipkan file konfigurasi database agar bisa terhubung
require_once 'database.php';

// Mendefinisikan Abstract Class Tiket yang mewarisi class Database
abstract class Tiket extends Database {
    
    // Properti terenkapsulasi (protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $harga_tiket_dasar;

    // Constructor untuk memanggil koneksi database dari class induk (Database)
    public function __construct() {
        parent::__construct(); 
    }

    // =========================================================================
    // METODE ABSTRAK (Tanpa Isi / Body)
    // =========================================================================
    
    // Wajib diimplementasikan kelas anak untuk menghitung harga total + pajak/biaya tambahan tiap studio
    abstract public function hitungTotalHarga();

    // Wajib diimplementasikan kelas anak untuk menampilkan fasilitas unik studio (Reguler/IMAX/Velvet)
    abstract public function tampilkanInfoFasilitas();
}

// Catatan: Kelas ini sudah siap diturunkan ke class TiketReguler, TiketIMAX, atau TiketVelvet.
?>