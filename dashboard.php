<?php
// Menyisipkan seluruh file subclass yang dibutuhkan
require_once 'tiket_reguler.php';
require_once 'tiket_imax.php';
require_once 'tiket_velvet.php';

// 1. Menginstansiasi objek kosong (dummy) untuk memanggil method selectWhere()
$dummyReguler = new TiketReguler(['id_tiket'=>null,'nama_film'=>'','jadwal_tayang'=>'','jumlah_kursi'=>0,'harga_dasar_tiket'=>0,'tipe_audio'=>'','lokasi_baris'=>'']);
$dummyIMAX    = new TiketIMAX(['id_tiket'=>null,'nama_film'=>'','jadwal_tayang'=>'','jumlah_kursi'=>0,'harga_dasar_tiket'=>0,'kacamata_3d_id'=>'','efek_gerak_fitur'=>'']);
$dummyVelvet  = new TiketVelvet(['id_tiket'=>null,'nama_film'=>'','jadwal_tayang'=>'','jumlah_kursi'=>0,'harga_dasar_tiket'=>0,'bantal_selimut_pack'=>'','layanan_butler'=>'']);

// 2. Mengambil data dari database yang sudah dikelompokkan menjadi array of object
$daftarReguler = $dummyReguler->selectReguler();
$daftarIMAX    = $dummyIMAX->selectIMAX();
$daftarVelvet  = $dummyVelvet->selectVelvet();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tiket Bioskop - PBO</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        .section-title { background-color: #2c3e50; color: white; padding: 10px 15px; border-radius: 5px; margin-top: 40px; margin-bottom: 15px; font-size: 1.2rem; }
        .reguler-title { background-color: #2980b9; }
        .imax-title { background-color: #8e44ad; }
        .velvet-title { background-color: #d35400; }
        table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e0e0e0; }
        th { color: white; font-weight: 600; }
        .reguler-th { background-color: #3498db; }
        .imax-th { background-color: #9b59b6; }
        .velvet-th { background-color: #e67e22; }
        tr:hover { background-color: #f9f9f9; }
        .badge-harga { background-color: #2ec4b6; color: white; padding: 5px 10px; border-radius: 4px; font-weight: bold; display: inline-block; }
        .text-center { text-align: center; color: #7f8c8d; font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h1>🎬 Dashboard Pemesanan Tiket Bioskop</h1>

    <div class="section-title reguler-title">Studio Reguler</div>
    <table>
        <thead>
            <tr>
                <th class="reguler-th" width="5%">ID</th>
                <th class="reguler-th" width="30%">Nama Film</th>
                <th class="reguler-th" width="20%">Jadwal Tayang</th>
                <th class="reguler-th" width="10%">Jumlah Kursi</th>
                <th class="reguler-th" width="15%">Harga Dasar</th>
                <th class="reguler-th" width="20%">Fasilitas Unik (Polimorfik)</th>
                <th class="reguler-th" width="15%">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($daftarReguler)): ?>
                <tr><td colspan="7" class="text-center">Belum ada data pemesanan tiket reguler.</td></tr>
            <?php else: ?>
                <?php foreach ($daftarReguler as $tiket): ?>
                    <tr>
                        <td><?= $tiket->getid(); ?></td>
                        <td><strong><?= $tiket->getNamaFilm(); ?></strong></td>
                        <td><?= $tiket->getJadwal(); ?></td>
                        <td><?= $tiket->getKursi(); ?> Pcs</td>
                        <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.'); ?></td>
                        <td><small><em><?= $tiket->tampilkanInfoFasilitas(); ?></em></small></td>
                        <td><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="section-title imax-title">Studio IMAX</div>
    <table>
        <thead>
            <tr>
                <th class="imax-th" width="5%">ID</th>
                <th class="imax-th" width="30%">Nama Film</th>
                <th class="imax-th" width="20%">Jadwal Tayang</th>
                <th class="imax-th" width="10%">Jumlah Kursi</th>
                <th class="imax-th" width="15%">Harga Dasar</th>
                <th class="imax-th" width="20%">Fasilitas Unik (Polimorfik)</th>
                <th class="imax-th" width="15%">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($daftarIMAX)): ?>
                <tr><td colspan="7" class="text-center">Belum ada data pemesanan tiket IMAX.</td></tr>
            <?php else: ?>
                <?php foreach ($daftarIMAX as $tiket): ?>
                    <tr>
                        <td><?= $tiket->getid(); ?></td>
                        <td><strong><?= $tiket->getNamaFilm(); ?></strong></td>
                        <td><?= $tiket->getJadwal(); ?></td>
                        <td><?= $tiket->getKursi(); ?> Pcs</td>
                        <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.'); ?></td>
                        <td><small><em><?= $tiket->tampilkanInfoFasilitas(); ?></em></small></td>
                        <td><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="section-title velvet-title">Studio Velvet</div>
    <table>
        <thead>
            <tr>
                <th class="velvet-th" width="5%">ID</th>
                <th class="velvet-th" width="30%">Nama Film</th>
                <th class="velvet-th" width="20%">Jadwal Tayang</th>
                <th class="velvet-th" width="10%">Jumlah Kursi</th>
                <th class="velvet-th" width="15%">Harga Dasar</th>
                <th class="velvet-th" width="20%">Fasilitas Unik (Polimorfik)</th>
                <th class="velvet-th" width="15%">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($daftarVelvet)): ?>
                <tr><td colspan="7" class="text-center">Belum ada data pemesanan tiket Velvet.</td></tr>
            <?php else: ?>
                <?php foreach ($daftarVelvet as $tiket): ?>
                    <tr>
                        <td><?= $tiket->getid(); ?></td>
                        <td><strong><?= $tiket->getNamaFilm(); ?></strong></td>
                        <td><?= $tiket->getJadwal(); ?></td>
                        <td><?= $tiket->getKursi(); ?> Pcs</td>
                        <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.'); ?></td>
                        <td><small><em><?= $tiket->tampilkanInfoFasilitas(); ?></em></small></td>
                        <td><span class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>