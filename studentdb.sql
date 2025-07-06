-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `sid` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ph` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `section` varchar(3) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `faculty` varchar(15) DEFAULT NULL,
  `father` varchar(50) DEFAULT NULL,
  `mother` varchar(50) DEFAULT NULL,
  `parent_ph` varchar(10) DEFAULT NULL,
  `guardian` varchar(50) DEFAULT NULL,
  `guardian_ph` varchar(10) DEFAULT NULL,
  `relation` varchar(20) DEFAULT NULL,
  `fees` varchar(10) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`sid`, `fname`, `lname`, `dob`, `gender`, `email`, `ph`, `address`, `profile`, `grade`, `section`, `year`, `faculty`, `father`, `mother`, `parent_ph`, `guardian`, `guardian_ph`, `relation`, `fees`, `remarks`) VALUES
(1, 'ARPIT', 'KARNA', '2007-02-08', 'MALE', 'arpitkarna8a@gmail.com', '9766597787', 'Pokhara', 'profile_pictures/pp.png', 12, 'DB2', 2082, 'science', 'DIWAKAR KUMAR KARNA', 'MANITA KARNA', '9856057137', '', '', '', 'paid', 'DONE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
