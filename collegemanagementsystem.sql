-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 12:05 PM
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
  `fmsId`        int(11)   NOT NULL,
  `fmsFacultyId` INT(11)            DEFAULT NULL,
  `fmsSubjectId` INT(11)            DEFAULT NULL,
  `fmsClass`     varchar(5)         DEFAULT NULL,
  `fmsSection`   varchar(5)         DEFAULT NULL,
  `fmsBatch`     varchar(5)         DEFAULT NULL,
  `fmsCreatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fmsUpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_member_subjects`
--

INSERT INTO `faculty_member_subjects` (`fmsId`, `fmsFacultyId`, `fmsSubjectId`, `fmsClass`, `fmsSection`, `fmsBatch`, `fmsCreatedAt`, `fmsUpdatedAt`)
VALUES
  (1, 3, 2, '3 Sem', '3CS-A', 'A1', '2017-09-13 14:36:15', '2017-09-13 09:06:15');

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
  `studentId`                    int(11)      NOT NULL,
  `studentName`                  varchar(50)           DEFAULT NULL,
  `studentRegNumber`             varchar(20)           DEFAULT NULL,
  `studentBranchId`              int(11)               DEFAULT NULL,
  `studentSem`                   VARCHAR(8)            DEFAULT NULL,
  `studentSemSection`            VARCHAR(8)            DEFAULT NULL,
  `studentSemBatch`              varchar(5)            DEFAULT NULL,
  `studentEmail`                 varchar(50)           DEFAULT NULL,
  `studentContact`               varchar(15)           DEFAULT NULL,
  `studentProfilePicture`        VARCHAR(500) NOT NULL DEFAULT '/img/user.png',
  `studentFatherName`            varchar(50)           DEFAULT NULL,
  `studentFatherContact`         varchar(15)           DEFAULT NULL,
  `studentFatherEmail`           varchar(50)           DEFAULT NULL,
  `studentFatherOccupation`      varchar(50)           DEFAULT NULL,
  `studentFatherIncome`          double                DEFAULT NULL,
  `studentMotherName`            varchar(50)           DEFAULT NULL,
  `studentMotherContact`         varchar(15)           DEFAULT NULL,
  `studentMotherEmail`           varchar(50)           DEFAULT NULL,
  `studentMotherOccupation`      varchar(50)           DEFAULT NULL,
  `studentMotherIncome`          double                DEFAULT NULL,
  `studentLocalGuardianName`     varchar(50)           DEFAULT NULL,
  `studentLocalGuardianContact`  varchar(15)           DEFAULT NULL,
  `studentLocalGuardianEmail`    varchar(50)           DEFAULT NULL,
  `studentLocalGuardianRelation` VARCHAR(20)           DEFAULT NULL,
  `studentResidentType`          varchar(10)           DEFAULT NULL,
  `studentLocalAddress`          varchar(200)          DEFAULT NULL,
  `studentPermanentAddress`      varchar(200)          DEFAULT NULL,
  `studentState`                 VARCHAR(50)           DEFAULT NULL,
  `studentCity`                  VARCHAR(30)           DEFAULT NULL,
  `studentPincode`               INT(11),
  `studentHobbies`               TEXT,
  `studentCreatedAt`             TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `studentUpdatedAt`             timestamp    NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentName`, `studentRegNumber`, `studentBranchId`, `studentSem`, `studentSemSection`, `studentSemBatch`, `studentEmail`, `studentContact`, `studentProfilePicture`, `studentFatherName`, `studentFatherContact`, `studentFatherEmail`, `studentFatherOccupation`, `studentFatherIncome`, `studentMotherName`, `studentMotherContact`, `studentMotherEmail`, `studentMotherOccupation`, `studentMotherIncome`, `studentLocalGuardianName`, `studentLocalGuardianContact`, `studentLocalGuardianEmail`, `studentLocalGuardianRelation`, `studentResidentType`, `studentLocalAddress`, `studentPermanentAddress`, `studentState`, `studentCity`, `studentPincode`, `studentHobbies`, `studentCreatedAt`, `studentUpdatedAt`)
VALUES
  (1, 'Sachin', 'PIET/CE/14/085', 2, '7 SEM', '7 CS-B', 'B2', '2014pietcssachin@poornima.org', '9024325912',
      '/img/user.png', 'Father Name', '9024325912', 'sachinmeena.dev@gmail.com', 'defence', 1000000, 'Mother Name',
                                      '9024325912', 'motheremail@gmail.com', 'house wifi', 10000000, NULL, NULL, NULL,
                                                                                                           NULL,
                                                                                                           'Hosteller',
                                                                                                           NULL, NULL,
                                                                                                           NULL, NULL,
                                                                                                           302022, NULL,
   '2017-09-12 13:43:27', '2017-09-12 05:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `studentAcademicId`         int(11) NOT NULL,
  `studentAcademicStudentId`  INT(11)        DEFAULT NULL,
  `studentAcademicPercentage` VARCHAR(50) NOT NULL,
  `studentAcademicBoard`      VARCHAR(50) NOT NULL,
  `studentAcademicMedium`     VARCHAR(50) NOT NULL,
  `studentAcademicSchoolName` VARCHAR(50) NOT NULL,
  `studentAcademicYOP`        DATE NOT NULL,
  `studentAcademicCreatedAt`  timestamp NULL DEFAULT NULL,
  `studentAcademicUpdatedAt`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_college_academics`
--

CREATE TABLE `student_college_academics` (
  `studentCollegeAcademicId`              INT(11)   NOT NULL,
  `studentCollegeAcademicStudentId`       INT(11)        DEFAULT NULL,
  `studentCollegeAcademicSemester`        VARCHAR(10)    DEFAULT NULL,
  `studentCollegeAcademicPercentage`      FLOAT          DEFAULT NULL,
  `studentCollegeAcademicBackCount`       INT(11)        DEFAULT '0',
  `studentCollegeAcademicBackSubjectCode` VARCHAR(50)    DEFAULT 'No Back Log',
  `studentCollegeAcademicCreatedAt`       TIMESTAMP NULL DEFAULT NULL,
  `studentCollegeAcademicUpdatedAt`       TIMESTAMP NULL DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

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
  `tutorId`        int(11) NOT NULL,
  `tutorFacultyId` INT(11)        DEFAULT NULL,
  `tutorClass`     varchar(5) NOT NULL,
  `tutorSection`   varchar(5) NOT NULL,
  `tutorBatch`     varchar(5) NOT NULL,
  `tutorCreatedAt` timestamp NULL DEFAULT NULL,
  `tutorUpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorId`, `tutorFacultyId`, `tutorClass`, `tutorSection`, `tutorBatch`, `tutorCreatedAt`, `tutorUpdatedAt`)
VALUES
  (1, 3, '3CS', '3CS-A', 'A1', '2017-09-11 01:58:41', '2017-09-11 01:58:46');

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
  ADD PRIMARY KEY (`fmsId`),
  ADD KEY `faculty_member_subjects_faculty_members_facultyMemberId_fk` (`fmsFacultyId`),
  ADD KEY `faculty_member_subjects_subjects_subjectId_fk` (`fmsSubjectId`);

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
  ADD PRIMARY KEY (`studentAcademicId`),
  ADD KEY `student_academics_students_studentId_fk` (`studentAcademicStudentId`);

--
-- Indexes for table `student_college_academics`
--
ALTER TABLE `student_college_academics`
  ADD PRIMARY KEY (`studentCollegeAcademicId`),
  ADD KEY `student_college_academics_students_studentId_fk` (`studentCollegeAcademicStudentId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutorId`),
  ADD KEY `tutors_faculty_members_facultyMemberId_fk` (`tutorFacultyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_userEmail_uindex` (`userEmail`),
  ADD UNIQUE KEY `users_userUniqueId_uindex` (`userUniqueId`),
  ADD KEY `users_roles_roleId_fk` (`userRoleId`);

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
  MODIFY `fmsId` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `studentAcademicId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_college_academics`
--
ALTER TABLE `student_college_academics`
  MODIFY `studentCollegeAcademicId` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorId` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD CONSTRAINT `faculty_member_subjects_faculty_members_facultyMemberId_fk` FOREIGN KEY (`fmsFacultyId`) REFERENCES `faculty_members` (`facultyMemberId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_member_subjects_subjects_subjectId_fk` FOREIGN KEY (`fmsSubjectId`) REFERENCES `subjects` (`subjectId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

--
-- Constraints for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD CONSTRAINT `student_academics_students_studentId_fk` FOREIGN KEY (`studentAcademicStudentId`) REFERENCES `students` (`studentId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

--
-- Constraints for table `student_college_academics`
--
ALTER TABLE `student_college_academics`
  ADD CONSTRAINT `student_college_academics_students_studentId_fk` FOREIGN KEY (`studentCollegeAcademicStudentId`) REFERENCES `students` (`studentId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_faculty_members_facultyMemberId_fk` FOREIGN KEY (`tutorFacultyId`) REFERENCES `faculty_members` (`facultyMemberId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_roleId_fk` FOREIGN KEY (`userRoleId`) REFERENCES `roles` (`roleId`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
