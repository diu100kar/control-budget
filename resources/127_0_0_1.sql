-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 24, 2020 at 07:04 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlbudget`
--
CREATE DATABASE IF NOT EXISTS `controlbudget` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `controlbudget`;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `transactor` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`),
  KEY `transactor` (`transactor`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `plan_id`, `transactor`, `amount`, `title`, `date`) VALUES
(1, 1, 'Ankita', 225, 'Food', '2019-04-05'),
(2, 1, 'Diu', 1000, 'Beach', '2019-04-07'),
(3, 1, 'Ankita', 1500, 'Scooters', '2019-04-11'),
(4, 1, 'Diu', 10000, 'Hotel', '2019-04-01'),
(5, 1, 'Ankita', 20000, 'Transport', '2019-04-03'),
(6, 1, 'Ankita', 2500, 'Gifts', '2019-04-18'),
(7, 1, 'Diu', 10000, 'Shopping', '2019-04-10'),
(8, 1, 'Ankita', 25000, 'Cruise', '2019-04-10'),
(9, 1, 'Diu', 25000, 'Car Rentals', '2019-04-01'),
(11, 1, 'Ankita', 2000, 'Airport Kharche', '2019-04-19'),
(12, 2, 'Shagun', 500, 'Rent', '2019-04-10'),
(13, 3, 'Ankita', 75000, 'Air Tickets', '2019-04-01'),
(14, 3, 'Ankita', 1, 'Chaklate', '2019-04-17'),
(15, 4, 'Ankita', 5000, 'Transport', '2019-04-02'),
(16, 4, 'Gauri', 7600, 'Food', '2019-04-02'),
(17, 4, 'Shweta', 1, 'chaklate', '2019-04-03'),
(18, 4, 'Shweta', 299, 'Futane', '2019-04-04'),
(19, 4, 'Ankita', 150, 'Maus', '2019-04-05'),
(20, 4, 'Shweta', 990, 'Water', '2019-04-04'),
(21, 4, 'Shweta', 3000, 'Food', '2019-04-05'),
(22, 4, 'Ankita', 3, 'Dane', '2019-04-07'),
(23, 4, 'Shweta', 300, 'Paper', '2019-04-05'),
(24, 4, 'Shweta', 200, 'Charity', '2019-04-07'),
(25, 4, 'Shweta', 200, 'Charity', '2019-04-07'),
(26, 4, 'Shweta', 600, 'Caves Guide', '2019-04-07'),
(27, 4, 'Shweta', 600, 'Caves Guide', '2019-04-07'),
(28, 1, 'Ankita', 2, 'Dog Biscuits', '2019-04-19'),
(29, 4, 'Gauri', 1300, 'lost', '2019-04-05'),
(30, 3, 'Ankita', 88, 'lol', '2019-04-12'),
(31, 1, 'Diu', 2000, 'Pig', '2019-04-19'),
(32, 1, 'Diu', 1000, 'Wax', '2019-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `person` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `plan_id`, `person`) VALUES
(1, 1, 'Ankita'),
(2, 1, 'Diu'),
(3, 2, 'Supriya'),
(4, 2, 'Shagun'),
(5, 3, 'Ankita'),
(6, 4, 'Ankita'),
(7, 4, 'Gauri'),
(8, 4, 'Shweta'),
(9, 5, 'Diu'),
(10, 5, 'Samu'),
(11, 5, 'Supu');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `budget` bigint(255) NOT NULL,
  `people` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `budget`, `people`, `title`, `from`, `to`) VALUES
(1, 2, 100000, 2, 'Goa Trip', '2019-04-01', '2019-04-20'),
(2, 4, 2000, 2, 'Hyderabad', '2019-04-01', '2019-04-11'),
(3, 2, 200000, 1, 'Europe Exploration', '2019-04-01', '2019-04-19'),
(4, 2, 100000, 3, 'Aurangabad', '2019-04-02', '2019-04-07'),
(5, 1, 2000, 3, 'Gharkharcha', '2019-04-01', '2019-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Divyanshu Shambharkar', 'divyanshu.shambharkar@gmail.com', '65a52d4fa914dcc2510ba9bb274e6d3f', 9309946876),
(2, 'Ankita Chawla', 'ankitachawla366@gmail.com', '02c75fb22c75b23dc963c7eb91a062cc', 9359251323),
(3, 'Aishwarya Shambharkar', 'aishwarya.100kar@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 7391817963),
(4, 'Supriya Shambharkar', 'supriya.100kar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 9284725094);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
