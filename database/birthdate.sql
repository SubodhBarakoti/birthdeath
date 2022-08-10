-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 06:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birthdate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `birthid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `grandparentname` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `hospitalname` varchar(50) DEFAULT NULL,
  `issuedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`birthid`, `name`, `dob`, `fathername`, `mothername`, `grandparentname`, `birthplace`, `hospitalname`, `issuedate`) VALUES
(1, 'ram', '2022-08-02', 'shyam', 'gira', 'hari', 'ktm', 'kanti', '2022-08-09'),
(2, 'Kushal', '2022-08-01', 'Saran Rijal', 'Tara Rijal', 'Bishnu Rijal', 'Terathum', 'Cow Shed', '2022-08-10'),
(3, 'Noyal', '2022-08-03', 'raju', 'bishnu', 'krishna', 'KTM', 'Ghar ko dailo', '2022-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `deathid` int(5) NOT NULL,
  `birthid` int(5) NOT NULL,
  `deathplace` varchar(50) NOT NULL,
  `deathdate` date NOT NULL,
  `deathtime` time(5) NOT NULL,
  `deathcause` varchar(50) NOT NULL,
  `deathissuedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`deathid`, `birthid`, `deathplace`, `deathdate`, `deathtime`, `deathcause`, `deathissuedate`) VALUES
(1, 1, 'Thankot', '2022-08-02', '09:50:00.00000', 'Heart Attack', '2022-08-09'),
(2, 2, 'Kathmandu', '2022-08-09', '20:44:00.00000', 'Girl', '2022-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`birthid`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`deathid`),
  ADD KEY `birthid` (`birthid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `birthid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `deathid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `death`
--
ALTER TABLE `death`
  ADD CONSTRAINT `death_ibfk_1` FOREIGN KEY (`birthid`) REFERENCES `birth` (`birthid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
