-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 09:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `NamaBarang` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `idPengguna`) VALUES
(2001, 'Barang1', 'FRAGILE', 'Kg', 1001),
(2002, 'Barang2', 'FRAGILE', 'Kg', 1001),
(2003, 'Barang3', 'FRAGILE', 'Kg', 1002),
(2004, 'Barang4', 'FRAGILE', 'Kg', 1002),
(2005, 'Barang5', 'FRAGILE', 'Kg', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `idAkses` int(11) NOT NULL,
  `NamaAkses` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`idAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Admin1', 'Mempunyai Hak Akses'),
(2, 'Admin2', 'Mempunyai Hak Akses'),
(3, 'Admin3', 'Mempunyai Hak Akses');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `NamaPelanggan` varchar(50) DEFAULT NULL,
  `JumlahBarang` int(11) DEFAULT NULL,
  `HargaBarang` decimal(10,2) DEFAULT NULL,
  `TotalHarga` decimal(10,2) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `NamaPelanggan`, `JumlahBarang`, `HargaBarang`, `TotalHarga`, `idPengguna`) VALUES
(6001, 'Pelanggan1', 1, 11000.00, 11000.00, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idPembelian` int(11) NOT NULL,
  `JumlahPembelian` int(11) DEFAULT NULL,
  `HargaBeli` decimal(10,2) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idPembelian`, `JumlahPembelian`, `HargaBeli`, `idPengguna`) VALUES
(3001, 10, 15000.00, 1001),
(3002, 15, 20000.00, 1002),
(3003, 20, 25000.00, 1003),
(3004, 25, 30000.00, 1001),
(3005, 30, 35000.00, 1002),
(3006, 35, 55000.00, 1001),
(3007, 40, 21000.00, 1002),
(3008, 45, 65000.00, 1001),
(3009, 50, 33000.00, 1003),
(3010, 55, 15000.00, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(11) NOT NULL,
  `NamaPengguna` varchar(50) DEFAULT NULL,
  `Passw0rd` varchar(50) DEFAULT NULL,
  `NamaDepan` varchar(50) DEFAULT NULL,
  `NamaBelakang` varchar(50) DEFAULT NULL,
  `NoHp` varchar(15) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `idAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `NamaPengguna`, `Passw0rd`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`, `idAkses`) VALUES
(1001, 'Pengguna1', 'pengguna123', 'Pengguna', 'Satu', '081234567891', 'Jakarta', 1),
(1002, 'Pengguna2', 'pengguna123', 'Pengguna', 'Dua', '081234567892', 'Jakarta', 1),
(1003, 'Pengguna3', 'pengguna123', 'Pengguna', 'Tiga', '081234567893', 'Jakarta', 2),
(1004, 'Pengguna4', 'pengguna123', 'Pengguna', 'Empat', '081234567894', 'Jakarta', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int(11) NOT NULL,
  `JumlahPenjualan` int(11) DEFAULT NULL,
  `HargaJual` decimal(10,2) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `JumlahPenjualan`, `HargaJual`, `idPengguna`) VALUES
(4001, 10, 20000.00, 1001),
(4002, 22, 23000.00, 1003),
(4003, 13, 40000.00, 1002),
(4004, 15, 30000.00, 1003),
(4005, 10, 20000.00, 1003),
(4006, 11, 37000.00, 1001),
(4007, 24, 24000.00, 1001),
(4008, 19, 39000.00, 1002),
(4009, 18, 36000.00, 1003),
(4010, 15, 32000.00, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(50) DEFAULT NULL,
  `JumlahBarang` int(11) DEFAULT NULL,
  `HargaBarang` decimal(10,2) DEFAULT NULL,
  `TotalHarga` decimal(10,2) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `NamaSupplier`, `JumlahBarang`, `HargaBarang`, `TotalHarga`, `idPengguna`) VALUES
(7001, 'Supplier1', 1, 11000.00, 11000.00, 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`idAkses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idPembelian`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`),
  ADD KEY `idAkses` (`idAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `penjualan` (`idPengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `barang` (`idPengguna`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `hakakses` (`idAkses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `barang` (`idPengguna`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `pembelian` (`idPengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
