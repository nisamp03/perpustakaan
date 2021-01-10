-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 11:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iuphhk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iuphhk`
--

CREATE TABLE `tbl_iuphhk` (
  `id` int(11) NOT NULL,
  `nama_iuphhk` varchar(255) DEFAULT NULL,
  `sk_izin` varchar(255) DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `telepon_kantor` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `telepon_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iuphhk`
--

INSERT INTO `tbl_iuphhk` (`id`, `nama_iuphhk`, `sk_izin`, `tanggal_sk`, `alamat_kantor`, `telepon_kantor`, `pic`, `telepon_pic`) VALUES
(1, 'PT. Cahaya', 'SK.200', '0000-00-00', 'Jl. Soekarno-Hatta', '021-1234', 'Irfan', '081888'),
(2, 'PT. Bersaudara', 'SK.145', '0000-00-00', 'Jl. Sumatera', '021-5789', 'Budi', '081560'),
(3, 'PT. Sejahtera', 'SK.155', '0000-00-00', 'Jl. Pembangunan', '021-9090', 'Eka', '089090'),
(4, 'PT. Sentosa', 'SK.90', '0000-00-00', 'Jl. Pajajaran', '021-2345', 'Rudi', '089123'),
(8, 'PT. Indah', 'SK.165', '0000-00-00', 'Jl. Jombang', '021021', 'Udin', '081234'),
(9, NULL, 'SK.165', '0000-00-00', 'Jl. Jombang', '021021', 'Udin', '081234'),
(10, 'PT. Indah', 'SK.165', '0000-00-00', 'Jl. Jombang', '021021', 'Udin', '081234'),
(11, 'PT. Indah Cemerlang', 'SK.168', '2021-01-01', 'Jl. Jombang', '021021', 'Udin', '081234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'rinaldy', 'aebc3ebee2f0c8b08b43d26c2b0055b19caeaf4a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_iuphhk`
--
ALTER TABLE `tbl_iuphhk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_iuphhk`
--
ALTER TABLE `tbl_iuphhk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
