-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 01:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcure`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `requestID` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `rcNumber` varchar(255) NOT NULL,
  `emailAdd` varchar(255) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `addr1` text NOT NULL,
  `addr2` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `zcode` varchar(255) NOT NULL,
  `fileNum` varchar(255) NOT NULL,
  `projectTitle` text NOT NULL,
  `projectLocation` text NOT NULL,
  `contractAmount` varchar(255) NOT NULL,
  `dateOfAward` text NOT NULL,
  `financialBid` varchar(255) NOT NULL,
  `mpb` varchar(255) NOT NULL,
  `awardLetter` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `requestID`, `companyName`, `rcNumber`, `emailAdd`, `phoneNum`, `addr1`, `addr2`, `state`, `zcode`, `fileNum`, `projectTitle`, `projectLocation`, `contractAmount`, `dateOfAward`, `financialBid`, `mpb`, `awardLetter`, `staff`, `date`) VALUES
(1, 'ProjectCode', 'ppp1', 'eeeeeee', 'eeeeeee@fff.xom', '111111111111', 'wwwwwwww', 'wwwwwwww', 'wwwwwww', 'eeeeeee', 'eeeeee', 'eeeeeeee', 'eeeeeeeeeeeee', '111111111111', '2022-07-12', '', '', '', 'StaffName', '15/07/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`requestID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
