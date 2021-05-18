-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 10:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codher`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pword`) VALUES
(1, 'club1', 'club1'),
(2, 'club2', 'club2'),
(3, 'club3', 'club3'),
(4, 'club4', 'club4');

-- --------------------------------------------------------

--
-- Table structure for table `ann`
--

CREATE TABLE `ann` (
  `id` varchar(100) NOT NULL,
  `feed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `club1`
--

CREATE TABLE `club1` (
  `id` int(100) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `interested` tinyint(1) NOT NULL DEFAULT 0,
  `member` tinyint(1) NOT NULL DEFAULT 0,
  `idea` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club1`
--

INSERT INTO `club1` (`id`, `uname`, `interested`, `member`, `idea`) VALUES
(10, 'Sree', 0, 0, 'hello'),
(40, 'Rax', 0, 0, ''),
(42, 'Rax', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `club2`
--

CREATE TABLE `club2` (
  `id` int(100) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `interested` tinyint(1) NOT NULL DEFAULT 0,
  `member` tinyint(1) NOT NULL DEFAULT 0,
  `idea` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `club3`
--

CREATE TABLE `club3` (
  `id` int(100) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `interested` tinyint(1) NOT NULL DEFAULT 0,
  `member` tinyint(1) NOT NULL DEFAULT 0,
  `idea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `club4`
--

CREATE TABLE `club4` (
  `id` int(100) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `interested` tinyint(1) NOT NULL DEFAULT 0,
  `member` tinyint(1) NOT NULL DEFAULT 0,
  `idea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pword`) VALUES
(1, 'Sree', 'sree'),
(2, 'Sree', 'sree'),
(3, 'Kesh', 'keshikaa'),
(4, 'Sree', 'sree'),
(5, 'Sree', 'sree'),
(6, 'Sree', 'sree'),
(7, 'Sree', 'sree'),
(8, 'Sree', 'sree'),
(9, 'Sree', 'sree'),
(10, 'Sree', 'sree'),
(11, 'Rax', 'raksha');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `year` int(10) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `year`, `dept`, `email`, `uname`, `pword`) VALUES
(1, 'Sreeratcha', 2, 'CSE', 'r@gmail.com', 'Sree', 'sree'),
(2, 'Keshikaa', 2, 'CSE', 'ratchabala@gmail.com', 'Kesh', 'keshikaa'),
(3, 'Sreeratcha', 2, 'CSE', 'r@gmail.com', 'Rax', 'raksha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club1`
--
ALTER TABLE `club1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club2`
--
ALTER TABLE `club2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club3`
--
ALTER TABLE `club3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club4`
--
ALTER TABLE `club4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `club1`
--
ALTER TABLE `club1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `club2`
--
ALTER TABLE `club2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club3`
--
ALTER TABLE `club3`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club4`
--
ALTER TABLE `club4`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
