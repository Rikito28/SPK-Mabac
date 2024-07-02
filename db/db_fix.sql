-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 12.57
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(350) NOT NULL,
  `bobot` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
(1, 'Jumlah Tanggungan', 30, 'benefit'),
(2, 'Penghasilan', 20, 'benefit'),
(3, 'Kepemilikan', 20, 'benefit'),
(4, 'Atap', 15, 'cost'),
(5, 'Dinding', 15, 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `kode_penghuni` varchar(20) NOT NULL,
  `nama_penghuni` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `kode_penghuni`, `nama_penghuni`) VALUES
(35, 'A1', 'Aman Slamet'),
(36, 'A2', 'Mujianto'),
(37, 'A3', 'Joko Waluyo'),
(38, 'A4', 'Kumayah'),
(39, 'A5', 'Samidi'),
(40, 'A6', 'Abidin'),
(41, 'A7', 'Abidin'),
(42, 'A8', 'Suyati'),
(43, 'A9', 'Edy Suroso'),
(44, 'A10', 'Muslimin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `kode_penghuni` varchar(20) NOT NULL,
  `np` int(11) NOT NULL,
  `nk` int(11) NOT NULL,
  `nd` int(11) NOT NULL,
  `na` int(11) NOT NULL,
  `njt` int(11) NOT NULL,
  `hasil` decimal(10,2) DEFAULT NULL,
  `uJT` decimal(10,3) DEFAULT NULL,
  `uP` decimal(10,3) DEFAULT NULL,
  `uK` decimal(10,3) DEFAULT NULL,
  `uA` decimal(10,3) DEFAULT NULL,
  `uD` decimal(10,3) DEFAULT NULL,
  `nilaiJT` decimal(10,2) DEFAULT NULL,
  `nilaiP` decimal(10,2) DEFAULT NULL,
  `nilaiK` decimal(10,2) DEFAULT NULL,
  `nilaiA` decimal(10,2) DEFAULT NULL,
  `nilaiD` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `kode_penghuni`, `np`, `nk`, `nd`, `na`, `njt`, `hasil`, `uJT`, `uP`, `uK`, `uA`, `uD`, `nilaiJT`, `nilaiP`, `nilaiK`, `nilaiA`, `nilaiD`) VALUES
(27, 'A1', 75, 100, 50, 75, 100, '1.37', '1.000', '1.000', '1.000', '0.333', '0.667', '0.60', '0.40', '0.40', '0.20', '0.25'),
(28, 'A2', 75, 100, 75, 100, 50, '1.07', '0.333', '1.000', '1.000', '0.000', '0.333', '0.40', '0.40', '0.40', '0.15', '0.20'),
(29, 'A3', 50, 50, 100, 50, 75, '0.99', '0.667', '0.500', '0.333', '0.667', '0.000', '0.50', '0.30', '0.27', '0.25', '0.15'),
(30, 'A4', 25, 100, 25, 25, 25, '1.02', '0.000', '0.000', '1.000', '1.000', '1.000', '0.30', '0.20', '0.40', '0.30', '0.30'),
(31, 'A5', 75, 100, 75, 75, 75, '1.22', '0.667', '1.000', '1.000', '0.333', '0.333', '0.50', '0.40', '0.40', '0.20', '0.20'),
(32, 'A6', 50, 75, 25, 25, 50, '1.15', '0.333', '0.500', '0.667', '1.000', '1.000', '0.40', '0.30', '0.33', '0.30', '0.30'),
(33, 'A7', 25, 25, 25, 50, 50, '0.87', '0.333', '0.000', '0.000', '0.667', '1.000', '0.40', '0.20', '0.20', '0.25', '0.30'),
(34, 'A8', 25, 75, 100, 100, 100, '0.95', '1.000', '0.000', '0.667', '0.000', '0.000', '0.60', '0.20', '0.33', '0.15', '0.15'),
(35, 'A9', 50, 50, 100, 75, 50, '0.84', '0.333', '0.500', '0.333', '0.333', '0.000', '0.40', '0.30', '0.27', '0.20', '0.15'),
(36, 'A10', 25, 50, 25, 50, 75, '1.04', '0.667', '0.000', '0.333', '0.667', '1.000', '0.50', '0.20', '0.27', '0.25', '0.30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `nilaiP` decimal(10,2) DEFAULT NULL,
  `nilaiK` decimal(10,2) DEFAULT NULL,
  `nilaiD` decimal(10,2) DEFAULT NULL,
  `nilaiA` decimal(10,2) DEFAULT NULL,
  `nilaiJT` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `nilaiP`, `nilaiK`, `nilaiD`, `nilaiA`, `nilaiJT`) VALUES
(1, '0.00', '0.76', '0.04', '0.00', '1.00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD UNIQUE KEY `kode_kain` (`kode_penghuni`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD UNIQUE KEY `kode_kain` (`kode_penghuni`) USING BTREE;

--
-- Indeks untuk tabel `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT untuk tabel `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
