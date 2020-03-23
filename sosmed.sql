-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2020 at 01:23 PM
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
  `postID` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `timestamp` varchar(100),
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  KEY `fkIdx_20` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `username_fk` varchar(45) NOT NULL,
  `skills` varchar(45) NOT NULL,
  `percent` int(100) NOT NULL,
  KEY `username_fk` (`username_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`username_fk`, `skills`, `percent`) VALUES
('derp', 'fdafsafdsa', 63),
('derp', 'Sotosop', 100);

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
  `phonenum` int(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `profilePicturePath` varchar(255) DEFAULT NULL,
  `coverPath` varchar(255) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `userdesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstName`, `lastName`, `password`, `bdate`, `phonenum`, `gender`, `profilePicturePath`, `coverPath`, `contact`, `userdesc`) VALUES
('derp', 'derpsyt', 'lastDerp', '58fd9edd83341c29f1aebba81c31e257', '2000-04-11', 34648616, 'M', NULL, NULL, 'derp@gmail.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`username_fk`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
