-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2019 at 12:55 AM
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
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(4) NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `id_kos`) VALUES
(3, 'Fasilitas Kamar', 11),
(4, 'Fasilitas Kamar Mandi', 11),
(5, 'Fasilitas Kamar', 2),
(6, 'Fasilitas Kamar Mandi', 2),
(7, 'Fasilitas Kamar', 3),
(8, 'Fasilitas Kamar Mandi', 3),
(9, 'Fasilitas Kamar', 4),
(10, 'Fasilitas Kamar Mandi', 4),
(11, 'Fasilitas Bersama', 1),
(12, 'Fasilitas Parkir\r\n', 1),
(13, 'Fasilitas Bersama', 2),
(14, 'Fasilitas Parkir\r\n', 2),
(15, 'Fasilitas Bersama', 3),
(16, 'Fasilitas Parkir\r\n', 3),
(17, 'Fasilitas Bersama', 4),
(18, 'Fasilitas Parkir\r\n', 4);

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
(1, 1, 1),
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
(12, 2, 6);

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
(2, 'Kontrakan', '2019-10-30 00:00:00', 7);

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
  `dilihat` int(4) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `ditambahkan_oleh` int(4) NOT NULL,
  `tanggal_diubah` datetime NOT NULL,
  `diubah_oleh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id`, `nama`, `deskripsi`, `jumlah_kamar`, `id_kategori`, `harga`, `jenis`, `latitude`, `longitude`, `dilihat`, `tanggal_ditambahkan`, `ditambahkan_oleh`, `tanggal_diubah`, `diubah_oleh`) VALUES
(1, 'Kost Ekslusif Wisma Rosella Beji Depok', 'Wisma Rosella adalah kost eksklusif yang didesain untuk penghuni pria khususnya mahasiswa. Kosan ini dilengkapi berbagai macam fasilitas yang dapat menunjang kehidupan penghuni kosan.', 12, 2, 1400000, 1, -8.1705108, 113.6989745, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(2, 'Kost Meli Denpasar Barat', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 8, 2, 2000000, 2, 0, 0, 0, '2019-10-30 00:00:00', 2, '0000-00-00 00:00:00', 0),
(3, 'Kost Ina House Ketewel 1 Tipe B Sukawati Gianyar', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 23, 1, 2350000, 1, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(4, 'Kost Tangtu Beach Inn Denpasar Timur Denpasar', 'Belakang Dyatmika International School', 0, 1, 275000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(5, 'Kost 157 Tipe B Jakarta Pusat', 'Belakang Dyatmika International School', 17, 1, 500000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(6, 'Kost Ibu Riani Tipe E Senen Jakarta Pusat', 'Belakang Dyatmika International School', 12, 1, 900000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(7, 'Pulo Raya II No 14', 'Belakang Dyatmika International School', 21, 1, 5750000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(8, 'Duta MRT Homestay', 'Belakang Dyatmika International School', 5, 1, 265000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(9, 'Grand Residence Kemanggisan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 15, 1, 5750000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(10, 'Kost Taman Guntur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 11, 1, 650000, 0, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(11, 'Kos Jomblo', 'Rumahku terletak di Desa Banaran, Kecamatan Kandangan ,Kabupaten Kediri.Disinilah berdiri kokoh yang di hiasi kasih sayangi keluarga dan panorama pemandangan yang indah.\r\n\r\nBangunan tinggi dan ramping membuat rumahku terlihat mencolok dengan rumah rumah yang lain,dan mempunyai halaman yang luas yang sering di pakai bermain sepak bola oleh anak anak sekitar\r\n\r\nBarisan bunga dan pepohonan membuat rumah terlihat sejuk dan rindang,Di kebun belakang rumah terlihat berbagai jenis pepohonan,seperti pohon mangga,pohon rambutan,pohon durian,pohon kelengkeng,jika berbuah pasti banyak teman yang datang untuk mencicipinya.\r\n\r\nRumahku terdiri dari 3 kamar tidur,dua kamar di ruang tengah yaitu kamarku dan kamar orang tuaku di ruang depan kamar khusus tamu,di depan juga terdapat  ruang tamu,Ruang makan terdapat di ruang tengah,dan dapur berada di belakang\r\n\r\nRumahku berdiri tahun 2002 hingga saat ini masih berdiri kokoh walau di terjang hujan,badai dan panas matahari,Itulah sekilas details rumahku.\r\n\r\nNah itulah beberapa contoh teks deskripsi tentang rumah singkat, semoga dapat bermanfaat.\r\n', 2, 1, 200000, 0, -8.1705108, 113.6989745, 0, '2019-11-06 06:22:45', 7, '0000-00-00 00:00:00', 0);

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
(2, '2778182727.jpg', 11, 1),
(3, '2778182727.jpg', 3, 1),
(4, 'kost-di-bali.jpg', 10, 1),
(5, '2778182727.jpg', 11, 1),
(6, '2778182727.jpg', 4, 1),
(7, '2778182727.jpg', 4, 1),
(8, '2778182727.jpg', 4, 1),
(9, '2778182727.jpg', 9, 1),
(10, '2778182727.jpg', 4, 1),
(16, '19-12-11.png', 2, 1);

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
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `tipe`, `jumlah`, `bukti_bayar`, `tanggal_pembayaran`, `status`) VALUES
(1, 37, 1, 50000, 'staff.png', '2019-12-11 01:27:36', 1);

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
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = kadaluarsa/ditolak, 1 = pending, 2 = dp, 3 = lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_kos`, `id_pengguna`, `tanggal_pemesanan`, `status`) VALUES
(2, 9, 3, '2019-11-17 17:00:00', 2),
(3, 4, 2, '2019-11-09 17:00:00', 2),
(26, 2, 12, '2019-12-10 02:23:00', 0),
(28, 11, 12, '2019-12-10 03:49:00', 2),
(29, 1, 2, '2019-12-10 04:00:30', 2),
(30, 1, 2, '2019-12-10 04:02:20', 2),
(31, 1, 2, '2019-12-10 04:05:20', 2),
(32, 1, 2, '2019-12-10 04:11:57', 2),
(33, 1, 2, '2020-12-10 04:13:16', 2),
(34, 1, 2, '2019-12-10 04:14:01', 2),
(35, 1, 12, '2019-12-10 04:14:12', 2),
(36, 10, 12, '2019-12-10 04:32:05', 1),
(37, 11, 12, '2019-12-11 01:05:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(4) NOT NULL,
  `nama` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL COMMENT '1 = Laki laki, 2 = perempuan',
  `tanggal_lahir` date NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `no_rekening` varchar(16) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `profil` varchar(30) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `level` tinyint(1) NOT NULL COMMENT '1 = admin, 2 = pemilik kos 3 = penyewa kos',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `no_hp`, `nik`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `nama_rekening`, `no_rekening`, `nama_bank`, `ktp`, `profil`, `tanggal_ditambahkan`, `level`, `status`) VALUES
(1, 'Mochamad Ludfi Rahman', 'ludfyr@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 02:00:00', 1, 0),
(2, 'Ihya Reza Mufti ', 'ihya@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 3, 0),
(3, 'Mochamad Satria Maulana ', 'satria@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 3, 0),
(4, 'Nevarida Sindyka Diliana Putri  ', 'neva@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 2, 0),
(5, 'Sri Wahyuni', 'yuni@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 3, 0),
(6, 'Vanika Ningrum ', 'vanika@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 2, 0),
(7, 'Admin', 'admin@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', 'Papikos', '29898929898298', 'BNI', '', '', '2019-10-30 01:04:00', 1, 0),
(8, 'Abiyu', 'abiyu@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 2, 0),
(9, 'Andre', 'andre@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 2, 0),
(10, 'Indra', 'indra@papikos.com', '$2y$10$LstwWKhiVsFGU52TdMUxUOnyQPAri00N7QDucfDZtxkScXnyLvOdS', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 2, 1),
(12, 'Wildan', 'admin@gmail.com', '$2y$10$LstwWKhiVsFGU52TdMUxUOnyQPAri00N7QDucfDZtxkScXnyLvOdS', '082331759738', '', 'Jalan pakisan rt 10 rw 03 desa bataan tenggarang bondowoso ', 1, '0000-00-00', 'Papikos', '3522988398', 'Bank BNI', '', '', '2019-11-12 00:00:00', 1, 1),
(13, 'Ihya Reza Mufti ', 'ihya@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', '', '', 0, '0000-00-00', '', '', '', '', '', '2019-10-30 01:04:00', 3, 0),
(14, 'Dingga Apris', 'dingga@mail.com', '$2y$10$ZyelPLmCN9uvahTEcwt26ext09p1dyBEHbWSeOx1v/CV5iycP.GFG', '082331759738', '3511080512990002', 'jalan pakisan desa bataan tenggarang bondowoso', 1, '2000-05-22', 'Dingga April', '22112221', 'BNI', 'dingga@mail.com.png', 'dingga@mail.com.jpeg', '2019-12-11 00:00:00', 3, 0);

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
(1, 'kasur', 3),
(2, 'Kloset duduk', 4),
(3, 'Shower', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_ulasan`
--

CREATE TABLE `sub_ulasan` (
  `id` int(5) NOT NULL,
  `ulasan` varchar(35) NOT NULL,
  `id_ulasan` int(5) NOT NULL,
  `id_fasilitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(4) NOT NULL,
  `ulasan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_kos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `ulasan`, `id_pengguna`, `id_kos`) VALUES
(1, 'kosnya aman dan terawat', 1, 1),
(2, 'tidak aman dan kotor', 2, 2),
(3, 'kosnya enak ada tempat parkirnya', 3, 3),
(4, 'kosnya nggak ada tempat sampah', 4, 4),
(5, 'kamar mandi kotor', 5, 5),
(6, 'lampu kos kurang terang', 6, 6),
(7, 'kosnya aman dan terawat', 7, 7),
(8, 'kosnya aman dan terawat', 8, 8),
(10, 'kosnya aman dan terawat', 10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_ulasan`
--
ALTER TABLE `sub_ulasan`
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
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_ulasan`
--
ALTER TABLE `sub_ulasan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
