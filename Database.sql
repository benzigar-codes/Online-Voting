-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 03:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--
CREATE DATABASE IF NOT EXISTS `votesystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `votesystem`;

-- --------------------------------------------------------

--
-- Table structure for table `votedetails`
--

CREATE TABLE `votedetails` (
  `id` int(11) NOT NULL,
  `field` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votedetails`
--

INSERT INTO `votedetails` (`id`, `field`, `title`) VALUES
(1, 'Endgame', 'Favorite Movie'),
(2, 'Infinity War', 'Favorite Movie'),
(3, 'Captain Marvel', 'Favorite Movie'),
(4, 'Far from Home', 'Favorite Movie'),
(5, 'Iron Man', 'Favorite Hero'),
(6, 'Spider Man', 'Favorite Hero'),
(7, 'Black Panther', 'Favorite Hero');

-- --------------------------------------------------------

--
-- Table structure for table `votetable`
--

CREATE TABLE `votetable` (
  `id` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votetable`
--

INSERT INTO `votetable` (`id`, `field`, `title`) VALUES
(1, 'Infinity War', 'Favorite Movie'),
(2, 'Endgame', 'Favorite Movie'),
(3, 'Far from Home', 'Favorite Movie'),
(4, 'Infinity War', 'Favorite Movie'),
(5, 'Captain Marvel', 'Favorite Movie'),
(6, 'Iron Man', 'Favorite Hero'),
(7, 'Endgame', 'Favorite Movie'),
(8, 'Endgame', 'Favorite Movie'),
(9, 'Iron Man', 'Favorite Hero');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `votedetails`
--
ALTER TABLE `votedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votetable`
--
ALTER TABLE `votetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `votedetails`
--
ALTER TABLE `votedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votetable`
--
ALTER TABLE `votetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
