-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2019 at 08:54 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wacko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@gmail.com', 1552011901);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgtype` varchar(255) DEFAULT NULL,
  `orgname` varchar(255) DEFAULT NULL,
  `orgaddress` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `tdate` int(11) DEFAULT NULL,
  `note` text,
  `amount` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileno` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date` int(11) DEFAULT NULL,
  `starred` int(11) NOT NULL DEFAULT '0',
  `trash` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `orgtype`, `orgname`, `orgaddress`, `type`, `tdate`, `note`, `amount`, `file`, `fullname`, `email`, `mobileno`, `status`, `date`, `starred`, `trash`) VALUES
(1, 'Department', '    Yaba college of technology', NULL, '865551600', 0, '30000', '0', 'benjamin iduwe', 'coderus@gmail.com', 'coderus@gmail.com', NULL, 1, 1552047407, 0, 0),
(2, 'Department', 'Yaba college of technology', '    Yaba college of technology', NULL, 865551600, '    Yaba college of technology', '30000', 'notebook.png', 'benjamin iduwe', 'coderus@gmail.com', NULL, 1, 1552048594, 0, 0),
(3, 'Department', 'Yaba college of technology', '    Yaba college of technology', NULL, 865551600, '    Yaba college of technology', '30000', 'report1552048698.png', 'benjamin iduwe', 'coderus@gmail.com', NULL, 1, 1552048698, 0, 0),
(4, 'Department', 'Yaba college of technology', '    Yaba college of technology', 'Uncategorised', 865551600, '    Yaba college of technology', '30000', 'report1552048851.png', 'benjamin iduwe', 'coderus@gmail.com', '08099990000', 1, 1552048851, 1, 1),
(5, 'Department', 'Yaba college of technology', '    Yaba college of technology', 'Uncategorised', 865551600, '    Yaba college of technology', '30000', 'report1552048957.png', 'benjamin iduwe', 'coderus@gmail.com', '08099990000', 1, 1552048957, 0, 0),
(6, 'Department', 'Yaba college of technology', '    Yaba college of technology', 'Uncategorised', 865551600, '    Yaba college of technology', '30000', 'report1552048994.png', 'benjamin iduwe', 'coderus@gmail.com', '08099990000', 1, 1552048994, 0, 0),
(7, 'Ministry', 'Chevron Nigeria Limited', '    Lagos Island branch', 'Diversion of resources', 1551567600, '    A good amount of money was laundered by the company for PMB', '200000000', 'report1552060779.png', 'David Mark', 'bencoderus@gmail.com', '08174048073', 1, 1552060779, 1, 0),
(8, 'Department', 'Yaba college of technology', '    Yaba, Lagos', 'Fruad', 1548370800, '    They are scamming the student all in the name of we are paying school fees, we beacon on the federal government to help us fight against this deadly corruption existing in the system', '30000', 'report1552094356.pdf', 'benart iduwe', 'bencoderus@gmail.co', '08174048073', 1, 1552094356, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
