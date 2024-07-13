-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 02:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `Certificate_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Course_Title` varchar(255) NOT NULL,
  `Certificate_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Course_Img` varchar(255) DEFAULT NULL,
  `Course_Title` varchar(255) DEFAULT NULL,
  `Course_Description` text DEFAULT NULL,
  `Course_Price` decimal(10,2) DEFAULT NULL,
  `Course_Start` date DEFAULT NULL,
  `Course_End` date DEFAULT NULL,
  `Course_Category` varchar(255) DEFAULT NULL,
  `TP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Img`, `Course_Title`, `Course_Description`, `Course_Price`, `Course_Start`, `Course_End`, `Course_Category`, `TP_ID`) VALUES
(2, 'https://www.shutterstock.com/image-photo/data-science-deep-learning-artificial-260nw-1247255884.jpg', 'Data Science Fundamentals', 'This is a data science course', 30.00, '2023-08-30', '2023-11-30', 'Computer Science', 1),
(3, 'https://yt3.googleusercontent.com/_nlyMx8RWF3h2aG8PslnqMobecnco8XjOBki7dL_nayZYfNxxFdPSp2PpxUytjN4VmHqb4XPtA=s900-c-k-c0x00ffffff-no-rj', 'League Of Legends', 'League course on becoming a pro', 23.00, '2023-07-16', '2023-09-09', 'E-Sport', 1),
(5, 'https://www.herzing.edu/sites/default/files/2020-09/how-to-become-software-engineer.jpg', 'Software Engineering', 'Teaches the fundamentals of Software Engineering', 33.00, '2023-08-23', '2024-02-27', 'Computer Science', 1),
(6, 'https://static.vecteezy.com/system/resources/thumbnails/006/899/440/small/data-protection-cyber-security-privacy-business-internet-technology-concept-free-photo.jpg', 'Cybersecurity course', 'This is a cybersecurity course', 30.00, '2023-07-02', '2023-07-30', 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `Course_ID` int(11) NOT NULL,
  `Instructor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`Course_ID`, `Instructor_ID`) VALUES
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 6),
(3, 8),
(3, 9),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `Instructor_ID` int(11) NOT NULL,
  `Instructor_Name` varchar(255) NOT NULL,
  `Instructor_email` varchar(255) NOT NULL,
  `Instructor_Password` varchar(255) NOT NULL,
  `Instructor_DOB` date NOT NULL,
  `Instructor_Gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Instructor_ID`, `Instructor_Name`, `Instructor_email`, `Instructor_Password`, `Instructor_DOB`, `Instructor_Gender`) VALUES
(6, 'Emad', 'Emad@gmail.com', 'Emad123', '2002-04-16', 'male'),
(7, 'Anas', 'Anas@gmail.com', 'Anas123', '2002-11-02', 'male'),
(8, 'Taha', 'Taha@gmail.com', 'Taha123', '2002-07-24', 'male'),
(9, 'Rawan', 'Rawan@gmail.com', 'Rawan123', '2002-08-14', 'female'),
(10, 'Bode', 'Bode@gmail.com', 'Bode123', '2002-02-25', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_availability`
--

CREATE TABLE `instructor_availability` (
  `Availability_ID` int(11) NOT NULL,
  `Instructor_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `IsAvailable` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_availability`
--

INSERT INTO `instructor_availability` (`Availability_ID`, `Instructor_ID`, `Course_ID`, `IsAvailable`) VALUES
(4, 6, 6, 'No'),
(5, 7, 6, 'Yes'),
(6, 6, 5, 'Yes'),
(7, 6, 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `training_providor`
--

CREATE TABLE `training_providor` (
  `TP_ID` int(11) NOT NULL,
  `TP_Name` varchar(255) NOT NULL,
  `TP_Email` varchar(255) NOT NULL,
  `TP_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_providor`
--

INSERT INTO `training_providor` (`TP_ID`, `TP_Name`, `TP_Email`, `TP_Password`) VALUES
(1, 'MMU', 'MMU@gmail.com', '1234567'),
(2, 'XMUM', 'XMUM@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Full_Name`, `email`, `Password`, `DOB`, `Gender`, `Country`) VALUES
(6, 'Iskanth', 'Iskanth123@gmail.com', 'iskanth123', '2002-04-15', 'male', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `UserCourse_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`UserCourse_ID`, `User_ID`, `Course_ID`) VALUES
(19, 6, 6),
(20, 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`Certificate_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `TP_ID` (`TP_ID`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`Course_ID`,`Instructor_ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Instructor_ID`);

--
-- Indexes for table `instructor_availability`
--
ALTER TABLE `instructor_availability`
  ADD PRIMARY KEY (`Availability_ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `training_providor`
--
ALTER TABLE `training_providor`
  ADD PRIMARY KEY (`TP_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`UserCourse_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `Certificate_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instructor_availability`
--
ALTER TABLE `instructor_availability`
  MODIFY `Availability_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training_providor`
--
ALTER TABLE `training_providor`
  MODIFY `TP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `UserCourse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`TP_ID`) REFERENCES `training_providor` (`TP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
