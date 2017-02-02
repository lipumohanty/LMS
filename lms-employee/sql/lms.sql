drop database if exists db_lms;
create database db_lms;
use db_lms;
 

CREATE TABLE IF NOT EXISTS `tbl_addleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `no_count` int(10) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` varchar(30) DEFAULT NULL,
  `is_active` char(1) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_addleave`
--

INSERT INTO `tbl_addleave` (`txtId`, `leave_type`, `description`, `no_count`, `added_date`, `added_by`, `is_active`) VALUES
(2, 'CASUAL LEAVE', 'casual leave', 8, '2017-01-23', 'admin', 'y'),
(3, 'RESTRICTED LEAVE', 'restricted leave', 2, '2017-01-23', 'admin', 'y'),
(4, 'EARNED LEAVE', 'earned leave', 30, '2017-01-23', 'admin', 'y'),
(5, 'newadded', 'leave', 5, '2017-01-01', 'admin', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`txtId`, `username`, `password`, `name_user`, `user_type`) VALUES
(1, 'lipu123mohanty@gmail.com', 'gaurav', 'LIPU MOHANTY', '2'),
(2, 'neha@gmail.com', 'aaaaa', 'NEHA KOCHE', '2'),
(3, 'admin@gmail.com', 'admin123', 'ADMIN', '1'),
(4, 'priya@gmail.com', 'priya', 'PRIYA', '2'),
(5, 'pallavi@gmail.com', 'pallavi', 'PALLAVI', '2'),
(6, 'mangalgiri@gmail.com', 'mangalgiri', 'MANGALGIRI', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `pay_scale` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`txtId`, `fname`, `lname`, `dob`, `contact`, `address`, `join_date`, `designation`, `pay_scale`, `email`, `password`) VALUES
(1, 'lipu', 'mohanty', '1991-10-04', '9766065140', 'hingna road nagpur', '2017-01-01', 'dgm', '50000', 'lipu123mohanty@gmail.com', 'gaurav'),
(2, 'neha', 'koche', '2017-01-04', '9999999999', 'nagpur', '2017-01-23', 'gm', '50000', 'neha@gmail.com', 'aaaaa'),
(3, 'priya', 'kkk', '2017-01-01', '9766065140', 'nagpur', '2017-01-23', 'gm', '50000', 'priya@gmail.com', 'priya'),
(4, 'pallavi', 'rrrr', '2017-01-02', '9999999999', 'nagpur', '2017-01-23', 'gm', '50000', 'pallavi@gmail.com', 'pallavi'),
(5, 'mangalgiri', 'chandrashekar', '2017-01-05', '9888888888', 'nagpur', '2017-01-23', 'ro', '50000', 'mangalgiri@gmail.com', 'mangalgiri'),
(6, 'abhijit', 'jichkar', '2017-01-01', '9999999999', 'nagpur', '2017-01-23', 'dgm', '50000', 'abhijit@gmail.com', 'abhijit'),
(7, 'satish', 'janwe', '2017-01-01', '9999999999', 'nagpur', '2017-01-23', 'dgm', '50000', 'satish@gmail.com', 'satish'),
(8, 'nl', 'yeotkar', '2017-01-01', '9766065140', 'hingna road nagpur', '2017-01-23', 'dgm', '50000', 'yeotkar@gmail.com', 'yeotkar'),
(9, 'srinivas', 'rao', '2017-01-01', '9999999999', 'nagpur', '2017-01-23', 'pa', '50000', 'srinivas@gmail.com', 'srinivas'),
(10, 'aaaaaa', 'mohanty', '0000-00-00', '7416.36349', 'zzz', '0000-00-00', 'xxxxx', '1111', 'aaa@gma.co', 'aaaa'),
(11, 'gaurav', 'mohanty', '2017-01-01', '999999999', 'nagpur', '2017-01-01', 'student', '0', 'email@gmail.com', 'gaurav'),
(12, 'dasdsadd', 'sssss', '2017-01-16', '999999999', '400 shantinagar near kaimata t', '2017-01-09', 'student', '0', 'aaa@gmail.com', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavesetting`
--

CREATE TABLE IF NOT EXISTS `tbl_leavesetting` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `commuted_leave` int(10) DEFAULT NULL,
  `halfpay_leave` int(10) DEFAULT NULL,
  `special_leave` int(10) DEFAULT NULL,
  `leaving_hq` int(10) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_leavesetting`
--

INSERT INTO `tbl_leavesetting` (`txtId`, `emp_id`, `commuted_leave`, `halfpay_leave`, `special_leave`, `leaving_hq`) VALUES
(1, 1, 10, 11, 7, 6),
(2, 2, 9, 10, 6, 6),
(3, 3, 7, 7, 7, 6),
(4, 4, 6, 6, 7, 7),
(5, 5, 4, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_predefinedleave`
--

CREATE TABLE IF NOT EXISTS `tbl_predefinedleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `date_leave` date DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_predefinedleave`
--

INSERT INTO `tbl_predefinedleave` (`txtId`, `date_leave`, `description`) VALUES
(1, '2017-01-26', 'republic day'),
(2, '2017-01-29', 'sunday'),
(3, '2017-02-05', 'sunday'),
(4, '2017-02-11', 'second saturday');




CREATE TABLE IF NOT EXISTS `tbl_applyleave` (
  `txtId` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(50) DEFAULT NULL,
  `fromdate` date DEFAULT NULL,
`todate` date DEFAULT NULL,
  `no_days` int(11) DEFAULT NULL,
`restricted_leave` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
`leave_purpose` varchar(50) DEFAULT NULL,
  `avail_ltc` varchar(50) DEFAULT NULL,
`ltc_details` varchar(50) DEFAULT NULL,
  `leave_encashment` varchar(50) DEFAULT NULL,
`no_leaveencash` int(11) DEFAULT NULL,
  `permission_hq` varchar(50) DEFAULT NULL,
`datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
`place` date DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`txtId`)
) 











