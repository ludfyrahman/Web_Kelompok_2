-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2019 pada 09.03
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

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
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`) VALUES
(1, 'meja'),
(2, 'lemari'),
(3, 'kursi'),
(4, 'kamar mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int(5) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `id_kos`, `id_pengguna`) VALUES
(2, 5, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `tanggal_ditambahkan` date NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `tanggal_ditambahkan`, `nama_kategori`) VALUES
(6, '2019-11-13', 'kamar mandi dalam'),
(7, '2019-11-11', 'kamar mandi luar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id` int(5) NOT NULL,
  `harga` int(9) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `kategori` int(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `ditambahkan_oleh` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah_kamar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id`, `harga`, `tanggal_ditambahkan`, `kategori`, `deskripsi`, `ditambahkan_oleh`, `nama`, `jumlah_kamar`) VALUES
(1, 350000, '2019-11-19 00:00:00', 1, '', 1, 'issabillakost', 0),
(2, 375000, '2019-11-20 00:00:00', 2, '', 2, 'ninakos', 1),
(3, 400000, '2019-11-18 00:00:00', 1, '', 3, 'tinakos', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` int(5) NOT NULL,
  `type` int(1) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `link_media` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pengguna` int(5) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `kode_pemesanan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pengguna`, `id_kos`, `tanggal_pemesanan`, `status`, `kode_pemesanan`) VALUES
(1, 2, '2019-11-29 00:00:00', 0, 5),
(2, 1, '2019-11-20 00:00:00', 1, 7),
(3, 3, '2019-11-15 00:00:00', 2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(5) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `level` int(1) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `password` varchar(32) NOT NULL,
  `no_ktp` int(16) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `level`, `tanggal_ditambahkan`, `password`, `no_ktp`, `email`) VALUES
(1, 'vanika', 2, '2019-11-17 00:00:00', '1', 222, 'vanika@papikos.com'),
(2, 'yuni', 2, '2019-11-13 00:00:00', '1', 666777, 'yuni@papikos.com'),
(3, 'ludfi', 2, '2019-11-01 00:00:00', '1', 222333, 'ludfi@papikos.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(5) NOT NULL,
  `review` varchar(30) NOT NULL,
  `id_kos` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `review`, `id_kos`, `id_pengguna`) VALUES
(2, 'tytyt', 0, 0),
(3, 'aaaaaaaaaa', 0, 0),
(4, 'as', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_fasilitas`
--

CREATE TABLE `sub_fasilitas` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_fasilitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_fasilitas`
--

INSERT INTO `sub_fasilitas` (`id`, `nama`, `kode_fasilitas`) VALUES
(4, 'kamar mandi dalam', 1),
(5, 'kamar mandi luar', 5),
(6, 'kulkas', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `kode_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_fasilitas`
--
ALTER TABLE `sub_fasilitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
