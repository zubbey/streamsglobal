-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 03:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetTokon` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersid` int(11) NOT NULL,
  `usersfname` tinytext NOT NULL,
  `userslname` tinytext NOT NULL,
  `usersphone` tinytext NOT NULL,
  `usersemail` tinytext NOT NULL,
  `userspassword` longtext NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` longtext NOT NULL,
  `gender` tinytext,
  `DOB` tinytext,
  `address` longtext,
  `city` tinytext,
  `state` tinytext,
  `LGA` longtext,
  `occupation` tinytext,
  `nationality` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersid`, `usersfname`, `userslname`, `usersphone`, `usersemail`, `userspassword`, `verified`, `token`, `gender`, `DOB`, `address`, `city`, `state`, `LGA`, `occupation`, `nationality`) VALUES
(1, 'melody', 'kpepkee', '09021122331', 'com.zubbey@hotmail.com', '$2y$10$8EE/Z6HsTI9IYXXg0CGol.ir7.UErEQut5yfGGOusGEhFG24MKEf.', 1, 'd0176e33500c311e4e90ec9afb322617bba9eb28b4a6d7df399420631a3ba7a4', 'Male', 'September, 12, 2010', 'No 8, Elikpokwudu street Mgbuchi', 'Maryland', 'Lagos', 'yoruba local government ', 'student', 'Nigeria'),
(2, 'godstime', 'clever', '07023232349', 'godtime@gmail.com', '$2y$10$EN095GYH.qqc8o4M0X.jvuXx53aDXovxPGRPooiOAMskuTgHdb62C', 1, '74b6d0349b217640fa8e13929295b1982559d37d4e23ba323143933f66afdf0f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'pepe', 'Eleme', '07069458334', 'pepe@gmail.com', '$2y$10$TF/liExahL.58I8C438jm.HrUleqGaq7pvEjgDXUoZi0lu8orX9xq', 1, '251ac76c360624947a4622b2f8dcdb33114c8c58e2f680403533442f7a5759e0', 'Female', 'March, 03, 2004', 'No58, Elikpokwudu street Mgbuchi', 'port harcourt', 'rivers state', 'obia akpo', 'student', 'USA'),
(4, 'godstime', 'clever', '07032122112', 'godstime@gmail.com', '$2y$10$bihZVnPdnJ5fMEBF/Z.R9Oncyd772LHAKM5pdKJc7Hc98qnqED66m', 1, '7c144ed80c961c9ca135ebf741b8a4b11cacd77b11f8e901b0f446c5693b31b4', 'Male', 'August, 12, 2004', 'no 1, Trans amadi street', 'port harcourt', 'rivers state', 'obia akpo', 'student', 'Nigeria');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`usersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
