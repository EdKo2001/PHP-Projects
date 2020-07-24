-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 03:02 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allphptricks`
--

-- --------------------------------------------------------

--
-- Table structure for table `pagination_table`
--

CREATE TABLE IF NOT EXISTS `pagination_table` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `age` int(10) NOT NULL,
  `dept` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `pagination_table`
--

INSERT INTO `pagination_table` (`id`, `name`, `age`, `dept`) VALUES
(1, 'Ahsan', 22, 'Information Technology'),
(2, 'Ali', 25, 'Human Resource'),
(3, 'Kashif', 30, 'Information Technology'),
(4, 'Iqbal', 31, 'Information Technology'),
(5, 'Farooq', 34, 'Finance'),
(6, 'Adnan', 29, 'Finance'),
(7, 'Javed', 25, 'Information Technology'),
(8, 'Irfan', 35, 'Production'),
(9, 'Kamran', 34, 'Production'),
(10, 'Danish', 27, 'Finance'),
(11, 'Naghman', 26, 'Administration'),
(12, 'Riaz', 37, 'Administration'),
(13, 'Imran', 36, 'Finance'),
(14, 'Wajahat', 28, 'Administration'),
(15, 'Arsalan', 31, 'Finance'),
(16, 'Sheraz', 34, 'Information Technology'),
(17, 'Faraz', 30, 'Marketing'),
(18, 'Ayaaz', 28, 'Marketing'),
(19, 'Abbas', 26, 'Finance'),
(20, 'Bilal', 33, 'Quality Assurance'),
(21, 'Jibran', 28, 'Quality Assurance'),
(22, 'Nasir', 36, 'Finance'),
(23, 'Mohsin', 29, 'Marketing'),
(24, 'Yaqoob', 35, 'Production'),
(25, 'Hammad', 30, 'Quality Assurance'),
(26, 'Imran', 30, 'Information Technology'),
(27, 'Kashif', 28, 'Finance'),
(28, 'Azhar', 27, 'Human Resource'),
(29, 'Misbah', 33, 'Marketing'),
(30, 'Tabish', 27, 'Quality Assurance'),
(31, 'Furqan', 35, 'Marketing'),
(32, 'Ilyas', 25, 'Finance'),
(33, 'Kamran', 24, 'Information Technology'),
(34, 'Babar', 29, 'Finance'),
(35, 'Adnan', 32, 'Marketing'),
(36, 'Wasif', 25, 'Finance');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
