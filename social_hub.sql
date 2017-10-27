-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 11:43 PM
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
-- Database: `social_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` varchar(50) NOT NULL,
  `msg_content` text NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msg_creatorId` varchar(50) NOT NULL,
  `msg_relatedId` varchar(50) NOT NULL,
  `msg_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg_content`, `msg_time`, `msg_creatorId`, `msg_relatedId`, `msg_read`) VALUES
('1', 'Hi, i am idiot. Lol LOL <3', '2017-10-02 14:44:53', '59d250a7b77e6', '59c2f2a22b7cd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(6) DEFAULT NULL,
  `user_birthday` date NOT NULL,
  `user_prevWork` varchar(100) DEFAULT NULL,
  `user_currentWork` varchar(100) DEFAULT NULL,
  `user_latestEducation` varchar(100) DEFAULT NULL,
  `user_hometown` varchar(100) DEFAULT NULL,
  `user_currentLivingTown` varchar(100) DEFAULT NULL,
  `user_phoneNum` varchar(20) DEFAULT NULL,
  `user_sexualInterests` varchar(6) DEFAULT NULL,
  `user_relationshipStatus` varchar(20) DEFAULT NULL,
  `user_primaryLanguage` varchar(20) DEFAULT NULL,
  `user_secondaryLanguage` varchar(20) DEFAULT NULL,
  `user_religion` varchar(20) DEFAULT NULL,
  `user_politics` varchar(20) DEFAULT NULL,
  `user_about` varchar(250) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `user_privacy` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_name`, `user_gender`, `user_birthday`, `user_prevWork`, `user_currentWork`, `user_latestEducation`, `user_hometown`, `user_currentLivingTown`, `user_phoneNum`, `user_sexualInterests`, `user_relationshipStatus`, `user_primaryLanguage`, `user_secondaryLanguage`, `user_religion`, `user_politics`, `user_about`, `user_pic`, `user_privacy`) VALUES
('59c2f2a22b7cd', 'chunhei1314@gmail.com', '8ff3dfc35765c0a1dc7762b9bea6326804d844bb', 'ChunHei Yuen', 'Male', '1995-06-01', 'Neet', 'Home Guard', NULL, 'Hong Kong', 'Bowling Green', '1231231231313', NULL, NULL, NULL, NULL, NULL, NULL, 'Im so cool', '8d974dd6993af0f47e22cbd4ac57eac14e90460b.jpg', NULL),
('59d250a7b77e6', 'iamidiot@idiot.com', 'bd2512ba29332717a7c3695e69b493d6dc1ecd5e', 'idiot', 'Male', '1996-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_email`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
