-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 04:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuanin`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` enum('Pengeluaran','Pemasukan','Hutang','Piutang') NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `tanggal`, `tipe`, `jumlah`) VALUES
(20, 'Pembayaran Piutang', '2021-10-29', 'Piutang', 6227000),
(23, 'Penjualan Produk', '2021-11-03', 'Pemasukan', 900000),
(26, 'Tambah Investasi', '2021-11-11', 'Pemasukan', 5650000),
(27, 'Biaya Gaji', '2021-11-30', 'Pengeluaran', 6207000),
(28, 'Token Listrik', '2021-11-28', 'Pengeluaran', 450000),
(29, 'Penjualan Produk B', '2021-12-01', 'Pemasukan', 1500000),
(32, 'Pembelian ATK', '2021-12-23', 'Pengeluaran', 1750000),
(34, 'Tes', '2021-12-29', 'Pengeluaran', 16000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `no_hp`, `email`) VALUES
(74, 'Novan', 'novan', '$2y$10$R.OKULMSms7A64habQCkwe2vLIEdKFZos0fJ1LGYu8zw1v/MBq3o2', '0812345678', 'novan@gmail.com'),
(75, 'Admin', 'admin', '$2y$10$piv6gVup6mRn7Fwi2ph/2OiHX5irXJ.TS5h/9k/BlfX09a8lQ60BC', '0812345678', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
