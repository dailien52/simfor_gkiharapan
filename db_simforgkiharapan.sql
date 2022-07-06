-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 08:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simforgkiharapan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` int(11) NOT NULL,
  `bahan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `bahan_nama`) VALUES
(1, 'Plastik'),
(2, 'Kayu');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `inventaris_id` int(11) NOT NULL,
  `inventaris_nama` varchar(50) NOT NULL,
  `jenisbarang_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `inventaris_ukuran` varchar(30) NOT NULL,
  `inventaris_tahunbeli` year(4) NOT NULL,
  `inventaris_harga` float NOT NULL,
  `inventaris_jumlah` int(5) NOT NULL,
  `inventaris_keadaan` varchar(40) NOT NULL,
  `ruangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`inventaris_id`, `inventaris_nama`, `jenisbarang_id`, `bahan_id`, `inventaris_ukuran`, `inventaris_tahunbeli`, `inventaris_harga`, `inventaris_jumlah`, `inventaris_keadaan`, `ruangan_id`) VALUES
(1, 'Meja Panjang', 1, 2, '0', 2010, 1000000, 1, 'Baik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `jemaat_nik` bigint(20) NOT NULL,
  `jemaat_nama` varchar(100) NOT NULL,
  `jemaat_jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `jemaat_alamat` text NOT NULL,
  `jemaat_tempat_lahir` varchar(25) NOT NULL,
  `jemaat_tanggal_lahir` date NOT NULL,
  `unsur_id` int(11) NOT NULL,
  `ksp_id` int(11) NOT NULL,
  `wijk_id` int(11) NOT NULL,
  `jemaat_baptis` enum('Sudah Baptis','Belum Baptis','','') NOT NULL,
  `jemaat_sidi` enum('Sudah Sidi','Belum Sidi','','') NOT NULL,
  `jemaat_nikah` enum('Sudah Nikah','Belum Nikah','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`jemaat_nik`, `jemaat_nama`, `jemaat_jenis_kelamin`, `jemaat_alamat`, `jemaat_tempat_lahir`, `jemaat_tanggal_lahir`, `unsur_id`, `ksp_id`, `wijk_id`, `jemaat_baptis`, `jemaat_sidi`, `jemaat_nikah`) VALUES
(26, 'Meiceline', 'Perempuan', 'Perumnas 3', 'Wamena', '1998-05-26', 2, 27, 10, 'Sudah Baptis', 'Sudah Sidi', 'Belum Nikah'),
(52, 'Pato', 'Laki-laki', 'P1W', 'Wamena', '1997-05-19', 2, 27, 1, 'Sudah Baptis', 'Sudah Sidi', 'Belum Nikah'),
(12345, 'Theis', 'Laki-laki', 'Perumnas 3', 'Wamena', '2005-10-19', 2, 15, 1, 'Sudah Baptis', 'Belum Sidi', 'Belum Nikah'),
(123455, 'Joe', 'Laki-laki', 'Perumnas 3', 'Wamena', '2222-02-22', 2, 15, 1, 'Sudah Baptis', 'Belum Sidi', 'Belum Nikah');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `jenisbarang_id` int(11) NOT NULL,
  `jenisbarang_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisbarang`
--

INSERT INTO `jenisbarang` (`jenisbarang_id`, `jenisbarang_nama`) VALUES
(1, 'Meja');

-- --------------------------------------------------------

--
-- Table structure for table `ksp`
--

CREATE TABLE `ksp` (
  `ksp_id` int(11) NOT NULL,
  `wijk_id` int(11) NOT NULL,
  `ksp_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ksp`
--

INSERT INTO `ksp` (`ksp_id`, `wijk_id`, `ksp_nama`) VALUES
(15, 11, 'Getsemani1'),
(24, 1, 'III'),
(26, 2, 'aa'),
(27, 6, 'Getsemani'),
(30, 3, 'Tus'),
(31, 1, 'Tus');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `ruangan_nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `ruangan_nama`) VALUES
(1, 'tes'),
(2, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `unsur`
--

CREATE TABLE `unsur` (
  `unsur_id` int(11) NOT NULL,
  `unsur_nama` varchar(50) NOT NULL,
  `unsur_kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unsur`
--

INSERT INTO `unsur` (`unsur_id`, `unsur_nama`, `unsur_kode`) VALUES
(1, 'Sekolah Minggu', 'SM'),
(2, 'Persekutuan Anak dan Remaja', 'PAR'),
(5, 'Persekutuan Wanita', 'PW');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_namalengkap` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT 'profil.png',
  `user_level` int(1) NOT NULL COMMENT '1:admin\r\n1:admin, 2:koordinator wijk, 3:bendahara barang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_namalengkap`, `user_foto`, `user_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Alberth', 'profil.png', 1),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'Edik', 'profil.png', 2),
(18, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'Ichato', 'profil.png', 3),
(24, 'remuz', '827ccb0eea8a706c4c34a16891f84e7b', 'Remuz Kmurawak', 'profil.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wijk`
--

CREATE TABLE `wijk` (
  `wijk_id` int(11) NOT NULL,
  `wijk_nama` varchar(20) NOT NULL,
  `wijk_jumlah_ksp` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wijk`
--

INSERT INTO `wijk` (`wijk_id`, `wijk_nama`, `wijk_jumlah_ksp`) VALUES
(1, 'IA', 4),
(2, 'IB', 4),
(3, 'IIA', 6),
(4, 'IIB', 6),
(5, 'III', 9),
(6, 'IVA', 4),
(7, 'IVB', 4),
(8, 'VA', 4),
(9, 'VB', 7),
(10, 'VIA', 3),
(11, 'VIB', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`inventaris_id`),
  ADD KEY `ruangan_id` (`ruangan_id`),
  ADD KEY `bahan_id` (`bahan_id`),
  ADD KEY `jenisbarang_id` (`jenisbarang_id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`jemaat_nik`),
  ADD KEY `unsur_id` (`unsur_id`),
  ADD KEY `ksp_id` (`ksp_id`),
  ADD KEY `wijk_id` (`wijk_id`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`jenisbarang_id`);

--
-- Indexes for table `ksp`
--
ALTER TABLE `ksp`
  ADD PRIMARY KEY (`ksp_id`),
  ADD KEY `wijk_id` (`wijk_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `unsur`
--
ALTER TABLE `unsur`
  ADD PRIMARY KEY (`unsur_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wijk`
--
ALTER TABLE `wijk`
  ADD PRIMARY KEY (`wijk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `bahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `inventaris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `jemaat_nik` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456;

--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `jenisbarang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ksp`
--
ALTER TABLE `ksp`
  MODIFY `ksp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unsur`
--
ALTER TABLE `unsur`
  MODIFY `unsur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `wijk`
--
ALTER TABLE `wijk`
  MODIFY `wijk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`bahan_id`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`jenisbarang_id`) REFERENCES `jenisbarang` (`jenisbarang_id`),
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`ruangan_id`);

--
-- Constraints for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD CONSTRAINT `jemaat_ibfk_1` FOREIGN KEY (`ksp_id`) REFERENCES `ksp` (`ksp_id`),
  ADD CONSTRAINT `jemaat_ibfk_2` FOREIGN KEY (`unsur_id`) REFERENCES `unsur` (`unsur_id`),
  ADD CONSTRAINT `jemaat_ibfk_3` FOREIGN KEY (`wijk_id`) REFERENCES `wijk` (`wijk_id`);

--
-- Constraints for table `ksp`
--
ALTER TABLE `ksp`
  ADD CONSTRAINT `ksp_ibfk_1` FOREIGN KEY (`wijk_id`) REFERENCES `wijk` (`wijk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
