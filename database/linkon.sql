-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 02:35 AM
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
  `instruction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `userId`, `className`, `dateCreated`, `description`, `instruction`) VALUES
(1, 15, 'mental health', '20-05-18', 'we will dsgn ', 'try to folow and ask\r\n'),
(2, 16, 'leano', '20-05-21', 'sdfjklqwertyuioyansdjfuasdbkfbaksudyfa,mndbfkauydf', 'tears');

-- --------------------------------------------------------

--
-- Table structure for table `classlike`
--

CREATE TABLE `classlike` (
  `likeid` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classlike`
--

INSERT INTO `classlike` (`likeid`, `classID`, `userId`) VALUES
(1, 2, 11);

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
  `deleteStatus` int(17) DEFAULT '0',
  `comment` varchar(300) NOT NULL,
  `instruction` varchar(300) DEFAULT NULL,
  `discription` varchar(400) DEFAULT NULL,
  `goal` varchar(400) DEFAULT NULL,
  `courseCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `classID`, `courseName`, `datecreated`, `status`, `deleteStatus`, `comment`, `instruction`, `discription`, `goal`, `courseCode`) VALUES
(6, 1, 'learn', '20-05-24', 0, 0, 'wertyfjyui', 'sdfxcvbndfj', 'qwertyuiasdfj', 'dfjjunikui', '20.18.dellu.mental health06:182813#^#%'),
(7, 1, 'Rich to the master key ', '20-05-24', 0, 0, 'qwertyu', 'qwertyui', 'qweryutu', 'qwertyui', '20/#18/^dellu/^mental health06/523024#^#%');

-- --------------------------------------------------------

--
-- Table structure for table `coursetracks`
--

CREATE TABLE `coursetracks` (
  `trckid` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `dateTracked` varchar(50) DEFAULT NULL,
  `live` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetracks`
--

INSERT INTO `coursetracks` (`trckid`, `courseId`, `userId`, `dateTracked`, `live`) VALUES
(1, 7, 9, '20-05-18', 1),
(2, 7, 9, '2020', 1),
(3, 6, 9, '2020', 1);

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

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`userId`, `pathName`, `tri`, `dateUpdated`) VALUES
(9, '915960e39b842df52b7b458c9fe91b33e7.jpg', 1, '20-05-07');

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
(9, 'sezerano', 'fent', 'FentUser', 'fentUser@gmail.com', '$2y$10$E0rf0FHTLHdR2PJ9zyvfqu8vEd1/qDiYJi9u5t7DckCGuocjvq/Qy', 'offline', 0, '915960e39b842df52b7b458c9fe91b33e7.jpg', 'Male', 'Kenya', '0', 1, '$2y$10$ZBwPZsjGQAtYefdPFsrjTOZXk5Ew9CLk8cCXX8Z2ofQ0m26b.9D7W', '20-04-03', '20-05-26', 'Student'),
(10, 'antoin', 'chris', 'khakid3', 'khalid3@gmail.com', '$2y$10$LNwbEApaSbcd7Jt6HOjCtuILK92JIgP/3r8ZYqX/r8IKAXePQn96y', 'offline', 0, 'avatar1.jpg', 'Male', 'Rwanda', '1', 0, '$2y$10$y5RFTlOXF1uzVC0N97zb/eEYV5gC/OksPiFaIuHcnj9rxq6Ug5wIu', '20-04-03', '', 'Student'),
(11, 'sezerano', 'chris', 'chrisLon', 'lon@gmail.com', '$2y$10$Lz6wf5CEvPx99eIxj8IKMOw.y4aMFhwDrutGvPcpCz47CcdqdosxO', 'offline', 0, 'avatar1.jpg', 'Male', 'Kenya', '1', 0, '$2y$10$aT8ETMEAUwQ0w3AEo2la3uXyL9H3IXZLLC.7L01ai/Tc3YVCBjoIW', '20-04-08', '20-05-26', 'Student'),
(12, 'baby', 'babys', 'chrisLon1', 'lon1@gmail.com', '$2y$10$cZaTCAQmubaH.ApG8uKEHeEbCXtpk6SvbVbegoVkXRLgQKNMTQS2O', 'offline', 0, 'avatar2.jpg', 'Male', 'Rwanda', '1', 0, '$2y$10$kfedgQp.6WUi5b2egYvIdugKgMEqF9.etOdMXlMgdH8kmcyXdmnFm', '20-04-08', '20-04-09', 'Student'),
(13, 'delly', 'jean', 'khakid323', 'kkkkk@gmail.com', '$2y$10$JLiR5qzxPweF2R3diY8y6euUToVA2xWnAmbVZ/cs69sjeeHt6Eqxy', 'offline', 0, 'avatar3.jpg', 'Male', 'Kenya', '1', 0, '$2y$10$xZLzAG0pnv22naXaJfybreq8LpZtct8K/c9Ozn1EeD0t1c0IHf9.e', '20-04-15', '', 'Student'),
(14, 'antoin', 'jean ', 'antonio12', 'antonio12@gmail.com', '$2y$10$0QCFV2tV0HSp5iiAYdyW6e1HjphIa5CpAi1KPDWsWXajlI71neYqS', 'offline', 0, 'avatar4.jpg', 'Female', 'Rwanda', '1', 0, '$2y$10$jhAWstQYSgw5hvRlGbaf7eO3l8aAm9wq0m3iF4HZaiZ4yAl/0c8p6', '20-04-15', '20-04-29', 'Teacher'),
(15, 'jean', 'dellu', 'dellu', 'dellu@gmail.com', '$2y$10$huoWHAKkijqJKZ46lwEB2OYAt0jbhwIdk1MntZVvRVC1LhfneJnRy', 'active', 0, 'avatar4.jpg', 'Female', 'Kenya', '1', 0, '$2y$10$rSeApGZEBRGsZLlB1Np2e.80F7NJVtbVK1dfSeHBMKF1IAZgRm6FO', '20-05-18', '20-05-26', 'Teacher'),
(16, 'tears', 'jean ', 'jean32', 'jean32@gmail.com', '$2y$10$fIxprnEL4deC.sggohQUzeG/F3LMQ5X8qAETtIs.YEsum/.yLs7b.', 'offline', 0, 'avatar5.jpg', 'Male', 'Kenya', '1', 0, '$2y$10$ihp3glrxpksIf4VEyI6KYO3/K91VOtaoA7fEUrk7BEfzP96dR8Hbu', '20-05-21', '20-05-21', 'Teacher'),
(17, 'sezerano', 'chrisostom', 'userone', 'sezeranochrisostom@gmail.com', '$2y$10$3wMiODVCa0IL82Bwq7Dz2.SbFBtK72pdB9iO.JwRni4EzIxgdhTGy', 'offline', 0, 'avatar2.jpg', 'Male', 'Rwanda', '1', 0, '$2y$10$LmDN19kypAZXzgRvjS5DheMrg/U.3alVanWCMyY//Dj.mpCB3se2O', '20-05-25', '20-05-26', 'Teacher');

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
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `classID` (`classID`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `coursetracks`
--
ALTER TABLE `coursetracks`
  ADD PRIMARY KEY (`trckid`),
  ADD KEY `userId` (`userId`),
  ADD KEY `courseId` (`courseId`);

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
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classlike`
--
ALTER TABLE `classlike`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coursetracks`
--
ALTER TABLE `coursetracks`
  MODIFY `trckid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `postcollaction`
--
ALTER TABLE `postcollaction`
  MODIFY `postId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `tri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `classlike_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `classlike_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`);

--
-- Constraints for table `coursetracks`
--
ALTER TABLE `coursetracks`
  ADD CONSTRAINT `coursetracks_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `coursetracks_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

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
