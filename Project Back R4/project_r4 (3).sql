-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2023 at 07:56 PM
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
-- Database: `project_r4`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(20) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `Luggage` int(11) NOT NULL,
  `Doors` int(11) NOT NULL,
  `Passengers` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `regData`, `title`, `content`, `Luggage`, `Doors`, `Passengers`, `Price`, `active`, `image`, `cat_id`) VALUES
(3, '2023-10-26 17:42:22', 'Honda Fitta ', ' The Honda Fitta was expected to be an instant hit on the small-car platform. With its unique interior design, it rendered its interior ...\r\n', 5, 5, 7, 987, 1, 'f3d3070d82c152864567d2b4f97b8c0e.jpeg', 3),
(6, '2023-10-26 17:47:27', 'Buick LaCrosse', 'Starting at $30,495 · Highs Proficient powertrains, handsome styling, well-rounded infotainment. · Lows Expensive driver-assistance tech, awkwardly located \r\n', 7, 4, 4, 762, 0, 'd0a0830a68df3a3e5ad73b2f038edeee.jpeg', 1),
(9, '2023-10-26 20:13:54', 'Buick LaCrossess', 'Starting at $30,495 · Highs Proficient powertrains, handsome styling, well-rounded infotainment. · Lows Expensive driver-assistance tech, awkwardly located \r\n', 8, 4, 4, 762, 1, '29929f7cd6989f19de2606aed2013ff7.jpeg', 1),
(10, '2023-10-27 12:32:25', 'Chery Arrizo 5 2024', 'Chery Arrizo 5 2024 AT / BASELINE Leather. Price 540,000 EGP. Min.Deposit 193,500 EGP. Min.Installment 11,476 EGP. CC 1500. Chery Arrizo 5 2023 AT / HIGHLINE.\r\n', 8, 4, 4, 540, 1, '4ff65ebc0c0f2ad8116834ad1d2b5d55.jpeg', 5),
(11, '2023-10-27 12:33:59', 'Toyota Corolla 2021', 'Starting at $21,050 · Highs Comfortable ride, spacious back seat in the sedan, desirable standard features. · \r\n', 4, 4, 4, 493, 1, 'b34f57bcbe807ffd93c03fa8585f0172.jpeg', 19),
(12, '2023-10-27 12:37:25', ' Mazda Laputa', 'Der Mazda Laputa war ein Kleinstwagen, den Mazda in Japan von 1999 bis 2006 anbot. Der Wagen wurde von Suzuki hergestellt und als Suzuki Kei angeboten.\r\n', 4, 4, 4, 456, 1, 'e4da31359f9157dcd72997f25507b82a.jpeg', 3),
(13, '2023-10-27 14:22:24', 'Renault Logan 2017', 'Renault Logan 2017 For Sale In Egypt at a price 405000 EGP - Cairo - Published In 26 Aug 2023.\r\n', 6, 4, 4, 945, 1, '461fd3e684ff8ccbd879ccda3ba7bcd3.jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catagory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catagory`) VALUES
(3, 'BMW'),
(16, 'Coupe'),
(17, 'Sedan'),
(1, 'Sports'),
(5, 'SUV'),
(19, 'Toyota ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `regData` timestamp NOT NULL DEFAULT current_timestamp(),
  `full name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `published` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `regData`, `full name`, `username`, `email`, `password`, `admin`, `published`) VALUES
(1, '2023-10-25 15:14:31', 'walaa salah mahmoud', 'walaa_salahhhjk', 'walaasalah056@gmail.com', '$2y$10$3kUqRhR84CMDHFouH/OJV./G1BeWYidVnrQ9Efxbplzg9gX4QFGc2', 0, 0),
(4, '2023-10-25 15:32:33', 'walaa salah mahmoud', 'walaa056', 'walaasalah123321@gmail.com', '$2y$10$NN7YbbpV0bWvJXIjFTtmSO.ity/8acj7XqfvKvp8SzW/j0fsn/h3C', 1, 1),
(5, '2023-10-25 15:33:26', 'walaa salah mahmoud', 'walaa_salah056', 'walaasalah0656@gmail.com', '$2y$10$sRi9PV9P7vN9/GEcDchP3eHLOzWr.v24/ZIykbVOmW8MGfSL9rqsS', 1, 1),
(6, '2023-10-25 15:35:02', 'sanaa salahhh', 'sanaa_salahh', 'mahmoud@gmail.com', '$2y$10$Nyx7nrDXd3YFr0xhjX9tXOWOL8WoBQZVjthIQTJSsW8B2i8KpAaOG', 0, 0),
(9, '2023-10-25 15:47:39', 'mohamed salah mahmoud', 'mohamedsalah ', 'mohamedsalah6@gmail.com', '$2y$10$g8R8qQt2lIAPl8OMzJdYp./rCR1q.K4N6BBh1qHvlMoFF8c1Ferp2', 0, 1),
(10, '2023-10-25 15:49:01', 'sanaa salah', 'sdfgs', 'mahmdoud@gmail.com', '$2y$10$MW1SOyOljtEHe3SfFWcVsebwhNapqejJpP9pDYkzHZD.MCsMxgPg6', 0, 1),
(13, '2023-10-25 15:56:39', 'sanaa salah', 'walaasalah056@gmail.com', 'mahmbboud@gmail.com', '$2y$10$gEaNg7MidZnGOTSEDRnoIuJydzDXtE/48KbUukyK6oEUdyiFi1ciu', 0, 0),
(15, '2023-10-25 15:58:00', 'walaa salah mahmoud', 'walaasalah0t56@gmail.com', 'walaasalaht123321@gmail.com', '$2y$10$gofqKyero.iVa0YT6a1.ZOE1WZ/KUUosnwh4rdGhKl7xHzAttGsyq', 0, 1),
(41, '2023-10-25 22:17:55', 'walaa salah mahmoud', 'walaa_salah123321', 'walaasalahet123321@gmail.com', '$2y$10$1ssqLGTw0.tGux7fIRymw.AJJI8lV3w7bI0zTmsPNy4BF90UkJq6.', 0, 0),
(42, '2023-10-26 12:57:12', 'walaa salah mahmoud', 'walaa_Gaffer', 'walaasalahGaffer123321@gmail.com', '$2y$10$cy/eGQeEbeZk1LaJ7cx0TO3gacMeBtTKNA8s.o0wmr2F7MQ2Weqiy', 0, 1),
(43, '2023-10-26 13:00:20', 'walaa salah mahmoudd', 'walaa_salah_gaffer', 'walaasalahgaffer056@gmail.com', '$2y$10$bOBWn/inpRXws/8cA8wn3.ruYmkRC/mglqhRvoTXvAJ6V9VeHBEw2', 0, 0),
(44, '2023-10-26 13:02:30', 'sanaa salahhh', 'sanaa_056', 'walaasalah121@gmail.com', '$2y$10$hlXiXCO0kdCFBtoCF1SGIuOuhZ9iJcPRFddox/fQJaUHbkNtyMnrC', 0, 0),
(45, '2023-10-26 13:16:02', 'mohamed salah mahmoud', 'mohamed salah23', 'mohamedsalah056@gmail.com', '$2y$10$RS41QbW7F0S1otkoFYe5auPy.7mPWEe8lfsmbuBPezUyCg37sZV/C', 0, 1),
(46, '2023-10-27 12:20:48', 'yasmin ahmed', 'yasmin_ahmed123', 'yasmin_ahmed123@gmail.com', '$2y$10$1gm83XRgVErT92irwpqnseseYV2BsPNO.EDrvUXXoHCOihU802nxu', 0, 1),
(47, '2023-10-27 15:12:24', 'amany mohamed', 'amany_mohamed', 'amanymohamed056@gmail.com', '$2y$10$KB5QJHMzfi4vgkQGMeNiEe2gPpIfV1IhYUQVgjWA9ALr6d36Yydji', 0, 1),
(48, '2023-10-29 18:19:26', 'tagreed hassan', 'tagreed_hassan', 'tagreedhassan056@gmail.com', '$2y$10$NJn/jk528UQHyPsrt1viQOEUY9vY16DnhnmIStiGdP1E9rbzbpojq', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catagory` (`catagory`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
