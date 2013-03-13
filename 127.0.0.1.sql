-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2013 at 07:24 PM
-- Server version: 5.5.25a-log
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scribe`
--
CREATE DATABASE `scribe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scribe`;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `user_id` int(11) NOT NULL,
  `note_name` text NOT NULL,
  `note_content` longtext NOT NULL,
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `note_sticky` int(3) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`user_id`, `note_name`, `note_content`, `note_id`, `note_sticky`) VALUES
(6, 'Ben is awesome', 'He should be a computer science teacher', 3, 1),
(4, 'lowercase', 'use lowercase string function to force usernames to be lowercase', 4, 2),
(4, 'march 6th', 'Do biology homework, study for test', 5, 2),
(4, 'IT WORKS', 'WEEEE AREE THE CHAMPIONS', 6, 2),
(4, 'BENNNN', 'Is awesome....very awesome', 10, 1),
(4, 'Ben LOOK', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 11, 1),
(4, 'AMAZING', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 12, 1),
(4, 'Spring Break', 'Spring Break starts Thursday Spring Break starts Thursday Spring Break starts Thursday. Spring Break starts Thursday Spring Break starts Thursday Spring Break starts Thursday. Spring Break starts Thursday Spring Break starts Thursday Spring Break starts Thursday.', 13, 1),
(4, 'The amazing PAX EAST 203', 'going to pax east which is in boston, in massachusets. yeah its oging to be cool', 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_username` varchar(16) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_username`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_id`) VALUES
('test123', 'hello', 'there', 'cc03e747a6afbbcbf8be7668acfebee5', 'idc@ecample.com', 4),
('BenDoan', 'Ben', 'Doan', '5bd7d8f3863d4d08068da0b64661470f', 'ben@bendoan.me', 6),
('cvargas381', 'Christopher', 'Vargas', 'e00103382078fd5e2128cc3142430c4f', 'test@example.com', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
