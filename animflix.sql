-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id_anime` int(11) NOT NULL,
  `nama_anime` varchar(30) NOT NULL,
  `tanggal_rilis` datetime NOT NULL,
  `gambar_anime` varchar(255) NOT NULL,
  `studio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id_anime`, `nama_anime`, `tanggal_rilis`, `gambar_anime`, `studio`) VALUES
(2, 'One Piecex', '2022-11-04 03:06:00', '889-one piece.webp', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'admin123', 'admin@admin.com', 'admin'),
(5, 'abdMust', 'abdmt', 'abd1234', 'abd@gmail.com', 'user'),
(6, 'test123', 'test2', '$2y$10$HE2c1qhGEALmNrXnLFA7bOTEr7YzWsNWY/uhwuDeTUecaRkr.8N8.', 'test@test.com', 'user'),
(7, 'abdMus', 'Amustaqim', '$2y$10$Q/36oFthE7R21kgXBk6rl.qWoHwG/XgayPQjJyvN7QSZzm9azI.5K', 'abdd@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id_anime`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
