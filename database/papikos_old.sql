-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2019 at 01:33 PM
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
  `tanggal_ditambahkan` datetime NOT NULL,
  `ditambahkan_oleh` int(4) NOT NULL,
  `tanggal_diubah` datetime NOT NULL,
  `diubah_oleh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id`, `nama`, `deskripsi`, `jumlah_kamar`, `id_kategori`, `harga`, `jenis`, `latitude`, `longitude`, `tanggal_ditambahkan`, `ditambahkan_oleh`, `tanggal_diubah`, `diubah_oleh`) VALUES
(1, 'Kost Ekslusif Wisma Rosella Beji Depok', 'Wisma Rosella adalah kost eksklusif yang didesain untuk penghuni pria khususnya mahasiswa. Kosan ini dilengkapi berbagai macam fasilitas yang dapat menunjang kehidupan penghuni kosan.', 12, 2, 1400000, 0, -8.1705108, 113.6989745, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(2, 'Kost Meli Denpasar Barat', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 8, 2, 2000000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(3, 'Kost Ina House Ketewel 1 Tipe B Sukawati Gianyar', 'Akses mudah Jalur By Pass Ida Bagus Mantra (Denpasar - Gianyar - Amlapura - Karangasem) , tidak masuk² gang kecil, banyak Toko, ATM, Warung Makan, Apotik, di sekitar kost, ke Area Sanur hanya 10 menitan.', 23, 1, 2350000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(4, 'Kost Tangtu Beach Inn Denpasar Timur Denpasar', 'Belakang Dyatmika International School', 0, 1, 275000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(5, 'Kost 157 Tipe B Jakarta Pusat', 'Belakang Dyatmika International School', 17, 1, 500000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(6, 'Kost Ibu Riani Tipe E Senen Jakarta Pusat', 'Belakang Dyatmika International School', 12, 1, 900000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(7, 'Pulo Raya II No 14', 'Belakang Dyatmika International School', 21, 1, 5750000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(8, 'Duta MRT Homestay', 'Belakang Dyatmika International School', 5, 1, 265000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(9, 'Grand Residence Kemanggisan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 15, 1, 5750000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(10, 'Kost Taman Guntur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ipsum.', 11, 1, 650000, 0, 0, 0, '2019-10-30 00:00:00', 7, '0000-00-00 00:00:00', 0),
(11, 'Kos Jomblo', 'Rumahku terletak di Desa Banaran, Kecamatan Kandangan ,Kabupaten Kediri.Disinilah berdiri kokoh yang di hiasi kasih sayangi keluarga dan panorama pemandangan yang indah.\r\n\r\nBangunan tinggi dan ramping membuat rumahku terlihat mencolok dengan rumah rumah yang lain,dan mempunyai halaman yang luas yang sering di pakai bermain sepak bola oleh anak anak sekitar\r\n\r\nBarisan bunga dan pepohonan membuat rumah terlihat sejuk dan rindang,Di kebun belakang rumah terlihat berbagai jenis pepohonan,seperti pohon mangga,pohon rambutan,pohon durian,pohon kelengkeng,jika berbuah pasti banyak teman yang datang untuk mencicipinya.\r\n\r\nRumahku terdiri dari 3 kamar tidur,dua kamar di ruang tengah yaitu kamarku dan kamar orang tuaku di ruang depan kamar khusus tamu,di depan juga terdapat  ruang tamu,Ruang makan terdapat di ruang tengah,dan dapur berada di belakang\r\n\r\nRumahku berdiri tahun 2002 hingga saat ini masih berdiri kokoh walau di terjang hujan,badai dan panas matahari,Itulah sekilas details rumahku.\r\n\r\nNah itulah beberapa contoh teks deskripsi tentang rumah singkat, semoga dapat bermanfaat.\r\n', 2, 1, 200000, 0, -8.1705108, 113.6989745, '2019-11-06 06:22:45', 7, '0000-00-00 00:00:00', 0);

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
(1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9As12l9Afy_meHYIfWchEUcsTIGQqpUKWIRrlrurorM2RM78j', 1, 1),
(2, '2778182727.jpg', 11, 1),
(3, 'data:image/jpeg;base64,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', 3, 1),
(4, '2778182727.jpg', 10, 1),
(5, 'riga-thumb.png', 11, 1),
(6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9As12l9Afy_meHYIfWchEUcsTIGQqpUKWIRrlrurorM2RM78j', 4, 1),
(7, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSuKwbXVeaoT6sfF5umxcZTfqAeBQo2bSHu4LJ2J4ss0lLl2JIg', 4, 1),
(8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9As12l9Afy_meHYIfWchEUcsTIGQqpUKWIRrlrurorM2RM78j', 4, 1),
(9, '2778182727.jpg', 9, 1),
(10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9As12l9Afy_meHYIfWchEUcsTIGQqpUKWIRrlrurorM2RM78j', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(5) NOT NULL,
  `id_pemesanan` int(5) NOT NULL,
  `tipe` tinyint(1) NOT NULL COMMENT '1 = dp, 2= pelunasan, 3 = perbulan',
  `jumlah` int(7) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `tipe`, `jumlah`, `tanggal_pembayaran`) VALUES
(2, 2, 2, 2, '2019-12-03 00:00:00');

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
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 = kadaluarsa/ditolak, 1 = dp, 2 = diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_kos`, `id_pengguna`, `tanggal_pemesanan`, `status`) VALUES
(1, 11, 6, '2019-11-19 00:00:00', 1),
(2, 9, 3, '2019-11-18 00:00:00', 2),
(3, 4, 2, '2019-11-10 00:00:00', 2);

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
  `jenis_kelamin` tinyint(1) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `no_rekening` varchar(16) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `level` tinyint(1) NOT NULL COMMENT '1 = admin, 2 = pemilik kos 3 = penyewa kos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `no_hp`, `jenis_kelamin`, `nama_rekening`, `no_rekening`, `nama_bank`, `tanggal_ditambahkan`, `level`) VALUES
(1, 'Mochamad Ludfi Rahman', 'ludfyr@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 02:00:00', 1),
(2, 'Ihya Reza Mufti ', 'ihya@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(3, 'Mochamad Satria Maulana ', 'satria@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(4, 'Nevarida Sindyka Diliana Putri  ', 'neva@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(5, 'Sri Wahyuni', 'yuni@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(6, 'Vanika Ningrum ', 'vanika@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(7, 'Admin', 'admin@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 1),
(8, 'Abiyu', 'abiyu@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(9, 'Andre', 'andre@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(10, 'Indra', 'indra@papikos.com', 'c4ca4238a0b923820dcc509a6f75849b', '082331759738', 0, '', '', '', '2019-10-30 01:04:00', 2),
(12, 'Wildan', 'admin@gmail.com', '$2y$10$LstwWKhiVsFGU52TdMUxUOnyQPAri00N7QDucfDZtxkScXnyLvOdS', '082331759738', 1, 'Papikos', '3522988398', 'Bank BNI', '2019-11-12 00:00:00', 1);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
