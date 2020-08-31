-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 03:30 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `votetable`
--

CREATE TABLE `votetable` (
  `id` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votetable`
--

INSERT INTO `votetable` (`id`, `field`, `title`, `email`) VALUES
(1, 'Vijay', 'Actor', 'benzigar619@gmail.com'),
(2, 'Avengers', 'Movie', 'benzigar619@gmail.com'),
(3, 'Joker', 'Movie', 'ligen@gmail.com'),
(4, 'Vijay', 'Actor', 'ligen@gmail.com'),
(5, 'Ethir neechal', 'Song', 'benzigar619@gmail.com'),
(6, 'Ethir neechal', 'Song', 'ligen@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `votetable`
--
ALTER TABLE `votetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `votetable`
--
ALTER TABLE `votetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
