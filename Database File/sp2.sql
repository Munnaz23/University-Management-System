-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 07:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `marks` int(5) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `st_id`, `marks`, `sub`, `semester`) VALUES
(73, 200101023, 81, 'DBMS', '1st'),
(74, 200101023, 66, 'DBMS Lab', '1st'),
(75, 200101023, 32, 'Programming', '1st'),
(76, 200101023, 78, 'Programming Lab', '1st'),
(79, 200101008, 70, 'DBMS Lab', '1st'),
(80, 200101013, 66, 'DBMS', '1st'),
(81, 200101013, 64, 'DBMS Lab', '1st'),
(82, 200101013, 69, 'Mathematics', '1st'),
(83, 200101013, 46, 'Programming', '1st'),
(84, 200101013, 53, 'Programming Lab', '1st'),
(85, 200101008, 67, 'Programming Lab', '1st'),
(86, 200202010, 41, 'DBMS', '1st'),
(87, 200202010, 55, 'DBMS Lab', '1st'),
(88, 200202010, 81, 'Mathematics', '1st'),
(89, 200202010, 77, 'Programming', '1st'),
(90, 200202010, 70, 'Programming Lab', '1st'),
(91, 200202013, 78, 'DBMS', '1st'),
(92, 200202013, 76, 'DBMS Lab', '1st'),
(93, 200202013, 59, 'Mathematics', '1st'),
(94, 200202013, 66, 'Programming', '1st'),
(95, 200202013, 74, 'Programming Lab', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `st_info`
--

CREATE TABLE `st_info` (
  `st_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(15) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_info`
--

INSERT INTO `st_info` (`st_id`, `name`, `password`, `email`, `bday`, `program`, `contact`, `gender`, `address`, `img`) VALUES
('200101008', 'Mansura Akter Mim', '123', 'mim@gmail.com', '2000-01-01', 'B.Sc in CSE', '01144587963', 'Female', 'Saidpur', NULL),
('200101013', 'Mohammad Sajjad', '123', 'sajjad.sendmail@gmail.com', '2000-01-01', 'B.Sc in CSE', '01700606109', 'Male', 'Saidpur', NULL),
('200101023', 'Md Munna Islam', '123', 'munna@gmail.com', '2000-01-01', 'B.Sc in CSE', '01566328975', 'Male', 'Saidpur', NULL),
('200202010', 'Ashraf', '123', 'ashraf@gmail.com', '2000-01-01', 'B.Sc in CSE', '01122587411', 'Male', 'Bangladesh', NULL),
('200202013', 'Jannati', '123', 'jannati@gmail.com', '2000-01-01', 'B.Sc in CSE', '01455789632', 'Female', 'Bangladesh', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_info`
--
ALTER TABLE `st_info`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
