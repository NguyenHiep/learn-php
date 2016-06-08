-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2016 at 01:42 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `treefamily`
--
CREATE DATABASE IF NOT EXISTS `treefamily` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `treefamily`;

-- --------------------------------------------------------

--
-- Table structure for table `tblbinaryusers`
--

CREATE TABLE IF NOT EXISTS `tblbinaryusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `position` tinyint(10) NOT NULL,
  `parent_no` int(10) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `enroll_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblbinaryusers`
--

INSERT INTO `tblbinaryusers` (`id`, `position`, `parent_no`, `First_name`, `enroll_time`) VALUES
(1, 0, 0, 'Hiêp', '2012-02-12'),
(2, 0, 1, 'Hưng', '2012-02-12'),
(3, 0, 1, 'Hoa', '2012-02-12'),
(4, 0, 1, 'Hùng', '2012-02-12'),
(5, 0, 2, 'Hạnh', '2012-02-12'),
(6, 0, 2, 'Hiên', '2012-02-12'),
(7, 0, 2, 'Hảo', '2012-02-12'),
(8, 0, 4, 'Hiếu', '2012-02-12'),
(9, 0, 4, 'Hiền', '2012-02-12'),
(10, 0, 3, 'Hội', '2012-02-12'),
(11, 0, 3, 'Hải', '2012-02-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
