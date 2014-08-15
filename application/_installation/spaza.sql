-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2014 at 10:23 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `brandname`
--

CREATE TABLE IF NOT EXISTS `brandname` (
  `BrandnameID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandnameDescription` varchar(255) NOT NULL,
  `BrandnameStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`BrandnameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `brandname`
--

INSERT INTO `brandname` (`BrandnameID`, `BrandnameDescription`, `BrandnameStatus`) VALUES
(1, 'Simba', 'Activated'),
(2, 'Coca Cola', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `flavour`
--

CREATE TABLE IF NOT EXISTS `flavour` (
  `FlavourID` int(11) NOT NULL AUTO_INCREMENT,
  `FlavourDescription` varchar(255) NOT NULL,
  `FlavourStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`FlavourID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `flavour`
--

INSERT INTO `flavour` (`FlavourID`, `FlavourDescription`, `FlavourStatus`) VALUES
(1, 'orange', 'Activated'),
(2, 'Chutney', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `SizeID` int(11) NOT NULL AUTO_INCREMENT,
  `SizeDescription` varchar(255) NOT NULL,
  `SizeStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`SizeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`SizeID`, `SizeDescription`, `SizeStatus`) VALUES
(1, '250g', 'Activated'),
(2, '340ml', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `StockID` int(11) NOT NULL AUTO_INCREMENT,
  `StockQuantity` int(11) NOT NULL,
  `CostPrice` decimal(10,0) NOT NULL,
  `SellingPrice` decimal(10,0) NOT NULL,
  `MarkUpAmount` decimal(10,0) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `BrandnameID` int(11) NOT NULL,
  `FlavourID` int(11) NOT NULL,
  `SizeID` int(11) NOT NULL,
  PRIMARY KEY (`StockID`),
  KEY `TypeID` (`TypeID`,`BrandnameID`,`FlavourID`,`SizeID`),
  KEY `SizeID` (`SizeID`),
  KEY `SizeID_2` (`SizeID`),
  KEY `FlavourID` (`FlavourID`),
  KEY `BrandnameID` (`BrandnameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockID`, `StockQuantity`, `CostPrice`, `SellingPrice`, `MarkUpAmount`, `TypeID`, `BrandnameID`, `FlavourID`, `SizeID`) VALUES
(1, 5, 100, 250, 150, 1, 1, 2, 1),
(2, 10, 250, 450, 200, 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeDescription` varchar(255) NOT NULL,
  `TypeStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `TypeDescription`, `TypeStatus`) VALUES
(1, 'Snacks', 'Activated'),
(2, 'Coolies', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `businessname` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `type` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`BrandnameID`) REFERENCES `brandname` (`BrandnameID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`FlavourID`) REFERENCES `flavour` (`FlavourID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_4` FOREIGN KEY (`SizeID`) REFERENCES `size` (`SizeID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
