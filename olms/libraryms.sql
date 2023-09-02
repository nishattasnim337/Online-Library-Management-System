-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 04:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
(1, 'btbb', 'fbtr', 'ACCE', 'nishat1', 'tasnim123@gmail.com', '111', 111111, 'nishat1.jpg'),
(2, 'nishat', 'tasnim', 'IIT', 'nishat', 'tasnim@gmail.com', '12345', 987643344, 'nishat.jpg');

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
(1, 'Math', 'Seymour Lipschutz', '6th', 'available', 15, 'IIT'),
(6, 'Principle of Electronics ', 'V.K mehta, Rohit Metha', '3rd', 'Available ', 5, 'EEE'),
(7, 'Math', 'Seymour Lipschutz', '8th', 'Available ', 15, 'ICE'),
(8, 'Classical Mechanics', 'Upadhyaya, Himalaya Publishing House', '3rd', 'Available ', 10, 'EEE'),
(9, 'Fundamentals of Electromagnetic Theory', 'Khunita, PHI', '4th', 'Available ', 7, 'EEE'),
(10, 'Engineering Mathematics', 'Reena Garg, Khanna Book Publishing', '3rd', 'Available ', 5, 'CSTE'),
(11, 'Mac', 'Bjarne Stroustrup', '10th', 'Available ', 12, 'Math');

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
(1, 'nishat123', '123654', '2021-02-27', 7, 35);

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
('nishat123', 11, 'Expired', '2021-02-17', '2021-02-22'),
('Rumi11', 8, 'Expired', '2021-02-28', '2021-03-04');

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
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `f_name`, `l_name`, `department`, `session_year`, `roll`, `username`, `email`, `password`, `contract`, `pic`) VALUES
(1, 'nishat', 'tasnim', 'IIT', '2017-18', '123654', 'nishat123', 'tasnim@gmail.com', '123', '0', 'nishat123.jpg'),
(2, 'Rumi', 'Rani', 'ACCE', '2014-15', 'bkh1825006f', 'Rumi11', 'tasnim123@gmail.com', '123', '987643344', 'Rumi11.jpg'),
(3, 'tamim', 'ahmed', 'ACCE', '2015-16', '123654', 'suvo', 'tamim123@gmail.com', '123', '0', ''),
(4, 'aaaa', 'aaa', 'ACCE', '2016-17', 'bkh1825006f', 'Rumi111', 'rumi12356@gmail.com', '12345', '0', 'pic.jpg'),
(5, 'tamim', 'ahmed', 'ACCE', '2014-15', 'bkh1825006f', 'suvo11', 'tamim1234@gmail.com', '12345', '0', 'pic.jpg'),
(6, 'sss', 'ssss', 'ICE', '2017-18', '23432', 'Rumi12', 'tamim124@gmail.com', '1111', '0', 'pic.jpg');

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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
