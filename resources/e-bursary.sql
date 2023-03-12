-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2021 at 08:41 AM
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
-- Database: `e-bursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintID` int(11) NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `TypeofComplaint` varchar(255) NOT NULL,
  `complaintDescription` varchar(255) NOT NULL,
  `complaint_received_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complaintResponse` varchar(255) NOT NULL DEFAULT 'No Response Yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintID`, `regNumber`, `emailAddress`, `phone`, `TypeofComplaint`, `complaintDescription`, `complaint_received_date`, `complaintResponse`) VALUES
(54, 'BBA/0025/019', 'jikycilyq@mailinator.com', '+1 (112) 438-2788', 'Application Not Verified', 'My application was not verified', '2021-09-16 11:16:02', 'You attached forged details'),
(55, 'BBA/0025/019', 'jikycilyq@mailinator.com', '+1 (112) 438-2788', 'Other', 'Why was my application not verified?', '2021-09-16 11:16:25', 'You were not vetted for bursary allocation since you have zero fee balance'),
(56, 'ALI/00184/019', 'tuso@mailinator.com', '+1 (257) 906-9388', 'Other', 'When is the allocation date?', '2021-09-16 11:18:53', '12/12/2021');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `downloadHeading` varchar(255) NOT NULL,
  `downloadName` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `downloadHeading`, `downloadName`, `date_posted`) VALUES
(8, 'Reiciendis atque ess', 'ExamCard-CIT00046019.pdf', '2021-09-14 17:48:10'),
(10, 'List of beneficiaries', 'Transcript-CIT00046019.pdf', '2021-09-14 17:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `loandetails`
--

CREATE TABLE `loandetails` (
  `regNumber` varchar(255) NOT NULL,
  `applicationStatus` varchar(255) NOT NULL,
  `amountAllocated` varchar(255) NOT NULL DEFAULT 'ZERO',
  `chequeNumber` varchar(255) NOT NULL DEFAULT 'no cheque number',
  `paymentStatus` varchar(255) NOT NULL DEFAULT 'No Payment Status',
  `date_processed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loandetails`
--

INSERT INTO `loandetails` (`regNumber`, `applicationStatus`, `amountAllocated`, `chequeNumber`, `paymentStatus`, `date_processed`) VALUES
('ACB/00457/019', 'not verified', 'ZERO', 'no cheque number', '	No Payment Status', '2021-09-13 22:52:16'),
('ALI/00184/019', 'verified', '12000', '1231524NV', 'Pending', '2021-09-13 22:52:16'),
('ali/0200/019', 'verified', '12000', '1231524NV', 'Pending', '2021-09-13 22:52:16'),
('BBA/0025/019', 'not verified', 'ZERO', 'no cheque number', '	No Payment Status', '2021-09-13 22:52:16'),
('BBC/00150/17', 'verified', '12000', '1231524NV', 'Pending', '2021-09-13 22:52:16'),
('cim/00789/019', 'not verified', 'ZERO', 'no cheque number', '	No Payment Status', '2021-09-13 22:52:16'),
('CIT/00046/019', 'not verified', 'ZERO', 'no cheque number', '	No Payment Status', '2021-09-13 22:52:16'),
('mla/00200/019', 'verified', '12000', '1231524NV', 'Pending', '2021-09-13 22:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `yearofStudy` varchar(255) NOT NULL,
  `programme` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `governmentSponsored` varchar(255) NOT NULL,
  `orphan` varchar(10) NOT NULL,
  `disabled_parents` varchar(10) NOT NULL,
  `singleParent` varchar(10) NOT NULL,
  `unemployedParents` varchar(10) NOT NULL,
  `otherFamilyStatus` varchar(255) NOT NULL,
  `loanAmount` varchar(255) NOT NULL,
  `awardingOrganization` varchar(200) NOT NULL,
  `loanAttachment` varchar(255) NOT NULL,
  `bursaryAmount` varchar(255) NOT NULL,
  `awardingBursaryOrg` varchar(255) NOT NULL,
  `bursaryAttachment` varchar(255) NOT NULL,
  `previousGrade` varchar(255) NOT NULL,
  `gradeAttachment` varchar(255) NOT NULL,
  `applicationStatus` varchar(255) NOT NULL DEFAULT 'not verified',
  `date_submitted` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `regNumber`, `firstName`, `lastName`, `phone`, `email`, `yearofStudy`, `programme`, `department`, `county`, `constituency`, `governmentSponsored`, `orphan`, `disabled_parents`, `singleParent`, `unemployedParents`, `otherFamilyStatus`, `loanAmount`, `awardingOrganization`, `loanAttachment`, `bursaryAmount`, `awardingBursaryOrg`, `bursaryAttachment`, `previousGrade`, `gradeAttachment`, `applicationStatus`, `date_submitted`) VALUES
(65, 'ALI/00184/019', 'Gloria', 'Mcintyre', '+1 (257) 906-9388', 'tuso@mailinator.com', '2005', 'Eum aspernatur sit ', 'Explicabo Ipsa do ', 'Proident amet vel ', 'Micah England', 'Qui impedit ut vel ', 'yes', 'yes', '', '', 'Veritatis hic et ame', '5', 'Kennedy and Patel Traders', 'No loan Attachment', '20', 'Aliqua Lorem esse f', 'No bursary Attachment', 'Ad dignissimos illum', 'timetable computing.pdf', 'verified', '2021-09-11 08:36:12'),
(66, 'BBC/00150/17', 'Alyssa', 'Hoover', '0786567456', 'nosol@mailinator.com', '1975', 'Corporis quia evenie', 'Molestias ut adipisc', 'Neque officia corrup', 'Ethan Crane', 'Est numquam minus co', 'yes', 'yes', 'yes', 'yes', 'Nam aut minus volupt', '69', 'Osborne and Potter LLC', 'No loan Attachment', '31', 'Debitis repudiandae ', 'No bursary Attachment', 'Culpa dolor tenetur ', 'timetable computing.pdf', 'verified', '2021-09-11 08:37:50'),
(67, 'ali/0200/019', 'Roth', 'Barry', '+1 (478) 876-8521', 'fimamyg@mailinator.com', '2018', 'Minim esse exercitat', 'Tempora architecto p', 'Dolor et laborum con', 'Kennedy Hudson', 'Omnis velit fugit e', 'yes', 'yes', 'yes', 'yes', 'Aliquip et est itaqu', '39', 'Ayers Savage Traders', 'No loan Attachment', '29', 'Accusamus doloremque', 'No bursary Attachment', 'Similique dolore com', 'new TT IT.pdf', 'verified', '2021-09-11 11:34:22'),
(68, 'cim/00789/019', 'Florence', 'Pruitt', '+1 (213) 518-7349', 'wabicun@mailinator.com', '2007', 'Eveniet cupidatat q', 'Laborum est quidem ', 'Rerum dolorem repreh', 'Hannah Farrell', 'Aliquip ut tempore ', 'yes', 'yes', 'yes', '', 'Iure non ea cumque a', '49', 'Juarez Hayes Inc', 'ExamCard-CIT00046019 sem 2.pdf', '73', 'Mollitia quis aliqui', 'No bursary Attachment', 'Corporis repellendus', 'timetable computing.pdf', 'not verified', '2021-09-11 11:35:08'),
(69, 'mla/00200/019', 'Neil', 'Swanson', '+1 (658) 297-5222', 'veguben@mailinator.com', '2006', 'Ut velit corporis co', 'Dolores rerum sit cu', 'Est asperiores totam', 'Medge Short', 'Possimus exercitati', 'yes', '', 'yes', '', 'Et elit ipsa culpa', '49', 'Hogan Vega Co', 'No loan Attachment', '43', 'Sit et laborum Acc', 'No bursary Attachment', 'Saepe dolor molestia', 'ExamCard-CIT00046019 sem 2.pdf', 'verified', '2021-09-11 11:35:48'),
(70, 'BBA/0025/019', 'Adena', 'Peck', '+1 (112) 438-2788', 'jikycilyq@mailinator.com', '2007', 'Quia tenetur consequ', 'Vel excepteur quia c', 'Incidunt ab dolorum', 'Orla Campos', 'Incidunt sed in in ', '', 'yes', 'yes', 'yes', 'Perferendis inventor', '46', 'Leach Sullivan Traders', 'No loan Attachment', '80', 'Eveniet iste Nam al', 'No bursary Attachment', 'C', 'new TT IT.pdf', 'not verified', '2021-09-11 11:36:43'),
(71, 'ACB/00457/019', 'Price', 'West', '+1 (703) 744-8236', 'depi@mailinator.com', '2007', 'Perferendis dolor se', 'Aut enim consequatur', 'Et aut id culpa culp', 'Keith Dudley', 'Excepteur consequatu', 'yes', 'yes', '', '', 'Labore ut omnis dele', '90', 'Bird Pearson Associates', 'No loan Attachment', '20', 'Et quasi et exceptur', 'No bursary Attachment', 'Non est maiores cons', 'new TT IT.pdf', 'not verified', '2021-09-11 11:37:22'),
(72, 'CIT/00046/019', 'Dahlia', 'Sargent', '+1 (101) 998-5616', 'qacifuz@mailinator.com', '2015', 'In amet excepturi m', 'Quisquam ad placeat', 'Dicta mollit quae li', 'Shana Singleton', 'Eos corrupti esse ', '', '', '', '', 'Et fugit elit eum ', '53', 'Stark Luna Trading', 'No loan Attachment', '62', 'Blanditiis ad minima', 'No bursary Attachment', 'Occaecat vel in qui ', 'ExamCard-CIT00046019 sem 2.pdf', 'not verified', '2021-09-12 15:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `regNumber` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`firstName`, `middleName`, `lastName`, `regNumber`, `emailAddress`, `phoneNumber`, `confirmPassword`, `date_created`) VALUES
('Stella', 'Hannah Jordan', 'Burch', '226', 'cycycilo@mailinator.com', '+1 (651) 757-2392', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2021-09-11 11:33:04'),
('Price', 'Reed Beard', 'West', 'ACB/00457/019', 'depi@mailinator.com', '+1 (703) 744-8236', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 11:37:09'),
('Gloria', 'Nita Hood', 'Mcintyre', 'ALI/00184/019', 'tuso@mailinator.com', '+1 (257) 906-9388', '2e37079faf31eb4675a581698a1ed02b', '2021-09-11 01:02:05'),
('Roth', 'Carla Heath', 'Barry', 'ali/0200/019', 'fimamyg@mailinator.com', '+1 (478) 876-8521', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 11:33:38'),
('Adena', 'Latifah Huber', 'Peck', 'BBA/0025/019', 'jikycilyq@mailinator.com', '+1 (112) 438-2788', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 11:36:23'),
('Alyssa', 'Christen Hicks', 'Hoover', 'BBC/00150/17', 'nosol@mailinator.com', '0786567456', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 01:33:45'),
('Florence', 'Aimee Santana', 'Pruitt', 'cim/00789/019', 'wabicun@mailinator.com', '+1 (213) 518-7349', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 11:34:50'),
('Dahlia', 'Odette Rios', 'Sargent', 'CIT/00046/019', 'qacifuz@mailinator.com', '+1 (101) 998-5616', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 01:21:05'),
('Neil', 'Peter Sawyer', 'Swanson', 'mla/00200/019', 'veguben@mailinator.com', '+1 (658) 297-5222', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2021-09-11 11:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loandetails`
--
ALTER TABLE `loandetails`
  ADD PRIMARY KEY (`regNumber`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
