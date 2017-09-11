-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 06:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_branches`
--

CREATE TABLE `college_branches` (
  `collegeBranchId` int(11) NOT NULL,
  `collegeBranchName` varchar(60) NOT NULL,
  `collegeBranchAbbr` varchar(60) NOT NULL,
  `collegeBranchCreatedAt` timestamp NULL DEFAULT NULL,
  `collegeBranchUpdatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_branches`
--

INSERT INTO `college_branches` (`collegeBranchId`, `collegeBranchName`, `collegeBranchAbbr`, `collegeBranchCreatedAt`, `collegeBranchUpdatedAt`) VALUES
(1, 'Civil Engineering', 'CE', '2017-06-20 12:43:11', '2017-06-20 12:43:11'),
(2, 'Computer Engineering', 'CS', '2017-06-20 12:43:20', '2017-06-20 12:43:20'),
(3, 'Electronic and Communication Engineering', 'ECE', '2017-06-26 02:17:46', '2017-06-26 02:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `facultyMemberId` int(11) NOT NULL,
  `facultyMemberName` varchar(50) NOT NULL,
  `facultyMemberBranchId` int(11) NOT NULL,
  `facultyMemberCurrentBranchId` int(11) DEFAULT NULL,
  `facultyMemberDesignation` varchar(50) NOT NULL,
  `facultyMemberContact` varchar(15) NOT NULL,
  `facultyMemberEmail` varchar(60) NOT NULL,
  `facultyMemberCreatedAt` timestamp NULL DEFAULT NULL,
  `facultyMemberUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`facultyMemberId`, `facultyMemberName`, `facultyMemberBranchId`, `facultyMemberCurrentBranchId`, `facultyMemberDesignation`, `facultyMemberContact`, `facultyMemberEmail`, `facultyMemberCreatedAt`, `facultyMemberUpdatedAt`) VALUES
(1, 'Paras Bassi', 2, 2, 'Project Manager', '12345678', 'paras.bassi@poornima.org', '2017-06-21 11:40:30', '2017-06-26 02:16:49'),
(2, 'civ fac 1', 1, 1, 'assistant professor', '123456', 'civfac1@poornima.org', '2017-06-25 19:58:47', '2017-06-26 02:16:13'),
(3, 'cs fac 2', 2, 2, 'assistant professor', '123456', 'csfac2@poornima.org', '2017-06-25 19:59:15', '2017-06-26 02:17:25'),
(4, 'csfac3', 2, 2, 'assistant professor', '1234567', 'csfac3@poornima.org', '2017-06-25 19:59:41', '2017-06-26 02:17:09'),
(5, 'Swapnil Jain', 3, 2, 'Assistant Professor', '123456486', 'swapnil@poornima.org', '2017-06-26 02:18:26', '2017-06-26 02:18:26'),
(6, 'HOD', 2, 2, 'Assistant Professor', '12345678', '2014pietcssachin@poornima.org', '2017-06-26 02:18:26', '2017-06-26 02:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member_subjects`
--

CREATE TABLE `faculty_member_subjects` (
  `fmsId` int(11) NOT NULL,
  `fmsFacultyId` int(11) NOT NULL,
  `fmsSubjectId` int(11) NOT NULL,
  `fmsClass` varchar(5) DEFAULT NULL,
  `fmsSection` varchar(5) DEFAULT NULL,
  `fmsBatch` varchar(5) DEFAULT NULL,
  `fmsCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fmsUpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleType` varchar(20) NOT NULL,
  `roleCreatedAt` timestamp NULL DEFAULT NULL,
  `roleUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleType`, `roleCreatedAt`, `roleUpdatedAt`) VALUES
(1, 'Admin', '2017-06-16 04:44:47', '2017-06-16 05:31:13'),
(2, 'HOD', '2017-06-16 04:44:47', '2017-06-16 05:31:13'),
(3, 'Tutor', '2017-06-16 04:44:47', '2017-06-16 05:31:13'),
(4, 'Faculty', '2017-06-16 04:44:47', '2017-06-16 05:31:13'),
(5, 'Placement', '2017-06-16 04:44:47', '2017-06-16 05:31:13'),
(8, 'Jerry Parul', '2017-06-18 21:57:02', '2017-06-20 12:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `studentName` varchar(50) DEFAULT NULL,
  `studentRegNumber` varchar(20) DEFAULT NULL,
  `studentBranchId` int(11) DEFAULT NULL,
  `studentSem` int(11) DEFAULT NULL,
  `studentSemSection` char(1) DEFAULT NULL,
  `studentSemBatch` varchar(5) DEFAULT NULL,
  `studentEmail` varchar(50) DEFAULT NULL,
  `studentContact` varchar(15) DEFAULT NULL,
  `studentFatherName` varchar(50) DEFAULT NULL,
  `studentFatherContact` varchar(15) DEFAULT NULL,
  `studentFatherEmail` varchar(50) DEFAULT NULL,
  `studentFatherOccupation` varchar(50) DEFAULT NULL,
  `studentFatherIncome` double DEFAULT NULL,
  `studentMotherName` varchar(50) DEFAULT NULL,
  `studentMotherContact` varchar(15) DEFAULT NULL,
  `studentMotherEmail` varchar(50) DEFAULT NULL,
  `studentMotherOccupation` varchar(50) DEFAULT NULL,
  `studentMotherIncome` double DEFAULT NULL,
  `studentLocalGuardianName` varchar(50) DEFAULT NULL,
  `studentLocalGuardianContact` varchar(15) DEFAULT NULL,
  `studentLocalGuardianEmail` varchar(50) DEFAULT NULL,
  `studentResidentType` varchar(10) DEFAULT NULL,
  `studentLocalAddress` varchar(200) DEFAULT NULL,
  `studentPermanentAddress` varchar(200) DEFAULT NULL,
  `studentCreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `studentUpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `studentAcademicId` int(11) NOT NULL,
  `studentAcademicStudentId` int(11) NOT NULL,
  `studentAcademicSecPercentage` varchar(50) NOT NULL,
  `studentAcademicSecBoard` varchar(50) NOT NULL,
  `studentAcademicSecMedium` varchar(50) NOT NULL,
  `studentAcademicSecSchoolName` varchar(50) NOT NULL,
  `studentAcademicSrSecPercentage` varchar(50) NOT NULL,
  `studentAcademicSrSecBoard` varchar(50) NOT NULL,
  `studentAcademicSrSecMedium` varchar(50) NOT NULL,
  `studentAcademicSrSecSchoolName` varchar(50) NOT NULL,
  `studentAcademicDiplomaPercentage` varchar(50) DEFAULT NULL,
  `studentAcademicDiplomaBoard` varchar(50) DEFAULT NULL,
  `studentAcademicDiplomaMedium` varchar(50) DEFAULT NULL,
  `studentAcademicDiplomaInstituteName` varchar(50) DEFAULT NULL,
  `studentAcademicCollegeAgg` varchar(50) NOT NULL,
  `studentAcademicCollegeBackCount` int(11) NOT NULL DEFAULT '0',
  `studentAcademicCollegeBackSubject` varchar(50) DEFAULT NULL,
  `studentAcademicHobbies` varchar(50) NOT NULL,
  `studentAcademicCreatedAt` timestamp NULL DEFAULT NULL,
  `studentAcademicUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` int(11) NOT NULL,
  `subjectName` varchar(30) NOT NULL,
  `subjectAbbr` varchar(10) NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `subjectCreatedAt` timestamp NULL DEFAULT NULL,
  `subjectUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `subjectName`, `subjectAbbr`, `subjectCode`, `subjectCreatedAt`, `subjectUpdatedAt`) VALUES
(1, 'Linux And Shell Programming', 'LSP', '3CS3', '2017-06-20 13:23:47', '2017-06-20 13:23:47'),
(2, 'oops', 'oop', '3cs6', '2017-06-25 20:00:34', '2017-06-25 20:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutorId` int(11) NOT NULL,
  `tutorFacultyId` int(11) NOT NULL,
  `tutorClass` varchar(5) NOT NULL,
  `tutorSection` varchar(5) NOT NULL,
  `tutorBatch` varchar(5) NOT NULL,
  `tutorCreatedAt` timestamp NULL DEFAULT NULL,
  `tutorUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userUniqueId` varchar(23) DEFAULT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userRoleId` int(11) DEFAULT NULL,
  `userCreatedAt` timestamp NULL DEFAULT NULL,
  `userUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userUniqueId`, `userName`, `userEmail`, `userRoleId`, `userCreatedAt`, `userUpdatedAt`) VALUES
(1, '5943c1e3e99d61.47959611', 'Admin', 'sachinmeena.dev@gmail.com', 1, '2017-06-16 06:02:51', '2017-06-25 21:36:06'),
(2, '59475ed5e441d6.17918151', 'HOD', '2014pietcssachin@poornima.org', 2, '2017-06-18 23:49:17', '2017-06-25 19:58:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_branches`
--
ALTER TABLE `college_branches`
  ADD PRIMARY KEY (`collegeBranchId`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`facultyMemberId`);

--
-- Indexes for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD PRIMARY KEY (`fmsId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`),
  ADD UNIQUE KEY `students_studentRegNumber_uindex` (`studentRegNumber`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`studentAcademicId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutorId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_userEmail_uindex` (`userEmail`),
  ADD UNIQUE KEY `users_userUniqueId_uindex` (`userUniqueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_branches`
--
ALTER TABLE `college_branches`
  MODIFY `collegeBranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `facultyMemberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  MODIFY `fmsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `studentAcademicId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
