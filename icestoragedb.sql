-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2015 at 08:51 AM
-- Server version: 5.5.44
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icestoragedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL,
  `size` int(20) NOT NULL,
  `u_id` int(10) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`f_id`, `f_name`, `type`, `size`, `u_id`) VALUES
(17, 'Big-Birthday-Cake-White.jpg', 'image/jpeg', 98755, 2),
(18, 'olimpic flag.jpg', 'image/jpeg', 29141, 2),
(19, 'jack fruit.jpg', 'image/jpeg', 68349, 2),
(20, 'Awesome-Diamond-HD-Pictures2.jpg', 'image/jpeg', 1098167, 2),
(28, 'minions-2015.zip', 'application/zip', 21401, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(8) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(60) NOT NULL,
  `p_number` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `full_name`, `p_number`, `email`, `password`) VALUES
(1, 'Hunky Cube', '987654345678', 'sdfghjk@cvbn.com', 'sdfghjkjhgfdsdfhjkjh'),
(2, 'Demo User', '', 'user1@s.com', 'pass1'),
(3, 'Dipu', '87654866', 'asd@s.com', 'pass2'),
(4, 'Shakil', '34567890', 'qwe@s.com', 'pass3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
