-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 11:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `attendancestatus` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `studentname`, `attendancestatus`, `datecreated`) VALUES
(1, 'student namestudent last', 'Present', '2022-10-09 00:00:00'),
(2, 'student namestudent last', 'Absent', '2022-10-09 00:00:00'),
(3, 'MohammedPlot10A BLK 3', 'Present', '2022-10-09 00:00:00'),
(4, 'MohammedPlot10A BLK 3', 'Absent', '2022-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `basicschools`
--

CREATE TABLE `basicschools` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `schooladdress` varchar(255) NOT NULL,
  `schoolcontactaddress` varchar(255) NOT NULL,
  `headteachername` varchar(255) NOT NULL,
  `headmastercode` varchar(255) NOT NULL,
  `schoolregion` varchar(255) NOT NULL,
  `schooldistrict` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basicschools`
--

INSERT INTO `basicschools` (`id`, `schoolname`, `schooladdress`, `schoolcontactaddress`, `headteachername`, `headmastercode`, `schoolregion`, `schooldistrict`, `createdat`) VALUES
(1, 'ANYAANO M/A JHS', 'ANYAANO KUMASI', 'MOSHIEZONGO@H.COM', 'PAUL OSOMAFOUR', '0009', 'ASHANTI', 'KUMASI METRO', '2022-10-03 19:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster`
--

CREATE TABLE `headmaster` (
  `id` int(11) NOT NULL,
  `headmastercode` varchar(255) NOT NULL,
  `headmastername` varchar(255) NOT NULL,
  `headmasteraddress` varchar(255) NOT NULL,
  `headmasterschool` varchar(255) NOT NULL,
  `headmasteremail` varchar(255) NOT NULL,
  `headmasterpassword` varchar(255) NOT NULL,
  `headmasterregion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headmaster`
--

INSERT INTO `headmaster` (`id`, `headmastercode`, `headmastername`, `headmasteraddress`, `headmasterschool`, `headmasteremail`, `headmasterpassword`, `headmasterregion`) VALUES
(1, '0009', 'Mohammed Amin Ibrahim', 'Plot10A BLK 3', 'ANYAANO M/A JHS', 'mohammedaminibrahim10@gmail.com', '$2y$10$6/KufC5aYNVy8rXgeFyVpey6YWNvslsiJwtvNLih/ENv.JpBL0ZOO', 'Ashanti');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentfirstname` varchar(255) NOT NULL,
  `studentlastname` varchar(255) NOT NULL,
  `studentclass` varchar(255) NOT NULL,
  `studentgender` varchar(255) NOT NULL,
  `guardianname` varchar(255) NOT NULL,
  `guardianrelationship` varchar(255) NOT NULL,
  `guardiancontact` varchar(255) NOT NULL,
  `guardianaddress` varchar(255) NOT NULL,
  `studentschool` varchar(255) NOT NULL,
  `headteacher` varchar(255) NOT NULL,
  `headteachercode` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentfirstname`, `studentlastname`, `studentclass`, `studentgender`, `guardianname`, `guardianrelationship`, `guardiancontact`, `guardianaddress`, `studentschool`, `headteacher`, `headteachercode`, `createdat`) VALUES
(2, 'student name', 'student last', 'Primary 6', 'Male', 'Guardian name', 'Father', 'Father', 'Plot10A BLK 3', 'ANYAANO M/A JHS', 'Mohammed Amin Ibrahim', '0009', '2022-10-06 09:50:17'),
(3, 'Mohammed', 'Plot10A BLK 3', 'Primary 6', 'Male', 'Guardian name', 'Mother', 'Mother', 'Sepe Boukrom', 'ANYAANO M/A JHS', 'Mohammed Amin Ibrahim', '0009', '2022-10-06 10:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacherfirstname` varchar(255) NOT NULL,
  `teacherlastname` varchar(255) NOT NULL,
  `teacherclass` varchar(255) NOT NULL,
  `teachergender` varchar(255) NOT NULL,
  `teacheremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `teacherncontact` varchar(255) NOT NULL,
  `teacheraddress` varchar(255) NOT NULL,
  `teacherschool` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacherfirstname`, `teacherlastname`, `teacherclass`, `teachergender`, `teacheremail`, `password`, `teacherncontact`, `teacheraddress`, `teacherschool`, `createdat`) VALUES
(1, 'Ibrahim', 'Samed', 'Primary 6', 'Male', 'mohammedaminibrahim10@gmail.com', '12345678', '0542095569', 'Plot10A BLK 3', 'ANYAANO M/A JHS', '2022-10-06 12:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `joinedat`) VALUES
(1, 'Mansah Musah', 'mansahmusah@gmail.com', '$2y$10$U2MKZkqLGlbrcRpqadB4Fu6bJGRuUGA9mhkF/TYZagjnesGfyAEuC', '2022-10-03 01:11:49'),
(2, 'Mohammed Amin Ibrahim', 'mohammedaminibrahim10@gmail.com', '$2y$10$zahmT86O9H/GE.Tqsr9E1uSF3Udri98haG3KiiTBO7x05Jp4/H8ai', '2022-10-03 01:37:34'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$6/KufC5aYNVy8rXgeFyVpey6YWNvslsiJwtvNLih/ENv.JpBL0ZOO', '2022-10-03 16:38:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basicschools`
--
ALTER TABLE `basicschools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmaster`
--
ALTER TABLE `headmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basicschools`
--
ALTER TABLE `basicschools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `headmaster`
--
ALTER TABLE `headmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



