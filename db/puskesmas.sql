-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2023 pada 16.43
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

--
-- Dumping data untuk tabel `kepala`
--

INSERT INTO `kepala` (`kepala_id`, `kepala_nama`, `kepala_email`, `kepala_password`) VALUES
(1, 'Kepala Kantor 1', 'kepala1@mail.com', 'da21279387f71ca8e09432cdea87a553');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `kunjungan_id` int(11) NOT NULL,
  `kunjungan_pasien_nama` varchar(255) NOT NULL,
  `kunjungan_pasien_jk` varchar(255) NOT NULL,
  `kunjungan_pasien_tgl_lahir` date NOT NULL,
  `kunjungan_poli_id` int(11) NOT NULL,
  `kunjungan_tanggal` date NOT NULL,
  `kunjungan_jam` varchar(255) NOT NULL,
  `kunjungan_status` varchar(255) NOT NULL,
  `kunjungan_admin` int(11) NOT NULL,
  `kunjungan_paramedis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`kunjungan_id`, `kunjungan_pasien_nama`, `kunjungan_pasien_jk`, `kunjungan_pasien_tgl_lahir`, `kunjungan_poli_id`, `kunjungan_tanggal`, `kunjungan_jam`, `kunjungan_status`, `kunjungan_admin`, `kunjungan_paramedis`) VALUES
(22, 'Tes', 'Laki-laki', '2000-01-07', 2, '2023-06-03', '09:03:00 pm', 'Telah Diperiksa', 1, 1),
(27, 'jfdsfkdsf', 'Perempuan', '2000-01-01', 2, '2023-07-05', '07:45:33 pm', 'Telah Diperiksa', 1, 1),
(28, 'trtrtrtrtrt', 'Perempuan', '2003-09-07', 2, '2023-07-05', '10:28:35 pm', 'Telah Diperiksa', 1, 1),
(29, 'Harmoni', 'Perempuan', '1990-10-10', 2, '2023-07-05', '08:01:36 pm', 'Telah Diperiksa', 1, 1),
(30, 'Te tessss new', 'Laki-laki', '1997-12-30', 4, '2023-07-05', '10:29:02 pm', 'Belum Diperiksa', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paramedis`
--

CREATE TABLE `paramedis` (
  `paramedis_id` int(11) NOT NULL,
  `paramedis_nama` varchar(255) NOT NULL,
  `paramedis_email` varchar(255) NOT NULL,
  `paramedis_password` varchar(255) NOT NULL,
  `paramedis_poli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paramedis`
--

INSERT INTO `paramedis` (`paramedis_id`, `paramedis_nama`, `paramedis_email`, `paramedis_password`, `paramedis_poli_id`) VALUES
(1, 'sisilia', 'paramedis1@mail.com', '2d0140635e1d6a42f6631b12ebdf84ad', 2);

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
-- Dumping data untuk tabel `penanganan`
--

INSERT INTO `penanganan` (`penanganan_id`, `penanganan_kunjungan`, `penanganan_keluhan`, `penanganan_kesimpulan`, `penanganan_pengobatan`, `penanganan_ket`) VALUES
(9, 22, 'Tesss', 'Tes tes', 'tesss', '---'),
(10, 27, 'vcxvcxvcxvcxvcxvxcv', 'vxcvcxvcx', 'vdfxvdfsgdfgdf', 'gdfgdf'),
(11, 29, 'dsfdsfdsf', 'sdfdsf', 'sdfdsfsd', 'ds'),
(12, 28, 'gfgf', 'vcvv', 'vdfvfdv', 'h');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `poli_id` int(11) NOT NULL,
  `poli_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`poli_id`, `poli_nama`) VALUES
(1, 'Poli Umum'),
(2, 'Poli Gigi'),
(3, 'Poli KIA/KB'),
(4, 'Poli Gizi');

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
  ADD PRIMARY KEY (`kunjungan_id`),
  ADD KEY `kunjungan_paramedis` (`kunjungan_paramedis`),
  ADD KEY `kunjungan_admin` (`kunjungan_admin`),
  ADD KEY `kunjungan_poli_id` (`kunjungan_poli_id`);

--
-- Indeks untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  ADD PRIMARY KEY (`paramedis_id`);

--
-- Indeks untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`penanganan_id`),
  ADD KEY `penanganan_kunjungan` (`penanganan_kunjungan`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`poli_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kepala`
--
ALTER TABLE `kepala`
  MODIFY `kepala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `kunjungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  MODIFY `paramedis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `penanganan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `poli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`kunjungan_admin`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kunjungan_ibfk_2` FOREIGN KEY (`kunjungan_poli_id`) REFERENCES `poli` (`poli_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `penanganan_ibfk_1` FOREIGN KEY (`penanganan_kunjungan`) REFERENCES `kunjungan` (`kunjungan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
