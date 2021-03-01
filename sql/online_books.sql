-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 01:07 AM
-- Server version: 5.1.67-andiunpam
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `autho`
--

CREATE TABLE IF NOT EXISTS `autho` (
  `no` int(1) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `autho`
--

INSERT INTO `autho` (`no`, `email`, `password`) VALUES
(1, 'pcic095@gmail.com', 'avunix9143');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` text NOT NULL,
  `author_name` text NOT NULL,
  `summary` text NOT NULL,
  `book_cover` text NOT NULL,
  `book_pdf` text NOT NULL,
  `subject` text NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`no`, `book_name`, `author_name`, `summary`, `book_cover`, `book_pdf`, `subject`, `upload_date`) VALUES
(3, 'hhh', 'hhyyb', '', ';g', '', ';bbb', '2021-02-27 14:06:13'),
(4, 'yyy', 'yyyy', 't55', '1826691584', '', 'yyyyy', '0000-00-00 00:00:00'),
(5, 'yyy', 'yyyy', 't55', '1826691584', '', 'yyyyy', '0000-00-00 00:00:00'),
(6, 'dhurhr', 'hrhhhu', 'uuururu', 'udueururu', '', 'uurueueueu', '2021-02-27 15:26:50'),
(7, 'ueurhhrhr', 'ururuueue', 'urueueu', 'ueueueu', '', 'ueuueueue', '2021-02-27 15:26:53'),
(8, 'uueueueu', '8e88282', 'ueufjrue', '8e8eueuej', '', 'uuueueueueu', '2021-02-27 15:27:02'),
(9, '8ee8euueue', 'ueueueueuue', 'ue8e8e8eueu', 'u8e9e8e8e8e8', '', 'ieeiieieie', '2021-02-27 15:27:09'),
(10, 'ueueueueuue', 'ueueuue', 'ueeuueue', 'e88e8e8e8e8e', '', '82828', '2021-02-27 15:27:17'),
(11, '8288282', 'euueueue', '828282828', 'hfhdhhdhfhf8282', '', 'ueueuudjfur', '2021-02-27 15:27:27'),
(15, 'huu', 'y776', 'y8gy', 'g767', 'hyuyu', 'uu8gy', '2021-03-01 15:41:17'),
(16, 'Mysqli with php', 'Argha Nilanjon Nondi', '   Mysql in php', '23367166', '23367166', 'Mysql in php', '2021-03-01 18:03:30'),
(14, 'Book_test_02', 'hehehe', ' gyyy', '676926305', '676926305', 'Subjext2', '2021-03-01 18:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `context` varchar(300) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`no`, `name`, `email`, `subject`, `context`) VALUES
(1, 'no', 'admin@gmail.com', 'text subject', 'gdheh ueheue uegee  euev eue eueve eue eue eue eue eu euee ev'),
(2, 'argha', 'pcic67@gmail.com', 'text subject', 'test context'),
(3, 'argha', 'pcic67@gmail.com', 'text subject', 'test context'),
(4, 'no', 'admin@gmail.com', 'text subject', 'gdheh ueheue uegee  euev eue eueve eue eue eue eue eu euee ev'),
(5, 'test name', 'pcic067@gmail.com', 'test subject', 'test contect'),
(6, 'test name', 'pcic067@gmail.com', 'test subject', 'test contect');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
