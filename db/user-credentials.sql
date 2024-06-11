-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2021 at 05:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupassignmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user-credentials`
--

CREATE TABLE `user-credentials` (
  `userID` int(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `securityAccess` varchar(32) NOT NULL DEFAULT 'author',
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user-credentials`
--

INSERT INTO `user-credentials` (`userID`, `username`, `password`, `securityAccess`, `firstName`, `lastName`) VALUES
(1, 'batman', '$2y$10$OtYYLlkmqphDK/J8K9xV/e1TPJ6iMpozMcWA5QEzGuhOwrMLM.8nq', 'admin', 'Bruce', 'Wayne'),
(2, 'superman', '$2y$10$f14qNV9L1EGTYo7rMUW0z.SIq4wnBIwE4FHjVxnA0N0xB9UbRV.uC', 'admin', 'Clark', 'Kent'),
(3, 'wonderwoman', '$2y$10$3oMj/UQCdaFofIsuGYOQbuvLgeodoiyPjC/edEaAO34zyvQi/Ix1.', 'admin', 'Diana', 'Prince'),
(4, 'aquaman', '$2y$10$.eyl4TsWyOGcv1GWxU1nPOnkUCh5CrzEupoZGBv5NYVnCSFQRKkpW', 'author', 'Arthur', 'Curry'),
(5, 'greenlantern', '$2y$10$nLZauQ0Z4erBozLk0WLT7el6PXy/cwVGOxRAYy92lUE5VvK38wiku', 'author', 'Hal', 'Jordan'),
(6, 'catwoman', '$2y$10$UTjpFB0xdSIUbtLLR99pb.XqC9oT1tDJD.s7LEvooHhP.n6MTpt7C', 'author', 'Selina', 'Kyle'),
(7, 'batgirl', '$2y$10$s0OoCDJANw6Kb6/lRxX3JO99GfiZzUeZdUGSBvn8XFbOhz.z6gzPu', 'author', 'Barbara', 'Gordon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user-credentials`
--
ALTER TABLE `user-credentials`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user-credentials`
--
ALTER TABLE `user-credentials`
  MODIFY `userID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
