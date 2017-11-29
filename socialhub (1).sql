-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 03:09 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutme`
--

CREATE TABLE `aboutme` (
  `userID` varchar(100) COLLATE utf8_bin NOT NULL,
  `phoneNum` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `sexualInterests` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `relationshipStatus` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `primaryLanguage` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `secondaryLanguage` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `religiousBeliefs` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `politicalBeliefs` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bio` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `prevAddress` text COLLATE utf8_bin NOT NULL,
  `currentAddress` text COLLATE utf8_bin NOT NULL,
  `hometown` varchar(255) COLLATE utf8_bin NOT NULL,
  `prevWork` varchar(100) COLLATE utf8_bin NOT NULL,
  `currentWork` varchar(100) COLLATE utf8_bin NOT NULL,
  `profilepic` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(255) NOT NULL,
  `userID` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `userID`) VALUES
(1, '59f35e9947608');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` varchar(100) COLLATE utf8_bin NOT NULL,
  `userID` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  `relatedID` varchar(100) COLLATE utf8_bin NOT NULL,
  `createdTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `likeonpost`
--

CREATE TABLE `likeonpost` (
  `lopid` int(255) NOT NULL,
  `likeBy` varchar(100) COLLATE utf8_bin NOT NULL,
  `postID` varchar(255) COLLATE utf8_bin NOT NULL,
  `epochTime` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgID` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `creatorID` varchar(100) COLLATE utf8_bin NOT NULL,
  `relatedID` varchar(100) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photoID` varchar(100) COLLATE utf8_bin NOT NULL,
  `creatorID` varchar(100) COLLATE utf8_bin NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `createdTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` varchar(100) COLLATE utf8_bin NOT NULL,
  `userID` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `photoID` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `createdTime` bigint(20) NOT NULL,
  `readTime` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `userID1` varchar(100) COLLATE utf8_bin NOT NULL,
  `userID2` varchar(100) COLLATE utf8_bin NOT NULL,
  `relation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(255) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `postID` varchar(100) COLLATE utf8_bin NOT NULL,
  `reportBy` varchar(100) COLLATE utf8_bin NOT NULL,
  `reportTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `firstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(6) COLLATE utf8_bin NOT NULL,
  `privacy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstName`, `lastName`, `birthday`, `gender`, `privacy`) VALUES
('59f35e9947608', 'chunhei1314@gmail.com', '8ff3dfc35765c0a1dc7762b9bea6326804d844bb', 'ChunHei', 'Yuen', '1995-06-01', 'Male', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutme`
--
ALTER TABLE `aboutme`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `likeonpost`
--
ALTER TABLE `likeonpost`
  ADD PRIMARY KEY (`lopid`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD UNIQUE KEY `photoID` (`photoID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD UNIQUE KEY `reportID` (`reportID`,`reportBy`) USING BTREE,
  ADD KEY `fk` (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `likeonpost`
--
ALTER TABLE `likeonpost`
  MODIFY `lopid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
