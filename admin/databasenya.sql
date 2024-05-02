-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2024 pada 20.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontrol`
--

CREATE TABLE `tb_kontrol` (
  `id` int(11) NOT NULL,
  `relay` int(11) NOT NULL,
  `relaysecond` int(2) NOT NULL,
  `servo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontrol`
--

INSERT INTO `tb_kontrol` (`id`, `relay`, `relaysecond`, `servo`) VALUES
(1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sensor`
--

CREATE TABLE `tb_sensor` (
  `id` int(11) NOT NULL,
  `suhu` float(10,2) NOT NULL,
  `ph` float(10,2) NOT NULL,
  `kekeruhan` int(11) NOT NULL,
  `lv_air` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sensor`
--

INSERT INTO `tb_sensor` (`id`, `suhu`, `ph`, `kekeruhan`, `lv_air`, `tanggal`) VALUES
(1, 32.00, 8.50, 40, 2, '2024-04-25 17:11:13'),
(2, 32.00, 7.00, 50, 4, '2024-04-25 17:11:38'),
(3, 10.00, 9.50, 69, 2, '2024-04-26 17:17:38'),
(4, 12.00, 7.50, 50, 4, '2024-04-27 17:18:03'),
(5, 13.00, 7.50, 50, 4, '2024-04-28 17:18:03'),
(6, 10.00, 9.50, 55, 2, '2024-04-26 06:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_web`
--

CREATE TABLE `tb_web` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_web`
--

INSERT INTO `tb_web` (`id`, `title`, `header`, `email`, `phone`, `username`, `password`, `level`) VALUES
(1, 'Dashboard', 'Rancang Bangun Sistem Monitoring Kolam Budidaya Ikan Nila Berbasis IoT Yang Terintegrasi Website', 'hadi@gmail.com', '087842832242', 'hadi1922', '$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kontrol`
--
ALTER TABLE `tb_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sensor`
--
ALTER TABLE `tb_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_web`
--
ALTER TABLE `tb_web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kontrol`
--
ALTER TABLE `tb_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_sensor`
--
ALTER TABLE `tb_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_web`
--
ALTER TABLE `tb_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
