-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2024 pada 03.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_barang`
--

CREATE TABLE `tambah_barang` (
  `id` int(11) NOT NULL,
  `Nama_Barang` varchar(25) NOT NULL,
  `Deskripsi` varchar(50) NOT NULL,
  `Rating` int(5) NOT NULL,
  `Diskon` int(20) NOT NULL,
  `Harga` int(20) NOT NULL,
  `Label` varchar(10) NOT NULL,
  `Gambar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'sya', 'syafika', 'sya@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'sukma', 'sya', 'sukma@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tambah_barang`
--
ALTER TABLE `tambah_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tambah_barang`
--
ALTER TABLE `tambah_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
