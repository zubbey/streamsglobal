-- -------------------------------------------------------------
-- TablePlus 2.10(268)
--
-- https://tableplus.com/
--
-- Database: streamsSystem
-- Generation Time: 2019-11-19 06:51:12.6280
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `avatar` tinyint(1) NOT NULL,
  `datecreated` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `adminAds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `heading` text NOT NULL,
  `body` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='this table contents streams global Adverts';

CREATE TABLE `pageContent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(200) NOT NULL,
  `body` varchar(300) NOT NULL,
  `dateCreated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

CREATE TABLE `savingsData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usersid` int(11) NOT NULL,
  `cus_code` varchar(200) NOT NULL,
  `plan_code` varchar(200) NOT NULL,
  `sub_code` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`usersid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='This table containers users plan';

CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` longtext NOT NULL,
  `referralid` longtext,
  `gender` varchar(6) DEFAULT NULL,
  `DOB` varchar(200) DEFAULT NULL,
  `address` longtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `LGA` longtext,
  `occupation` varchar(50) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dateReg` varchar(100) NOT NULL,
  `lastAction` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`, `avatar`, `datecreated`) VALUES ('1', 'zubbey', 'com.zubbey@hotmail.com', '$2y$10$vbX52BI/b98XJ1tjC4fLQOaEge.4kCGiz8xVQbnze2a7s.8aZSeuG', 'Editor', '0', '2019-11-18'),
('2', 'kelvin', 'kelvin@gmail.com', '$2y$10$WZXy4ZTkNR6FpTdmMtue1.05maELSxg3djHnFkCKeMEp3y8nKbdDG', 'Viewer', '1', '2019-11-19');

INSERT INTO `adminAds` (`id`, `image`, `heading`, `body`, `creator`) VALUES ('1', 'banner2_1_50.jpg', 'Aquire more smarter', '                                                ', 'admin'),
('2', 'banner3.jpg', 'Installment Plan Perfect!', '                                                                                                                                                            ', 'admin'),
('3', 'banner0.jpg', 'Save the Future', '                                                                ', 'kelvin'),
('4', 'banner4.jpg', 'For More See SAAP', '', 'zubbey'),
('5', 'banner1.jpg', 'Get more from SAAP', '', 'zubbey');

INSERT INTO `pageContent` (`id`, `heading`, `body`, `dateCreated`) VALUES ('1', 'Different Ways To Save.', 'A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.', '2019-11-18'),
('2', 'Invest & Enjoy at Ease', 'Saving and investing money with Streamsglobal means your money works hard all day, everyday.', '2019-11-18'),
('3', 'About Streamsglobal Cooperatives', 'Cooperatives is all about the growth and development of members. We at streams global ensure we do that practically by ensuring that thrift, property acquisition and investment is effortless, rewarding and exciting for members.', '2019-11-18'),
('4', 'Mission Statement', 'Accelerating dreams and goals to reality using the power of optimism, collectiveness, set time and effortless thrift investment & agriculture.', '2019-11-18'),
('5', 'Vision Statement', 'Becoming a cooperative that is evident in all homes and bridging the deficit in agriculture and agric business investment.', '2019-11-18'),
('6', 'Better way of savings best way of acquiring', 'You can acquire that your dream household, property by saving stipends daily, weekly and monthly without stress. You can also save with the cooperative and pick it monthly like the normal Ajor, Akawo or Esusu. You can also make as huge as 3 —100% when you save between 90days to 1,825 days. What are ', '2019-11-18'),
('7', 'Port Harcourt Head Office:', '11 Ogoloma Street, Off Emekuku Dline, Port Harcourt, Rivers State, Nigeria.', '2019-11-18'),
('8', 'Lagos office:', 'Providence House, No 1 Babatunde Ladiga Street Omole.', '2019-11-18'),
('9', 'Aba office:', 'No 2 free Zone Road Ariaria, Beside AKTC park, Aba, Abia State.', '2019-11-18'),
('10', 'REG NUMBER', 'RS30366 | RS31904 | AK23813 | AB16307', '2019-11-18');

INSERT INTO `profileimg` (`id`, `userid`, `status`) VALUES ('1', '1', '1'),
('2', '2', '1'),
('3', '3', '1');

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `verified`, `token`, `referralid`, `gender`, `DOB`, `address`, `city`, `state`, `LGA`, `occupation`, `nationality`, `dateReg`, `lastAction`) VALUES ('1', 'melody', 'kpekpee', '09011002200', 'ask.melody@gmail.com', '$2y$10$q8kG0XiEfL6bdK5uoLmEhuyLQ9SKAxGB0Lc4cCpM7puDtrBq7/IyK', '0', '7085b45a277b624034d041f87d57c1e98018562851fee0bfaeb23e9b7162', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', '2019-11-19 06:42:30'),
('2', 'chibike', 'goodson', '08011002203', 'chibike@gmail.com', '$2y$10$BKraO934apLkLctd3ywsXeRqCDNE5EPhTxmCFk8c0slvh675Myuwm', '1', '9472eff7d8b09a4089ffe181c2478cef06ce24ec29d6c5f93f8d3856420c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', '2019-11-19 05:58:02'),
('3', 'godstime', 'clever', '09033004021', 'godstime@gmail.com', '$2y$10$xrYdF/yBZGLfchfXbqh2nesOCnFlMx.j1T9ft8NZmM1WfjDRdZyWy', '0', 'f86afaed67e7870d58b111df43327453c1fde678a169db14948e158e4552', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-18', '0000-00-00 00:00:00');




/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;