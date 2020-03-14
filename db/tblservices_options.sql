-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 06:58 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblservices_options`
--

CREATE TABLE `tblservices_options` (
  `id` int(11) NOT NULL,
  `Service_ID` varchar(255) NOT NULL,
  `service_option` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices_options`
--

INSERT INTO `tblservices_options` (`id`, `Service_ID`, `service_option`, `info`, `price`) VALUES
(1, '133', 'head', 'Head Massage', '100'),
(2, '133', 'Half Body', 'Half Body Massage', '200'),
(3, '133', 'Full Body', 'Full Body Massage for 1 hour', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblservices_options`
--
ALTER TABLE `tblservices_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblservices_options`
--
ALTER TABLE `tblservices_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
