-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 05:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_muhammadpradityamaulanaarkananta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Avatar: Fire and Ash', '2026-07-01 13:00:00', 120, '45000.00', 'Reguler', 'Dolby Digital 5.1', 'A-L', NULL, NULL, NULL, NULL),
(2, 'The Batman Part II', '2026-07-01 15:45:00', 120, '45000.00', 'Reguler', 'Dolby Digital 5.1', 'A-L', NULL, NULL, NULL, NULL),
(3, 'Avengers: Doomsday', '2026-07-01 19:00:00', 150, '50000.00', 'Reguler', 'Dolby Atmos', 'A-N', NULL, NULL, NULL, NULL),
(4, 'Spiderman: Beyond the Spider-Verse', '2026-07-02 10:30:00', 100, '40000.00', 'Reguler', 'Dolby Digital 5.1', 'A-J', NULL, NULL, NULL, NULL),
(5, 'Project Hail Mary', '2026-07-02 14:00:00', 120, '45000.00', 'Reguler', 'Dolby Digital 5.1', 'A-L', NULL, NULL, NULL, NULL),
(6, 'Super Mario Bros Movie 2', '2026-07-03 11:00:00', 150, '45000.00', 'Reguler', 'Dolby Digital 5.1', 'A-N', NULL, NULL, NULL, NULL),
(7, 'Shrek 5', '2026-07-03 14:15:00', 120, '45000.00', 'Reguler', 'Dolby Digital 5.1', 'A-L', NULL, NULL, NULL, NULL),
(8, 'Avatar: Fire and Ash', '2026-07-01 12:00:00', 300, '75000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', 'XPAND-3D-01', 'Vibration Seat Level 1', NULL, NULL),
(9, 'Avengers: Doomsday', '2026-07-01 16:00:00', 350, '85000.00', 'IMAX', 'IMAX 12-Channel', 'A-AA', 'XPAND-3D-02', 'Vibration Seat Level 2', NULL, NULL),
(10, 'Star Wars: New Jedi Order', '2026-07-01 20:30:00', 300, '80000.00', 'IMAX', 'IMAX 6-Channel', 'A-Z', NULL, 'None', NULL, NULL),
(11, 'Dune: Messiah', '2026-07-02 13:00:00', 300, '80000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', NULL, 'Vibration Seat Level 1', NULL, NULL),
(12, 'Interstellar (Re-Release)', '2026-07-02 17:30:00', 300, '70000.00', 'IMAX', 'IMAX 6-Channel', 'A-Z', NULL, 'None', NULL, NULL),
(13, 'Blade Runner 2099', '2026-07-03 16:00:00', 300, '80000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', NULL, 'Vibration Seat Level 1', NULL, NULL),
(14, 'The Matrix: Resurgence', '2026-07-03 21:00:00', 300, '75000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', 'XPAND-3D-03', 'Vibration Seat Level 2', NULL, NULL),
(15, 'The Batman Part II', '2026-07-01 14:00:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'Premium Pack A (2 Pillow, 1 Blanket)', 'Personal Butler Service - Tier 1'),
(16, 'Avatar: Fire and Ash', '2026-07-01 18:00:00', 40, '175000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'VIP Pack (4 Pillow, 2 Blanket)', 'All-Inclusive Luxury Butler'),
(17, 'Dune: Messiah', '2026-07-01 21:30:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'Premium Pack A (2 Pillow, 1 Blanket)', 'Personal Butler Service - Tier 1'),
(18, 'Project Hail Mary', '2026-07-02 15:00:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'Premium Pack A (2 Pillow, 1 Blanket)', 'Personal Butler Service - Tier 1'),
(19, 'Gladiator III', '2026-07-02 19:30:00', 40, '160000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'Premium Pack B (2 Pillow, 2 Blanket)', 'Personal Butler Service - Tier 2'),
(20, 'Avengers: Doomsday', '2026-07-03 13:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'VIP Pack (4 Pillow, 2 Blanket)', 'All-Inclusive Luxury Butler'),
(21, 'Inception 2', '2026-07-03 18:00:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-D', NULL, NULL, 'Premium Pack A (2 Pillow, 1 Blanket)', 'Personal Butler Service - Tier 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
