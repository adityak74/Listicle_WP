-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2015 at 10:05 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aasya`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `article_heading` varchar(50) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `verified` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `aid`, `heading`, `article_heading`, `content`, `verified`, `timestamp`) VALUES
(4, 3, 'Adult Literacy', 'heading4', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2015-10-17 07:41:13'),
(5, 3, 'Adult Literacy', 'heading5', 'gggggggggggggggggggggg', 0, '2015-10-17 07:41:13'),
(6, 3, 'Blood Donation', 'heading6', 'ddddddddddddddddddddddd', 1, '2015-10-17 07:41:13'),
(7, 3, 'Blood Donation', 'heading7', 'aaaaaaaasdadadsdadadas', 1, '2015-10-17 07:41:13'),
(8, 3, 'Affordable Medical Testing', 'heading8', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 1, '2015-10-17 07:41:13'),
(9, 3, 'Affordable Medical Testing', 'heading9', 'jfkbewfhfnehgjgrgrgewrgregr', 0, '2015-10-17 07:41:13'),
(10, 3, 'Research and Development', 'heading10', 'kkakkkkakakaka', 0, '2015-10-17 07:41:13'),
(11, 3, 'Child and Women Protection', 'heading11', 'pandey jcdbf jehfbh r', 0, '2015-10-17 07:41:13'),
(12, 3, 'Child and Women Protection', 'heading12', '1ewfwfewgerrewregervtwerv', 0, '2015-10-17 07:41:13'),
(13, 3, 'De-Addiction', 'heading13', 'tatattataattatattatata', 0, '2015-10-17 07:41:13'),
(15, 3, 'Victim Rehabitational', 'Heading16', 'This is a normal text.This is not a post at all.I am not saying this.you are.', 1, '2015-10-17 07:41:13'),
(16, 3, 'Blood Donation', 'Heading17', 'This is a normal text.This is not a post at all.I am not saying this.you are.', 0, '2015-10-17 07:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `authorsdetails`
--

CREATE TABLE IF NOT EXISTS `authorsdetails` (
  `aid` int(11) NOT NULL,
  `auth_name` varchar(100) NOT NULL,
  `auth_email` varchar(100) NOT NULL,
  `auth_username` varchar(100) NOT NULL,
  `auth_password` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorsdetails`
--

INSERT INTO `authorsdetails` (`aid`, `auth_name`, `auth_email`, `auth_username`, `auth_password`, `timestamp`) VALUES
(3, 'Prabhat', 'prabhat@gmail.com', 'prabhat', 'faf001b68840889980e901c13c5222cb299983be', '2015-10-15 11:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorsdetails`
--
ALTER TABLE `authorsdetails`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `authorsdetails`
--
ALTER TABLE `authorsdetails`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
