-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2021 at 01:40 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '1. admin, 2. operator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin 1', 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konten`
--

CREATE TABLE `tbl_konten` (
  `id_konten` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_konten`
--

INSERT INTO `tbl_konten` (`id_konten`, `judul`, `isi_konten`, `tanggal`, `kategori`, `gambar`) VALUES
(3, 'teks panjang satu 12', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dicta, aspernatur dignissimos similique fuga fugiat totam et accusamus, officia quisquam ex iste voluptatem veritatis perspiciatis at, possimus minima magni. Hic!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dicta, aspernatur dignissimos similique fuga fugiat totam et accusamus, officia quisquam ex iste voluptatem veritatis perspiciatis at, possimus minima magni. Hic!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate dicta, aspernatur dignissimos similique fuga fugiat totam et accusamus, officia quisquam ex iste voluptatem veritatis perspiciatis at, possimus minima magni. Hic! 1234</p>\r\n', '2021-04-23', 'Makanan', 'index.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  MODIFY `id_konten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
