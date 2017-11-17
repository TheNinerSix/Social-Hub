-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 04:03 AM
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

--
-- Dumping data for table `aboutme`
--

INSERT INTO `aboutme` (`userID`, `phoneNum`, `sexualInterests`, `relationshipStatus`, `primaryLanguage`, `secondaryLanguage`, `religiousBeliefs`, `politicalBeliefs`, `bio`, `prevAddress`, `currentAddress`, `hometown`, `prevWork`, `currentWork`, `profilepic`) VALUES
('59f35e9947608', '', NULL, NULL, NULL, NULL, NULL, NULL, 'wtf\r\n', '', '', '', '', '', '42d844463782aced908fced72a5ad26f68381b49.png'),
('59f3631d7c308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '6f03d5ac88b12469424bbf3867c7bff29ef56969.jpg'),
('59f375ffd9ab1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '96a0c872c3e4bb0ecab1903b3df9861e94a021af.png');

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
-- Table structure for table `likeonpost`
--

CREATE TABLE `likeonpost` (
  `lopid` int(255) NOT NULL,
  `likeBy` varchar(100) COLLATE utf8_bin NOT NULL,
  `postID` varchar(255) COLLATE utf8_bin NOT NULL,
  `epochTime` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `likeonpost`
--

INSERT INTO `likeonpost` (`lopid`, `likeBy`, `postID`, `epochTime`) VALUES
(1, '59f35e9947608', '4b9291cee30e86691fb1445ae9ce21e3902918d1', 1509717932),
(2, '59f3631d7c308', '4b9291cee30e86691fb1445ae9ce21e3902918d1', 1509720961);

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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgID`, `content`, `creatorID`, `relatedID`, `time`) VALUES
('as1251251dg3', 'test', '59f35e9947608', '59f3631d7c308', '2017-10-27 18:14:31'),
('as1251251dg3', ' hi', '59f3631d7c308', '59f35e9947608', '2017-10-27 18:14:47'),
('as1251251dg3', 'dsfdjashdkjasdhsakdhaskdsahdksadhsakjdashdksaj dhsakjdsahdkjashd akjsdh sajkdshadkjas hdsakjdhas kjdshakjdashdkjsadhas kjdhsajkdashdiawreyuwaofhjzxkjfmhzxsdkjcazhdikjasdhaskjd sahjkdhaskjdsadjhdsaolhd askjdnsakjmdhaskldasjhkdlasdasd', '59f3631d7c308', '59f3631d7c308', '2017-11-02 11:38:21');

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

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `userID`, `content`, `photoID`, `createdTime`, `readTime`) VALUES
('04e2d95990e228eeaa58193f7317aba419354a71', '59f3631d7c308', 'can i post?\r\n', NULL, 1510789542, NULL),
('186a50de0d3206a6333feaa02d9d7daf1cc45fe8', '59f3631d7c308', 'heheXD\r\n', NULL, 1510795947, NULL),
('3ab8232cc6e7bdd39a463418d1808e0efcb80c4b', '59f3631d7c308', 'rwar', NULL, 1510790378, NULL),
('434b9957c49220e812eabffc8517ec21aa0ba0eb', '59f375ffd9ab1', '???\r\n', NULL, 1510433558, NULL),
('4e2a69aabb90bf7c283680c069ba773a05dbb989', '59f35e9947608', 'can i type\r\n', NULL, 1510789519, NULL),
('52a9f67cc4892e39fae688ca65409e7fd097ce86', '59f3631d7c308', '??', NULL, 1510789526, NULL),
('64d59c93285cb7eddbfbcf1ae811849327512a5e', '59f3631d7c308', 'its not working', NULL, 1510789779, NULL),
('786e2749df8dd0aaef365d21d57d1230811418d1', '59f3631d7c308', ':D', NULL, 1510795198, NULL),
('78d3a8a55163f9bf0e9d61773f52a359b66a3486', '59f3631d7c308', 'really?', NULL, 1510791313, NULL),
('949c164602a14624a85258392e4c883b8b24b416', '59f3631d7c308', 'asdadsad\r\n', NULL, 1510791905, NULL),
('a371cef12774cbb72df4665d8bf6520943af35b7', '59f3631d7c308', 'D:\r\n', NULL, 1510797600, NULL),
('a7e3965eea65853b8e9f5ad118b49c78aba8d88d', '59f3631d7c308', '1\r\n', NULL, 1510790172, NULL),
('b01a1092ebb09796ae4b24ca4eab86f9fbc76fba', '59f3631d7c308', 'finally', NULL, 1510794333, NULL),
('bb116c71bd481c47af2a738a684a68aa5f2fb8d8', '59f3631d7c308', 'its working my god', NULL, 1510795310, NULL),
('be595e6bdf6001a93d3117db57c9772de82dcad8', '59f3631d7c308', 'i want to post something 2', NULL, 1509708601, NULL),
('bf50b11cbf31d0832135463a659cfea019e2d0d6', '59f3631d7c308', 'sadå± æ³å±Žå± æ³å±Žæ˜¨æ³å±Žå± æœ½æ²å± ï¼¿', NULL, 1510793394, NULL),
('c057213152ac5ca2ad80d80b6531952787de7639', '59f3631d7c308', 'wtf', NULL, 1510790885, NULL),
('ccbf919292975f0de904f3065fd8bba33f172e6c', '59f3631d7c308', 'testetsetsets3\r\n', NULL, 1510790912, NULL),
('d2c69dcef9364c9d8a57978af8b699f7420f644c', '59f35e9947608', 'stop spamming holy', NULL, 1510795979, NULL),
('da736dc2d7bd5b98b45f97448d37f42334948120', '59f35e9947608', 'its working?', NULL, 1509627792, NULL),
('dbe93420ff7b76037afb64376272f9664b41e1a6', '59f35e9947608', 'nothing new this week\r\n', NULL, 1510788979, NULL),
('e49395a1bda65cddb6b1282d65deb3948ce946d8', '59f3631d7c308', 'working?', NULL, 1510789886, NULL),
('ea608d71a87b425f1710106381828ddfadd1f7f7', '59f3631d7c308', 'test\r\n', NULL, 1510790011, NULL),
('ead42302f4d3d5a92d7e34903f4b9a72c3375634', '59f3631d7c308', '??', NULL, 1510791141, NULL),
('ef45b2ab51080229504054cfb2d8869fdd693c25', '59f35e9947608', 'ssss', NULL, 1510793414, NULL),
('ef852d6e8892694ff78b590f75b4360933bdc5fc', '59f3631d7c308', 'test', NULL, 1510790144, NULL),
('efb630b96f95ce37613b9e69bff97dc5dc337875', '59f3631d7c308', 'this stuff refreshing?\r\n', NULL, 1510789676, NULL),
('f1c662f1315745ec431188ee58079b5397729763', '59f3631d7c308', 'test', NULL, 1510789575, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `userID1` varchar(100) COLLATE utf8_bin NOT NULL,
  `userID2` varchar(100) COLLATE utf8_bin NOT NULL,
  `relation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`userID1`, `userID2`, `relation`) VALUES
('59f35e9947608', '59f3631d7c308', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(255) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `postID` varchar(255) COLLATE utf8_bin NOT NULL,
  `reportBy` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `content`, `postID`, `reportBy`) VALUES
(5, 'its works', 'be595e6bdf6001a93d3117db57c9772de82dcad8', '59f35e9947608'),
(6, '??', 'be595e6bdf6001a93d3117db57c9772de82dcad8', '59f35e9947608'),
(7, '??', 'be595e6bdf6001a93d3117db57c9772de82dcad8', '59f35e9947608');

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
('59f35e9947608', 'chunhei1314@gmail.com', '8ff3dfc35765c0a1dc7762b9bea6326804d844bb', 'ChunHei', 'Yuen', '1995-06-01', 'Male', 0),
('59f3631d7c308', 'test@test.com', 'a03ad8bee9bac0b487508e025d4a6a7184defd9c', 'test', 'test', '1991-01-01', 'Female', 0),
('59f375ffd9ab1', 'test1@test.com', '6e733c7a2dddaf333cb000cb6d0e9a9b77e6a483', 'test1', 'test1', '1995-01-19', 'Male', 0);

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
-- Indexes for table `likeonpost`
--
ALTER TABLE `likeonpost`
  ADD PRIMARY KEY (`lopid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

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
  MODIFY `lopid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
