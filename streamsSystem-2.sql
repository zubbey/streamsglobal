-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 09:19 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.9

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
(1, 'banner0_50.jpg', '      ', '      ', 'zubbey codez'),
(2, 'banner1_50.jpg', '      ', '      ', 'zubbey codez'),
(3, 'banner2_50.jpg', '      ', '      ', 'zubbey codez'),
(4, 'banner3_50.jpg', '      ', '      ', 'zubbey codez');

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
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savingsData`
--

CREATE TABLE `savingsData` (
  `id` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `cus_code` varchar(200) NOT NULL,
  `plan_code` varchar(200) NOT NULL,
  `sub_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table containers users plan';

--
-- Dumping data for table `savingsData`
--

INSERT INTO `savingsData` (`id`, `usersid`, `cus_code`, `plan_code`, `sub_code`) VALUES
(1, 1, 'CUS_l32wfchi5jkmzxl', 'PLN_bxxj4bojka90l6o', ''),
(2, 1, 'CUS_l32wfchi5jkmzxl', 'PLN_3r5k86k1ngb8xvt', ''),
(3, 2, 'CUS_wmrvl9teum0nbmn', 'PLN_3t9j6k5tq4d9rwo', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` longtext NOT NULL,
  `referralid` longtext,
  `usertype` tinyint(11) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `DOB` varchar(200) DEFAULT NULL,
  `address` longtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `LGA` longtext,
  `occupation` varchar(50) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dateReg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `verified`, `token`, `referralid`, `usertype`, `gender`, `DOB`, `address`, `city`, `state`, `LGA`, `occupation`, `nationality`, `dateReg`) VALUES
(1, 'chibike', 'zubbey', '08050440033', 'com.zubbey@hotmail.com', '$2y$10$M2nkSDqza6SWrFLaHbh9TuZoj5BeO5D77kE4Y1XDFPoexvGqcSlKC', 1, 'ffa536adb908248c6342ad969160b322f910b9a4b58d18b93febff694feb', '33a71a', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-11'),
(2, 'zubbey', 'codez', '09022001021', 'zubyinnocent@outlook.com', '$2y$10$ZGj1DrdV8q9arwNHell32uPJVUhdHNFEso5nGSz1phvUPIT8POUlO', 1, '0079d0353e8403aeba9ccf8a7bb3c14113aa7c192a3112b73b8ee97c28a0', 'f7e35a', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-13');

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
-- Indexes for table `savingsData`
--
ALTER TABLE `savingsData`
  ADD PRIMARY KEY (`id`,`usersid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savingsData`
--
ALTER TABLE `savingsData`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
