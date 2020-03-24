-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--

-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2020 at 08:07 AM
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
  `commentID` int(11) NOT NULL AUTO_INCREMENT ,
  `content` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
    `timestamp` varchar(100) DEFAULT NOW(),
  `postID` int(11) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `fkIdx_27` (`username`),
  KEY `fkIdx_30` (`postID`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `content`, `username`, `postID`, `timestamp`) VALUES
(7, 'test', 'derp', '4', '05:06 pm'),
(8, 'go', 'derp', '3', '05:13 pm'),
(15, 'test', 'admin', '5', '06:09 pm'),
(14, 'yo!', 'admin', '5', '06:04 pm'),
(13, 'helloa', 'derp', '6', '06:58 pm'),
(12, 'hei', 'admin', '4', '05:40 pm'),
(16, 'p', 'derp', '6', '06:21 pm');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--


DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `timestamp` varchar(100) DEFAULT NOW(),
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  KEY `fkIdx_20` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `content`, `username`, `timestamp`, `picture`) VALUES
(4, 'Hello Friend', 'admin', '04:15 pm', 'https://i.imgur.com/2W7QVhD.jpeg'),
(3, 'Hello World', 'derp', '04:21 pm', 'https://i.imgur.com/tCFGjLe.png'),
(5, 'Hello Guys', 'derp', '05:14 pm', 'https://i.imgur.com/tCFGjLe.png'),
(6, 'Testing', 'admin', '05:56 pm', 'https://i.imgur.com/2W7QVhD.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `username_fk` varchar(45) NOT NULL,
  `skills` varchar(45) NOT NULL,
  `percent` int(100) NOT NULL
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

CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `bdate` date NOT NULL,
  `phonenum` varchar(45) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `profilePicturePath` varchar(255) DEFAULT NULL,
  `coverPath` varchar(255) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `userdesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstName`, `lastName`, `password`, `bdate`, `phonenum`, `gender`, `profilePicturePath`, `coverPath`, `contact`, `userdesc`) VALUES
('admin', 'M. Ihsan', '', 'e10adc3949ba59abbe56e057f20f883e', '2020-03-05', 84949941, 'M', 'https://i.imgur.com/2W7QVhD.jpeg', 'https://i.imgur.com/0LIRXej.png', '', 'Hello World 123'),
('derp', 'derpsyt', 'lastDerp', '58fd9edd83341c29f1aebba81c31e257', '2000-04-11', 34648616, 'M', 'https://i.imgur.com/tCFGjLe.png', 'https://i.imgur.com/h72mp1V.jpeg', 'derp@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `fkIdx_27` (`username`),
  ADD KEY `fkIdx_30` (`postID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `fkIdx_20` (`username`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD KEY `username_fk` (`username_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
