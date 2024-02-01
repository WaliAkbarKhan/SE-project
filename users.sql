-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 07:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `age`, `user_id`, `dob`, `email`) VALUES
(1, 'Wali Akbar Khan', 22, 32, NULL, 'wali@gmail.com'),
(47, 'Yusra Saeed', 21, 1, NULL, 'yusrasaeed333@gmail.com'),
(50, 'Memoona Marjan', 21, 33, NULL, 'memoona@gmail.com'),
(51, 'Ayesha Saeed', 16, 35, NULL, 'ayesha333@gmail.com'),
(52, 'Tahreem Saeed', 24, 36, NULL, 'tahreem@gmail.com'),
(53, 'Palwasha', 21, 38, NULL, 'palwasha@gmail.com'),
(60, 'Ayesha Saleem', 20, 47, NULL, 'ayeshasaleem2529@gmail.com'),
(64, 'Washma Tabassum', 21, 29, NULL, 'washmamalik@gmail.com'),
(66, 'aaaa', 21, 49, NULL, 'aaaa@gmail.com'),
(75, 'Yusra', 21, 51, NULL, 'yusrasaeed444@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE `educational_details` (
  `id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`id`, `qualification`, `institution`, `department`, `user_id`) VALUES
(5, 'BS', 'UET, Peshawar', 'CS&IT', 1),
(10, 'BS', 'UET, Peshawar', 'CS', 47),
(12, 'BS', 'UET, Peshawar', 'CS&IT', 32),
(13, 'BS', 'UET, Peshawar', 'CS', 29),
(17, 'BS', 'UET, Peshawar', 'CS&IT', 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `lab`) VALUES
(1, 'Yusra', 'Saeed', 'yusrasaeed', 'yusrasaeed333@gmail.com', '$2y$10$sja/2k1p9JRdg7BZ9JvV1OAusgZRHMymtnPx2B.iS46J1XqH24vp6', ''),
(2, 'Wali Akbar', 'Khan', 'waliakbarkhan', 'waliakbarkhan@gmail.com', '$2y$10$mQoqkQY07Noh7m747m7tTeY.Gx/lsl1RX0GW3JQeQ26vp97rAJsqu', ''),
(3, 'Washma', 'Tabassum', 'washma', 'washma@gmail.com', '$2y$10$hWq8ndPVrpRVAdL6EtJASOa62sGJuLpCxz/uZ7nDUIg7sybU9X./i', ''),
(29, 'Washma', 'Tabassum', 'washma2906', 'washmatabassum@gmail.com', '$2y$10$SW797RvGgnil/EaF8Q7Q7ua8cysXncffZ8mBzNDrgvgvs9fKTVTw6', 'Security Testing'),
(32, 'Wali Akbar', 'Khan', 'waliakbar', 'wali@gmail.com', '$2y$10$1JSmUq4K5.gA2VNzy3wKku40Y7rKMMAWQc1r6BATEbxRvtELtyHX2', 'Blockchain Security'),
(33, 'Memoona', 'Marjan', 'memoona', 'memoona@gmail.com', '$2y$10$CkFUKrH3ZL/rRB1sdddlnOPbWy.YKgM9Txn4INL6ZVAGwvhO1FYxS', 'Secured IoT Devices'),
(35, 'Ayesha', 'Saeed', 'ayeshasaeed', 'ayesha333@gmail.com', '$2y$10$cNynbc2XvRBBOa1o5dUdVOpNrkvUpkpJspsLpuzOf88d.o2d4m4UG', 'Secured IoT Devices'),
(36, 'Tahreem', 'Saeed', 'tahreem', 'tahreem@gmail.com', '$2y$10$26JGiZynfdsoA09QVd4p8.7iBB.LLLonkaZE4oTz3FXmfIBFU07Bm', 'Blockchain Security'),
(38, 'Palwasha', 'Javed', 'palwasha', 'palwasha@gmail.com', '$2y$10$XOhZ/1tGC6OwyTz4eNzhXuYdNvfa1/H8k8TN0OjpcODkn/c1546x2', 'Security Testing'),
(47, 'Ayesha', 'Saleem', 'ayesha333', 'ayeshasaleem2529@gmail.com', '$2y$10$1BH3eiV.nwX0PKFfOamFoO8vIllwQZ85tIV7TXbb7TFbXHCyw775q', 'Security Testing'),
(49, 'uey', 'iuert', 'aaaa', 'aaaa@gmail.com', '$2y$10$AuK57JzbyrFLtBEw1s0zPuF9xj0J10HTDYmHGisXG5YGbBcKpCm22', 'Security Testing'),
(51, 'Yusra', 'Saeed', 'yusra', 'yusrasaeed43@gmail.com', '$2y$10$og0Ph63J.h2MdlLypb92nuup1WgTE0gDKJFVCvJoNfulNWM7FUjUq', 'Blockchain Security');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `educational_details`
--
ALTER TABLE `educational_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`id`);

--
-- Constraints for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD CONSTRAINT `educational_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
