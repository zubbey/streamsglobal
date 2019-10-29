-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2019 at 05:41 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamsSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminAds`
--

CREATE TABLE `adminAds` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `heading` text NOT NULL,
  `body` text NOT NULL,
  `creator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this table contents streams global Adverts';

--
-- Dumping data for table `adminAds`
--

INSERT INTO `adminAds` (`id`, `image`, `heading`, `body`, `creator`) VALUES
(4, 'banner01.jpg', 'invest the way you want. we can show you how.', 'Whether you’re new to investing, an experienced trader or somewhere in between, we offer investment choices with some of the lowest commissions in the industry.      ', 'zubbey'),
(5, 'banner2', 'Saving money should be easy.\r\nAutomate it with Trim.', 'Our users saved over $1,000,000 in the last month.\r\nGet your results in less than a minute.      ', 'zubbey'),
(6, 'banner03', 'Banking your way.', 'Wherever you are in life,\r\nwe’ve got an online bank account designed to make it more rewarding.', 'zubbey code');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` mediumtext NOT NULL,
  `pwdResetSelector` mediumtext NOT NULL,
  `pwdResetTokon` longtext NOT NULL,
  `pwdResetExpires` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` longtext NOT NULL,
  `referralid` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `usertype` tinyint(11) NOT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DOB` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `LGA` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `occupation` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nationality` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dateReg` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `verified`, `token`, `referralid`, `usertype`, `gender`, `DOB`, `address`, `city`, `state`, `LGA`, `occupation`, `nationality`, `dateReg`) VALUES
(1, 'Chibike', 'Son', '09029431070', 'chibike@gmail.com', '$2y$10$hiKaQ6X/5abhyD0qPsmjb.6eX5r3vpaCUaKAjw/GsoZlB8ZMwkuMG', 0, 'f9858a985616e88e4ff166b48a2ffc68aa8e8df26873b4cc6d76a8ad3f99', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-27 10:28:18'),
(2, 'zubbey', 'code', '08060265699', 'com.zubbey@icloud.com', '$2y$10$sNQJTgG33wpBelfVjcttnu49pPhbwW6jyaWq8Mw.kkCIUamb3UYM.', 1, 'd5a0b2d49672c6ca76e482d41f6907776a00cefa0b2bd629ce4fffb03923', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-28 04:13:40'),
(3, 'melody', 'kpekpee', '09022003001', 'com.zubbey@hotmail.com', '$2y$10$d7bFpzY0bez/Q3nMSLn.uuE8hB1UcPqPPjE5aHfdKSmSC4gs63wcO', 0, 'f81f1b6eb6a2326f6205ff86ee5da0240dab3809756af286decdd6f5aa37', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-29 08:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminAds`
--
ALTER TABLE `adminAds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminAds`
--
ALTER TABLE `adminAds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
