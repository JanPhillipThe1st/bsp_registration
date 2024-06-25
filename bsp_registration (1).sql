-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 02:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsp_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `syID` int(11) NOT NULL,
  `school_year_start` year(4) NOT NULL,
  `school_year_end` year(4) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`syID`, `school_year_start`, `school_year_end`, `semester`) VALUES
(1, '2024', '2025', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `schoolID` varchar(255) NOT NULL,
  `student_first_name` varchar(255) NOT NULL,
  `student_middle_name` varchar(255) NOT NULL,
  `student_last_name` varchar(255) NOT NULL,
  `student_grade` varchar(10) NOT NULL,
  `student_section` varchar(255) NOT NULL,
  `student_rank` enum('Growing Usa','Leaping Usa','Tender Foot','2nd Class','1st Class','Explorer','Path Finder','Outdoorsman','Venturer','Eagle') NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `student_barangay` varchar(255) NOT NULL,
  `student_city` varchar(255) NOT NULL,
  `student_province` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(15) NOT NULL,
  `student_emergency_guardian` varchar(255) NOT NULL,
  `student_emergency_phone` varchar(15) NOT NULL,
  `student_emergency_address` varchar(255) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `schoolID`, `student_first_name`, `student_middle_name`, `student_last_name`, `student_grade`, `student_section`, `student_rank`, `student_photo`, `student_barangay`, `student_city`, `student_province`, `student_email`, `student_phone`, `student_emergency_guardian`, `student_emergency_phone`, `student_emergency_address`, `date_registered`) VALUES
(1, '1', 'Jack', 'N', 'Poy', '3', 'Naraka', 'Growing Usa', 'soil.png', '7th gate', 'Hell ', 'Norway', 'jacknjortingit@gmail.com', '095326686569', 'John_Dasmodeus@gmail.com', '095656665321', '7th Gate@gmail.com', '2024-06-19 12:22:34'),
(3, '1', 'Michael', 'T', 'Milagro', '4', 'Rose', 'Growing Usa', 'field.png', 'Sto. Nino', 'Pagadian City', 'Zamboanga del Sur', 'mtmiracle3555@gmail.com', '09555555555555', 'asd', 'asd', 'asd', '2024-06-20 13:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `teacher_first_name` int(11) NOT NULL,
  `teacher_middle_name` int(11) NOT NULL,
  `teacher_last_name` varchar(255) NOT NULL,
  `teacher_grade` varchar(10) NOT NULL,
  `teacher_section` varchar(255) NOT NULL,
  `teacher_rank` varchar(255) NOT NULL,
  `teacher_photo` varchar(255) NOT NULL,
  `teacher_barangay` varchar(255) NOT NULL,
  `teacher_city` varchar(255) NOT NULL,
  `teacher_province` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_phone` varchar(15) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_type` enum('teacher','admin','it_coordinator','school_coordinator','troop_leader') NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `access_type`, `full_name`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin'),
(2, 'teacher', 'teacher', 'teacher', 'Maria DB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`syID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `syID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
