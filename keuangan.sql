-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 05:06 PM
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
('3273142712010004', 'adittyapn', 'Aditya', '123'),
('3411201102', '123', 'paw', '123'),
('3411201105', '123', '123', '132');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_kas`
--

CREATE TABLE `penerimaan_kas` (
  `id_penerimaan` int NOT NULL,
  `payment` varchar(255) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `caraBayar` varchar(255) NOT NULL,
  `kodeBank` varchar(255) NOT NULL,
  `noRekening` varchar(255) NOT NULL,
  `noGiro` varchar(255) NOT NULL,
  `kode_diterima` varchar(255) NOT NULL,
  `nama_diterima` varchar(255) NOT NULL,
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

INSERT INTO `penerimaan_kas` (`id_penerimaan`, `payment`, `no_invoice`, `tanggal`, `caraBayar`, `kodeBank`, `noRekening`, `noGiro`, `kode_diterima`, `nama_diterima`, `proyek`, `kode_proyek`, `nilai_penerimaan`, `ppn`, `materai`, `total_pnrm`, `pot_pph`, `pot_lain`, `total_bayar`, `uraian`) VALUES
(43, 'BANK', 'KSS-PNM-', '1970-01-20', 'transfer', '012', '92302-239230-932923', '', '001', 'Dadang Ruhiat ', '1', 'BL-001', 1000, 0, 10000, 11000, 0, 1000, 10000, 'test'),
(44, 'BANK', 'KSS-PNM-13042090', '2023-04-13', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(45, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(46, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(47, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(48, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(49, 'BANK', 'KSS-PNM-', '1970-01-01', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(50, 'BANK', 'KSS-PNM-20042023', '2023-04-20', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(51, 'BANK', 'KSS-PNM-20042023', '2023-04-20', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(52, 'BANK', 'KSS-PNM-23042023', '2023-04-23', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(53, 'BANK', 'KSS-PNM-24042023', '2023-04-24', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(54, 'BANK', 'KSS-PNM-25042023', '2023-04-25', 'transfer', '012', '92302-239230-932923', '', '001', 'Ahmad Kodir ', '1', 'BL-001', 1500000000, 0, 100000, 1500100000, 0, 10000, 1500090000, 'test'),
(55, 'BANK', 'KSS-PNM-09052023', '2023-05-09', 'transfer', '012', '213123213213', '', '001', 'jancok ', '1', 'BL-001', 100000, 0, 10000, 110000, 0, 10000, 100000, 'test'),
(56, 'BANK', 'KSS-PNM-09052023', '2023-05-09', 'transfer', '012', '213123213213', '', '001', 'jancok ', '1', 'BL-001', 100000, 0, 10000, 110000, 0, 10000, 100000, 'test'),
(57, 'BANK', 'KSS-PNM-09052023', '2023-05-09', 'transfer', '012', '1023920-12039201-21039120', '', '001', ' ', '1', 'BL-001', 10000, 0, 10000, 20000, 0, 10000, 10000, 'test'),
(58, 'BANK', 'KSS-PNM-12052023', '2023-05-12', 'transfer', '012', '899023-23891230-238293-23832', '', '001', 'Jajang Suherman ', '9', 'BL-001', 100000, 0, 100000, 200000, 0, 10000, 190000, 'pemabayran dari uang kas menuju uang distribusi lapangan dan lain sebagainya');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_kas`
--

CREATE TABLE `pengeluaran_kas` (
  `id_pengeluaran` int NOT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `no_invoice` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `cara_bayar` varchar(255) DEFAULT NULL,
  `kode_bank` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `no_giro` varchar(255) DEFAULT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `nama_dibayar` varchar(255) NOT NULL,
  `proyek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kode_proyek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nilaiPengeluaran` int DEFAULT NULL,
  `ppn` int DEFAULT NULL,
  `materai` int DEFAULT NULL,
  `total_pengeluaran` int DEFAULT NULL,
  `pot_pph` int DEFAULT NULL,
  `pot_lain` int DEFAULT NULL,
  `total_bayar` int DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengeluaran_kas`
--

INSERT INTO `pengeluaran_kas` (`id_pengeluaran`, `payment`, `no_invoice`, `tanggal`, `cara_bayar`, `kode_bank`, `no_rekening`, `no_giro`, `kode_bayar`, `nama_dibayar`, `proyek`, `kode_proyek`, `nilaiPengeluaran`, `ppn`, `materai`, `total_pengeluaran`, `pot_pph`, `pot_lain`, `total_bayar`, `uraian`) VALUES
(18, 'BANK', 'KSS-PLR-27052012', '2023-05-20', 'transfer', '012', '92302-239230-932943', '', '', 'Toni Sss', '1', 'BL-001', 10000, 0, 10000, 20000, 0, 1000, 190000, '12323'),
(19, 'BANK', 'KSS-PLR-24052023', '2023-05-24', 'transfer', '012', '92302-239230-932923', '', '', 'Toni S', '1', 'BL-001', 10000, 0, 10000, 20000, 0, 1000, 19000, 'test'),
(20, 'BANK', 'KSS-PLR-01052023', '2023-05-01', 'transfer', '012', '92302-239230-932923', '', '', 'Toni S', '1', 'BL-001', 10000, 0, 1000, 11000, 0, 10000, 1000, 'pembayaran listrik dan internet'),
(21, 'BANK', 'KSS-PLR-12052023', '2023-05-12', 'transfer', '012', '92302-239230-932923', '', '', 'Toni S', '1', 'BL-001', 100000, 0, 10000, 110000, 0, 1000, 109000, '');

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
(3, 'Blue Land'),
(9, 'PT. Koprima Sejahtera');

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
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `pengeluaran_kas`
--
ALTER TABLE `pengeluaran_kas`
  ADD PRIMARY KEY (`id_pengeluaran`);

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
  MODIFY `id_penerimaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pengeluaran_kas`
--
ALTER TABLE `pengeluaran_kas`
  MODIFY `id_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
