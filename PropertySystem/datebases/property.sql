-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2019 at 05:32 AM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_name` varchar(50) NOT NULL COMMENT '管理员名',
  `admin_password` varchar(50) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, '1', '1'),
(2, '2', '2'),
(3, '3', '3'),
(4, '老大', '4');

-- --------------------------------------------------------

--
-- Table structure for table `fee_info`
--

DROP TABLE IF EXISTS `fee_info`;
CREATE TABLE IF NOT EXISTS `fee_info` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '缴费id',
  `fee_user_id` int(11) NOT NULL COMMENT '业主id',
  `fee_cost` double DEFAULT NULL COMMENT '物业费',
  `fee_chargetime` date DEFAULT NULL COMMENT '收费时间',
  `fee_note` varchar(255) DEFAULT NULL COMMENT '备注',
  `fee_totalcost` double DEFAULT NULL COMMENT '总物业费',
  `fee_times` int(20) DEFAULT NULL COMMENT '缴的月份数',
  `fee_duetime` date DEFAULT NULL COMMENT '到期时间',
  PRIMARY KEY (`fee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_info`
--

INSERT INTO `fee_info` (`fee_id`, `fee_user_id`, `fee_cost`, `fee_chargetime`, `fee_note`, `fee_totalcost`, `fee_times`, `fee_duetime`) VALUES
(39, 1, 11, '2019-09-06', '19年9月12号交了11个月的物业费，每个月11块，一共121块。', 121, 11, '2020-08-06'),
(40, 2, 200, '2019-09-19', '每个月物业费200块，交了两个月，一共是400的物业费。', 400, 2, '2019-11-19'),
(41, 1, 100, '2018-01-01', '18年初，交了一年的物业费，100*12，明年交。', 1200, 12, '2019-01-01'),
(42, 3, 300, '2019-09-20', '交了6个月，不知道要多少钱啦？？？？', 1800, 6, '2020-03-20'),
(43, 17, 150, '2019-09-18', '一九年九月份交了五个月的物业费，要吃土了。', 750, 5, '2020-02-18'),
(44, 17, 200, '2018-12-01', '一八年十二月，交了8个月的物业费，好长时间可以不用交了。', 1600, 8, '2019-08-01'),
(45, 17, 150, '2017-01-01', '17年初交了一年的物业费，好多钱了。', 1800, 12, '2018-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户姓名',
  `user_password` varchar(50) NOT NULL COMMENT '用户密码',
  `user_phonenumber` varchar(20) DEFAULT NULL COMMENT '用户电话号码',
  `user_gender` varchar(2) DEFAULT NULL COMMENT '用户性别',
  ` user_checkintime` date DEFAULT NULL COMMENT '用户入住时间',
  `user_address` varchar(100) DEFAULT NULL COMMENT '用户入住地址',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_password`, `user_phonenumber`, `user_gender`, ` user_checkintime`, `user_address`) VALUES
(1, '柳狗蛋', '123', '10987654321', '男', '2019-09-25', '一栋一号房子的一号位置'),
(2, '用户2', '2', '2222222222222', '女', '2019-09-24', '江西南昌2号房'),
(17, '柳小子', '456', '12345678910', '男', '2019-09-25', '某球某国某省某市某区某街道某村某号'),
(3, '用户3', '3', '3333333333333', '男', '2019-09-24', '江西南昌3号房'),
(4, '用户4', '4', '44444444444444', '女', '2019-09-24', '江西南昌4号房');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
