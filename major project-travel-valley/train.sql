-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2022 at 12:28 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `quota_m`
--

DROP TABLE IF EXISTS `quota_m`;
CREATE TABLE IF NOT EXISTS `quota_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quota_m`
--

INSERT INTO `quota_m` (`id`, `name`) VALUES
(1, 'General'),
(2, 'DEFENCE QUOTA');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `station1` varchar(100) NOT NULL,
  `stn1arr` varchar(10) NOT NULL,
  `station2` varchar(100) NOT NULL,
  `stn2arr` varchar(10) NOT NULL,
  `station3` varchar(100) NOT NULL,
  `stn3arr` varchar(10) NOT NULL,
  `to` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `from`, `station1`, `stn1arr`, `station2`, `stn2arr`, `station3`, `stn3arr`, `to`) VALUES
(1, 'alappuzha', 'thakazhi', '3:00 ', 'cherthala', '4:00 ', 'Edapalli', '5:30 ', 'Ernakulam'),
(15, 'Thrivanathapuram', '', '', '', '', '', '', 'Ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `train_id` int(10) NOT NULL,
  `route_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `first_fee` float NOT NULL,
  `second_fee` float NOT NULL,
  `sleeper_fee` int(50) NOT NULL,
  `general_fee` int(50) NOT NULL,
  `ac_fee` int(50) NOT NULL,
  `lad_fee` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `train_id` (`train_id`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `train_id`, `route_id`, `date`, `time`, `first_fee`, `second_fee`, `sleeper_fee`, `general_fee`, `ac_fee`, `lad_fee`) VALUES
(6, 4, 1, '2022-11-21', '10.00am', 200, 400, 500, 1000, 2000, 1000),
(7, 6, 1, '2022-11-18', '10.00am', 100, 200, 300, 500, 1000, 300),
(8, 9, 15, '2022-11-21', '10.00am', 1000, 500, 500, 500, 500, 500);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
CREATE TABLE IF NOT EXISTS `seat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `train_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `1A_lb` int(10) NOT NULL COMMENT '1A lower berth',
  `1A_mb` int(10) NOT NULL COMMENT '1A middle berth',
  `1A_ub` int(10) NOT NULL COMMENT '1A upper berth',
  `1A_sb` int(10) NOT NULL COMMENT '1A side berth',
  `2A_lb` int(10) NOT NULL COMMENT '2A lower berth',
  `2A_mb` int(10) NOT NULL COMMENT '2A middle berth',
  `2A_ub` int(10) NOT NULL COMMENT '2A upper berth',
  `2A_sb` int(10) NOT NULL COMMENT '2A side berth',
  `3A_lb` int(50) NOT NULL COMMENT 'lower berth',
  `3A_mb` int(10) NOT NULL COMMENT '3A middle berth',
  `3A_ub` int(10) NOT NULL COMMENT '3A upper berth',
  `3A_sb` int(10) NOT NULL COMMENT '3A side berth',
  `Upper_seat` int(50) NOT NULL,
  `lowb` int(20) NOT NULL,
  `midb` int(20) NOT NULL,
  `uppb` int(20) NOT NULL,
  `sideb` int(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `quota` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `train_id`, `date`, `1A_lb`, `1A_mb`, `1A_ub`, `1A_sb`, `2A_lb`, `2A_mb`, `2A_ub`, `2A_sb`, `3A_lb`, `3A_mb`, `3A_ub`, `3A_sb`, `Upper_seat`, `lowb`, `midb`, `uppb`, `sideb`, `type`, `quota`) VALUES
(2, 4, '2022-11-21', 10, 20, 24, 40, 10, 20, 30, 40, 7, -4, 27, 40, 2, 5, 3, 4, 3, 'All Class', '1'),
(13, 9, '2022-11-21', 10, 20, 18, 40, 10, 20, 10, 40, 10, 20, 30, 40, 9, 30, 30, 20, 10, 'ALL CLASS', '1'),
(16, 4, '2022-11-21', 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 'defence', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `log_emailid` varchar(20) NOT NULL,
  `log_pass` varchar(300) NOT NULL,
  `log_status` int(1) NOT NULL,
  `log_type` varchar(20) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10019 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `reg_id`, `log_emailid`, `log_pass`, `log_status`, `log_type`) VALUES
(14, 16, 'jomolrk@gmail.com', '123', 1, 'user'),
(10001, 10000, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 'admin'),
(10002, 10001, 'rosna@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'user'),
(10003, 10002, 'ajith@gmail.com', '9996535e07258a7bbfd8b132435c5962', 1, 'user'),
(10004, 10003, 'appu12@gmail.com', '76d1574c42e995d9203a459c8f579f4c', 1, 'user'),
(10005, 10004, 'arathy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'user'),
(10009, 10008, 'anu2000@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'user'),
(10010, 10009, 'irin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'user'),
(10011, 10010, 'anu@gail.com', '202cb962ac59075b964b07152d234b70', 1, 'user'),
(10013, 10012, 'jeevan@gmail.com', '', 1, 'user'),
(10017, 10016, 'sanioluke00@gmail.co', 'f369ce32c056b4decfa250c3cdb0844b', 1, 'user'),
(10018, 10017, 'juhu@gmail.com', '6dd0417478ea086221823a449c88d22f', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

DROP TABLE IF EXISTS `tbl_register`;
CREATE TABLE IF NOT EXISTS `tbl_register` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(100) NOT NULL,
  `reg_phone` varchar(15) NOT NULL,
  `reg_gender` varchar(20) NOT NULL,
  `reg_adhar` varchar(20) NOT NULL,
  `reg_img` varchar(500) NOT NULL,
  `reg_dob` date NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10018 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`reg_id`, `reg_name`, `reg_phone`, `reg_gender`, `reg_adhar`, `reg_img`, `reg_dob`) VALUES
(16, 'Jomol RK', '8527410963', 'female', '8520-1239-2345-9876', 'customer_image', '2022-09-01'),
(10000, 'rosna', '8976543212', 'female', '3245-3456-1234-7654', 'Admin Image', '2022-08-31'),
(10001, 'rosna', '8976543213', 'female', '3245-3456-1234-7654', 'customer_image', '2022-08-31'),
(10002, 'ajith', '6789546279', 'male', '8757-1234-2334-5674', 'customer_image', '2022-08-28'),
(10003, 'Appu', '7418529630', 'male', '0000-0000-0000-0000', 'customer_image', '2022-10-10'),
(10004, 'arathy123', '8527410965', 'female', '1234-1234-1234-1234', 'customer_image', '2022-10-09'),
(10008, 'anu', '8765432567', 'female', '9067-8908-6789-7654', '', '1999-06-22'),
(10009, 'irin', '9076456789', 'female', '1234-1234-1534-1234', '', '2022-10-09'),
(10010, 'anu', '8527410963', 'female', '3245-3456-1634-7654', '', '2022-10-19'),
(10012, 'jeevan', '9087654432', 'male', '5432-8976-6543-8766', '', '2022-10-13'),
(10016, 'Sanio', '8692074192', 'male', '7894-7894-7894-7894', '', '2004-11-05'),
(10017, 'hjikkjj', '7845678991', 'female', '7654-7865-5467', '', '2004-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `ticketbook_m`
--

DROP TABLE IF EXISTS `ticketbook_m`;
CREATE TABLE IF NOT EXISTS `ticketbook_m` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TrainID` int(10) NOT NULL,
  `RouteID` int(11) DEFAULT NULL,
  `SheduleID` int(10) NOT NULL,
  `PaymentID` int(10) DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL COMMENT 'confirmed/notconfirmed',
  `UserID` int(10) NOT NULL,
  `TicketCode` varchar(50) DEFAULT NULL,
  `Class` varchar(10) NOT NULL,
  `Quota` int(10) NOT NULL,
  `NoofSeat` int(10) NOT NULL,
  `DateTime` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketbook_m`
--

INSERT INTO `ticketbook_m` (`ID`, `TrainID`, `RouteID`, `SheduleID`, `PaymentID`, `PaymentStatus`, `UserID`, `TicketCode`, `Class`, `Quota`, `NoofSeat`, `DateTime`) VALUES
(1, 6, 1, 7, NULL, '', 10001, 'TK1668679047', '1A', 0, 10, '2022-11-17 09:57:27'),
(2, 4, 1, 6, NULL, 'Confirmed', 10018, 'TK1668687088', '3A', 0, 29, '2022-11-17 12:11:28'),
(3, 4, 1, 6, NULL, 'Confirmed', 10018, 'TK1668687833', '1A', 0, 12, '2022-11-17 12:23:53'),
(4, 4, 1, 6, NULL, 'NotConfirmed', 10018, 'TK1668741775', '1A', 0, 10, '2022-11-18 03:22:55'),
(5, 4, 1, 6, NULL, 'Confirmed', 10018, 'TK1668741895', '1A', 0, 5, '2022-11-18 03:24:55'),
(6, 4, 1, 6, NULL, 'Confirmed', 10018, 'TK1668741964', '1A', 0, 4, '2022-11-18 03:26:04'),
(7, 4, 1, 6, NULL, 'NotConfirmed', 10018, 'TK1668742652', '1A', 0, 12, '2022-11-18 03:37:32'),
(8, 4, 1, 6, NULL, 'NotConfirmed', 10018, 'TK1668743120', '1A', 0, 2, '2022-11-18 03:45:20'),
(9, 4, 1, 6, NULL, '', 10018, 'TK1668743199', '1A', 0, 2, '2022-11-18 03:46:39'),
(10, 4, 1, 6, NULL, '', 10018, 'TK1668743341', '1A', 0, 4, '2022-11-18 03:49:01'),
(11, 4, 1, 6, NULL, '', 10018, 'TK1668743400', '1A', 0, 3, '2022-11-18 03:50:00'),
(12, 4, 1, 6, NULL, '', 10018, 'TK1668743419', '1A', 0, 3, '2022-11-18 03:50:19'),
(13, 4, 1, 6, NULL, '', 10018, 'TK1668743448', '1A', 0, 5, '2022-11-18 03:50:48'),
(14, 4, 1, 6, NULL, '', 10018, 'TK1668743482', '2A', 0, 5, '2022-11-18 03:51:22'),
(15, 4, 1, 6, NULL, '', 10018, 'TK1668745639', '1A', 0, 4, '2022-11-18 04:27:19'),
(16, 4, 1, 6, NULL, '', 10018, 'TK1668752672', '1A', 0, 2, '2022-11-18 06:24:32'),
(17, 4, 1, 6, NULL, '', 10001, 'TK1669017970', '1A_lb', 2, 1, '2022-11-21 08:06:10'),
(18, 9, 15, 8, NULL, '', 10001, 'TK1669018100', '1A_ub', 1, 12, '2022-11-21 08:08:20'),
(19, 9, 15, 8, NULL, '', 10001, 'TK1669018818', '2A_ub', 1, 20, '2022-11-21 08:20:18'),
(20, 4, NULL, 6, NULL, 'NotConfirmed', 10001, 'TK1669033287', '3A_ub', 1, 1, '2022-11-21 12:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

DROP TABLE IF EXISTS `trains`;
CREATE TABLE IF NOT EXISTS `trains` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `t_code` varchar(10) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `first class` int(30) NOT NULL,
  `secondclass` int(20) NOT NULL,
  `sleeperclass` int(20) NOT NULL,
  `generalqouta` int(20) NOT NULL,
  `AC` int(20) NOT NULL,
  `ladiesquota` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `t_code`, `tname`, `first class`, `secondclass`, `sleeperclass`, `generalqouta`, `AC`, `ladiesquota`) VALUES
(1, 'TR-101', 'Mangala Express', 123, 109, 140, 150, 60, 30),
(4, ' T-321 ', 'Mumbai Express', 113, 120, 80, 50, 40, 70),
(6, ' TR-102 ', 'INdian Express', 70, 80, 90, 90, 60, 75),
(7, ' TR-104 ', 'Rail innovey', 109, 49, 67, 89, 90, 78),
(8, ' TR-134 ', 'Chennai Express', 80, 90, 70, 120, 90, 120),
(9, ' TR-1234 ', 'janashdapthi express', 100, 20, 10, 10, 10, 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
