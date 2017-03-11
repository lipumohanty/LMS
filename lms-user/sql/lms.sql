-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2017 at 09:25 AM
-- Server version: 5.6.30-76.3-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mangai8s_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addleave`
--

CREATE TABLE IF NOT EXISTS `tbl_addleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `no_count` int(10) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` varchar(30) DEFAULT NULL,
  `is_active` char(1) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_addleave`
--

INSERT INTO `tbl_addleave` (`txtId`, `leave_type`, `description`, `no_count`, `added_date`, `added_by`, `is_active`) VALUES
(2, 'CASUAL LEAVE', 'casual leave(yearly assign)', 8, '2017-01-23', 'admin', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applyleave`
--

CREATE TABLE IF NOT EXISTS `tbl_applyleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `leave_type` varchar(40) NOT NULL,
  `availableLeave` int(50) NOT NULL,
  `leaveTaken` int(50) NOT NULL,
  `balanceLeave` int(50) NOT NULL,
  PRIMARY KEY (`txtId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applyleavenew`
--

CREATE TABLE IF NOT EXISTS `tbl_applyleavenew` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `fixleave` int(2) NOT NULL,
  `leave_type` varchar(40) NOT NULL,
  `availableLeave` int(50) NOT NULL,
  `leaveTaken` int(50) NOT NULL,
  `balanceLeave` int(50) NOT NULL,
  PRIMARY KEY (`txtId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_applyleavenew`
--

INSERT INTO `tbl_applyleavenew` (`txtId`, `empId`, `fixleave`, `leave_type`, `availableLeave`, `leaveTaken`, `balanceLeave`) VALUES
(1, 1, 0, 'casual leave', 8, 4, 4),
(2, 2, 0, 'casual leave', 8, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `pay_scale` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`txtId`, `type`, `fname`, `lname`, `dob`, `contact`, `address`, `join_date`, `designation`, `pay_scale`, `email`, `password`) VALUES
(1, 1, 'Admin', 'Admin', NULL, NULL, NULL, NULL, NULL, '', 'admin@gmail.com', 'admin'),
(15, 2, 'lipu', 'mohanty', '2017-01-02', '9766065140', 'bjbjbj', '2017-01-02', 'Manager(Technical)', '0', 'lipu123mohanty@gmail.com', 'gaurav'),
(16, 2, 'pallavi', 'm', '2017-01-15', '999999999', 'aaa@gmail.com', '2017-01-10', 'Manager(Finance)', '0', 'pallavi@gmail.com', 'pallavi'),
(28, 2, 'sss', 'Singh', '2017-01-09', '9766065140', 'admin@gmail.com', '2017-01-02', 'General Manager(Technical)', '1', 'email@gmail.com', '1234567'),
(29, 2, 'chandrashekhar', 'mangalgiri', '2017-01-08', '9999999999', 'admin@gmail.com', '2017-01-17', 'Chief General Manager(Technica', '0000', 'mangalgiri@gmail.com', 'mangalgiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeenew`
--

CREATE TABLE IF NOT EXISTS `tbl_employeenew` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `pay_scale` varchar(30) NOT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_employeenew`
--

INSERT INTO `tbl_employeenew` (`txtId`, `type`, `email`, `password`, `name`, `designation`, `pay_scale`) VALUES
(1, 2, 'lipu123mohanty@gmail.com', 'lipumohanty', 'LIPU MOHANTY', 'Manager(Technical)', '00000'),
(2, 2, 'mangalgiri@gmail.com', 'mangalgiri', 'M.CHANDRASHEKHAR', 'GM(Technical) ,Regional Officer', '4343434'),
(4, 1, 'admin@gmail.com', 'admin', 'RO NAGPUR', NULL, ''),
(5, 2, 'abhijeet@gmail.com', '', 'abhijeet', 'Dy.General Manager(Technical)', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavehistory`
--

CREATE TABLE IF NOT EXISTS `tbl_leavehistory` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `specialId` int(10) DEFAULT NULL,
  `leave_type` varchar(40) NOT NULL,
  `normalId` int(10) NOT NULL,
  `fromdate` date DEFAULT NULL,
  `todate` date DEFAULT NULL,
  `no_days` int(11) DEFAULT NULL,
  `approved_leave` int(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `place` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `restricted_leave` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `avail_ltc` varchar(20) NOT NULL,
  `ltc_details` varchar(255) NOT NULL,
  `leave_encashment` varchar(20) NOT NULL,
  `days` int(30) NOT NULL,
  `permission_hq` varchar(20) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `entrydate` date NOT NULL,
  PRIMARY KEY (`txtId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tbl_leavehistory`
--

INSERT INTO `tbl_leavehistory` (`txtId`, `empId`, `specialId`, `leave_type`, `normalId`, `fromdate`, `todate`, `no_days`, `approved_leave`, `purpose`, `place`, `contact`, `restricted_leave`, `date`, `avail_ltc`, `ltc_details`, `leave_encashment`, `days`, `permission_hq`, `datefrom`, `dateto`, `status`, `reason`, `entrydate`) VALUES
(23, 15, NULL, 'medical leave', 0, '2017-02-01', '2017-02-01', 4, 0, 'bvnbnvnvbmn', 'mumbai', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', 'REJECTED', 'hvjhvjhvjhbvj', '0000-00-00'),
(33, 15, NULL, 'medical leave', 0, '2017-02-01', '2017-02-02', 1, -1, 'hnbnbbjbjhb', 'nmbhjbmnh', '999999999', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', '', '0000-00-00'),
(44, 15, NULL, 'casual leave', 0, '2017-02-01', '2017-02-04', 3, 5, 'vc dfc vvc', 'vf d ddfvv', '9766065140', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'gbgjhjgjhjh', '0000-00-00'),
(45, 15, NULL, 'earned leave', 0, '2017-02-01', '2017-02-03', 4, 0, 'bnbnnbbnbn', 'nbbnbnbnbn', '999999999', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', '', '0000-00-00'),
(46, 15, NULL, 'earned leave', 0, '2017-02-01', '2017-02-04', 3, 1, 'ggggghgh', 'nnghgfgh', '9766065140', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'hhhjgjh', '0000-00-00'),
(49, 15, NULL, 'earned leave', 0, '2017-02-01', '2017-02-02', 1, 0, 'vacation', 'mumbai', '9766065140', 'yes', '0000-00-00', 'yes', 'vacation', 'no', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(50, 15, NULL, 'commuted leave', 0, '2017-02-07', '2017-02-15', 4, 0, 'vacation', 'mumbai', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(51, 15, NULL, 'halfpay leave', 0, '2017-02-01', '2017-02-01', 2, 0, 'vhnbnbbnbn', 'mumbai', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(52, 15, NULL, 'special leave', 0, '2017-02-01', '2017-02-03', 3, 0, 'vacation', 'mumbai', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(53, 15, NULL, 'leaving headquarter', 0, '2017-02-07', '2017-02-08', 1, 0, 'vacation', 'mumbai', '999999999', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(69, 15, NULL, 'casual leave', 0, '2017-02-01', '2017-02-02', 1, 0, 'nbvhbvhnb', 'mumbai', '1111111111', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '2017-02-19'),
(71, 15, NULL, 'casual leave', 0, '2017-02-01', '2017-02-04', 3, 0, 'vhhjvhnbv', 'hnvghjgbhj', '9766065140', 'yes', '2017-02-02', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '2017-02-19'),
(72, 15, NULL, 'casual leave', 0, '2017-02-01', '2017-02-07', 6, 0, 'bvhvhvhvhv', 'nbmnbmnbmn', '1111111111', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '2017-02-20'),
(73, 15, NULL, 'earned leave', 0, '2017-02-01', '2017-02-07', 6, 0, 'b b bv bn', 'jjkhnjkhnj', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '2017-02-20'),
(77, 15, NULL, 'earned leave', 0, '2017-02-01', '2017-02-07', 6, -2, 'b b bv bn', 'jjkhnjkhnj', '9766065140', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', '', '0000-00-00'),
(78, 15, NULL, 'leaving headquarter', 0, '2017-02-07', '2017-02-08', 1, -1, 'vacation', 'mumbai', '999999999', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', '', '0000-00-00'),
(79, 15, NULL, 'casual leave', 0, '2017-02-05', '2017-02-06', 1, 7, 'jkl', 'jkl', '9766065140', 'yes', '2017-02-06', 'no', 'NA', 'no', 0, 'yes', '2017-02-09', '2017-02-10', 'APPROVED', '', '2017-02-20'),
(80, 1, NULL, 'casual leave', 0, '2017-02-01', '2017-02-09', 8, 0, 'sfcdsv x v', 'czsxcfzas', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '2017-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavehistorynew`
--

CREATE TABLE IF NOT EXISTS `tbl_leavehistorynew` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `avail_ltc` varchar(20) NOT NULL,
  `fromdate` date DEFAULT NULL,
  `todate` date DEFAULT NULL,
  `no_days` int(11) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `hq_permission` varchar(50) NOT NULL,
  `hqfromdate` date NOT NULL,
  `hqtodate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `applieddate` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`txtId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tbl_leavehistorynew`
--

INSERT INTO `tbl_leavehistorynew` (`txtId`, `empId`, `leave_type`, `avail_ltc`, `fromdate`, `todate`, `no_days`, `purpose`, `hq_permission`, `hqfromdate`, `hqtodate`, `address`, `city`, `mobile`, `applieddate`, `status`, `reason`) VALUES
(3, 1, 'casual leave', 'yes', '2017-02-01', '2017-02-02', 1, 'LEAVE', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-21', 'APPROVED', ''),
(4, 1, 'casual leave', 'yes', '2017-02-03', '2017-02-05', 2, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-21', 'APPROVED', ''),
(5, 2, 'casual leave', 'no', '2017-02-01', '2017-02-02', 1, 'gfhgjh', '', '0000-00-00', '0000-00-00', 'gbfghfnhggjh', 'hgfjhgjh', '9999999999', '2017-02-21', 'APPROVED', ''),
(16, 2, 'casual leave', 'no', '0000-00-00', '0000-00-00', 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-22', 'APPROVED', ''),
(17, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-22', '', ''),
(18, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-22', '', ''),
(19, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-22', '', ''),
(20, 2, 'casual leave', 'no', '2017-02-01', '2017-02-02', 1, 'ghvhjvjhv', '', '0000-00-00', '0000-00-00', 'hvjhvhgvjhnbvjb', 'aa', '9999999999', '2017-02-22', '', ''),
(21, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-23', '', ''),
(22, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-23', '', ''),
(23, 2, 'casual leave', 'no', '2017-02-23', '2017-02-28', 4, 'bmjhnbjhbj', '', '0000-00-00', '0000-00-00', 'hnmbnmbnmbmnb', 'bmnbmnbmnb', '9999999999', '2017-02-23', 'APPROVED', 'hghgjhgbhnbjmhn'),
(24, 2, 'casual leave', 'no', '2017-03-01', '2017-03-10', 10, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-23', '', ''),
(25, 2, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-02-27', '', ''),
(26, 1, 'casual leave', 'no', '2017-03-24', '2017-03-26', 1, 'hnffghjgfj', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(27, 1, 'casual leave', 'no', '2017-03-09', '2017-03-10', 2, 'aDC', '', '0000-00-00', '0000-00-00', 'nagpur', 'nagpur', '9890230389', '2017-03-07', '', ''),
(28, 1, 'casual leave', 'no', '2017-03-08', '2017-03-13', 5, 'personal w', '', '0000-00-00', '0000-00-00', 'n', 'nagpur', '9658779974', '2017-03-07', 'APPROVED', ''),
(29, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(30, 1, 'casual leave', 'no', '2017-03-24', '2017-03-26', 1, 'personal w', '', '0000-00-00', '0000-00-00', 'afa', 'fa', '9658779974', '2017-03-07', '', ''),
(31, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(32, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(33, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(34, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-07', '', ''),
(35, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-08', '', ''),
(36, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-08', '', ''),
(37, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-08', '', ''),
(38, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-08', '', ''),
(39, 1, 'casual leave', 'no', '2017-03-09', '2017-03-18', 3, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-08', 'APPROVED', ''),
(40, 1, 'casual leave', 'no', '2017-03-10', '2017-03-13', 1, 'personal w', '', '0000-00-00', '0000-00-00', 'asfdjljf', 'nagpur', '9890230389', '2017-03-09', 'APPROVED', ''),
(41, 4, 'casual leave', 'no', '2017-03-10', '2017-03-15', 3, 'vvvvv', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(42, 1, 'casual leave', 'no', '2017-03-10', '2017-03-15', 3, 'ghgghghg', '', '0000-00-00', '0000-00-00', 'kgkgjgj', 'nagpur', '9890230389', '2017-03-09', '', ''),
(43, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(44, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(45, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(46, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(47, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(48, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(49, 1, 'casual leave', 'no', '2017-03-10', '2017-03-14', 2, 'personal work', '', '0000-00-00', '0000-00-00', 'nagpur', 'nagpur', '9890230389', '2017-03-09', '', ''),
(50, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(51, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(52, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(53, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(54, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(55, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(56, 1, 'casual leave', 'no', '2017-03-10', '2017-03-14', 2, 'personal work', '', '0000-00-00', '0000-00-00', 'asd', 'nagpur', '9890230389', '2017-03-09', '', ''),
(57, 4, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-09', '', ''),
(58, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(59, 2, 'casual leave', 'no', '2017-03-14', '2017-03-20', 5, 'Personal', '', '0000-00-00', '0000-00-00', 'As', 'Ac', '9096067685', '2017-03-10', '', ''),
(60, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(61, 1, 'casual leave', 'no', '2017-03-10', '2017-03-18', 5, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(62, 1, 'casual leave', 'yes', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(63, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(64, 1, 'casual leave', 'no', '2017-03-10', '2017-03-18', 5, 'bbbb', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-10', '', ''),
(65, 1, 'casual leave', 'no', '2017-03-10', '2017-03-18', 5, 'holidays', 'yes', '2017-03-10', '2017-03-18', 'mumbai', 'mumbai', '9766065140', '2017-03-10', '', ''),
(66, 1, 'casual leave', 'no', '2017-03-10', '2017-03-18', 5, 'bvcgcvc', 'no', '0000-00-00', '0000-00-00', 'bvcvcbvc', 'mumbai', '9766065140', '2017-03-10', '', ''),
(67, 1, 'casual leave', 'no', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '2017-03-11', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavesetting`
--

CREATE TABLE IF NOT EXISTS `tbl_leavesetting` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `earned_leave` int(10) DEFAULT NULL,
  PRIMARY KEY (`txtId`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_leavesetting`
--

INSERT INTO `tbl_leavesetting` (`txtId`, `emp_id`, `earned_leave`) VALUES
(5, 15, 4),
(6, 16, 3),
(7, 29, 10),
(8, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_predefinedleave`
--

CREATE TABLE IF NOT EXISTS `tbl_predefinedleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `leaveType` int(11) NOT NULL,
  `date_leave` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `tbl_predefinedleave`
--

INSERT INTO `tbl_predefinedleave` (`txtId`, `leaveType`, `date_leave`, `name`, `description`) VALUES
(9, 1, '2017-02-01', 'Restricted Holiday', 'Basant Panchami'),
(10, 1, '2017-02-10', 'Restricted Holiday', 'friday Restricted Holiday'),
(11, 1, '2017-02-21', 'Restricted Holiday', 'Swami Dayananda Saraswati Jayanti'),
(12, 1, '2017-02-24', 'Public Holiday', 'Maha shivaratri'),
(13, 1, '2017-03-13', 'Public Holiday', 'Holi'),
(14, 1, '2017-03-28', 'Restricted Holiday', 'Gudi Padava'),
(26, 1, '2017-04-04', 'public holiday', 'ram navami'),
(30, 1, '2017-04-11', 'restricted holiday', 'hazarat birthday'),
(31, 1, '2017-04-13', 'restricted holiday', 'vaisakhi'),
(32, 1, '2017-04-14', 'public holiday', 'good friday'),
(43, 1, '2017-05-10', 'Public Holiday', 'Buddha Purnima'),
(55, 1, '2017-06-23', 'Restricted Holiday', 'Jamat-Ul-Vida'),
(71, 1, '2017-08-07', 'Restricted Holiday', 'Raksha Bandhan'),
(74, 1, '2017-08-15', 'Public Holiday', 'Independence Day'),
(77, 1, '2017-08-25', 'Restricted Holiday', 'Vinayaka Chaturthi /Ganesh Chaturthi'),
(80, 1, '2017-09-02', 'Public Holiday / weekend', 'Id-ul-Zuha (Bakrid) / Saturday'),
(82, 1, '2017-09-04', 'Restricted Holiday', 'Onam'),
(89, 1, '2017-09-27', 'Restricted Holiday', 'Dussehra (maha Saptami)'),
(90, 1, '2017-09-28', 'Restricted Holiday', 'Dussehra (Maha Ashtami)'),
(91, 1, '2017-09-29', 'Restricted Holiday', 'Dussehra (Maha Navmi)'),
(98, 1, '2017-10-18', 'Restricted Holiday', 'Deepavali (South India) / Naraka Chaturdasi'),
(99, 1, '2017-10-19', 'Public Holiday', 'diwali (Deepavali)'),
(100, 1, '2017-10-20', 'Restricted Holiday', 'Govardhan Puja'),
(103, 1, '2017-10-26', 'Restricted Holiday', 'Partihar Sashthi or Surya Sashthi (Chhat Puja)');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applyleave`
--
ALTER TABLE `tbl_applyleave`
  ADD CONSTRAINT `tbl_applyleave_ibfk_1` FOREIGN KEY (`empId`) REFERENCES `tbl_employee` (`txtId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leavesetting`
--
ALTER TABLE `tbl_leavesetting`
  ADD CONSTRAINT `tbl_leavesetting_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employee` (`txtId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
