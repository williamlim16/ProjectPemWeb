-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2020 at 04:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `postID` varchar(45) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `fkIdx_27` (`username`),
  KEY `fkIdx_30` (`postID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postID` int(255) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  KEY `fkIdx_20` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `content`, `username`, `timestamp`, `picture`) VALUES
(15, 'Hai alvin', 'Ricardo', '03:59 pm', 'https://i.imgur.com/hBEtrB9h.jpg'),
(13, 'Hello this is my first post', 'Ricardo', '03:55 pm', 'https://i.imgur.com/hBEtrB9h.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `profilePicturePath` varchar(255) DEFAULT NULL,
  `coverPath` varchar(255) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `userdesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstName`, `lastName`, `password`, `bdate`, `gender`, `profilePicturePath`, `coverPath`, `contact`, `userdesc`) VALUES
('derp', 'derp', 'lastDerp', '58fd9edd83341c29f1aebba81c31e257', '2000-04-11', 'L', 'https://i.imgur.com/VEh3XdE.jpg', NULL, 'derp@gmail.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
