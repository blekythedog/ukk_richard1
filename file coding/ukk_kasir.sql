-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 08:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kode_barang`, `harga`, `stok`, `tanggal`) VALUES
(23, 'calvinklein', 'ck', 50000, 50, '2024-02-28'),
(24, 'JKS', 'jojo', 900000, 90000, '2024-02-28'),
(25, 'thomas', 'tm', 80000, 578, '2024-02-28'),
(29, 'addidas', 'uk', 4599000, 6666666, '2024-02-29'),
(30, 'shoppee', 'idn', 9000, 6666666, '2024-02-29'),
(31, 'uniqlo', 'uniq', 9000000, 900, '2024-02-29'),
(32, 'nuke', 'nuklir', 80000000, 0, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(4) NOT NULL,
  `id_barang` int(4) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `nama_supplier`, `jumlah`, `tanggal_masuk`) VALUES
(20, 24, 'richard', 90000, '2024-02-28'),
(21, 23, 'hoho', 50, '2024-02-28'),
(22, 25, 'asep', 578, '2024-02-28'),
(23, 28, 'richard', 7890, '2024-02-28'),
(24, 26, 'gogogo', 345, '2024-02-28'),
(25, 27, 'richard', 897645, '2024-02-28'),
(26, 31, 'richard', 900, '2024-02-29'),
(27, 29, 'richard', 6666666, '2024-02-29'),
(28, 30, 'wop', 6666666, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(4) NOT NULL,
  `id_barang_masuk` int(4) NOT NULL,
  `log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(4) NOT NULL,
  `id_barang` int(4) NOT NULL,
  `keranjang` varchar(50) NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `total_pesan` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_barang`, `keranjang`, `pelanggan`, `total_pesan`, `harga`, `tanggal`) VALUES
(1, 0, 'mewmew', 'richard', 5, 445000, '2024-02-29'),
(2, 0, 'calvinklein', 'richard', 5, 50000, '2024-02-29'),
(3, 0, 'ororor', 'opsi', 67, 38048630, '2024-02-29'),
(4, 0, 'calvinklein', 'richard', 6, 300000, '2024-02-29'),
(5, 0, 'calvinklein', 'herlep', 5, 250000, '2024-02-29'),
(6, 0, 'calvinklein', 'gritt', 5, 250000, '2024-02-29'),
(7, 0, 'calvinklein', 'erererererer', 5, 0, '2024-02-29'),
(8, 0, 'calvinklein', 'richard1', 67, 3350000, '2024-02-29'),
(9, 0, 'calvinklein', 'oropopo', 5, 250000, '2024-02-29'),
(10, 0, 'calvinklein', 'totkot', 5, 250000, '2024-02-29');

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `update_stock_trigger` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
    UPDATE barang
    SET stok = stok - total_pesan
    WHERE id_barang = barang.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `transaksi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
