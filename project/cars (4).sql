-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2023 at 12:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `describ` varchar(1000) NOT NULL,
  `model` smallint(6) NOT NULL,
  `auto` tinyint(1) NOT NULL,
  `consumtion` varchar(50) DEFAULT NULL,
  `proprites` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `regData`, `title`, `image`, `describ`, `model`, `auto`, `consumtion`, `proprites`, `price`, `published`, `cat_id`) VALUES
(32, '2023-10-18 14:00:57', 'Jeep Grand Cherokeeeed', '2f294e5e52e282e69dfe0ca8d3b4e564.png', 'Used Jeep Grand Cherokee for sale near me', 2002, 0, NULL, 'A/C', 2345880, 1, 1),
(33, '2023-10-18 14:01:52', 'Nissan Leaf', '7b3d3bc8529898def075d615101de443.png', 'Used Jeep Nissan LeafNissan Leaf Cherokee for sale near me', 2012, 1, NULL, 'A/C', 1234570, 1, 1),
(34, '2023-10-18 14:04:22', 'Toyota Camry LE', '9c5c22129fcbd52db1540f76e56451c0.png', 'Used Toyota Camry sedans for sale near me Used Toyota Camry sedans for sale near me ..\r\n', 2002, 0, NULL, 'LE', 9873520, 1, 2),
(35, '2023-10-18 14:05:40', 'Ford Mustang', '7324c7bb85fc08e4b198ec4d17d0b3e6.png', 'Used Ford Mustang coupes for sale near me\r\n', 1992, 1, NULL, 'A/C', 987352000, 1, 3),
(36, '2023-10-18 14:07:00', 'Chevrolet Bolt EV', '466696688c68e292cb516c56045f6d1c.png', 'Used Chevrolet Bolt EV for sale near me\r\n', 2000, 0, NULL, 'A/D', 7357380, 1, 4),
(37, '2023-10-18 14:29:25', '2019 Chevrolet Bolt EV LT', '0b3c3280ce9eb6b3ddc9b0dfb193c66e.png', 'We compared this car with similar 2019 Chevrolet Bolt EVs based on price, mileage, features, condition, and several other factors.', 2009, 0, NULL, 'A/C', 1200000, 1, 1),
(38, '2023-10-18 14:30:57', '2021 Chevrolet Bolt EV Premier', '45d100ee6f30791f0d6a48d2211cfb43.png', 'Automatic Emergency Braking\r\nBackup Camera\r\nBlind Spot Monitor\r\nBrake Assist\r\nLane Departure Warning\r\nRear Cross Traffic Alert\r\nStability Control', 2021, 1, NULL, 'A/C', 2070000, 1, 1),
(39, '2023-10-18 14:32:07', '2013 Toyota Camry XLE', 'fe2bffd72f8b231c146ccffa205ee411.png', 'Automatic Emergency Braking\r\nBackup Camera\r\nBlind Spot Monitor\r\nBrake Assist\r\nLane Departure Warning\r\nRear Cross Traffic Alert\r\nStability Control', 2013, 0, NULL, 'A/C', 2087000, 1, 2),
(40, '2023-10-18 14:35:24', '2020 Ford Mustang EcoBoost', 'c9c706872fb8cbf372d0294a22ba5862.png', 'Automatic Emergency Braking\r\nBackup Camera\r\nBlind Spot Monitor\r\nBrake Assist\r\nLane Departure Warning\r\nRear Cross Traffic Alert\r\nStability Control', 2020, 0, NULL, 'A/C', 9857000, 1, 3),
(41, '2023-10-18 14:42:00', '2017 Ford Mustang V6', '5e7c90a9f6d564421343ba2809f8ebef.png', '\r\nAutomatic Emergency Braking\r\nBackup Camera\r\nBlind Spot Monitor\r\nBrake Assist\r\nLane Departure Warning\r\nRear Cross Traffic Alert\r\nStability Control', 2017, 1, NULL, 'A/C', 5690100, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `catagory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory`) VALUES
(1, 'SUV'),
(2, 'Sedan'),
(3, 'Coupe'),
(4, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `Name` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `image` varchar(60) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `regData`, `Name`, `position`, `image`, `facebook`, `twitter`, `linkedin`, `published`) VALUES
(1, '2023-10-12 19:14:39', 'walaa salah', 'Profession', '9690ba3c99baa4be72fb0824de6644c2.jpeg', 'https://www.facebook.com/walaa.salah.056', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 1),
(2, '2023-10-12 19:16:03', 'sara ibrahim', 'Profession', '9690ba3c99baa4be72fb0824de6644c2.jpeg', 'https://www.facebook.com/walaa.salah.056', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 1),
(3, '2023-10-12 19:16:29', 'karem hatem', 'Profession', '0bf77d31390ffa074131108612a78e24.jpeg', 'https://www.facebook.com/walaa.salah.056', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 1),
(4, '2023-10-12 19:17:10', 'ahmed hassan', 'designated', 'dfcb070155512b6cf81a367492247fce.jpeg', 'https://www.facebook.com/walaa.salah.056', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 'https://www.linkedin.com/in/walaa-salah-608b55286/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `regData`, `name`, `position`, `content`, `image`, `published`) VALUES
(6, '2023-10-08 17:17:14', 'karem hatem', 'teacher', 'Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed', 'ba24ed9583f8d2162af1a375be575277.jpeg', 1),
(7, '2023-10-08 17:17:47', 'yasmin ahmed', 'doctor', 'Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed', '9087775a75485f7f2629eebffffed0b6.jpeg', 1),
(8, '2023-10-12 17:23:17', 'magda hassan', 'doctor', 'Kasd dolor no nonumy sit labore tempor at justo re...', '251f9862afb34b64152d4243e02b1245.jpeg', 1),
(9, '2023-10-12 17:24:12', 'omer hassan', 'student', 'Kasd dolor no nonumy sit labore tempor at justo re...', '393a3ce9999dfce32b1136fca16edc96.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` int(1) NOT NULL COMMENT '0 female , 1 male',
  `active` int(1) NOT NULL COMMENT '0 inactive,, 1 active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `regData`, `email`, `fullname`, `password`, `gender`, `active`) VALUES
(6, '2023-09-30 17:45:46', 'walaasalah056@gmail.com', 'walaa salah', '$2y$10$iK3HKXEjsdD0uJnHjSEHF.8qWEpujowOAWD9gAx57o5nYoiavlWjS', 0, 1),
(7, '2023-09-30 17:46:55', 'mahmoud@gmail.com', 'mahmoud salah', '$2y$10$4vyetBYosP/6U2P2qNHknutX83XAhXHTLrCrQqxbpxuor.ytUYamS', 1, 0),
(8, '2023-10-06 17:33:31', 'walaasalah123321@gmail.com', 'mahmoud salah', '$2y$10$yYUS5jDnmNu.ooh3ZCKYquW8xe0kcdGyADr4v0MplJhkXhXlJe6RK', 1, 0),
(9, '2023-10-16 11:05:56', 'walaasalh05d6@gmail.com', 'dina salah', 'www908070', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `title_2` (`title`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `catagories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
