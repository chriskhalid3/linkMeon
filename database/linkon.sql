-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 08:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkon`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `className` varchar(100) DEFAULT NULL,
  `dateCreated` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `instruction` varchar(50) DEFAULT NULL,
  `dateLiked` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classlike`
--

CREATE TABLE `classlike` (
  `likeId` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classtracks`
--

CREATE TABLE `classtracks` (
  `trackId` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `dateTracked` varchar(50) DEFAULT NULL,
  `live` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `courseName` varchar(250) DEFAULT NULL,
  `datecreated` varchar(50) DEFAULT NULL,
  `status` int(17) DEFAULT '0',
  `deleteStatus` int(17) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postcollaction`
--

CREATE TABLE `postcollaction` (
  `postId` int(50) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `caption` varchar(250) DEFAULT NULL,
  `imagePostPath` varchar(250) DEFAULT NULL,
  `datePosted` varchar(50) DEFAULT NULL,
  `timePosted` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `userId` int(11) DEFAULT NULL,
  `pathName` varchar(250) DEFAULT NULL,
  `tri` int(11) NOT NULL,
  `dateUpdated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicID` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `topicName` varchar(100) DEFAULT NULL,
  `instruction` varchar(250) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `explanation` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `userEmail` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` varchar(90) DEFAULT NULL,
  `deleteis` int(11) DEFAULT '0',
  `profile` varchar(250) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `profileDefault` varchar(50) DEFAULT '1',
  `changed` int(15) DEFAULT '0',
  `seculity_question` varchar(250) DEFAULT '0',
  `dateIn` varchar(50) DEFAULT NULL,
  `dateOut` varchar(50) DEFAULT NULL,
  `userTYpe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `username`, `userEmail`, `password`, `status`, `deleteis`, `profile`, `gender`, `country`, `profileDefault`, `changed`, `seculity_question`, `dateIn`, `dateOut`, `userTYpe`) VALUES
(8, 'sezerano', 'fent', 'FentLeon', 'fent@gmail.com', '$2y$10$9Ha5nDlMjmK6lWAYLLSgie4QBc1GS82INlTwzZ4Pedy.NvTgIl6PC', 'offline', 0, '8475960e39b842df52b7b458c9fe91b33e7.jpg', 'Male', 'Rwanda', '0', 0, '$2y$10$qDrf70SS5Y/V6dHbMtNU8u7s5F.SVaDeWHSOs.JS3gG8MPK4joGSa', '20-04-03', '20-04-08', 'Student'),
(9, 'sezerano', 'fent', 'FentUser', 'fentUser@gmail.com', '$2y$10$E0rf0FHTLHdR2PJ9zyvfqu8vEd1/qDiYJi9u5t7DckCGuocjvq/Qy', 'offline', 0, 'avatar1.jpg', 'Male', 'Kenya', '1', 1, '$2y$10$ZBwPZsjGQAtYefdPFsrjTOZXk5Ew9CLk8cCXX8Z2ofQ0m26b.9D7W', '20-04-03', '20-04-29', 'Student'),
(10, 'antoin', 'chris', 'khakid3', 'khalid3@gmail.com', '$2y$10$LNwbEApaSbcd7Jt6HOjCtuILK92JIgP/3r8ZYqX/r8IKAXePQn96y', 'offline', 0, 'avatar1.jpg', 'Male', 'Rwanda', '1', 0, '$2y$10$y5RFTlOXF1uzVC0N97zb/eEYV5gC/OksPiFaIuHcnj9rxq6Ug5wIu', '20-04-03', '', 'Student'),
(11, 'sezerano', 'chris', 'chrisLon', 'lon@gmail.com', '$2y$10$Lz6wf5CEvPx99eIxj8IKMOw.y4aMFhwDrutGvPcpCz47CcdqdosxO', 'offline', 0, 'avatar1.jpg', 'Male', 'Kenya', '1', 0, '$2y$10$aT8ETMEAUwQ0w3AEo2la3uXyL9H3IXZLLC.7L01ai/Tc3YVCBjoIW', '20-04-08', '20-04-15', 'Student'),
(12, 'baby', 'babys', 'chrisLon1', 'lon1@gmail.com', '$2y$10$cZaTCAQmubaH.ApG8uKEHeEbCXtpk6SvbVbegoVkXRLgQKNMTQS2O', 'offline', 0, 'avatar2.jpg', 'Male', 'Rwanda', '1', 0, '$2y$10$kfedgQp.6WUi5b2egYvIdugKgMEqF9.etOdMXlMgdH8kmcyXdmnFm', '20-04-08', '20-04-09', 'Student'),
(13, 'delly', 'jean', 'khakid323', 'kkkkk@gmail.com', '$2y$10$JLiR5qzxPweF2R3diY8y6euUToVA2xWnAmbVZ/cs69sjeeHt6Eqxy', 'offline', 0, 'avatar3.jpg', 'Male', 'Kenya', '1', 0, '$2y$10$xZLzAG0pnv22naXaJfybreq8LpZtct8K/c9Ozn1EeD0t1c0IHf9.e', '20-04-15', '', 'Student'),
(14, 'antoin', 'jean ', 'antonio12', 'antonio12@gmail.com', '$2y$10$0QCFV2tV0HSp5iiAYdyW6e1HjphIa5CpAi1KPDWsWXajlI71neYqS', 'offline', 0, 'avatar4.jpg', 'Female', 'Rwanda', '1', 0, '$2y$10$jhAWstQYSgw5hvRlGbaf7eO3l8aAm9wq0m3iF4HZaiZ4yAl/0c8p6', '20-04-15', '20-04-29', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `class_ibfk_1` (`userId`);

--
-- Indexes for table `classlike`
--
ALTER TABLE `classlike`
  ADD PRIMARY KEY (`likeId`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `classtracks`
--
ALTER TABLE `classtracks`
  ADD PRIMARY KEY (`trackId`),
  ADD KEY `classID` (`classID`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `course_ibfk_1` (`classID`);

--
-- Indexes for table `postcollaction`
--
ALTER TABLE `postcollaction`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`tri`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicID`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classtracks`
--
ALTER TABLE `classtracks`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postcollaction`
--
ALTER TABLE `postcollaction`
  MODIFY `postId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `tri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classlike`
--
ALTER TABLE `classlike`
  ADD CONSTRAINT `classlike_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`);

--
-- Constraints for table `classtracks`
--
ALTER TABLE `classtracks`
  ADD CONSTRAINT `classtracks_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `classtracks_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `class` (`userId`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`);

--
-- Constraints for table `postcollaction`
--
ALTER TABLE `postcollaction`
  ADD CONSTRAINT `postcollaction_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
