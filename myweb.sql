-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2020 at 05:33 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--
CREATE DATABASE IF NOT EXISTS `myweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myweb`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klub`
--

CREATE TABLE `tbl_klub` (
  `id_klub` int(100) NOT NULL,
  `nama_klub` varchar(255) NOT NULL,
  `visi` varchar(50) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `surat_pernyataan` varchar(128) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_klub`
--

INSERT INTO `tbl_klub` (`id_klub`, `nama_klub`, `visi`, `misi`, `alamat`, `email`, `kontak`, `logo`, `surat_pernyataan`, `created_by`) VALUES
(1, 'Essala FC', 'Maju maju maju', 'Maju Lagi', 'Larangan Brebes', 'ssb.essala.larangan@', '083712831927398', 'logo-klub-14-07-20.png', 'surat-pernyataan-14-07-20.pdf', 2),
(2, 'SSB Paksisakti Wanakerta', 'Maju maju maju', 'Maju Lagi', 'Wanakerta', 'namapur812@gmail.com', '08371283192739', 'logo-klub-14-07-20.jpg', 'surat-pernyataan-14-07-201.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `id_official` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `kota_lahir` varchar(20) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `alamat` text NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `klub` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `ktp` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemain`
--

CREATE TABLE `tbl_pemain` (
  `id_pemain` int(100) NOT NULL,
  `kelas_usia` enum('LDL U15','LDL U17') NOT NULL,
  `nama_pemain` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_identitas` varchar(50) NOT NULL,
  `jenis_identitas` enum('NIK','NISN','KTP','Kartu Osis') NOT NULL,
  `photo_identitas` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kota_lahir` varchar(100) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `tinggi_badan` int(100) NOT NULL,
  `berat_badan` int(100) NOT NULL,
  `nomor_punggung` int(100) NOT NULL,
  `nama_punggung` varchar(200) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_handphone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `level` int(3) NOT NULL COMMENT '1:admin, 2:member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `foto`, `level`) VALUES
(1, 'Lemahtamba', '21232f297a57a5a743894a0e4a801fc3', 'lemahtamba@gmail.com', 'foto-user-14-07-201.png', 1),
(2, 'Essala', '0b56811be452bc72e6aa50dded5eef8d', 'ssb.essala.larangan@gmail.com', 'foto-user-14-07-20.png', 2),
(3, 'Paksisakti', '630ed01d98406fe6fb472d8c9bd23033', 'namapur812@gmail.com', 'foto-user-14-07-20.jpg', 2),
(4, 'Garuda', '586293e168054f480d08e30fba98c295', 'bakhrudinalyubi@gmail.com', 'foto-user-14-07-201.jpg', 2),
(5, 'PSC Ciparay', '28c603f00babea4e414ed626180d1758', 'danyoktaviandi5222@gmail.com', 'foto-user-14-07-202.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_klub`
--
ALTER TABLE `tbl_klub`
  ADD PRIMARY KEY (`id_klub`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`id_official`);

--
-- Indexes for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_klub`
--
ALTER TABLE `tbl_klub`
  MODIFY `id_klub` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id_official` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  MODIFY `id_pemain` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
