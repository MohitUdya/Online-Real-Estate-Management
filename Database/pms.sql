-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2013 at 03:49 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

CREATE TABLE IF NOT EXISTS `area_master` (
  `AreaId` int(11) NOT NULL AUTO_INCREMENT,
  `AreaName` varchar(20) NOT NULL,
  `CityName` varchar(20) NOT NULL,
  PRIMARY KEY (`AreaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`AreaId`, `AreaName`, `CityName`) VALUES
(1, 'Espp Road', 'Honolulu'),
(2, 'New Road', 'Honolulu');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(20) NOT NULL,
  `Category_Desc` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`CategoryId`, `CategoryName`, `Category_Desc`) VALUES
(1, 'Home', '2 BHK,3BHK, Flats'),
(2, 'Shop', '100 Sq.M,200 Sq.M');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `CityId` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(20) NOT NULL,
  `CityName` varchar(20) NOT NULL,
  PRIMARY KEY (`CityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`CityId`, `StateName`, `CityName`) VALUES
(1, 'Florida', 'Tallahassee'),
(3, 'Hawaii', 'Honolulu'),
(4, 'Washington', 'Olympia');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE IF NOT EXISTS `customer_reg` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`CustomerId`, `CustomerName`, `Address`, `City`, `Mobile`, `Email`, `Gender`, `BirthDate`, `UserName`, `Password`) VALUES
(3, 'Vairali Suthar', 'Hawaii', 'Honolulu', 9898989898, 'vairali@gmail.com', 'Female', '2013-08-14', 'vairali', 'vairali');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(20) NOT NULL,
  `EmailId` varchar(20) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `Message` varchar(200) NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `CustomerName`, `EmailId`, `MobileNumber`, `Message`) VALUES
(1, 'Nikita Padhya', 'niki@gmail.com', '9898989898', 'Thanks');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE IF NOT EXISTS `login_master` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`UserId`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE IF NOT EXISTS `news_master` (
  `NewsId` int(11) NOT NULL AUTO_INCREMENT,
  `News` varchar(200) NOT NULL,
  `NewsDate` date NOT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`NewsId`, `News`, `NewsDate`) VALUES
(5, 'More Than 2000 Properties to sold.', '2013-08-23'),
(6, 'New Property available in Honolulu', '2013-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE IF NOT EXISTS `property_image` (
  `ImageId` int(11) NOT NULL AUTO_INCREMENT,
  `PropertyId` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `ImagePath` varchar(200) NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`ImageId`, `PropertyId`, `Title`, `ImagePath`) VALUES
(1, 3, 'Front View', 'home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_master`
--

CREATE TABLE IF NOT EXISTS `property_master` (
  `PropertyId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `StateName` varchar(20) NOT NULL,
  `CityName` varchar(20) NOT NULL,
  `AreaName` varchar(50) NOT NULL,
  `PropertyName` varchar(50) NOT NULL,
  `PropertyImage` varchar(200) NOT NULL,
  `PropertyDesc` varchar(200) NOT NULL,
  `TotalArea` float NOT NULL,
  `PropertyAge` varchar(10) NOT NULL,
  `TotalRoom` int(11) NOT NULL,
  `Furnished` varchar(5) NOT NULL,
  `Parking` varchar(5) NOT NULL,
  `DistRail` int(11) NOT NULL,
  `PropertyCost` float NOT NULL,
  `Status` varchar(20) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  PRIMARY KEY (`PropertyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `property_master`
--

INSERT INTO `property_master` (`PropertyId`, `CategoryId`, `StateName`, `CityName`, `AreaName`, `PropertyName`, `PropertyImage`, `PropertyDesc`, `TotalArea`, `PropertyAge`, `TotalRoom`, `Furnished`, `Parking`, `DistRail`, `PropertyCost`, `Status`, `CustomerId`) VALUES
(3, 1, 'Florida', 'Tallahassee', 'Espn Road', 'Lostwoord Society', '2.jpg', 'Nice Home ', 120, '4 Year', 3, 'Yes', 'Yes', 2, 2300000, 'Open', 3),
(4, 1, 'Florida', 'Tallahassee', 'Popn Road', 'Treaser Royal', 'house4.gif', 'Newly Established Society', 120, '2 Year', 3, 'No', 'Yes', 2, 3000000, 'Open', 3),
(6, 2, 'Florida', 'Tallahassee', 'New Road', 'Civil Mall', 'sale.gif', 'A Gift Shop', 500, '5 Year', 1, 'Yes', 'Yes', 3, 3500000, 'Open', 3);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `StateId` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(20) NOT NULL,
  PRIMARY KEY (`StateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`StateId`, `StateName`) VALUES
(1, 'Florida'),
(2, 'Texas'),
(3, 'Hawaii'),
(4, 'New Jersey'),
(5, 'Washington');
