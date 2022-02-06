-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 08:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `actors_api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ratings` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `firstname`, `lastname`, `ratings`, `last_update`) VALUES
(1, 'Brad', 'Pitt', 9211, '2020-12-12 00:00:00'),
(2, 'Chris', 'Hemsworth', 9342, '2020-12-12 00:00:00'),
(3, 'Chris', 'Evans', 10987, '2020-12-12 00:00:00'),
(4, 'Tom', 'Holland', 8796, '2020-12-12 00:00:00'),
(5, 'Robert Jr.', 'Downey', 8990, '2020-12-12 00:00:00'),
(6, 'Robert', 'Pattinson', 9006, '2020-12-12 00:00:00'),
(7, 'Elizabeth', 'Olsen', 10056, '2020-12-12 00:00:00'),
(8, 'Emma', 'Stone', 11908, '2020-12-12 00:00:00'),
(9, 'Emma', 'Watson', 10345, '2020-12-12 00:00:00'),
(10, 'Scarlett', 'Johanson', 11098, '2020-12-12 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
