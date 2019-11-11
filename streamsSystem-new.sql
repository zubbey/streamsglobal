-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2019 at 02:06 AM
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
(1, 1, 1);

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
(1, 'chibike', 'omenka', '08043220101', 'com.zubbey@hotmail.com', '$2y$10$3aliBNi16A3fE/mChx7dfOXDmzbmYMppo.ejLh4y5.Jj2fdCumryW', 1, '39f4cb4d213df00d5f2a58bbfde66ba142667666439bbc179692cd77be55', 'bd251f', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savingsData`
--
ALTER TABLE `savingsData`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
