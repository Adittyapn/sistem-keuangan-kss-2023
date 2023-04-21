-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2023 at 10:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nik`, `username`, `nama_pengguna`, `pass`) VALUES
('3411201102', '123', 'paw', '123'),
('3411201105', '123', '123', '132');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_kas`
--

CREATE TABLE `penerimaan_kas` (
  `id` int NOT NULL,
  `payment` varchar(255) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `caraBayar` varchar(255) NOT NULL,
  `kodeBank` varchar(255) NOT NULL,
  `noRekening` varchar(255) NOT NULL,
  `noGiro` varchar(255) NOT NULL,
  `proyek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_proyek` varchar(255) NOT NULL,
  `nilai_penerimaan` int NOT NULL,
  `ppn` int NOT NULL,
  `materai` int NOT NULL,
  `total_pnrm` int NOT NULL,
  `pot_pph` int DEFAULT NULL,
  `pot_lain` int NOT NULL,
  `total_bayar` int NOT NULL,
  `uraian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerimaan_kas`
--

INSERT INTO `penerimaan_kas` (`id`, `payment`, `no_invoice`, `tanggal`, `caraBayar`, `kodeBank`, `noRekening`, `noGiro`, `proyek`, `kode_proyek`, `nilai_penerimaan`, `ppn`, `materai`, `total_pnrm`, `pot_pph`, `pot_lain`, `total_bayar`, `uraian`) VALUES
(15, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '', '', '', '1', '', 1500000000, 150000000, 110000, 1650110000, 0, 122112, 900000000, ''),
(16, 'BANK', 'KSS-PNM-05042023', '2023-04-05', 'tunai', '', '', '2183921-2139129-32193', '1', 'TBS-5', 10000, 1000, 10000, 21000, 0, 1000, 10000, ''),
(17, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '', '', '', '1', '', 15000, 1500, 10000, 26500, 1325, 10000, 15175, 'test'),
(18, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '', '', '', '1', '', 15000, 1500, 10000, 26500, 0, 10000, 15175, 'test'),
(19, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '', '', '', '1', '', 10000, 0, 10000, 21000, 0, 1000, 18950, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama`) VALUES
(1, 'Blue Land\r\n'),
(2, 'Red Land'),
(3, 'Blue Land');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penerimaan_kas`
--
ALTER TABLE `penerimaan_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerimaan_kas`
--
ALTER TABLE `penerimaan_kas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
