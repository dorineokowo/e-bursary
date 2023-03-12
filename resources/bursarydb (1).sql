-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2021 at 08:53 AM
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
-- Table structure for table `academictable`
--

CREATE TABLE `academictable` (
  `regNumber` varchar(255) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `attachmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academictable`
--

INSERT INTO `academictable` (`regNumber`, `gradeID`, `attachmentName`) VALUES
('CIT/00046/019', 1, 'trans.pdf'),
('CIT/00050/020', 2, '00050.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `year`) VALUES
(1, 'YR1SM1'),
(2, 'YR1SM2'),
(3, 'YR2SM1'),
(4, 'YR2SM2'),
(5, 'YR3SM1'),
(6, 'YR3SM2'),
(7, 'YR4SM1'),
(8, 'YR4SM2');

-- --------------------------------------------------------

--
-- Table structure for table `applicanttable`
--

CREATE TABLE `applicanttable` (
  `applicationID` int(11) NOT NULL,
  `regNumber` varchar(100) NOT NULL,
  `YearofStudy` varchar(255) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `countyID` int(11) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `statusID` int(11) NOT NULL,
  `awardingID` int(11) DEFAULT NULL,
  `dateApplied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicanttable`
--

INSERT INTO `applicanttable` (`applicationID`, `regNumber`, `YearofStudy`, `departmentID`, `countyID`, `sponsor`, `statusID`, `awardingID`, `dateApplied`) VALUES
(1, 'CIT/00046/019', 'YR2SM2', 1, 26, 'Government', 4, 1, '2021-10-19 11:37:34'),
(2, 'CIT/00050/020', 'YR1SM2', 1, 26, 'Self Sponsored', 3, 1, '2021-10-19 11:48:16'),
(3, 'CCS/00100/017', 'YR2SM1', 2, 1, 'Government', 1, 1, '2021-10-19 17:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `application_status_table`
--

CREATE TABLE `application_status_table` (
  `id` int(100) NOT NULL,
  `statusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_status_table`
--

INSERT INTO `application_status_table` (`id`, `statusName`) VALUES
(5, 'Allocated'),
(4, 'Approved'),
(6, 'Not Approved'),
(2, 'Not Verified'),
(3, 'Pending '),
(1, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `awardingtable`
--

CREATE TABLE `awardingtable` (
  `awardingID` int(11) NOT NULL,
  `amountAwarded` float NOT NULL,
  `chequeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `awardingtable`
--

INSERT INTO `awardingtable` (`awardingID`, `amountAwarded`, `chequeID`) VALUES
(1, 5000, 1),
(2, 8000, 2),
(3, 4500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bursarydetails`
--

CREATE TABLE `bursarydetails` (
  `bursaryID` int(11) NOT NULL,
  `bursaryAmount` float NOT NULL,
  `awardingOrganization` varchar(255) NOT NULL,
  `attachmentName` varchar(255) NOT NULL,
  `awardPeriod` year(4) NOT NULL,
  `applicationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bursarydetails`
--

INSERT INTO `bursarydetails` (`bursaryID`, `bursaryAmount`, `awardingOrganization`, `attachmentName`, `awardPeriod`, `applicationID`) VALUES
(1, 5000, 'Mwala CDF', 'mwala.pdf', 2015, 1),
(2, 2000, 'Kisumu CDF', 'kisumucdf.pdf', 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chequetable`
--

CREATE TABLE `chequetable` (
  `chequeID` int(11) NOT NULL,
  `chequeNumber` int(11) NOT NULL,
  `chequeAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chequetable`
--

INSERT INTO `chequetable` (`chequeID`, `chequeNumber`, `chequeAmount`) VALUES
(1, 90125, 1500000),
(2, 10235, 6500000),
(3, 758585, 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `complainttable`
--

CREATE TABLE `complainttable` (
  `complaintID` int(11) NOT NULL,
  `complaintName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complainttable`
--

INSERT INTO `complainttable` (`complaintID`, `complaintName`) VALUES
(5, 'Amount Allocated Missing'),
(2, 'Amount Not Allocated'),
(4, 'Amount Not Allocated'),
(1, 'Application Not Verified'),
(3, 'Cheque Number Missing'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `constituencytable`
--

CREATE TABLE `constituencytable` (
  `constituencyID` int(11) NOT NULL,
  `constituencyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `constituencytable`
--

INSERT INTO `constituencytable` (`constituencyID`, `constituencyName`) VALUES
(1, 'Mwala'),
(2, 'Masii'),
(3, 'Mtwapa');

-- --------------------------------------------------------

--
-- Table structure for table `countytable`
--

CREATE TABLE `countytable` (
  `countyID` int(11) NOT NULL,
  `countyName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countytable`
--

INSERT INTO `countytable` (`countyID`, `countyName`) VALUES
(1, 'Mombasa'),
(3, 'Kisumu'),
(26, 'Machakos');

-- --------------------------------------------------------

--
-- Table structure for table `county_constituency`
--

CREATE TABLE `county_constituency` (
  `id` int(11) NOT NULL,
  `countyid` int(11) NOT NULL,
  `consituencyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `county_constituency`
--

INSERT INTO `county_constituency` (`id`, `countyid`, `consituencyid`) VALUES
(1, 26, 1),
(2, 26, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dptid` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dptid`, `departmentName`) VALUES
(1, 'Information Technology'),
(2, 'Computer Science'),
(3, 'Mathematics And Computer Science'),
(4, 'Arts and Social Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `department_programme_table`
--

CREATE TABLE `department_programme_table` (
  `id` int(11) NOT NULL,
  `dptid` int(11) NOT NULL,
  `programmeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department_programme_table`
--

INSERT INTO `department_programme_table` (`id`, `dptid`, `programmeID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gradetable`
--

CREATE TABLE `gradetable` (
  `gradeid` int(11) NOT NULL,
  `description` varchar(2) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gradetable`
--

INSERT INTO `gradetable` (`gradeid`, `description`, `comment`) VALUES
(1, 'A', 'Excellent'),
(2, 'B', 'Very Good'),
(3, 'C', 'Trial'),
(4, 'D', 'Below Average'),
(5, 'E', 'Fail☹');

-- --------------------------------------------------------

--
-- Table structure for table `loandetails`
--

CREATE TABLE `loandetails` (
  `loanID` int(11) NOT NULL,
  `loanAmount` float NOT NULL,
  `awardingOrganization` varchar(255) NOT NULL,
  `attachmentName` varchar(255) NOT NULL,
  `awardPeriod` year(4) NOT NULL,
  `applicationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loandetails`
--

INSERT INTO `loandetails` (`loanID`, `loanAmount`, `awardingOrganization`, `attachmentName`, `awardPeriod`, `applicationID`) VALUES
(1, 8000, 'Helb', 'helb.pdf', 2018, 1),
(2, 10000, 'helb', 'helb1.pdf', 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `programmeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `programmeName`) VALUES
(1, 'Information Technology'),
(2, 'Information Communication Technology Management'),
(3, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `sponsortable`
--

CREATE TABLE `sponsortable` (
  `sponsorid` int(11) NOT NULL,
  `sponsorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsortable`
--

INSERT INTO `sponsortable` (`sponsorid`, `sponsorName`) VALUES
(1, 'Government'),
(2, 'Self Sponsored');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `regNum` varchar(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`regNum`, `firstName`, `middleName`, `lastName`, `emailAddress`, `phoneNumber`, `password`, `dateCreated`) VALUES
('CCS/00100/017', 'Ruth', 'Chebet', 'Mike', 'chebet@gmail.com', '07487787784', 'ruth', '2021-10-19 17:40:33'),
('CIT/00046/019', 'Benson', 'Makau', 'Kioko', 'benson@gmail.com', '0758413462', 'benson', '2021-10-19 11:24:55'),
('CIT/00050/020', 'Charles ', 'Mike', 'Justus', 'justus@gmail.com', '075141425252', 'mike', '2021-10-19 11:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_complaint_table`
--

CREATE TABLE `student_complaint_table` (
  `id` int(11) NOT NULL,
  `applicationID` int(11) NOT NULL,
  `complaintID` int(11) NOT NULL,
  `complaintDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_complaint_table`
--

INSERT INTO `student_complaint_table` (`id`, `applicationID`, `complaintID`, `complaintDescription`) VALUES
(1, 1, 1, 'My application has not been verified since 12/05/2021'),
(2, 2, 6, 'Why am i not able to make a second application?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academictable`
--
ALTER TABLE `academictable`
  ADD PRIMARY KEY (`regNumber`),
  ADD KEY `gradeID` (`gradeID`);

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `applicanttable`
--
ALTER TABLE `applicanttable`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `regNumber` (`regNumber`),
  ADD KEY `countyID` (`countyID`),
  ADD KEY `awardingID` (`awardingID`),
  ADD KEY `departmentID` (`departmentID`),
  ADD KEY `YearofStudy` (`YearofStudy`),
  ADD KEY `sponsor` (`sponsor`),
  ADD KEY `statusID` (`statusID`);

--
-- Indexes for table `application_status_table`
--
ALTER TABLE `application_status_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusName` (`statusName`);

--
-- Indexes for table `awardingtable`
--
ALTER TABLE `awardingtable`
  ADD PRIMARY KEY (`awardingID`),
  ADD KEY `chequeID` (`chequeID`),
  ADD KEY `awardingID` (`awardingID`);

--
-- Indexes for table `bursarydetails`
--
ALTER TABLE `bursarydetails`
  ADD PRIMARY KEY (`bursaryID`),
  ADD KEY `applicationID` (`applicationID`);

--
-- Indexes for table `chequetable`
--
ALTER TABLE `chequetable`
  ADD PRIMARY KEY (`chequeID`);

--
-- Indexes for table `complainttable`
--
ALTER TABLE `complainttable`
  ADD PRIMARY KEY (`complaintID`),
  ADD KEY `complaintName` (`complaintName`);

--
-- Indexes for table `constituencytable`
--
ALTER TABLE `constituencytable`
  ADD PRIMARY KEY (`constituencyID`),
  ADD KEY `constituencyID` (`constituencyID`);

--
-- Indexes for table `countytable`
--
ALTER TABLE `countytable`
  ADD PRIMARY KEY (`countyID`);

--
-- Indexes for table `county_constituency`
--
ALTER TABLE `county_constituency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countyid` (`countyid`),
  ADD KEY `consituencyid` (`consituencyid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dptid`),
  ADD KEY `dptid` (`dptid`);

--
-- Indexes for table `department_programme_table`
--
ALTER TABLE `department_programme_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dptid` (`dptid`),
  ADD KEY `programmeID` (`programmeID`);

--
-- Indexes for table `gradetable`
--
ALTER TABLE `gradetable`
  ADD PRIMARY KEY (`gradeid`),
  ADD KEY `gradeid` (`gradeid`);

--
-- Indexes for table `loandetails`
--
ALTER TABLE `loandetails`
  ADD PRIMARY KEY (`loanID`),
  ADD KEY `applicationID` (`applicationID`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sponsortable`
--
ALTER TABLE `sponsortable`
  ADD PRIMARY KEY (`sponsorid`),
  ADD KEY `sponsorName` (`sponsorName`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`regNum`),
  ADD KEY `regNum` (`regNum`);

--
-- Indexes for table `student_complaint_table`
--
ALTER TABLE `student_complaint_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaintID` (`complaintID`),
  ADD KEY `applicationID` (`applicationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `applicanttable`
--
ALTER TABLE `applicanttable`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_status_table`
--
ALTER TABLE `application_status_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `awardingtable`
--
ALTER TABLE `awardingtable`
  MODIFY `awardingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bursarydetails`
--
ALTER TABLE `bursarydetails`
  MODIFY `bursaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chequetable`
--
ALTER TABLE `chequetable`
  MODIFY `chequeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complainttable`
--
ALTER TABLE `complainttable`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `constituencytable`
--
ALTER TABLE `constituencytable`
  MODIFY `constituencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countytable`
--
ALTER TABLE `countytable`
  MODIFY `countyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `county_constituency`
--
ALTER TABLE `county_constituency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loandetails`
--
ALTER TABLE `loandetails`
  MODIFY `loanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsortable`
--
ALTER TABLE `sponsortable`
  MODIFY `sponsorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_complaint_table`
--
ALTER TABLE `student_complaint_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academictable`
--
ALTER TABLE `academictable`
  ADD CONSTRAINT `academictable_ibfk_1` FOREIGN KEY (`regNumber`) REFERENCES `studentdetails` (`regNum`),
  ADD CONSTRAINT `academictable_ibfk_2` FOREIGN KEY (`gradeID`) REFERENCES `gradetable` (`gradeid`);

--
-- Constraints for table `applicanttable`
--
ALTER TABLE `applicanttable`
  ADD CONSTRAINT `applicanttable_ibfk_1` FOREIGN KEY (`regNumber`) REFERENCES `studentdetails` (`regNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicanttable_ibfk_3` FOREIGN KEY (`awardingID`) REFERENCES `awardingtable` (`awardingID`),
  ADD CONSTRAINT `applicanttable_ibfk_4` FOREIGN KEY (`departmentID`) REFERENCES `department_programme_table` (`dptid`),
  ADD CONSTRAINT `applicanttable_ibfk_5` FOREIGN KEY (`countyID`) REFERENCES `county_constituency` (`countyid`),
  ADD CONSTRAINT `applicanttable_ibfk_6` FOREIGN KEY (`YearofStudy`) REFERENCES `academic_year` (`year`),
  ADD CONSTRAINT `applicanttable_ibfk_7` FOREIGN KEY (`sponsor`) REFERENCES `sponsortable` (`sponsorName`),
  ADD CONSTRAINT `applicanttable_ibfk_8` FOREIGN KEY (`statusID`) REFERENCES `application_status_table` (`id`);

--
-- Constraints for table `awardingtable`
--
ALTER TABLE `awardingtable`
  ADD CONSTRAINT `awardingtable_ibfk_1` FOREIGN KEY (`chequeID`) REFERENCES `chequetable` (`chequeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bursarydetails`
--
ALTER TABLE `bursarydetails`
  ADD CONSTRAINT `bursarydetails_ibfk_1` FOREIGN KEY (`applicationID`) REFERENCES `applicanttable` (`applicationID`);

--
-- Constraints for table `county_constituency`
--
ALTER TABLE `county_constituency`
  ADD CONSTRAINT `county_constituency_ibfk_1` FOREIGN KEY (`countyid`) REFERENCES `countytable` (`countyID`),
  ADD CONSTRAINT `county_constituency_ibfk_2` FOREIGN KEY (`consituencyid`) REFERENCES `constituencytable` (`constituencyID`);

--
-- Constraints for table `department_programme_table`
--
ALTER TABLE `department_programme_table`
  ADD CONSTRAINT `department_programme_table_ibfk_1` FOREIGN KEY (`dptid`) REFERENCES `department` (`dptid`),
  ADD CONSTRAINT `department_programme_table_ibfk_2` FOREIGN KEY (`programmeID`) REFERENCES `programme` (`id`);

--
-- Constraints for table `loandetails`
--
ALTER TABLE `loandetails`
  ADD CONSTRAINT `loandetails_ibfk_1` FOREIGN KEY (`applicationID`) REFERENCES `applicanttable` (`applicationID`);

--
-- Constraints for table `student_complaint_table`
--
ALTER TABLE `student_complaint_table`
  ADD CONSTRAINT `student_complaint_table_ibfk_1` FOREIGN KEY (`applicationID`) REFERENCES `applicanttable` (`applicationID`),
  ADD CONSTRAINT `student_complaint_table_ibfk_2` FOREIGN KEY (`complaintID`) REFERENCES `complainttable` (`complaintID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
