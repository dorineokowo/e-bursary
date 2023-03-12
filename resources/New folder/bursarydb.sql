-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2021 at 08:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicantbursarytable`
--

CREATE TABLE `applicantbursarytable` (
  `bursaryID` varchar(50) NOT NULL,
  `bursaryAmount` float NOT NULL,
  `awardingBursaryOrg` varchar(200) NOT NULL,
  `bursaryAttachment` varchar(200) NOT NULL,
  `applicantID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicantfamilystatus`
--

CREATE TABLE `applicantfamilystatus` (
  `familyStatusID` varchar(200) NOT NULL,
  `applicantID` varchar(200) NOT NULL,
  `orphan` varchar(50) NOT NULL,
  `disabled_parents` varchar(50) NOT NULL,
  `singleParent` varchar(50) NOT NULL,
  `unemployedParents` varchar(50) NOT NULL,
  `otherFamilyStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicantloandetails`
--

CREATE TABLE `applicantloandetails` (
  `loanID` varchar(50) NOT NULL,
  `loanAmount` float NOT NULL,
  `awardingOrganization` varchar(200) NOT NULL,
  `loanAttachment` varchar(200) NOT NULL,
  `applicantID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicanttable`
--

CREATE TABLE `applicanttable` (
  `applicantID` varchar(255) NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `yearofStudy` varchar(255) NOT NULL,
  `programme` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `governmentSponsored` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_academic_details`
--

CREATE TABLE `applicant_academic_details` (
  `id` varchar(50) NOT NULL,
  `previousGrade` varchar(10) NOT NULL,
  `gradeAttachment` varchar(200) NOT NULL,
  `applicantID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_downloads_table`
--

CREATE TABLE `applicant_downloads_table` (
  `id` varchar(100) NOT NULL,
  `applicantID` varchar(200) NOT NULL,
  `downloadID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicationtable`
--

CREATE TABLE `applicationtable` (
  `applicationID` varchar(50) NOT NULL,
  `applicantID` varchar(200) NOT NULL,
  `applicationStatus` varchar(200) NOT NULL,
  `date_submitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chequdetails`
--

CREATE TABLE `chequdetails` (
  `chequeID` varchar(50) NOT NULL,
  `ChequeNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complainant_details`
--

CREATE TABLE `complainant_details` (
  `complainantID` varchar(45) NOT NULL,
  `complaintID` varchar(45) NOT NULL,
  `applicantID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_details_table`
--

CREATE TABLE `complaint_details_table` (
  `complaintID` varchar(45) NOT NULL,
  `TypeofComplaint` varchar(255) NOT NULL,
  `complaintDescription` varchar(255) NOT NULL,
  `complaintResponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `download_details_table`
--

CREATE TABLE `download_details_table` (
  `downloadID` varchar(100) NOT NULL,
  `downloadHeading` varchar(255) NOT NULL,
  `downloadName` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `loan_id` varchar(100) NOT NULL,
  `applicantID` varchar(255) NOT NULL,
  `chequeID` varchar(200) NOT NULL,
  `paymentID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `paymentID` varchar(100) NOT NULL,
  `AmountAwarded` float NOT NULL,
  `paymentStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `regNum` varchar(200) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `Middle Name` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentuser`
--

CREATE TABLE `studentuser` (
  `userID` varchar(100) NOT NULL,
  `regNumber` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `UserID` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicantbursarytable`
--
ALTER TABLE `applicantbursarytable`
  ADD PRIMARY KEY (`bursaryID`);

--
-- Indexes for table `applicantfamilystatus`
--
ALTER TABLE `applicantfamilystatus`
  ADD PRIMARY KEY (`familyStatusID`);

--
-- Indexes for table `applicantloandetails`
--
ALTER TABLE `applicantloandetails`
  ADD PRIMARY KEY (`loanID`);

--
-- Indexes for table `applicanttable`
--
ALTER TABLE `applicanttable`
  ADD PRIMARY KEY (`applicantID`);

--
-- Indexes for table `applicant_academic_details`
--
ALTER TABLE `applicant_academic_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_downloads_table`
--
ALTER TABLE `applicant_downloads_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicationtable`
--
ALTER TABLE `applicationtable`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `chequdetails`
--
ALTER TABLE `chequdetails`
  ADD PRIMARY KEY (`chequeID`);

--
-- Indexes for table `complainant_details`
--
ALTER TABLE `complainant_details`
  ADD PRIMARY KEY (`complainantID`);

--
-- Indexes for table `complaint_details_table`
--
ALTER TABLE `complaint_details_table`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `download_details_table`
--
ALTER TABLE `download_details_table`
  ADD PRIMARY KEY (`downloadID`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`regNum`);

--
-- Indexes for table `studentuser`
--
ALTER TABLE `studentuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
