-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 11:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`) VALUES
(1, 'Admin 1', 'admin1@mail.com', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `kepala`
--

CREATE TABLE `kepala` (
  `kepala_id` int(11) NOT NULL,
  `kepala_nama` varchar(255) NOT NULL,
  `kepala_email` varchar(255) NOT NULL,
  `kepala_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala`
--

INSERT INTO `kepala` (`kepala_id`, `kepala_nama`, `kepala_email`, `kepala_password`) VALUES
(1, 'Kepala Kantor 1', 'kepala1@mail.com', 'da21279387f71ca8e09432cdea87a553');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `kunjungan_id` int(11) NOT NULL,
  `kunjungan_pasien_nama` varchar(255) NOT NULL,
  `kunjungan_pasien_jk` varchar(255) NOT NULL,
  `kunjungan_pasien_umur` int(11) NOT NULL,
  `kunjungan_poli` varchar(255) NOT NULL,
  `kunjungan_tanggal` date NOT NULL,
  `kunjungan_jam` varchar(255) NOT NULL,
  `kunjungan_status` varchar(255) NOT NULL,
  `kunjungan_admin` int(11) NOT NULL,
  `kunjungan_paramedis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`kunjungan_id`, `kunjungan_pasien_nama`, `kunjungan_pasien_jk`, `kunjungan_pasien_umur`, `kunjungan_poli`, `kunjungan_tanggal`, `kunjungan_jam`, `kunjungan_status`, `kunjungan_admin`, `kunjungan_paramedis`) VALUES
(1, 'Tess Kunjungan', 'Laki-laki', 18, '', '2023-05-10', '01:09:01am', 'Belum Diperiksa', 1, 0),
(2, 'Tes kunjungan 2', 'Laki-laki', 23, '', '2023-03-10', '01:50:09pm', 'Belum Diperiksa', 1, 0),
(3, 'Ts kunjungan 3', 'Perempuan', 20, '', '2023-04-10', '02:55:18pm', 'Telah Diperiksa', 1, 1),
(4, 'Tes pasien 4', 'Laki-laki', 18, '', '2023-03-11', '12:49:46 am', 'Telah Diperiksa', 1, 1),
(5, 'Petrus R Lamablawa', 'Laki-laki', 35, '', '2023-05-24', '07:41:38 pm', 'Belum Diperiksa', 1, 0),
(6, 'Yohanes Sani Darato', 'Laki-laki', 30, '', '2023-02-02', '11:13:02 am', 'Telah Diperiksa', 1, 1),
(7, 'Cecilia Rewo', 'Perempuan', 18, '', '2023-05-30', '04:38:23 pm', 'Telah Diperiksa', 1, 1),
(8, 'xxxx', 'Laki-laki', 18, 'Poli Umum', '2023-05-31', '04:44:34 pm', 'Belum Diperiksa', 1, 0),
(10, 'Tesss', 'Laki-laki', 18, 'Poli KIA/KB', '2023-05-31', '04:27:14 pm', 'Belum Diperiksa', 1, 0),
(11, 'ttt', 'Laki-laki', 21, 'Poli Gigi', '2023-05-31', '04:44:06 pm', 'Telah Diperiksa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paramedis`
--

CREATE TABLE `paramedis` (
  `paramedis_id` int(11) NOT NULL,
  `paramedis_nama` varchar(255) NOT NULL,
  `paramedis_email` varchar(255) NOT NULL,
  `paramedis_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paramedis`
--

INSERT INTO `paramedis` (`paramedis_id`, `paramedis_nama`, `paramedis_email`, `paramedis_password`) VALUES
(1, 'sisilia', 'paramedis1@mail.com', '2d0140635e1d6a42f6631b12ebdf84ad');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
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
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`penanganan_id`, `penanganan_kunjungan`, `penanganan_keluhan`, `penanganan_kesimpulan`, `penanganan_pengobatan`, `penanganan_ket`) VALUES
(1, 3, 'Batuk, Kerongkongan gatal', 'Pilek', 'Paracetamol 1 strip (3x1)\r\nDemacolin 1 strip (3x1)', '-'),
(2, 4, 'Hidung tersumbat, sakit kepala, pusing', 'Pilek', 'Paracetamol 1 strip (3x1)', '--'),
(3, 6, 'Nyeri ulu hati tembus belakang', 'Dispepsia', 'Antasida 3x1', ''),
(4, 7, 'Batuk', 'Flu', 'Misagrip', 'Minum air yang banyak'),
(5, 11, 'Lapar', 'Butuh uang', 'Cari uang', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kepala`
--
ALTER TABLE `kepala`
  ADD PRIMARY KEY (`kepala_id`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`kunjungan_id`);

--
-- Indexes for table `paramedis`
--
ALTER TABLE `paramedis`
  ADD PRIMARY KEY (`paramedis_id`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`penanganan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepala`
--
ALTER TABLE `kepala`
  MODIFY `kepala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `kunjungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paramedis`
--
ALTER TABLE `paramedis`
  MODIFY `paramedis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `penanganan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
