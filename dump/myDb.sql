-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 11, 2019 at 03:47 PM
-- Server version: 8.0.18
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `fid` int(11) NOT NULL,
  `pubid` int(11) NOT NULL,
  `ARank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`fid`, `pubid`, `ARank`) VALUES
(1, 1001, 2),
(1, 1005, 3),
(2, 1001, 3),
(2, 1002, 2),
(2, 1004, 3),
(3, 1002, 4),
(3, 1003, 2),
(3, 1004, 2),
(4, 1004, 1),
(5, 1005, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `pubid` int(11) NOT NULL,
  `cname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`pubid`, `cname`) VALUES
(1001, 'ICACCI'),
(1003, 'ICONIP'),
(1005, 'ICML');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `dept`, `doj`, `website`) VALUES
(1, 'Samrat Mondal', 'CSE', '2015-08-01', 'http://172.16.1.252/~samrat/'),
(2, 'Jimson Mathew', 'CSE', '2014-07-07', 'http://172.16.1.6/~jimson/'),
(3, 'Sourav Dandapat', 'CSE', '2016-03-02', 'http://cse.iitkgp.ac.in/~souravkd/'),
(4, 'Ajay Thakur', 'PHY', '2017-08-11', 'http://172.16.1.252/~ajay/'),
(5, 'Suman Majhi', 'EEE', '2016-08-01', 'http://172.16.1.252/~suman/');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `pubid` int(11) NOT NULL,
  `jname` varchar(30) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`pubid`, `jname`, `volume`, `num`) VALUES
(1002, 'IEEE Transactions', 1, 4),
(1004, 'IEEE Intelligent Systems', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `pname`, `budget`, `sponsor`) VALUES
(101, 'Designing Tool for Smartly Adopting Electric Vehicles in Indian Cities', 5742000, 'Science & Engineering Research Board'),
(102, 'Autonomous Vehicles', 1742000, 'Science City'),
(103, 'Optical Character Reader', 5112000, 'Google Research and Developmant'),
(104, 'Tweet Summarization', 2242000, 'IITP Research and Development'),
(105, 'Home Automation by Natural Language', 3842000, 'LG Research and Development');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `pubid` int(11) NOT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `pages` varchar(20) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`pubid`, `pname`, `dop`, `pages`, `topic`) VALUES
(1001, 'Figurative Summarization', '2019-01-01', '1034-1050', 'ML'),
(1002, 'Document Clustering', '2017-05-15', '101-105', 'ML'),
(1003, 'Sentiment Analysis', '2018-12-14', '13-18', 'ML'),
(1004, 'House Price Prediction', '2016-11-29', '201-222', 'ML'),
(1005, 'Multimodal Summarization', '2018-11-09', '231-240', 'ML');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`pid`, `fid`, `role`) VALUES
(101, 1, 'Lead'),
(101, 2, 'Coordinator'),
(101, 3, 'Fund Manager'),
(102, 1, 'Coordinator'),
(102, 4, 'Lead'),
(103, 2, 'Coordinator'),
(103, 3, 'Lead'),
(104, 2, 'Lead'),
(104, 5, 'Fund Manager'),
(105, 5, 'Lead');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`fid`,`pubid`),
  ADD KEY `pubid` (`pubid`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`pid`,`fid`),
  ADD KEY `fid` (`fid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`pubid`) REFERENCES `publications` (`pubid`),
  ADD CONSTRAINT `author_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`),
  ADD CONSTRAINT `works_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
