-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2018 at 01:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar_balita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_ADMIN` varchar(50) DEFAULT NULL,
  `GENDER_ADMIN` varchar(2) DEFAULT NULL,
  `LEVEL_USER` varchar(10) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `ALAMAT_ADMIN`, `GENDER_ADMIN`, `LEVEL_USER`, `USERNAME`, `PASSWORD`) VALUES
('110001', 'admin', 'burneh', 'L', 'admin', 'admin', 'admin'),
('110002', 'user', 'burneh', 'L', 'pasien', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `ID_DIAGNOSA` int(11) NOT NULL,
  `ID_GEJALA` varchar(10) NOT NULL,
  `ID_PASIEN` varchar(10) NOT NULL,
  `TGL_DIAGNOSA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`ID_DIAGNOSA`, `ID_GEJALA`, `ID_PASIEN`, `TGL_DIAGNOSA`) VALUES
(1, '1', '4', '2018-06-02'),
(2, '3', '5', '2018-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `ID_GEJALA` int(11) NOT NULL,
  `NM_GEJALA` varchar(50) DEFAULT NULL,
  `BOBOT_GEJALA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`ID_GEJALA`, `NM_GEJALA`, `BOBOT_GEJALA`) VALUES
(1, 'PANAS', 0.4),
(2, 'PANAS NAIK TURUN', 0.4),
(3, 'SAKIT KEPALA', 0.45),
(4, 'MUAL', 0.5),
(5, 'MUNTAH', 0.5),
(6, 'BATUK', 0.5),
(7, 'PILEK', 0.5),
(8, 'BADAN LEMAS', 0.45),
(9, 'GUSI BERDARAH', 0.5),
(10, 'MIMISAN', 0.55),
(11, 'NAFSU MAKAN TURUN', 0.45),
(12, 'MINUM BERKURANG', 0.45),
(13, 'MENCRET / DIARE', 0.7),
(14, 'SAKIT PADA PERSENDIAN', 0.6),
(15, 'BERAT BADAN TURUN', 0.45),
(16, 'BADAN LEMAS', 0.4),
(17, 'BADAN DINGIN dan PUCAT', 0.45),
(18, 'RUAM / BINTIK BINTIK MERAH MUDA KECIL', 0.6),
(19, 'BAB HITAM', 0.7),
(20, 'SAKIT PADA ULU HATI', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_PASIEN` varchar(11) NOT NULL,
  `NAMA_PASIEN` varchar(50) DEFAULT NULL,
  `UMUR_PASIEN` date DEFAULT NULL,
  `ALAMAT_PASIEN` varchar(50) DEFAULT NULL,
  `GENDER_PASIEN` varchar(2) DEFAULT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `NAMA_PASIEN`, `UMUR_PASIEN`, `ALAMAT_PASIEN`, `GENDER_PASIEN`, `USERNAME`, `PASSWORD`) VALUES
('120001', 'user', '1111-11-11', 'user', 'L', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `ID_PENYAKIT` int(11) NOT NULL,
  `NAMA_PENYAKIT` varchar(50) DEFAULT NULL,
  `ID_GEJALA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`ID_PENYAKIT`, `NAMA_PENYAKIT`, `ID_GEJALA`) VALUES
(1, 'TIPES', 1),
(2, 'TIPES', 3),
(3, 'TIPES', 6),
(4, 'DBD grade 1', 1),
(5, 'DBD grade 2', 1),
(6, 'DBD grade 3', 1),
(7, 'TIPES', 7),
(8, 'TIPES', 11),
(9, 'TIPES', 12),
(10, 'TIPES', 13),
(11, 'TIPES', 15),
(12, 'TIPES', 16),
(13, 'TIPES', 20),
(14, 'DBD grade 1', 2),
(15, 'DBD grade 1', 3),
(16, 'DBD grade 1', 4),
(17, 'DBD grade 1', 5),
(18, 'DBD grade 3', 2),
(19, 'DBD grade 3', 3),
(20, 'DBD grade 3', 4),
(21, 'DBD grade 3', 5),
(22, 'DBD grade 3', 8),
(23, 'DBD grade 3', 9),
(24, 'DBD grade 3', 10),
(25, 'DBD grade 3', 11),
(26, 'DBD grade 3', 12),
(27, 'DBD grade 3', 14),
(28, 'DBD grade 3', 15),
(29, 'DBD grade 3', 17),
(30, 'DBD grade 3', 18),
(31, 'DBD grade 3', 19),
(32, 'DBD grade 3', 20),
(33, 'DBD grade 2', 2),
(34, 'DBD grade 2', 3),
(35, 'DBD grade 2', 4),
(36, 'DBD grade 2', 5),
(38, 'DBD grade 2', 9),
(39, 'DBD grade 2', 10),
(40, 'DBD grade 2', 11),
(41, 'DBD grade 2', 12),
(42, 'DBD grade 2', 14),
(43, 'DBD grade 2', 18),
(44, 'DBD grade 2', 15),
(47, 'DBD grade 2', 20),
(48, 'DBD grade 1', 18),
(49, 'DBD grade 1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `ID_SOLUSI` int(11) NOT NULL,
  `NAMA_SOLUSI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`ID_SOLUSI`, `NAMA_SOLUSI`) VALUES
(1, 'istirahat dirumah'),
(2, 'banyak minum air putih');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwpenyakit`
-- (See below for the actual view)
--
CREATE TABLE `vwpenyakit` (
`ID_PENYAKIT` int(11)
,`NAMA_PENYAKIT` varchar(50)
,`ID_GEJALA` int(11)
,`NM_GEJALA` varchar(50)
,`BOBOT_GEJALA` double
);

-- --------------------------------------------------------

--
-- Structure for view `vwpenyakit`
--
DROP TABLE IF EXISTS `vwpenyakit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwpenyakit`  AS  select `penyakit`.`ID_PENYAKIT` AS `ID_PENYAKIT`,`penyakit`.`NAMA_PENYAKIT` AS `NAMA_PENYAKIT`,`penyakit`.`ID_GEJALA` AS `ID_GEJALA`,`gejala`.`NM_GEJALA` AS `NM_GEJALA`,`gejala`.`BOBOT_GEJALA` AS `BOBOT_GEJALA` from (`penyakit` left join `gejala` on((`penyakit`.`ID_GEJALA` = `gejala`.`ID_GEJALA`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `ADMIN_PK` (`ID_ADMIN`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`ID_DIAGNOSA`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`ID_GEJALA`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_PASIEN`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`ID_PENYAKIT`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`ID_SOLUSI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `ID_DIAGNOSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `ID_GEJALA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `ID_PENYAKIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `ID_SOLUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
