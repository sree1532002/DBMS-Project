-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 01:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phppoll`
--

-- --------------------------------------------------------

--
-- Table structure for table `polling_over`
--

CREATE TABLE `polling_over` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polling_over`
--

INSERT INTO `polling_over` (`id`, `poll_id`, `roll_no`) VALUES
(1, 12, '2017103001'),
(2, 12, '2017103002'),
(3, 11, '2017103002');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `desc`) VALUES
(11, 'Favourite subject', 'Choose your favourite subject'),
(12, 'Meeting', 'CTF Project meet at 5.30 pm on 26-05-2021?');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `title`, `votes`) VALUES
(26, 11, 'DBMS', 3),
(27, 11, 'DSA ', 2),
(28, 11, 'OS', 3),
(29, 11, 'CA', 2),
(30, 12, 'Yes', 1),
(31, 12, 'No', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polling_over`
--
ALTER TABLE `polling_over`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polling_over`
--
ALTER TABLE `polling_over`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
