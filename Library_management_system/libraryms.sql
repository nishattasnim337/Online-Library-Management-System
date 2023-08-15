-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 05:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contract` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `f_name`, `l_name`, `department`, `username`, `email`, `password`, `contract`, `pic`) VALUES
(1, 'btbb', 'fbtr', 'ACCE', 'nishat1', 'tasnim123@gmail.com', '123', 111111, 'nishat1.jpg'),
(2, 'nishat', 'tasnim', 'IIT', 'nishat3', 'tasnim@gmail.com', '123', 987643344, 'nishat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(255) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `b_name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'Math', 'Seymour Lipschutz', '6th', 'Available', 15, 'IIT'),
(6, 'Principle of Electronics ', 'V.K mehta, Rohit Metha', '3rd', 'Available ', 5, 'EEE'),
(7, 'Math', 'Seymour Lipschutz', '8th', 'Available ', 15, 'ICE'),
(9, 'Fundamentals of Electromagnetic Theory', 'Khunita, PHI', '4th', 'Available', 7, 'EEE'),
(10, 'Engineering Mathematics', 'Reena Garg, Khanna Book Publishing', '3rd', 'Available ', 5, 'CSTE'),
(11, 'Mac', 'Bjarne Stroustrup', '10th', 'Available', 13, 'Math'),
(12, 'Math', 'nishat yesmin', '2nd', 'available', 15, 'English'),
(13, 'bangla', 'xxx', '6th', 'available', 2, 'IIT');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `mgs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user`, `mgs`) VALUES
(1, 'nishat123', 'Hello'),
(2, 'nishat09', '                         hi'),
(3, 'nishat09', '                         hi'),
(4, 'nishat09', '                         '),
(5, 'nishat09', '                         hello'),
(6, 'nishat09', '        welcome to our library                 ');

-- --------------------------------------------------------

--
-- Table structure for table `fine_collection`
--

CREATE TABLE `fine_collection` (
  `b_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `return_date` date NOT NULL,
  `days` int(50) NOT NULL,
  `fine` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine_collection`
--

INSERT INTO `fine_collection` (`b_id`, `username`, `roll`, `return_date`, `days`, `fine`) VALUES
(1, 'nishat123', '123654', '2021-02-27', 7, 35),
(11, 'nishat123', '123654', '2021-06-08', 105, 525),
(8, 'Rumi11', 'bkh1825006f', '2021-06-08', 95, 475),
(1, 'nishat123', '123654', '2021-09-07', 2, 10),
(9, 'nishat09', '1825006f', '2021-09-28', 5, 25),
(11, 'nishat09', '1825006f', '2021-09-28', 5, 25),
(9, 'nishat09', '1825006f', '2021-10-01', 13, 65);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(255) NOT NULL,
  `b_id` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` date NOT NULL DEFAULT current_timestamp(),
  `returnbook` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `b_id`, `approve`, `issue`, `returnbook`) VALUES
('nishat123', 11, 'Return', '2021-02-17', '2021-02-22'),
('Rumi11', 8, 'Return', '2021-02-28', '2021-03-04'),
('nishat123', 8, 'Return', '2021-09-05', '2021-09-07'),
('nishat123', 1, 'Return', '2021-09-03', '2021-09-05'),
('nishat09', 9, 'Return', '2021-09-21', '2021-09-23'),
('nishat09', 11, 'Return', '2021-09-21', '2021-09-23'),
('nishat09', 9, 'Return', '2021-09-17', '2021-09-18'),
('suvo', 11, 'Yes', '2021-10-05', '2021-10-07'),
('nishat09', 10, '', '0000-00-00', '0000-00-00'),
('nishat123', 11, '', '0000-00-00', '0000-00-00'),
('xyz1', 11, 'Expired', '2021-10-01', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `announcement`) VALUES
(17, 'Tomorrow is public holiday, closed our library.'),
(18, 'Tomorrow is public holiday, closed our library.');

-- --------------------------------------------------------

--
-- Table structure for table `recover_pass`
--

CREATE TABLE `recover_pass` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recover_pass`
--

INSERT INTO `recover_pass` (`id`, `email`, `otp`, `date`) VALUES
(1, 'tt@gmai.com', 123, '2012-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contract` decimal(11,0) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'pic.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `f_name`, `l_name`, `department`, `session_year`, `roll`, `username`, `email`, `password`, `contract`, `pic`) VALUES
(1, 'nishat tasnim', 'tamanna', 'IIT', '2017-18', '123654', 'nishat123', 'tasnim@gmail.com', '111', '1835308242', 'nishat123.jpg'),
(2, 'Rumi', 'Rani', 'ACCE', '2014-15', 'bkh1825006f', 'Rumi11', 'tasnim123@gmail.com', '123', '987643344', 'Rumi11.jpg'),
(3, 'tamim', 'ahmed', 'ACCE', '2015-16', '123654', 'suvo', 'tamim123@gmail.com', '123', '0', ''),
(4, 'aaaa', 'aaa', 'ACCE', '2016-17', 'bkh1825006f', 'Rumi111', 'rumi12356@gmail.com', '12345', '0', 'pic.jpg'),
(5, 'tamim', 'ahmed', 'ACCE', '2014-15', 'bkh1825006f', 'suvo11', 'tamim1234@gmail.com', '12345', '0', 'pic.jpg'),
(6, 'sss', 'ssss', 'ICE', '2017-18', '23432', 'Rumi12', 'tamim124@gmail.com', '1111', '0', 'pic.jpg'),
(8, 'nishat', 'yesmin', 'IIT', '2019-20', 'bkh1825013f', 'taspiya12', 'tasnim1825006f@gmail.com', '123', '0', 'pic.jpg'),
(10, 'tafim', 'ahmed', 'IIT', '2017-18', '1825006f', '', 'tafim182006gF@gmail.com', '123', '0', ''),
(12, 'tafim', 'ahmed', 'IIT', '2017-18', '1825006f', 'xyz1', 'tafim182006g@gmail.com', '12', '0', 'xyz.jpg'),
(14, '', '', '', '', '', 'mnmn', 'tafim182006mmm@gmail.com', '123', '0', ''),
(15, '', '', '', '', '', 'nishat09', 'tafim182006kk@gmail.com', '123', '0', 'pic.jpg'),
(18, '', '', '', '', '', 'nishat0', 'tafim182006oopp@gmail.com', '123', '0', 'pic.jpg'),
(19, 'nishat', 'hhhh', '', '', 'vfv', 'bams', 'nishattasnim3374@gmail.com', '', '0', 'pic.jpg'),
(25, 'nishat11', 'yesmin11', 'IIT', '1st', 'bkh1825013f', 'bams33', 'nishattasnim776@gmail.com', '123', '0', 'pic.jpg'),
(26, 'nishat', 'yesmin', 'IIT', '1st', 'bkh1825014f', 'ccccc', 'nishattasnim3377@gmail.com', '123', '0', 'pic.jpg'),
(27, 'kk', 'ee', 'iit', '2017-12', '111', 'ttt', 'ttt@gmail.com', '123', '99887', ''),
(28, 'nishat5', 'yesmin', 'IIT', '2017-18', 'bkh1825013f', 'bams5', 'tasnim1825006f5@gmail.com', '123', '0', 'pic.jpg'),
(31, 'nishat6', 'yesmin', 'IIT', '2017-18', '141414', 'bams9', 'nishattasnim3378@gmail.com', '123', '0', 'pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `b_id` (`b_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `recover_pass`
--
ALTER TABLE `recover_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recover_pass`
--
ALTER TABLE `recover_pass`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
