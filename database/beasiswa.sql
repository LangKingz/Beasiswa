-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 09:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `ipk`) VALUES
(1, 'Gilang Arya Libna', 3.4),
(2, 'as', 12),
(3, 'as', 12);

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomorhp` varchar(15) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `beasiswa` varchar(150) DEFAULT NULL,
  `uploud` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `id_anggota`, `email`, `nomorhp`, `semester`, `beasiswa`, `uploud`) VALUES
(1, 2, 'asasas@gamsa', '12123', 2, '2', 'fotojpg.jpg'),
(13, 1, 'gilanglibna@gmail.com', '12121', 2, 'akademik', 'foto.jpg'),
(14, 2, 'asassa@asas', '1231', 1, 'non-akademik', 'asasas.asksa'),
(18, 2, 'assasa@asas', '1212', 1, 'akademik', 'saassa'),
(19, 1, 'saas@asas12', '121221', 2, 'non-akademik', 'assaas'),
(20, 1, 'gilanglibna@assa', '1212', 1, 'akademik', 'Sertifikat_page-0001.jpg'),
(21, 1, 'gilang@as', '1212', 2, 'akademik', ''),
(22, 3, 'asasas@asasa', '121212', 6, 'akademik', 'Sertifikat_page-0001.jpg'),
(23, 1, 'gilang@gasmas', '1212', 5, 'non-akademik', ''),
(24, 1, 'arya@gmail', '6216212', 4, 'akademik', 'image_50406657.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `daftar_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
