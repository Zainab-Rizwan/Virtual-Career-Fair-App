-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 04:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career_fair_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_signup`
--

CREATE TABLE `admin_signup` (
  `ID` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contactNo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`ID`, `name`, `email`, `password`, `contactNo`) VALUES
(1, 'saba', 'sabasaeed367@gmail.com', '123', 5566),
(2, 'saba', 'sabasaeed398@gmail.com', '123', 32365236);

-- --------------------------------------------------------

--
-- Table structure for table `fairs`
--

CREATE TABLE `fairs` (
  `ID` int(250) NOT NULL,
  `admin_id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fairs`
--

INSERT INTO `fairs` (`ID`, `admin_id`, `title`, `description`, `date`, `start_time`, `end_time`) VALUES
(5, 1, 'jan', 'hiii ', '2021-10-24', '13:19:00.000000', '13:19:00.000000'),
(6, 1, 'Jan Fair', 'hello ', '2021-10-24', '13:24:00.000000', '13:24:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `ID` int(250) NOT NULL,
  `rec_id` int(250) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `job_des` varchar(250) NOT NULL,
  `salary` int(50) NOT NULL,
  `emp_type` text NOT NULL,
  `job_type` text NOT NULL,
  `job_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `rec_id`, `job_title`, `job_des`, `salary`, `emp_type`, `job_type`, `job_cat`) VALUES
(1, 0, 'sab', 'sab', 0, 'Full-time', 'Fellowship', ''),
(2, 0, 'mubeen', 'Heelo', 5000, 'Part-time', 'Graduate school', ''),
(3, 0, 'saba', 'lll', 500, 'Part-time', 'Graduate school', 'Array'),
(4, 0, 'saba', 'lll', 500, 'Part-time', 'Graduate school', 'Array'),
(5, 0, 'saba', 'lll', 500, 'Part-time', 'Graduate school', 'Array'),
(6, 0, 'mubeen', 'hey', 50, 'Full-time', 'Cooperative Education', 'Array'),
(7, 0, 'amna', 'hi', 52, 'Seasonal', 'Fellowship', 'Array'),
(8, 0, 'amna', 'hi', 52, 'Seasonal', 'Fellowship', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_signup`
--

CREATE TABLE `recruiter_signup` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `company` varchar(50) NOT NULL,
  `company_category` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruiter_signup`
--

INSERT INTO `recruiter_signup` (`ID`, `name`, `email`, `password`, `company`, `company_category`, `city`, `address`) VALUES
(1, 'saba', 'sabasaeed@gmail.com', '123', 'devsink', 'Multi-National', 'lahore', 'pakistan'),
(2, 'amna', 'amnanaz@gmail.com', '456', 'Devsinc', 'National', 'lahore', 'pakistan'),
(3, 'mubeen', 'mubeen@gmail.com', '123', 'Devsinc', 'National', 'lahore', 'pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `image` varbinary(255) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `institute_email` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `cnic_number` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `current_country` varchar(255) NOT NULL,
  `current_city` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `permanent_country` varchar(255) NOT NULL,
  `permanent_city` varchar(255) NOT NULL,
  `degree_type` varchar(255) NOT NULL,
  `degree_title` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `completion` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `checkbox` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_signup`
--

CREATE TABLE `student_signup` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` text NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `education` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_signup`
--

INSERT INTO `student_signup` (`ID`, `name`, `email`, `password`, `gender`, `contactNo`, `city`, `country`, `education`, `experience`) VALUES
(14, 'mubeen', 'mubeensaeed@gmail.com', '456', 'Female', '03219487227', 'lahore', 'pakistan', 'Intermediate', 'Mid-Level');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_signup`
--
ALTER TABLE `admin_signup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fairs`
--
ALTER TABLE `fairs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recruiter_signup`
--
ALTER TABLE `recruiter_signup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_signup`
--
ALTER TABLE `student_signup`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_signup`
--
ALTER TABLE `admin_signup`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fairs`
--
ALTER TABLE `fairs`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recruiter_signup`
--
ALTER TABLE `recruiter_signup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_signup`
--
ALTER TABLE `student_signup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
