-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 06:41 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papikos`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kos`
--

CREATE TABLE `detail_kos` (
  `id` int(6) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `nama_type` varchar(20) NOT NULL,
  `jumlah_kamar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ditambahkan_oleh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `tanggal_ditambahkan`, `ditambahkan_oleh`) VALUES
(9, 'Fasilitas Kamar', '0000-00-00 00:00:00', 0),
(10, 'Fasilitas Kamar Mandi', '0000-00-00 00:00:00', 0),
(18, 'Fasilitas Parkir\r\n', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kos`
--

CREATE TABLE `fasilitas_kos` (
  `id` int(4) NOT NULL,
  `id_fasilitas` int(3) NOT NULL,
  `id_kos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas_kos`
--

INSERT INTO `fasilitas_kos` (`id`, `id_fasilitas`, `id_kos`) VALUES
(1, 1, 9),
(2, 2, 9),
(3, 3, 9),
(43, 1, 35),
(44, 2, 35),
(45, 3, 35),
(46, 1, 36),
(47, 3, 36),
(48, 4, 37),
(49, 2, 37),
(50, 1, 38),
(51, 4, 38),
(52, 2, 38),
(53, 1, 39),
(54, 4, 39),
(55, 2, 39),
(56, 3, 39),
(57, 1, 40),
(58, 4, 40),
(59, 2, 40),
(60, 3, 40),
(61, 1, 41),
(62, 4, 41),
(63, 2, 41),
(64, 5, 41);

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id` int(5) NOT NULL,
  `id_kos` int(4) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `id_kos`, `id_pengguna`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 1),
(8, 2, 2),
(9, 2, 3),
(10, 2, 4),
(11, 2, 5),
(12, 2, 6),
(19, 1, 23),
(21, 38, 1),
(22, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `ditambahkan_oleh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `tanggal_ditambahkan`, `ditambahkan_oleh`) VALUES
(1, 'Kost Area', '2019-10-30 00:00:00', 7),
(2, 'Kontrakan', '2019-10-30 00:00:00', 7),
(6, 'Kos Rumahan', '2019-12-18 11:50:42', 12);

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_kamar` int(3) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `harga` int(9) NOT NULL,
  `jenis` tinyint(1) NOT NULL COMMENT '1 = kos cowok, 2 = kos cewek',
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `dilihat` int(4) NOT NULL DEFAULT '0',
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ditambahkan_oleh` int(4) NOT NULL,
  `tanggal_diubah` datetime DEFAULT NULL,
  `diubah_oleh` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id`, `nama`, `deskripsi`, `jumlah_kamar`, `id_kategori`, `harga`, `jenis`, `latitude`, `longitude`, `dilihat`, `tanggal_ditambahkan`, `ditambahkan_oleh`, `tanggal_diubah`, `diubah_oleh`) VALUES
(1, 'Kost Ekslusif Wisma Rosella Beji Depok', '<p>Wisma Rosella adalah kost eksklusif yang didesain untuk penghuni pria khususnya mahasiswa. Kosan ini dilengkapi berbagai macam fasilitas yang dapat menunjang kehidupan penghuni kosan.</p>\r\n', 12, 2, 1400000, 1, 0, 0, 7, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(2, 'Kost Meli Denpasar Barat', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 8, 2, 2000000, 2, -8.1705108, 113.2668644, 1, '2019-10-29 17:00:00', 2, '0000-00-00 00:00:00', 0),
(3, 'Kost Ina House Ketewel 1 Tipe B Sukawati Gianyar', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 23, 1, 2350000, 1, -8.1503796, 113.7275817, 1, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(4, 'Kost Tangtu Beach Inn Denpasar Timur Denpasar', 'Belakang Dyatmika International School', 0, 1, 275000, 1, -8.1705108, 113.6989745, 1, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(5, 'Kost 157 Tipe B Jakarta Pusat', 'Belakang Dyatmika International School', 17, 1, 500000, 1, -8.1705108, 113.6989745, 0, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(6, 'Kost Ibu Riani Tipe E Senen Jakarta Pusat', 'Belakang Dyatmika International School', 12, 1, 900000, 1, -8.1705108, 113.6989745, 0, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(7, 'Pulo Raya II No 14', 'Belakang Dyatmika International School', 21, 1, 5750000, 1, -8.1705108, 113.6989745, 0, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(8, 'Duta MRT Homestay', 'Belakang Dyatmika International School', 5, 1, 265000, 1, -8.1705108, 113.6989745, 0, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(9, 'Grand Residence Kemanggisan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 13, 1, 5750000, 1, -8.1705108, 113.6989745, 148, '2019-10-29 17:00:00', 1, '2019-12-23 00:00:00', 0),
(10, 'Kost Taman Guntur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 11, 1, 650000, 1, -8.1705108, 113.6989745, 4, '2019-10-29 17:00:00', 7, '0000-00-00 00:00:00', 0),
(11, 'Kos Cluster Tidar Asri blok x10', 'Rumahku terletak di Desa Banaran, Kecamatan Kandangan ,Kabupaten Kediri.Disinilah berdiri kokoh yang di hiasi kasih sayangi keluarga dan panorama pemandangan yang indah.\r\n\r\nBangunan tinggi dan ramping membuat rumahku terlihat mencolok dengan rumah rumah yang lain,dan mempunyai halaman yang luas yang sering di pakai bermain sepak bola oleh anak anak sekitar\r\n\r\nBarisan bunga dan pepohonan membuat rumah terlihat sejuk dan rindang,Di kebun belakang rumah terlihat berbagai jenis pepohonan,seperti pohon mangga,pohon rambutan,pohon durian,pohon kelengkeng,jika berbuah pasti banyak teman yang datang untuk mencicipinya.\r\n\r\nRumahku terdiri dari 3 kamar tidur,dua kamar di ruang tengah yaitu kamarku dan kamar orang tuaku di ruang depan kamar khusus tamu,di depan juga terdapat  ruang tamu,Ruang makan terdapat di ruang tengah,dan dapur berada di belakang\r\n\r\nRumahku berdiri tahun 2002 hingga saat ini masih berdiri kokoh walau di terjang hujan,badai dan panas matahari,Itulah sekilas details rumahku.\r\n\r\nNah itulah beberapa contoh teks deskripsi tentang rumah singkat, semoga dapat bermanfaat.\r\n', 1, 1, 200000, 1, -8.1705108, 113.6989745, 15, '2019-11-05 23:22:45', 1, '0000-00-00 00:00:00', 0),
(21, 'kos jember', '<p>900</p>\r\n', 2, 1, 200000, 1, -7.914922600000001, 113.8229933, 0, '2019-12-23 21:52:53', 12, NULL, NULL),
(35, 'kos jember jaya', '<p>900</p>\r\n', 2, 1, 200000, 1, -7.9148993, 113.82300439999999, 0, '2019-12-23 21:58:39', 12, NULL, NULL),
(36, 'kos deprima', '<p>deskrip i kos</p>\r\n', 7, 2, 340000, 2, -7.914908700000001, 113.822992, 53, '2019-12-24 19:01:37', 2, NULL, NULL),
(37, 'Kos Mastrip 4', '<p>kos mastrip</p>\r\n', 5, 1, 500000, 1, -8.1705108, 113.6989745, 1, '2019-12-31 00:13:26', 12, NULL, NULL),
(38, 'kos nepu', '<p>kos murah nyaman</p>\r\n', 22, 1, 350000, 1, -8.1577535, 113.7228772, 3, '2019-12-31 01:20:30', 1, NULL, NULL),
(40, 'kos sincan', '<p>nyaman strategis</p>\r\n', 12, 6, 400000, 2, -8.157700199999999, 113.72291919999999, 5, '2019-12-31 01:50:21', 1, NULL, NULL),
(41, 'kos gil', '<p>kos laki-laki</p>\r\n', 23, 6, 400000, 1, -8.1577214, 113.7229388, 0, '2020-01-08 02:38:22', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(5) NOT NULL,
  `link_media` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kos` int(5) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = gambar, 2 = video'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `link_media`, `id_kos`, `type`) VALUES
(1, '2778182727.jpg', 1, 1),
(2, '7782781.jpg', 11, 1),
(3, '2778182727.jpg', 3, 1),
(4, 'kost-di-bali.jpg', 10, 2),
(5, '77728728.jpg', 11, 1),
(6, '2778182727.jpg', 4, 1),
(7, '2778182727.jpg', 4, 1),
(8, '2778182727.jpg', 4, 1),
(9, '2778182727.jpg', 9, 1),
(10, '2778182727.jpg', 4, 1),
(16, '19-12-11.png', 2, 1),
(17, '19-12-11.png', 36, 1),
(18, '19-12-31.png', 37, 1),
(19, '19-12-31.png', 37, 1),
(20, '19-12-31.png', 37, 1),
(21, '19-12-31.png', 37, 1),
(22, '19-12-31.png', 37, 1),
(23, '19-12-31.png', 37, 1),
(24, '19-12-31.png', 38, 1),
(25, '19-12-31.png', 39, 1),
(26, '20191231085126.png', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(5) NOT NULL,
  `id_pemesanan` int(5) NOT NULL,
  `tipe` tinyint(1) NOT NULL COMMENT '1 = dp, 2= pelunasan, 3 = perbulan',
  `jumlah` int(7) NOT NULL,
  `bukti_bayar` varchar(30) NOT NULL,
  `tanggal_pembayaran` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `tipe`, `jumlah`, `bukti_bayar`, `tanggal_pembayaran`, `status`) VALUES
(1, 12, 1, 50000, 'Capture.png', '2019-12-11 01:27:36', 1),
(6, 41, 1, 1437500, 'classroom_working.png', '2019-12-23 18:53:47', 1),
(10, 42, 1, 85000, 'unej-logo-transparan.png', '2019-12-25 01:34:10', 1),
(11, 42, 2, 255000, 'test.jpg', '2019-12-25 01:34:25', 1),
(12, 43, 1, 50000, 'test.jpg', '2019-12-30 09:01:00', 1),
(13, 43, 2, 150000, 'pengguna.PNG', '2019-12-30 09:06:19', 1),
(14, 45, 1, 85000, 'test.jpg', '2019-12-31 02:19:40', 0),
(15, 46, 1, 50000, 'login user.png', '2019-12-31 02:21:58', 0),
(16, 47, 1, 87500, 'test.jpg', '2020-01-08 02:47:09', 0);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `updateStatus` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
 UPDATE pemesanan
 SET status = 2
 WHERE
 id = NEW.id;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(5) NOT NULL,
  `id_kos` int(4) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_expired` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = kadaluarsa/ditolak, 1 = pending, 2 = dp, 3 = lunas',
  `stnotif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_kos`, `id_pengguna`, `tanggal_pemesanan`, `tanggal_expired`, `status`, `stnotif`) VALUES
(2, 9, 3, '2019-12-23 17:00:00', NULL, 2, 0),
(3, 4, 2, '2019-12-14 17:00:00', NULL, 2, 0),
(26, 2, 12, '2019-12-10 02:23:00', NULL, 0, 0),
(28, 11, 12, '2019-12-10 03:49:00', NULL, 2, 0),
(29, 1, 2, '2019-12-10 04:00:30', NULL, 2, 0),
(30, 1, 2, '2019-12-10 04:02:20', NULL, 2, 0),
(31, 1, 2, '2019-12-10 04:05:20', NULL, 2, 0),
(32, 1, 2, '2019-12-10 04:11:57', NULL, 2, 0),
(33, 1, 2, '2020-12-10 04:13:16', NULL, 2, 0),
(34, 1, 2, '2019-12-10 04:14:01', NULL, 2, 0),
(35, 1, 12, '2019-12-10 04:14:12', NULL, 2, 0),
(36, 10, 12, '2019-12-15 04:32:05', NULL, 0, 0),
(37, 11, 12, '2019-12-11 01:05:24', NULL, 2, 0),
(38, 1, 12, '2019-12-17 07:50:19', NULL, 1, 0),
(39, 10, 1, '2019-12-19 05:56:58', NULL, 0, 0),
(40, 11, 1, '2019-12-19 07:17:14', NULL, 2, 0),
(41, 9, 12, '2019-12-23 18:05:45', NULL, 3, NULL),
(42, 36, 1, '2019-12-24 09:45:01', NULL, 3, NULL),
(43, 11, 23, '2019-12-30 09:00:27', NULL, 3, NULL),
(44, 10, 23, '2019-12-29 17:00:00', NULL, 0, NULL),
(45, 36, 23, '2019-12-31 02:15:46', NULL, 0, NULL),
(46, 11, 23, '2019-12-31 02:21:08', NULL, 0, NULL),
(47, 38, 23, '2020-01-08 02:46:27', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(4) NOT NULL,
  `nama` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Laki laki, 2 = perempuan',
  `tanggal_lahir` date DEFAULT NULL,
  `nama_rekening` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_rekening` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_bank` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profil` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  `ktp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_ditambahkan` datetime DEFAULT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1 = admin, 2 = pemilik kos 3 = penyewa kos',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `verification` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stemail` tinyint(1) NOT NULL DEFAULT '0',
  `stnohp` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `no_hp`, `nik`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `nama_rekening`, `no_rekening`, `nama_bank`, `profil`, `ktp`, `tanggal_ditambahkan`, `level`, `status`, `verification`, `stemail`, `stnohp`) VALUES
(1, 'Mochamad Ludfi Rahman', 'ludfyrahman@gmail.com', '$2y$10$LSLbLPrx6l1kl3tZs3OQaeaNo.NWd.14AmbzFuPwDO9NRRDFl.5c.', '082331759738', '', '', 1, '2019-12-23', 'Mochamad Ludfi Rahman', '2667772667', 'BNI', 'FTUEL.png', '', '2019-10-30 02:00:00', 2, 1, 'VULXB', 1, 1),
(2, 'Ihya Reza Mufti ', 'ihya@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 3, 1, '', 1, 1),
(3, 'Mochamad Satria Maulana ', 'satria@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '2019-12-22', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 3, 0, '', 1, 1),
(4, 'Nevarida Sindyka Diliana Putri  ', 'neva@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 2, 1, '', 1, 1),
(5, 'Sri Wahyuni', 'yuni@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '2787287', '', 1, '2019-12-24', 'Yuni', '2782878', 'BNI', 'default.png', '', '2019-12-31 00:00:00', 3, 0, '', 1, 1),
(6, 'Vanika Ningrum ', 'vanika@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 2, 0, '', 1, 1),
(7, 'Admin', 'admin@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', 'Papikos', '29898929898298', 'BNI', 'default.png', '', '2019-10-30 01:04:00', 1, 0, '', 1, 1),
(8, 'Abiyu', 'abiyu@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 2, 0, '', 1, 1),
(9, 'Andre', 'andre@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 2, 0, '', 1, 1),
(10, 'Indra', 'indra@papikos.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', '', 0, '0000-00-00', '', '', '', 'default.png', '', '2019-10-30 01:04:00', 2, 1, '', 1, 1),
(12, 'Wildan', 'admin@gmail.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '', 'Jalan pakisan rt 10 rw 03 desa bataan tenggarang bondowoso ', 1, '0000-00-00', 'Papikos', '3522988398', 'Bank BNI', 'default.png', '', '2019-11-12 00:00:00', 1, 1, '', 1, 1),
(14, 'Dingga Apris', 'dingga@mail.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', '082331759738', '3511080512990002', 'jalan pakisan desa bataan tenggarang bondowoso', 1, '2000-05-22', 'Dingga April', '22112221', 'BNI', 'default.png', '', '2019-12-11 00:00:00', 3, 0, '', 1, 1),
(18, 'sincan', 'sincan23@gmail.com', '$2y$10$xZdEA7cchzrGmuu5GgtUaeBGSo3nu0Z3SHWLAchIMXX5h0iaBmyWO', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'default.png', '', NULL, 3, 1, '', 1, 1),
(23, 'Mochamad Ludfi Rahman', 'ludfyr@gmail.com', '$2y$10$HpbaVqbc7/ZEYEt75j4NVecopeGu3ejokNDVewTXoy6x1nUEa4/ZK', '082331759738', '12345678', '', 1, '2020-01-29', 'Mochamad Ludfi Rahman', '2988398928', 'BNI', 'R95ZI.png', NULL, '2020-01-28 00:00:00', 3, 1, 'UMMPH', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_fasilitas`
--

CREATE TABLE `sub_fasilitas` (
  `id` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `id_fasilitas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_fasilitas`
--

INSERT INTO `sub_fasilitas` (`id`, `nama`, `id_fasilitas`) VALUES
(1, 'kasur', 9),
(2, 'Kloset duduk', 10),
(3, 'Shower', 10),
(4, 'meja belajar', 9),
(5, 'fasilitas parkir', 18);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(4) NOT NULL,
  `ulasan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `ulasan`, `id_pengguna`, `id_kos`, `rating`, `tanggal_ditambahkan`) VALUES
(1, 'kosnya aman dan terawat', 1, 1, 0, '2019-12-23 09:34:57'),
(2, 'tidak aman dan kotor', 2, 36, 2, '2019-12-23 09:34:57'),
(3, 'kosnya enak ada tempat parkirnya', 3, 3, 0, '2019-12-23 09:34:57'),
(4, 'kosnya nggak ada tempat sampah', 4, 4, 0, '2019-12-23 09:34:57'),
(5, 'kamar mandi kotor', 5, 5, 0, '2019-12-23 09:34:57'),
(6, 'lampu kos kurang terang', 6, 6, 0, '2019-12-23 09:34:57'),
(7, 'kosnya aman dan terawat', 7, 7, 0, '2019-12-23 09:34:57'),
(8, 'kosnya aman dan terawat', 8, 10, 5, '2019-12-23 09:34:57'),
(10, 'kosnya aman dan terawat', 2, 36, 5, '2019-12-23 09:34:57'),
(13, 'kosnya aman dan terjaga lingkungannya', 1, 11, 2, '2019-12-23 09:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kos`
--
ALTER TABLE `detail_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kos`
--
ALTER TABLE `fasilitas_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kos`
--
ALTER TABLE `detail_kos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fasilitas_kos`
--
ALTER TABLE `fasilitas_kos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
