-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 07:30 PM
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
-- Database: `clubmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `roll_no` varchar(10) NOT NULL,
  `pword` varchar(20) DEFAULT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`roll_no`, `pword`, `club_id`, `contact`) VALUES
('2017103001', 'club1', '1', 'club1@gmail.com'),
('2017103002', 'club2', '2', 'club2@gmail.com'),
('2017103003', 'club3', '3', 'club3@gmail.com'),
('2017103004', 'club4', '4', 'club4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `club_id` varchar(10) DEFAULT NULL,
  `events` text DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`club_id`, `events`, `dates`) VALUES
('1', 'added for testing', '2021-05-21 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` varchar(10) NOT NULL,
  `club_name` varchar(20) DEFAULT NULL,
  `president` varchar(20) DEFAULT NULL,
  `incharge` varchar(20) DEFAULT NULL,
  `t_contact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `president`, `incharge`, `t_contact`) VALUES
('1', 'Astro Club', '2017103001', 'Vellammal BL', '9876987667'),
('2', 'Computer club', '2017103002', 'Shanmugapriya E', '9876987669'),
('3', 'Photography Club', '2017103003', 'Sanju', '8765876545'),
('4', 'Cultural Club', '2017103004', 'Suganthini', '9876987661');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `roll_no` varchar(20) DEFAULT NULL,
  `pword` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`roll_no`, `pword`) VALUES
('2019103585', 'ratcha'),
('2019103585', 'ratcha');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `club_id` varchar(10) DEFAULT NULL,
  `roll_no` varchar(10) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pword` varchar(20) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`roll_no`, `name`, `year`, `dept`, `email`, `pword`, `phone`) VALUES
('2019103585', 'Sreeratcha', 2, 'CSE', 'r@gmail.com', 'ratcha', '9445644788');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `roll_no` varchar(10) DEFAULT NULL,
  `interested_status` int(11) DEFAULT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `accepted_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`roll_no`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `club_id` (`club_id`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `roll_no` (`roll_no`),
  ADD KEY `club_id` (`club_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `signup` (`roll_no`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`roll_no`) REFERENCES `signup` (`roll_no`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `signup` (`roll_no`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
