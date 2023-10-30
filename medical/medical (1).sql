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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(60) NOT NULL,
  `admin_type` tinyint(1) NOT NULL DEFAULT 1,
  `regData` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_type`, `regData`) VALUES
(2, 'walaa salah12', 'walaasalah0562@gmail.com', 'www_908070', 1, '2023-10-20 22:57:36'),
(3, 'walaa salah123', 'walaasalah013256@gmail.com', 'www908070', 1, '2023-10-20 23:09:35'),
(4, 'mahmoud salah', 'walaasalah123321@gmail.com', '$2y$10$7TpyhYxAqV67orUlox1vr.QUbsBeu89X00LJhyjO2uAgQo2tPyqlO', 1, '2023-10-21 11:09:00'),
(5, 'walaa salah', 'walaasalah056@gmail.com', '$2y$10$QCMT3dfInOvCK9FkGRT30up3MYMp/PP3bq4p.sx2CstccTVPZh4Vq', 1, '2023-10-21 12:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `regData`) VALUES
(10, 'Port Said', '2023-10-22 15:03:07'),
(11, 'Nasser city', '2023-10-22 15:03:11'),
(12, 'tema', '2023-10-22 15:03:14'),
(13, 'tahta', '2023-10-22 15:03:16'),
(14, 'Port foud', '2023-10-22 15:03:19'),
(15, 'Port Said', '2023-10-22 15:03:49'),
(16, 'tema', '2023-10-22 15:04:10'),
(17, 'Port foud', '2023-10-22 15:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(20) NOT NULL,
  `order_mobile` varchar(20) NOT NULL,
  `order_email` varchar(20) NOT NULL,
  `order_nodes` varchar(1000) NOT NULL,
  `order_serv_id` int(11) NOT NULL,
  `order_city_id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_mobile`, `order_email`, `order_nodes`, `order_serv_id`, `order_city_id`, `regData`) VALUES
(2, 'walaa salah', '0123456879', 'www12332@gmail.com', 'kujyhtgrfdes', 17, 16, '2023-10-22 17:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `regData`) VALUES
(13, 'lab', '2023-10-22 15:37:48'),
(16, 'Treatment', '2023-10-22 16:54:44'),
(17, 'Med care', '2023-10-22 16:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_serv_id` (`order_serv_id`),
  ADD UNIQUE KEY `order_city_id` (`order_city_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_serv_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
