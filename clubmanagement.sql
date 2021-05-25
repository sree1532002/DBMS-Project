-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 08:24 AM
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
  `id` int(11) NOT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `events` text DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `club_id`, `events`, `dates`) VALUES
(2, '1', 'Assemble at vivek audi ', '2021-05-21 10:30:00'),
(3, '0', 'Come to tag audi at 3pm(all CS students)', '2021-05-22 04:30:00'),
(5, '0', 'DBMS Project review at turing hall', '2021-05-21 09:17:00'),
(6, '2', 'Come to tag audi at 3pm', '2021-05-06 10:52:00'),
(9, '0', 'Assemble at vivek audiiiii', '2021-05-24 10:53:00'),
(10, '0', 'added for testingggg', '2021-05-24 10:55:00'),
(16, '0', 'Come to tag audi at 9am', '2021-05-14 11:02:00'),
(17, '3', 'hey', '2021-05-14 05:22:00');

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
('0', 'General', '2017103005', 'Bhuvaneshwari', '9876987609'),
('1', 'Astro Club', '2017103001', 'Vellammal BL', '9876987667'),
('2', 'Computer club', '2017103002', 'Shanmugapriya E', '9876987669'),
('3', 'Photography Club', '2017103003', 'Sanju', '8765876545'),
('4', 'Cultural Club', '2017103004', 'Suganthini', '9876987661'),
('5', 'Litclub', '2017103006', 'Shei', '9876678901'),
('6', 'Litclub', '2017103006', 'Shei', '9876678901');

-- --------------------------------------------------------

--
-- Table structure for table `club_layout`
--

CREATE TABLE `club_layout` (
  `club_id` varchar(10) DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_layout`
--

INSERT INTO `club_layout` (`club_id`, `heading`, `image`, `description`) VALUES
('1', 'Welcome to the Astronomy Club!', 'Images/galaxy.jpg', 'Do you love the stars? Are you mesmerized by the universe? Do you feel a strong passion for astronomy? You\'ve come to the right place!'),
('2', 'Welcome to the Computers Club!', 'Images/computer.jpg', 'Hackathons. All nighters. Coffee and so much more.'),
('3', 'Welcome to the Photography Club!', 'Images/photos.jpg', 'Is photography your passion? Do you see the world through a lens? Welcome, fellow artist!'),
('4', 'Welcome to the Cultural Club!', 'Images/club4.jpg', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'),
('5', 'Welcome to LitCLub!', '60abaaf5d0df80.75262346.png', 'Hola!!'),
('6', 'Welcome to LitCLub!', '60ababa742a184.72383616.png', 'Hola!!');

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` int(11) NOT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `idea` text DEFAULT NULL,
  `roll_no` varchar(10) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `club_id`, `idea`, `roll_no`, `visibility`) VALUES
(1, '1', 'Moon watch shows can be conducted', '2019103585', 1),
(2, '1', 'Planetorium visit', '2019103585', 0),
(3, '1', 'Planetorium visit can be conducted', '2019103585', 1),
(4, '1', 'Website comp', '2019103585', 1),
(5, '2', 'Website competition', '2019103585', 1),
(6, '1', 'Moon watch shows can be conducted..........', '2019103585', 1);

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
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
('2019103585', 'ratcha'),
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
('2019103585', 'Sreeratcha', 2, 'CSE', 'ratchabala@gmail.com', 'ratcha', '9445644788');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) DEFAULT NULL,
  `interested_status` int(11) DEFAULT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `accepted_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll_no`, `interested_status`, `club_id`, `accepted_status`) VALUES
(1, '2019103585', 1, '1', NULL),
(7, '2019103585', 1, '2', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `club_layout`
--
ALTER TABLE `club_layout`
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `roll_no` (`roll_no`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `roll_no` (`roll_no`),
  ADD KEY `club_id` (`club_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `club_layout`
--
ALTER TABLE `club_layout`
  ADD CONSTRAINT `club_layout_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`),
  ADD CONSTRAINT `ideas_ibfk_2` FOREIGN KEY (`roll_no`) REFERENCES `signup` (`roll_no`);

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
