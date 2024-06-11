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
-- Table structure for table `blog-posts`
--

CREATE TABLE `blog-posts` (
  `blogID` int(64) NOT NULL,
  `author` varchar(32) NOT NULL,
  `blogDate` date NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` varchar(2048) NOT NULL,
  `authorID` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog-posts`
--

INSERT INTO `blog-posts` (`blogID`, `author`, `blogDate`, `blogTitle`, `blogContent`, `authorID`) VALUES
(1, 'batman', '2021-04-01', 'The Justice Hall has been built.', 'The Justice Hall has been built. From now onwards the Justice League will have meetings there.', 1),
(2, 'catwoman', '2021-04-02', 'Meow', 'Batman I am going to find you.', 6),
(3, 'batgirl', '2021-02-08', 'Robin Missing?', 'Where is Robin? If you find him contact Knight Wing.', 7),
(4, 'Batman', '2021-04-21', 'Joker has crossed the line!!!', 'If anyone sees Joker tell him he is done for. No one messes with my Robin and gets away with it.', 1),
(5, 'superman', '2021-04-30', 'Martha', 'I cannot find Martha, where is she? Luthor if anything happens to her, you are dead.', 2),
(6, 'wonderwoman', '2021-01-05', 'Mother Box taken', 'The Mother Boxes have been activated and one of the has already been taken.', 3),
(7, 'aquaman', '2021-04-23', 'King Of Atlantis', 'I have accepted my place as the King of Atlantis. And I will protect both the Ocean and the Land.', 4),
(8, 'greenlantern', '2021-06-10', 'Guardian of Earth', 'I am Hal Jordan the newly appointed Green Lantern, I will guard the Earth and all living creatures within it.', 5),
(9, 'aquaman', '2021-08-20', 'Fish talker', 'Yes, I do talk to fish. They have interesting lifes.', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog-posts`
--
ALTER TABLE `blog-posts`
  ADD PRIMARY KEY (`blogID`),
  ADD UNIQUE KEY `blogID` (`blogID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog-posts`
--
ALTER TABLE `blog-posts`
  MODIFY `blogID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
