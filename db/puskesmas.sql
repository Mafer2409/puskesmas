-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2023 pada 16.02
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`) VALUES
(1, 'Admin 1', 'admin1@mail.com', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala`
--

CREATE TABLE `kepala` (
  `kepala_id` int(11) NOT NULL,
  `kepala_nama` varchar(255) NOT NULL,
  `kepala_email` varchar(255) NOT NULL,
  `kepala_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `kunjungan_id` int(11) NOT NULL,
  `kunjungan_pasien_nama` varchar(255) NOT NULL,
  `kunjungan_pasien_jk` varchar(255) NOT NULL,
  `kunjungan_pasien_umur` int(11) NOT NULL,
  `kunjungan_tanggal` date NOT NULL,
  `kunjungan_jam` varchar(255) NOT NULL,
  `kunjungan_status` varchar(255) NOT NULL,
  `kunjungan_admin` int(11) NOT NULL,
  `kunjungan_paramedis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`kunjungan_id`, `kunjungan_pasien_nama`, `kunjungan_pasien_jk`, `kunjungan_pasien_umur`, `kunjungan_tanggal`, `kunjungan_jam`, `kunjungan_status`, `kunjungan_admin`, `kunjungan_paramedis`) VALUES
(1, 'Tess Kunjungan', 'Laki-laki', 18, '2023-05-10', '01:09:01am', 'Belum Diperiksa', 1, 0),
(2, 'Tes kunjungan 2', 'Laki-laki', 23, '2023-05-10', '01:50:09pm', 'Belum Diperiksa', 1, 0),
(3, 'Ts kunjungan 3', 'Perempuan', 20, '2023-05-10', '02:55:18pm', 'Belum Diperiksa', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paramedis`
--

CREATE TABLE `paramedis` (
  `paramedis_id` int(11) NOT NULL,
  `paramedis_nama` varchar(255) NOT NULL,
  `paramedis_email` varchar(255) NOT NULL,
  `paramedis_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paramedis`
--

INSERT INTO `paramedis` (`paramedis_id`, `paramedis_nama`, `paramedis_email`, `paramedis_password`) VALUES
(1, 'Paramedis 1', 'paramedis1@mail.com', '2d0140635e1d6a42f6631b12ebdf84ad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
--

CREATE TABLE `penanganan` (
  `penanganan_id` int(11) NOT NULL,
  `penanganan_kunjungan` int(11) NOT NULL,
  `penanganan_keluhan` text NOT NULL,
  `penanganan_kesimpulan` text NOT NULL,
  `penanganan_pengobatan` text NOT NULL,
  `penanganan_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `kepala`
--
ALTER TABLE `kepala`
  ADD PRIMARY KEY (`kepala_id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`kunjungan_id`);

--
-- Indeks untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  ADD PRIMARY KEY (`paramedis_id`);

--
-- Indeks untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`penanganan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kepala`
--
ALTER TABLE `kepala`
  MODIFY `kepala_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `kunjungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  MODIFY `paramedis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `penanganan_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
