-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2023 at 12:23 AM
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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `regData`, `username`, `password`) VALUES
(1, '2023-10-28 21:56:09', 'walaa_salah', '$2y$10$Ycn3pr2IK0F6aCrLz6MuPuBLy1xuHd6fq7J2P9aLTCacFcNqqfOpC');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `regData`, `username`, `password`) VALUES
(1, '2023-10-28 21:55:45', 'dinaa_salah', '$2y$10$Ycn3pr2IK0F6aCrLz6MuPuBLy1xuHd6fq7J2P9aLTCacFcNqqfOpC'),
(2, '2023-10-28 21:55:45', 'sanaa_salah', '$2y$10$Ycn3pr2IK0F6aCrLz6MuPuBLy1xuHd6fq7J2P9aLTCacFcNqqfOpC');

-- --------------------------------------------------------

--
-- Table structure for table `teatcher`
--

CREATE TABLE `teatcher` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `teatcher`
--

INSERT INTO `teatcher` (`id`, `regData`, `username`, `password`) VALUES
(1, '2023-10-28 21:57:05', 'peter_ted', '$2y$10$Ycn3pr2IK0F6aCrLz6MuPuBLy1xuHd6fq7J2P9aLTCacFcNqqfOpC'),
(2, '2023-10-28 21:57:05', 'rehab_hassan', '$2y$10$Ycn3pr2IK0F6aCrLz6MuPuBLy1xuHd6fq7J2P9aLTCacFcNqqfOpC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teatcher`
--
ALTER TABLE `teatcher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teatcher`
--
ALTER TABLE `teatcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
