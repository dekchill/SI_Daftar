-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompetensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `password` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `nama`, `nip`) VALUES
(2021503041, 'Zainuri ', 2147483647),
(2021503045, 'Asdiwa', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nama_gelar` varchar(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jenis_jfk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nama_gelar`, `nip`, `alamat`, `jenis_jfk`) VALUES
('Desi Ernawati A.Md.Keb', 21478902, 'Situbondo', 'Bidan'),
('Luluk Nuril Mukarromah M.Kep', 768902725, 'keperawatan', ''),
('Luluk Nuril Mukarromah M.Kep', 768902725, 'keperawatan', ''),
('Luluk Nuril Mukarromah M.Kep', 768902725, 'keperawatan', ''),
('', 0, 'situbondo', 'keperawatan'),
('Luluk Nuril Mukarromah M.Kep', 768902725, 'situbondo', 'keperawatan'),
('maulidatul mawaddah M.Kep', 2147483647, 'jember', 'keperawatan');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `alamat_email` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `instansi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`alamat_email`, `unit_kerja`, `instansi`) VALUES
('dellanatasya2003@gmail.com', 'RSUD Pukesmas Suboh', 'Dinas Kesehatan Situ'),
('maulidatulmawaddah@gmail.com', 'RSUD Arjasa', 'Dinas Kesehatan Situ'),
('nurilluluk1306@gmail.com', 'RSUD Pukesmas Asembagus', 'Dinas Kesehatan Situ'),
('sitikhoiriyah@gmail.com', 'RSUD dr. Abdoer Rahem', 'Dinas Kesehatan Situ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`alamat_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
