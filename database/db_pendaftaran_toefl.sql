-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 03:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pendaftaran_toefl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama_admin`, `username`, `password`, `notelp`, `alamat`) VALUES
(1, 'Admin Toefl Pertama', 'admintoefl', 'jIxO1KWTyqXzlFM81Lytxl/Vsapfw4Dv7gPziU+B6gJdsMSef1RMTHjRc7M5qzfYnR94stkrOMPtZcz32Lmd0gBWC4Ac+BA4spX+Dn1lZIYPUAiB2daWpQ==', '089697412015', 'Madiun');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) NOT NULL,
  `idperiode` int(11) DEFAULT NULL,
  `idjenis` int(11) DEFAULT NULL,
  `nama_jadwal` varchar(255) DEFAULT NULL,
  `tanggal_mulai_daftar` date DEFAULT NULL,
  `tanggal_selesai_daftar` date DEFAULT NULL,
  `tanggal_mulai_pelaksanaan` date DEFAULT NULL,
  `tanggal_selesai_pelaksanaan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `idperiode`, `idjenis`, `nama_jadwal`, `tanggal_mulai_daftar`, `tanggal_selesai_daftar`, `tanggal_mulai_pelaksanaan`, `tanggal_selesai_pelaksanaan`) VALUES
(1, 1, 1, 'jadwal pertama', '2022-10-20', '2022-10-28', '2022-10-27', '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) DEFAULT NULL,
  `aktif` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idjenis`, `nama_jenis`, `aktif`) VALUES
(1, 'Test Cobas', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `idpendaftar` int(11) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama_pendaftar` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`idpendaftar`, `nim`, `nama_pendaftar`, `foto`, `institusi`, `no_telp`, `email`, `password`) VALUES
(2, '123456789123456', 'Rangga Mukti', 'docs/img/img_siswa/1666692817_27e1431847cdfd4da983.png', 'PGRI MADIUN', '089697410215', 'rangga@gmail.com', 'jIxO1KWTyqXzlFM81Lytxl/Vsapfw4Dv7gPziU+B6gJdsMSef1RMTHjRc7M5qzfYnR94stkrOMPtZcz32Lmd0gBWC4Ac+BA4spX+Dn1lZIYPUAiB2daWpQ=='),
(3, '321654987321654', 'mahasiswa ke dua', 'docs/img/img_siswa/1666193255_b0e6eca521da2a36fef5.jpg', 'PGRI MADIUN', '089654741215', 'mahasiswakedua@gmail.com', 'qaNu0/UOQfarLYoWO3tEt6JQxmmrecj6yaqjbNejZLJ+QA1MM3ctaxThdYFkgscLduOJEmuA6vtbWe6EK70oVx75icTw2bG/pO5hejr+bq/qBA07Y3oMxw==');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `idperiode` int(11) NOT NULL,
  `nama_periode` varchar(255) DEFAULT NULL,
  `aktif` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`idperiode`, `nama_periode`, `aktif`) VALUES
(1, 'periode pertama', '1'),
(3, 'coba ketiga', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `idtes` int(11) NOT NULL,
  `idjadwal` int(11) DEFAULT NULL,
  `idpendaftar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `valid` varchar(1) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`idtes`, `idjadwal`, `idpendaftar`, `bukti_bayar`, `valid`, `sertifikat`) VALUES
(2, 1, 2, NULL, NULL, NULL),
(3, 1, 3, 'docs/img/img_bukti/1666364962_7cdb504c3ad6e25365ca.jpg', NULL, 'docs/img/img_sertifikat/1666362622_89ad761212f73e9ac29f.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`) USING BTREE;

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `idperiode` (`idperiode`),
  ADD KEY `idjenis` (`idjenis`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idpendaftar`) USING BTREE;

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idperiode`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`idtes`),
  ADD KEY `idjadwal` (`idjadwal`),
  ADD KEY `idpendaftar` (`idpendaftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `idpendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `idperiode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `idtes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idperiode`) REFERENCES `periode` (`idperiode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idjenis`) REFERENCES `jenis` (`idjenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes`
--
ALTER TABLE `tes`
  ADD CONSTRAINT `tes_ibfk_1` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tes_ibfk_2` FOREIGN KEY (`idpendaftar`) REFERENCES `pendaftar` (`idpendaftar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
