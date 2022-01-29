-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 10:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminNumber` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `adminId`, `adminName`, `adminEmail`, `adminNumber`, `adminPassword`) VALUES
(1, 87560, 'avi lonare', 'avanish@gmail.com', '9302733020', '1704');

-- --------------------------------------------------------

--
-- Table structure for table `bookinginfo`
--

CREATE TABLE `bookinginfo` (
  `id` int(11) NOT NULL,
  `passengername` varchar(255) NOT NULL,
  `busid` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `travelled` varchar(255) NOT NULL DEFAULT 'no',
  `bookingdate` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinginfo`
--

INSERT INTO `bookinginfo` (`id`, `passengername`, `busid`, `seats`, `travelled`, `bookingdate`, `source`, `destination`) VALUES
(1, 'Chintu', '9876', '4', 'yes', '17-01-22', ' RAIPUR', 'NAGPUR'),
(2, 'Rinku', '9876', '4', 'yes', '20-01-22', ' RAIPUR', 'NAGPUR'),
(3, 'avanish lonare', '9876', '4', 'yes', '22-01-22', ' RAIPUR', 'MUMBAI'),
(4, 'anushka lonare', '1111', '2', 'yes', '22-01-22', ' CHENNAI', 'VIZAG');

-- --------------------------------------------------------

--
-- Table structure for table `busdetails`
--

CREATE TABLE `busdetails` (
  `id` int(11) NOT NULL,
  `BusName` varchar(255) NOT NULL,
  `BusID` varchar(255) NOT NULL,
  `BusOperator` varchar(255) NOT NULL,
  `operatorname` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `leftseats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busdetails`
--

INSERT INTO `busdetails` (`id`, `BusName`, `BusID`, `BusOperator`, `operatorname`, `seats`, `leftseats`) VALUES
(1, 'mahendra travels', '9876', '8900', 'cookie', 50, '50'),
(2, 'kanker travels', '6543', '5600', 'vicky', 30, '30'),
(3, 'sunrise travels', '4566', '6500', 'rocky', 30, '30'),
(4, 'purple travels', '1111', '3455', 'pinku', 30, '30');

-- --------------------------------------------------------

--
-- Table structure for table `routedetails`
--

CREATE TABLE `routedetails` (
  `id` int(11) NOT NULL,
  `busId` varchar(255) NOT NULL,
  `busroute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routedetails`
--

INSERT INTO `routedetails` (`id`, `busId`, `busroute`) VALUES
(1, '9876', 'RAIPUR,DURG,BHILAI,RAJNANDGOEN,NAGPUR,MUMBAI'),
(2, '6543', 'RAIPUR,BHILAI,DURG,VIZAG,HYDERABAD,CHENNAI'),
(3, '4566', 'NAGPUR,MUMBAI,PUNE,AHMEDABAD,JAIPUR'),
(4, '1111', 'VIZAG,CHENNAI');

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE `staffdetails` (
  `id` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffPhone` varchar(255) NOT NULL,
  `staffEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`id`, `staffId`, `staffName`, `staffPhone`, `staffEmail`) VALUES
(1, 8900, 'cookie', '987654321', 'cookie@gmail.com'),
(2, 5600, 'vicky', '789654321', 'vicky@gmail.com'),
(3, 6500, 'rocky', '6789654321', 'rocky@gmail.com'),
(4, 3455, 'pinku', '987654321', 'pinky@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookinginfo`
--
ALTER TABLE `bookinginfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busdetails`
--
ALTER TABLE `busdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routedetails`
--
ALTER TABLE `routedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookinginfo`
--
ALTER TABLE `bookinginfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `busdetails`
--
ALTER TABLE `busdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routedetails`
--
ALTER TABLE `routedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffdetails`
--
ALTER TABLE `staffdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
