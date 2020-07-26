-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 01:15 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natural-coach`
--

-- --------------------------------------------------------

--
-- Table structure for table `excursion`
--

CREATE TABLE `excursion` (
  `id_excursion` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(10) NOT NULL,
  `max_participant` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `region_start` varchar(45) NOT NULL,
  `region_end` varchar(45) NOT NULL,
  `id_guide` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `excursion`
--

INSERT INTO `excursion` (`id_excursion`, `name`, `price`, `max_participant`, `start_date`, `end_date`, `region_start`, `region_end`, `id_guide`) VALUES
(32, 'trip 11', 500, 20, '2020-10-20', '2020-10-30', 'dummy start', 'dummy end', '');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id_guide` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `id_excursion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id_guide`, `name`, `surname`, `phone`, `id_excursion`) VALUES
(35, 'guide 11', 'guide 11', '7687678678', 32);

-- --------------------------------------------------------

--
-- Table structure for table `guide_tour`
--

CREATE TABLE `guide_tour` (
  `id_guide` int(11) NOT NULL,
  `id_excursion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `randonneurs`
--

CREATE TABLE `randonneurs` (
  `id_randonneur` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `id_excursion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `randonneurs`
--

INSERT INTO `randonneurs` (`id_randonneur`, `name`, `surname`, `email`, `phone`, `id_excursion`) VALUES
(96, 'hiker 11', 'hiker 11', 'hiker@gmail.com', '345345345', 32);

-- --------------------------------------------------------

--
-- Table structure for table `randonneurs_tour`
--

CREATE TABLE `randonneurs_tour` (
  `id_randonneur` int(11) NOT NULL,
  `id_excursion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id_group` int(11) NOT NULL,
  `excursion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id_group`, `excursion_id`) VALUES
(9, 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'miluge', '', 'password', '2020-06-22 14:51:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `excursion`
--
ALTER TABLE `excursion`
  ADD PRIMARY KEY (`id_excursion`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id_guide`),
  ADD KEY `id_excursion` (`id_excursion`);

--
-- Indexes for table `guide_tour`
--
ALTER TABLE `guide_tour`
  ADD KEY `id_guide` (`id_guide`),
  ADD KEY `id_randonneur` (`id_excursion`);

--
-- Indexes for table `randonneurs`
--
ALTER TABLE `randonneurs`
  ADD PRIMARY KEY (`id_randonneur`),
  ADD KEY `id_excursion2` (`id_excursion`);

--
-- Indexes for table `randonneurs_tour`
--
ALTER TABLE `randonneurs_tour`
  ADD KEY `id_randonneur` (`id_randonneur`),
  ADD KEY `id_excursion` (`id_excursion`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_group`),
  ADD UNIQUE KEY `excursion_id_2` (`excursion_id`),
  ADD KEY `excursion_id` (`excursion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `excursion`
--
ALTER TABLE `excursion`
  MODIFY `id_excursion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id_guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `randonneurs`
--
ALTER TABLE `randonneurs`
  MODIFY `id_randonneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`id_excursion`) REFERENCES `excursion` (`id_excursion`);

--
-- Constraints for table `guide_tour`
--
ALTER TABLE `guide_tour`
  ADD CONSTRAINT `guide_tour_ibfk_1` FOREIGN KEY (`id_guide`) REFERENCES `guide` (`id_guide`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guide_tour_ibfk_2` FOREIGN KEY (`id_excursion`) REFERENCES `excursion` (`id_excursion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `randonneurs`
--
ALTER TABLE `randonneurs`
  ADD CONSTRAINT `randonneurs_ibfk_1` FOREIGN KEY (`id_excursion`) REFERENCES `excursion` (`id_excursion`);

--
-- Constraints for table `randonneurs_tour`
--
ALTER TABLE `randonneurs_tour`
  ADD CONSTRAINT `randonneurs_tour_ibfk_1` FOREIGN KEY (`id_randonneur`) REFERENCES `randonneurs` (`id_randonneur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
