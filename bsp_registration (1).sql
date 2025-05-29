-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 09:00 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acccountID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `schoolID` varchar(255) NOT NULL,
  `account_first_name` varchar(255) NOT NULL,
  `account_middle_name` varchar(255) NOT NULL,
  `account_last_name` varchar(255) NOT NULL,
  `account_grade` varchar(10) NOT NULL,
  `account_section` varchar(255) NOT NULL,
  `account_photo` varchar(255) NOT NULL,
  `account_barangay` varchar(255) NOT NULL,
  `account_city` varchar(255) NOT NULL,
  `account_province` varchar(255) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_phone` varchar(15) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acccountID`, `userID`, `schoolID`, `account_first_name`, `account_middle_name`, `account_last_name`, `account_grade`, `account_section`, `account_photo`, `account_barangay`, `account_city`, `account_province`, `account_email`, `account_phone`, `date_registered`) VALUES
(5, 14, '1865653322', 'John', 'Jacob', 'Smith', 'N/A', 'N/A', 'pexels-olly-3824771.jpg', 'Balangasan', 'Pagadian City', 'Zamboanga Del Sur', 'beastmodejohn556@gmail.com', '09635662358', '2024-08-28 12:45:11'),
(6, 15, '1865653322', 'Wilhelm', 'F', 'Dafoe', 'N/A', 'N/A', 'd54ed7505c4392f202f96715b42ce7e7.jpg', 'Tuburan', 'Pagadian City', 'Zamboanga del Sur', 'wildafoe@gmail.com', '09535665696', '2024-08-29 02:18:29'),
(7, 16, '1865653322', 'Kei', '', 'Nagai', 'N/A', 'N/A', '4e163e57-f5e3-4561-b0b2-4368a383b0f5.jpg', 'Paglaum', 'Pagadian city', 'Zamboanga del Sur', 'keinaagai@gmail.com', '09502336521', '2024-08-29 05:24:42'),
(8, 17, '1865653322', 'Mark', 'J', 'Acobs', 'N/A', 'N/A', 'SLAYER, Hary Istiyoso.jpg', 'Paglaum', 'Pagadian City', 'Zamboanga del Sur', 'juntado38@gmail.com', '09505523654', '2024-08-29 12:48:28'),
(9, 18, '1865653322', 'Michael', 'Gonzalo', 'Salamanca', 'N/A', 'N/A', 'man.png', 'Balangasan', 'Pagadian city', 'Zamboanga del sur', 'mikesalamanca12312312@gmail.com', '09507056235', '2025-01-02 09:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtID` int(11) NOT NULL,
  `district_number` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtID`, `district_number`, `date_created`) VALUES
(1, 1, '2025-04-27'),
(2, 2, '2025-04-27'),
(4, 3, '2025-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `page_information`
--

CREATE TABLE `page_information` (
  `address` varchar(255) NOT NULL,
  `contact_globe` varchar(255) NOT NULL,
  `contact_smart` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_information`
--

INSERT INTO `page_information` (`address`, `contact_globe`, `contact_smart`, `contact_email`) VALUES
('Sto. Niño, Pagadian City, Zamboanga del Sur', '0909-090-9090', '0909-123-9382', 'pagadianbsp@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolID` varchar(255) NOT NULL,
  `districtID` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `date_registered` date NOT NULL DEFAULT current_timestamp(),
  `school_address` varchar(255) NOT NULL,
  `school_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `districtID`, `school_name`, `date_registered`, `school_address`, `school_contact`) VALUES
('1865653322', 1, 'Balangasan Elementary School', '2024-08-29', 'West Capitol Road, Balangasan, Pagadian City', '09090909090');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `syID` int(11) NOT NULL,
  `school_year_start` year(4) NOT NULL,
  `school_year_end` year(4) NOT NULL,
  `semester` enum('1','2','summer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`syID`, `school_year_start`, `school_year_end`, `semester`) VALUES
(1, '2024', '2025', '1'),
(2, '2024', '2025', '2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `school_year_ID` int(11) NOT NULL,
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

INSERT INTO `student` (`studentID`, `school_year_ID`, `schoolID`, `student_first_name`, `student_middle_name`, `student_last_name`, `student_grade`, `student_section`, `student_rank`, `student_photo`, `student_barangay`, `student_city`, `student_province`, `student_email`, `student_phone`, `student_emergency_guardian`, `student_emergency_phone`, `student_emergency_address`, `date_registered`) VALUES
(1, 2, '1865653322', 'Jack', 'N', 'Poy', '3', 'Naraka', 'Growing Usa', 'soil.png', '7th gate', 'Hell ', 'Norway', 'jackthereaper@gmail.com', '095326686569', 'John_Dasmodeus@gmail.com', '095656665321', '7th Gate@gmail.com', '2024-06-19 12:22:34'),
(4, 1, '1865653322', 'Rock', 'M', 'Lee', '3', 'B', 'Growing Usa', 'download (2).jpg', 'Buena Vista', 'Pagadian City', 'Zamboanga del sur', 'rocklee@gmail.com', '09565336584', 'Might Gai', '09656336548', 'Buena Vista, Pagadian City', '2024-08-29 02:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `teacher_photo` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_number` varchar(20) NOT NULL,
  `contact_person_address` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_year_ID` int(11) NOT NULL,
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
(14, 'admin', '1234', 'admin', 'John  Smith'),
(15, 'teacher', '1234', 'teacher', 'Wilhelm  Dafoe'),
(16, 'it_coordinator', '1234', 'it_coordinator', 'Kei  Nagai'),
(17, 'school_coordinator', '1234', 'school_coordinator', 'Calvin Klein'),
(18, 'troop_leader', '1234', 'troop_leader', 'Michael  Salamanca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acccountID`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolID`),
  ADD KEY `districtID` (`districtID`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`syID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `syID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`schoolID`) REFERENCES `school` (`schoolID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
