-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 01:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmoaproc_pcure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `staffID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `staffID`, `password`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `file_no` varchar(255) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `tender` varchar(255) DEFAULT NULL,
  `mood` int(11) DEFAULT NULL,
  `staffId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `file_no`, `staff_name`, `email`, `phone`, `attachment`, `tender`, `mood`, `staffId`, `status`, `date`) VALUES
(1, 'PS0001', 'Ahmed Usman', 'ahmed@gmail.com', '09041309482', './uploads/PS000110:03:08_An Android Application For Student Medical Help Complete.docx', 'Funding', 2, 1, 0, '2023-10-07 09:10:37'),
(2, 'PS0002', 'Ahmed Usman', 'ahmed@gmail.com', '09041309488', './uploads/PS000221:25:44_IMG-20210708-WA0006.jpg', 'Funding', 2, 1, 0, '2023-11-08 21:25:44'),
(3, 'P003', 'Djhjkdhjkdhj', 'sjkdhsjkd@gmail.com', '08143856549', './uploads/P00310:58:46_IMG-20210708-WA0006.jpg', 'JHjhjdhj', 2, 1, 0, '2023-11-09 10:58:46'),
(4, 'P0033', 'Jhsjkhkjhjs', 'skjsjh@gmail.com', '08143856549', './uploads/P003311:18:55_IMG-20210708-WA0006.jpg', 'Funding', 2, 1, 0, '2023-11-09 11:18:55'),
(5, 'P0033', 'Jhsjkhkjhjs', 'skjsjh@gmail.com', '08143856549', './uploads/P003311:18:55_IMG-20210708-WA0006.jpg', 'Funding', 2, 1, 0, '2023-11-09 11:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `appId` int(11) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `appId`, `office`, `comment`, `status`) VALUES
(1, 4, '1', NULL, 1),
(2, 4, '2', NULL, 0),
(3, 4, '4', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `nam`) VALUES
(1, 'Rectory'),
(2, 'Registry'),
(3, 'Bursary'),
(4, 'Procurement');

-- --------------------------------------------------------

--
-- Table structure for table `rejection`
--

CREATE TABLE `rejection` (
  `id` int(11) NOT NULL,
  `appId` int(11) DEFAULT NULL,
  `rejectedBy` varchar(255) DEFAULT NULL,
  `resons` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `roleNumber` varchar(255) NOT NULL,
  `roleTitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `staffId`, `roleNumber`, `roleTitle`) VALUES
(1, 1, '1', 'Officer 1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staffID` varchar(255) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `dpt` varchar(255) DEFAULT NULL,
  `rak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `pasword` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staffID`, `staffName`, `dpt`, `rak`, `email`, `contact`, `pasword`, `status`) VALUES
(1, 'PS0001', 'Dr. Muhammad Usman', 'Rectory', 'Rector', 'musman@gmail.com', '09088776655', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appId` (`appId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection`
--
ALTER TABLE `rejection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appId` (`appId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rejection`
--
ALTER TABLE `rejection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`);

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`appId`) REFERENCES `application` (`id`);

--
-- Constraints for table `rejection`
--
ALTER TABLE `rejection`
  ADD CONSTRAINT `rejection_ibfk_1` FOREIGN KEY (`appId`) REFERENCES `application` (`id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
