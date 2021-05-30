-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 06:42 PM
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
(5, '0', 'DBMS Project review at turing hall', '2021-05-21 09:17:00'),
(6, '3', 'Come to tag audi at 3pm', '2021-05-06 10:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcements_info`
--

CREATE TABLE `announcements_info` (
  `id` int(11) NOT NULL,
  `club_id` varchar(10) NOT NULL,
  `info` text NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements_info`
--

INSERT INTO `announcements_info` (`id`, `club_id`, `info`, `description`) VALUES
(5, '1', 'Images/food-5227740_1920.jpg', 'Food');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ann_display`
-- (See below for the actual view)
--
CREATE TABLE `ann_display` (
`events` text
,`dates` timestamp
,`club_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text DEFAULT NULL,
  `roll_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `dt`, `message`, `roll_no`) VALUES
(174, '2021-05-30 05:34:41', 'Welcome to uniclub.', '2017103001'),
(175, '2021-05-30 05:34:59', 'we will have a meeting at 5 pm in turning hall.', '2017103001'),
(176, '2021-05-30 05:35:16', 'Thanks for joining the club. ', '2017103001'),
(177, '2021-05-30 05:35:26', 'please acknowledge', '2017103001'),
(180, '2021-05-30 05:40:14', 'Meeting at 5 pm link will be shared soon', '2017103001'),
(181, '2021-05-30 05:40:22', 'Please join in time', '2017103001'),
(182, '2021-05-30 05:40:34', 'If any issue let us know before', '2017103001');

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
('0', 'General', '2017103005', 'Prof.Bhuvaneshwari', '9876987609'),
('1', 'Astro Club', '2017103001', 'Prof.Vellammal BL', '9876987667'),
('2', 'Computer club', '2017103002', 'Prof.Shanmugapriya E', '9876987669'),
('3', 'Photography Club', '2017103003', 'Prof.Sanju', '8765876545'),
('4', 'Cultural Club', '2017103004', 'Prof.Suganthini', '9876987661');

-- --------------------------------------------------------

--
-- Table structure for table `club_layout`
--

CREATE TABLE `club_layout` (
  `id` int(11) NOT NULL,
  `club_id` varchar(10) DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_layout`
--

INSERT INTO `club_layout` (`id`, `club_id`, `heading`, `image`, `description`) VALUES
(1, '1', 'Welcome to the Astronomy Club!', 'Images/galaxy.jpg', 'Do you love the stars? Are you mesmerized by the universe? Do you feel a strong passion for astronomy? You\'ve come to the right place!'),
(2, '2', 'Welcome to the Computers Club!', 'Images/computer.jpg', 'Hackathons. All nighters. Coffee and so much more.'),
(3, '3', 'Welcome to the Photography Club!', 'Images/photo_club.jpg', 'Is photography your passion? Do you see the world through a lens? Welcome, fellow artist!'),
(4, '4', 'Welcome to the Music Club!', 'Images/musicclub.jpg', 'We comprise a bunch of solid talented musicians and ever-hungry music worshipers, the club with its various bands has been enthralling the folks for years. Come join the fam!');

--
-- Triggers `club_layout`
--
DELIMITER $$
CREATE TRIGGER `club_add` BEFORE INSERT ON `club_layout` FOR EACH ROW INSERT INTO clubs(club_id,club_name,incharge,president,t_contact) 
                    VALUES('12','Leo club','lala','2017103000','9876678904')
$$
DELIMITER ;

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
(3, '1', 'Planetorium visit can be conducted', '2019103585', 1),
(5, '2', 'Website competition', '2019103585', 1);

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
('2019103585', 'ratcha');

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
(2, 11, '2017103001'),
(3, 13, '2017103001'),
(4, 13, '2019103585'),
(5, 11, '2019103585'),
(6, 14, '2017103001'),
(7, 15, '2017103001'),
(8, 16, '2017103001'),
(9, 15, '2019103585');

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
(15, 'Favourite subject', 'Choose your favourite subject');

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
(28, 11, 'OS', 4),
(29, 11, 'CA', 2),
(30, 12, 'Yes', 1),
(31, 12, 'No', 0),
(32, 13, 'Test1', 1),
(33, 13, 'Test2', 1),
(34, 14, 'Yes', 0),
(35, 14, 'No', 1),
(36, 15, 'OS', 0),
(37, 15, 'CA', 2),
(38, 16, 'Ch1', 0),
(39, 16, 'Ch2', 1);

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
('2019103040', 'Keshikaa', 2, 'CSE', 'keshikaa11@gmail.com', 'kesh', '9234091872'),
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
  `accepted_status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll_no`, `interested_status`, `club_id`, `accepted_status`) VALUES
(1, '2019103585', 1, '1', 1),
(7, '2019103585', 1, '2', 1),
(8, '2019103040', 1, '1', 1),
(9, '2019103040', 1, '3', 0),
(10, '2019103040', 1, '2', 1),
(11, '2019103585', 1, '3', 0);

-- --------------------------------------------------------

--
-- Structure for view `ann_display`
--
DROP TABLE IF EXISTS `ann_display`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ann_display`  AS  select `announcements`.`events` AS `events`,`announcements`.`dates` AS `dates`,`clubs`.`club_name` AS `club_name` from (`announcements` join `clubs` on(`clubs`.`club_id` = `announcements`.`club_id`)) ;

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
-- Indexes for table `announcements_info`
--
ALTER TABLE `announcements_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `club_layout`
--
ALTER TABLE `club_layout`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `announcements_info`
--
ALTER TABLE `announcements_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `club_layout`
--
ALTER TABLE `club_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `polling_over`
--
ALTER TABLE `polling_over`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `signup` (`roll_no`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
