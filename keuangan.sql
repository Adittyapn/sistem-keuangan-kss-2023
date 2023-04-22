-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Apr 2023 pada 13.26
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nik`, `username`, `nama_pengguna`, `pass`) VALUES
('11', '1234', '1233', '11'),
('3411201102', '123', 'paw', '123'),
('3411201105', '123', '123', '132');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_kas`
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
-- Dumping data untuk tabel `penerimaan_kas`
--

INSERT INTO `penerimaan_kas` (`id_penerimaan`, `payment`, `no_invoice`, `tanggal`, `caraBayar`, `kodeBank`, `noRekening`, `noGiro`, `kode_diterima`, `nama_diterima`, `proyek`, `kode_proyek`, `nilai_penerimaan`, `ppn`, `materai`, `total_pnrm`, `pot_pph`, `pot_lain`, `total_bayar`, `uraian`) VALUES
(41, 'KAS', 'KSS-PNM-020423', '2023-04-22', 'transfer', '012', '032-900-977-23', '', '001', 'ASEP DANA CITA', '1', 'BL-001', 1500000, 0, 10000, 1510000, 0, 10000, 1500000, 'pot');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_kas`
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
-- Dumping data untuk tabel `pengeluaran_kas`
--

INSERT INTO `pengeluaran_kas` (`id_pengeluaran`, `payment`, `no_invoice`, `tanggal`, `cara_bayar`, `kode_bank`, `no_rekening`, `no_giro`, `kode_bayar`, `nama_dibayar`, `proyek`, `kode_proyek`, `nilaiPengeluaran`, `ppn`, `materai`, `total_pengeluaran`, `pot_pph`, `pot_lain`, `total_bayar`, `uraian`) VALUES
(15, 'BANK', 'KSS-PLR-21042023', '2023-04-21', 'transfer', '012', '032-900-977-9', '', '', 'ASEP NINJA', '1', 'BL-001', 100000, 0, 10000, 110000, 0, 10000, 100000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id`, `nama`) VALUES
(1, 'Blue Land\r\n'),
(2, 'Red Land'),
(3, 'Blue Land');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `penerimaan_kas`
--
ALTER TABLE `penerimaan_kas`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indeks untuk tabel `pengeluaran_kas`
--
ALTER TABLE `pengeluaran_kas`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penerimaan_kas`
--
ALTER TABLE `penerimaan_kas`
  MODIFY `id_penerimaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_kas`
--
ALTER TABLE `pengeluaran_kas`
  MODIFY `id_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
