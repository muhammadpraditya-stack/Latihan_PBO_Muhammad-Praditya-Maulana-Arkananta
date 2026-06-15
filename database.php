<?php

class Database {
    // Properti konfigurasi database
    private $host     = "localhost";
    private $username = "root";
    private $password = ""; // Kosongkan jika menggunakan XAMPP bawaan
    // Nama database disesuaikan persis dengan phpMyAdmin Anda
    private $database = "db_latihan_pbo_ti1c_muhammadpradityamaulanaarkananta"; 
    public $koneksi;

    // Constructor: Otomatis berjalan saat objek diinstansiasi
    public function __construct() {
        // Membuat koneksi menggunakan MySQLi berbasis OOP
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah koneksi mengalami kegagalan
        if ($this->koneksi->connect_error) {
            die("Koneksi ke database gagal: " . $this->koneksi->connect_error);
        }

        // Pesan sukses jika berhasil terhubung
        echo "Koneksi Berhasil! Anda telah terhubung ke database: " . $this->database . "<br>";
    }
}

// Catatan: Baris di bawah ini digunakan untuk menguji koneksi secara langsung.
// Hapus atau beri komentar (//) jika file ini nantinya di-extends oleh file lain (seperti tiket.php)
$db = new Database();

?>