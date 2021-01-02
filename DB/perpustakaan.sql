-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 06:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(100) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_hp`, `instansi`, `pekerjaan`) VALUES
(1001, 'Nia', 'Teluk Kuantan', '081277137610', 'Bappeda', 'ASN'),
(1002, 'Amanda', 'Bandung', '0812777412', 'ITB', 'asmik');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` varchar(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tahun_terbit` varchar(11) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `jenis_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun_terbit`, `penerbit`, `jenis_buku`) VALUES
('0013', 'Skotlandia I\'m in Love', 'Zeni Rahmawati', '2018', 'nea publishing', 'novel'),
('1004', 'Menjadi Wanita Sukses dan diCintai', 'Aid Al Qarni', '2007', 'Republika', 'Motivasi'),
('1005', 'Al Hikam', 'Ibnu Athailah', '1995', 'Turos', 'islam'),
('1007', 'cara membuat REST API', 'Arif', '2020', 'Gramedia', 'komputer'),
('1009', 'Hujan senja', 'Tere', '2010', 'A', 'nobel'),
('1013', 'Sang Pangeran', 'Salim A Fillah', '2019', 'Republika', 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'test', 0, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `nama_petugas`, `tgl_peminjaman`, `tgl_kembali`) VALUES
(1, '10001', '1001', 'Nia', '0000-00-00', '0000-00-00'),
(2, '10001', '10001', 'nia', '2020-12-15', '2020-12-18');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tbl_iuphhk`
--
ALTER TABLE `tbl_iuphhk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_iuphhk`
--
ALTER TABLE `tbl_iuphhk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
