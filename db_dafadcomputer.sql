-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 09:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dafadcomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_keluar`
--

CREATE TABLE `t_keluar` (
  `id_keluar` int(25) NOT NULL,
  `id_masuk` int(25) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `ket_keluar` varchar(100) DEFAULT NULL,
  `total_biaya` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_terima`
--

CREATE TABLE `t_terima` (
  `id_masuk` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `tgl_terima` date NOT NULL,
  `rusak` varchar(50) NOT NULL,
  `ket_masuk` varchar(50) NOT NULL,
  `status` int(1) DEFAULT '0',
  `user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_terima`
--

INSERT INTO `t_terima` (`id_masuk`, `nama`, `alamat`, `telp`, `barang`, `tgl_terima`, `rusak`, `ket_masuk`, `status`, `user`) VALUES
(5, 'Asep Setiyabudi', 'Lebak rt03 rw04 Kecamatan pakisaji kabupaten jepar', '085225885518', 'Laptop Lenovo', '2020-05-03', 'Error Loading System', 'perlengkapan baterai dan charger', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('admin', '$2y$10$Zg5.jxIyQyguOjnnBTymv.SC7vya6difAPYkuTf/WoYhhsi9elouO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_keluar`
--
ALTER TABLE `t_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_masuk` (`id_masuk`);

--
-- Indexes for table `t_terima`
--
ALTER TABLE `t_terima`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_keluar`
--
ALTER TABLE `t_keluar`
  MODIFY `id_keluar` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_terima`
--
ALTER TABLE `t_terima`
  MODIFY `id_masuk` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_keluar`
--
ALTER TABLE `t_keluar`
  ADD CONSTRAINT `t_keluar_ibfk_1` FOREIGN KEY (`id_masuk`) REFERENCES `t_terima` (`id_masuk`);

--
-- Constraints for table `t_terima`
--
ALTER TABLE `t_terima`
  ADD CONSTRAINT `t_terima_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
