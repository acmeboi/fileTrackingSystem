-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 12:23 PM
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
  `financialBid` blob NOT NULL,
  `mpb` blob NOT NULL,
  `awardLetter` blob NOT NULL,
  `staff` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `requestID`, `companyName`, `rcNumber`, `emailAdd`, `phoneNum`, `addr1`, `addr2`, `state`, `zcode`, `fileNum`, `projectTitle`, `projectLocation`, `contractAmount`, `dateOfAward`, `financialBid`, `mpb`, `awardLetter`, `staff`, `date`) VALUES
(4, 'AP220715041005568', 'dddddd', 'dddd', 'dddd@gmg.com', 'ddddd', 'Company addres', 'wwwww', 'fffffffff', 'fffffff', 'ddddddddddd', 'fffffffff', 'ffffffffff', '21121', '2022-07-07', 0x636f6e7069632f6170706c69636174696f6e2e73716c, 0x636f6e7069632f6170706c69636174696f6e2e73716c, 0x636f6e7069632f6170706c69636174696f6e2e73716c, 'StaffName', '15/07/2022'),
(5, 'AP220716115625573', 'aaa', '234', 'usmanashfat07@gmail.com', '111111111111', 'Company addres', '245', 'Adamawa', '1212', '11111111', 'eeeeeee', 'fhfhfh', '1222', '2022-07-14', 0x636f6e7069632f36383932333439342d74686568756e742d626f6f7473747261702d342d6a6f622d706f7274616c2d74656d706c6174652d6c6963656e7365202831292e706466, 0x636f6e7069632f456d706c6f7958202d2044617368626f6172642e706466, 0x636f6e7069632f456d706c6f7958202d2044617368626f6172642e706466, 'StaffName', '16/07/2022'),
(1, 'ProjectCode', 'ppp1', 'eeeeeee', 'eeeeeee@fff.xom', '111111111111', 'wwwwwwww', 'wwwwwwww', 'wwwwwww', 'eeeeeee', 'eeeeee', 'eeeeeeee', 'eeeeeeeeeeeee', '111111111111', '2022-07-12', '', '', '', 'StaffName', '15/07/2022'),
(3, 'ProjectCode5', 'ppp11', '1111111111', '11111@gmm.com', 'fhhfh', 'dhdhdhh', 'hfhfhfh', 'fhfhfhfhfh', 'hfhfhfhf', 'hfhfhfh', 'ffhfhfhf', 'fhfhfh', '13131', '2022-07-13', 0x636f6e7069632f6170706c69636174696f6e2e73716c, 0x636f6e7069632f6170706c69636174696f6e2e73716c, 0x636f6e7069632f6170706c69636174696f6e2e73716c, 'StaffName', '15/07/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`requestID`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `requestID` (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
