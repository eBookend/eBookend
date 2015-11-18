-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 01:06 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookend`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `BookId` int(11) NOT NULL,
  `Name` varchar(140) DEFAULT NULL,
  `Description` text,
  `Link` varchar(400) DEFAULT NULL,
  `BookendId` int(11) NOT NULL,
  `CoverColor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `Name`, `Description`, `Link`, `BookendId`, `CoverColor`) VALUES
(2, 'garehaej', 'a74yk,maqw54', 'n6takmjya74km', 1, 'green'),
(3, 'grsn', 'nfn', 'nfsxn', 4, 'red'),
(6, 'h5er', '4hwa', 'hter', 2, 'yellow'),
(10, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 4, 'green'),
(11, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 3, 'green'),
(13, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(14, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 3, 'green'),
(15, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 3, 'green'),
(16, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 3, 'green'),
(17, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(18, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 3, 'green'),
(19, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(20, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 4, 'green'),
(21, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(22, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(23, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 2, 'green'),
(24, 'guik.', 'chmk, fvcgt, kmy', 'xgfdmj,', 1, 'green'),
(26, 'tchurururururur', NULL, NULL, 3, 'yellow'),
(30, 'Game of Thrones', 'Targaryen', 'www.google.com.br', 2, 'red'),
(31, 'Game of Thrones', 'Targaryen', 'www.google.com.br', 3, 'red'),
(32, 'Game of Thrones', 'Targaryen', 'www.google.com.br', 1, 'red'),
(35, 'Rafael', 'auehueahuhau', 'Menino baum', 4, 'red'),
(36, 'Rafael', 'auehueahuhau', 'Menino baum', 3, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `bookend`
--

CREATE TABLE IF NOT EXISTS `bookend` (
  `BookendId` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookend`
--

INSERT INTO `bookend` (`BookendId`, `Name`) VALUES
(1, 'lekal'),
(2, 'mairlekalainda'),
(3, 'burb'),
(4, 'hahaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`),
  ADD KEY `fk_BookendId` (`BookendId`);

--
-- Indexes for table `bookend`
--
ALTER TABLE `bookend`
  ADD PRIMARY KEY (`BookendId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `bookend`
--
ALTER TABLE `bookend`
  MODIFY `BookendId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_BookendId` FOREIGN KEY (`BookendId`) REFERENCES `bookend` (`BookendId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
