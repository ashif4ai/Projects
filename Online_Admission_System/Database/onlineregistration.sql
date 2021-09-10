-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 01:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pin` int(4) NOT NULL,
  `registeredOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `userType`, `admin_username`, `adminName`, `admin_email`, `admin_pin`, `registeredOn`) VALUES
(6, 'admin', 'test@gmail.com', 'Ashif Ali', 'test@gmail.com', 1234, '2021-05-01 17:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `specializationId` int(10) NOT NULL,
  `shortlisted` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `appliedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `username`, `specializationId`, `shortlisted`, `remark`, `appliedDate`) VALUES
(45, 'test@gmail.com', 1, 'Rejected', '', '2021-05-01 17:32:16'),
(48, 'raj@gmail.com', 15, 'Rejected', '', '2021-05-05 16:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`) VALUES
(3, 'Agriculture'),
(4, 'Basic Sciences'),
(5, 'Computer Application'),
(6, 'Diploma in Dental'),
(7, 'Engineering'),
(8, 'Hotel Management'),
(9, 'Law'),
(10, 'Management'),
(11, 'Medical/Paramedical Courses'),
(12, 'Nursing'),
(13, 'Pharmacy'),
(14, 'Physiotherapy');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specializationId` int(11) NOT NULL,
  `courseId` int(10) NOT NULL,
  `specializationName` varchar(30) NOT NULL,
  `courseDuration` int(5) NOT NULL,
  `courseFee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specializationId`, `courseId`, `specializationName`, `courseDuration`, `courseFee`) VALUES
(1, 5, 'BCA', 3, '2.0'),
(2, 5, 'MCA', 2, '2.9'),
(3, 3, 'B.Sc (Hons) - Agriculture', 2, '4.4'),
(4, 3, 'B.Sc (Hons) - Agriculture Inte', 6, '5.6'),
(5, 4, 'B.Sc. (Hons.) - Bio-Technology', 3, '1.6'),
(6, 4, 'B.Sc Food Science ', 3, '1.6'),
(7, 6, 'Diploma (Dental Hygienist)', 2, '1.15'),
(8, 7, 'B. Tech. (Bio-Technology)', 4, '5.97'),
(9, 7, 'B. Tech. (Computer Science and', 4, '5.97'),
(10, 8, 'B.Sc. (Food Science)- Nutritio', 1, '0.43'),
(11, 8, 'Diploma in Airlines Tourism an', 1, '0.43'),
(14, 9, 'B.Com LLB', 5, '3.45'),
(15, 9, 'LLM', 1, '0.66'),
(16, 10, 'B.Com (Hons.)', 3, '2.32'),
(17, 10, 'MBA', 2, '2.58'),
(18, 11, 'B.Sc. (MLT) (Lateral Entry)', 2, '1.43'),
(19, 11, 'M.Sc. (OTT)', 2, '1.36'),
(20, 12, 'B.Sc. (Nursing)', 4, '3.70'),
(21, 12, 'P.B.B.Sc. (Nursing)', 2, '1.77'),
(22, 13, 'B.Pharma', 4, '4.37'),
(23, 13, 'Pharm-D', 6, '9.67'),
(24, 14, 'MPT', 2, '1.67'),
(25, 14, 'BPT', 4, '3.62');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `studentName` varchar(30) NOT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `dateOfBirth` varchar(20) NOT NULL,
  `mobileNumber` varchar(10) DEFAULT NULL,
  `emailId` varchar(50) NOT NULL,
  `higherQualification` varchar(30) DEFAULT NULL,
  `examinationBoard` varchar(30) DEFAULT NULL,
  `passingPercentage` float DEFAULT NULL,
  `passingYear` int(4) DEFAULT NULL,
  `pin` int(4) NOT NULL,
  `registeredOn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `studentName`, `fatherName`, `motherName`, `dateOfBirth`, `mobileNumber`, `emailId`, `higherQualification`, `examinationBoard`, `passingPercentage`, `passingYear`, `pin`, `registeredOn`) VALUES
(34, 'test@gmail.com', 'ASHIF ALI', 'MD ALI 2', 'K KHATOON', '2021-05-05', '1111111111', 'test@gmail.com', 'Less than high school', 'BSEB 2', 85.99, 2021, 0, '2021-05-01 17:30:55'),
(35, 'raj@gmail.com', 'Raj Kumar', 'Ravi Kumar', 'SIta Devi', '1999-01-01', '7548748574', 'raj@gmail.com', 'Masters. degree', 'CBSE', 70.55, 1994, 1234, '2021-05-05 16:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`),
  ADD UNIQUE KEY `studentId` (`username`),
  ADD KEY `specializationId` (`specializationId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specializationId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specializationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`specializationId`) REFERENCES `specialization` (`specializationId`);

--
-- Constraints for table `specialization`
--
ALTER TABLE `specialization`
  ADD CONSTRAINT `specialization_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
