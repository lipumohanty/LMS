-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2017 at 08:17 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lms`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_applyleave`
--


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
  PRIMARY KEY (`txtId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_leavehistory`
--

INSERT INTO `tbl_leavehistory` (`txtId`, `empId`, `specialId`, `leave_type`, `normalId`, `fromdate`, `todate`, `no_days`, `approved_leave`, `purpose`, `place`, `contact`, `restricted_leave`, `date`, `avail_ltc`, `ltc_details`, `leave_encashment`, `days`, `permission_hq`, `datefrom`, `dateto`, `status`, `reason`) VALUES
(23, 15, NULL, 'medical leave', 0, '2017-02-01', '2017-02-01', 4, 0, 'bvnbnvnvbmn', 'mumbai', '9766065140', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', 'REJECTED', 'hvjhvjhvjhbvj'),
(33, 15, NULL, 'medical leave', 0, '2017-02-01', '2017-02-02', 1, 0, 'hnbnbbjbjhb', 'nmbhjbmnh', '999999999', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', ''),
(34, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-02', 1, 7, 'bnbvnvnvn', 'nbmbmb', '9766065140', 'yes', '2017-02-02', 'yes', 'bvjhvhvjhv', 'yes', 1, 'yes', '2017-02-01', '2017-02-02', 'APPROVED', 'vbnvhjvbjn'),
(35, 15, NULL, 'earned_leave', 0, '2017-02-01', '2017-02-03', 12, 0, 'nbvmhnbvmn', 'hnvbjmhnbv', '999999999', 'no', '0000-00-00', 'no', '', 'no', 0, 'no', '0000-00-00', '0000-00-00', '', ''),
(36, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-10', 5, 0, 'gfgfg', 'hggh', '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', ''),
(37, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-02', 1, 7, 'gcfhgfjhyf', 'gjhghgjhg', '1111111111', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'gfjhgfhghgh'),
(38, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-01', 1, 7, 'bmcz', 'hjhjjkhjkh', '999999999', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'hgfhjghjhjkhjkkjh'),
(39, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-09', 3, 5, 'vhfvhghfhg', 'uyghujhjjh', '9766065140', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'nvnjkbjknjkbkhnl'),
(40, 15, NULL, 'casual_leave', 0, '2017-02-01', '2017-02-02', 1, 7, 'hvhfvhfvvg', 'bhgjhhjjh', '9766065140', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'jgjhghghjggjh'),
(41, 15, NULL, '', 0, '2017-02-01', '2017-02-06', 1, 7, 'bkjkjjjkl', 'nhjnjkj', '1111111111', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'vhghvjgbhjgbhjbhj'),
(42, 15, NULL, '', 0, '2017-02-01', '2017-02-02', 1, 7, 'bvvhvhvhv', 'hnjhjhjh', '1111111111', 'NA', '0000-00-00', 'NA', 'NA', 'NA', 0, 'NA', '0000-00-00', '0000-00-00', 'APPROVED', 'bjjgjghjhjh');

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
  `date_leave` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_predefinedleave`
--

INSERT INTO `tbl_predefinedleave` (`txtId`, `date_leave`, `name`, `description`) VALUES
(9, '2017-02-01', 'Restricted Holiday', 'Basant Panchami'),
(10, '2017-02-10', 'Restricted Holiday', 'friday Restricted Holiday'),
(11, '2017-02-21', 'Restricted Holiday', 'Swami Dayananda Saraswati Jayanti'),
(12, '2017-02-24', 'Public Holiday', 'Maha shivaratri'),
(13, '2017-03-13', 'Public Holiday', 'Holi'),
(14, '2017-03-28', 'Restricted Holiday', 'Gudi Padava');

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
