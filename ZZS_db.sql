-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:52 PM
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
-- Database: `zzs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `Account_Id` varchar(13) NOT NULL,
  `User_IC` varchar(14) NOT NULL,
  `UserPassword` varchar(500) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `firstLogin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`Account_Id`, `User_IC`, `UserPassword`, `UserType`, `firstLogin`) VALUES
('645e692150c43', '0121215151', '$2y$10$mal3TfYXg3tqqYMF/qoSUO1JVVvDC501mELMrMmalZlgWOhKL.xa.', 'Pemohon', 0),
('645fdb54b6372', '0101658445', '$2y$10$mFajJPL07R655yXpgLWnquDjNZ3p38V6zMhBhXRIPfslTNOzyVzLS', 'Kakitangan', 0),
('64626cb44e1d9', '0101658445', '$2y$10$ITG9NQLLAtsEYEqHJCRyjuzu1tPxXGo/vhTUJydgK9pskpvq0a23C', 'Kakitangan', 0),
('64627014bd988', '010996071125', '$2y$10$45OIy07hzeQS8KTia0oB4.j0.moMjdckJt3oJBxI54Hv.hetskZSG', 'Kakitangan', 0),
('646590f86ea65', '970608232207', '$2y$10$3Ovw9j1sh3dZnsHtmU/NNu0Bbrm/iz1PviQAR0pkAuSAXKzgPXAfO', 'Pemohon', 0),
('6465964b19391', '010926020454', '$2y$10$vuFriw2TlegcPGJjpJwUJeeQDFb.S/jK.VkcjM9EqjEEEAEN7JNYS', 'Kakitangan', 0),
('admin', '010906040015', '$2y$10$2.oSr1lCRN.TbeZFbG51yetyDydwzpBA14frIP3lTAB13a3Y.NdN6', 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Admin_Id` varchar(5) NOT NULL,
  `Account_Id` varchar(13) NOT NULL,
  `AdminName` varchar(30) NOT NULL,
  `AdminAddress` varchar(100) NOT NULL,
  `AdminNumberPhone` varchar(14) NOT NULL,
  `AdminEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Admin_Id`, `Account_Id`, `AdminName`, `AdminAddress`, `AdminNumberPhone`, `AdminEmail`) VALUES
('624ee', 'admin', 'Shatiya Ganes', '383, Jalan Cantonment 9, 09485, Kelantan', '0112222221', 'satiyaganes.sg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_info`
--

CREATE TABLE `applicant_info` (
  `Applicant_Ic` varchar(14) NOT NULL,
  `Account_Id` int(5) NOT NULL,
  `ApplicantName` varchar(500) NOT NULL,
  `ApplicantBirthDate` date DEFAULT NULL,
  `ApplicantAge` int(3) DEFAULT NULL,
  `ApplicantGender` varchar(10) NOT NULL,
  `ApplicantEmail` varchar(100) DEFAULT NULL,
  `ApplicantRace` varchar(20) DEFAULT NULL,
  `ApplicantAddress` varchar(200) DEFAULT NULL,
  `ApplicantPhoneNo` varchar(14) NOT NULL,
  `ApplicantHomePhoneNo` varchar(10) DEFAULT NULL,
  `ApplicantEduLevel` varchar(150) DEFAULT NULL,
  `ApplicantPosition` varchar(100) DEFAULT NULL,
  `ApplicantSalary` double(10,2) DEFAULT NULL,
  `ApplicantWorkAddress` varchar(200) DEFAULT NULL,
  `ApplicantWorkPhoneNo` varchar(14) DEFAULT NULL,
  `ApplicantStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_info`
--

INSERT INTO `applicant_info` (`Applicant_Ic`, `Account_Id`, `ApplicantName`, `ApplicantBirthDate`, `ApplicantAge`, `ApplicantGender`, `ApplicantEmail`, `ApplicantRace`, `ApplicantAddress`, `ApplicantPhoneNo`, `ApplicantHomePhoneNo`, `ApplicantEduLevel`, `ApplicantPosition`, `ApplicantSalary`, `ApplicantWorkAddress`, `ApplicantWorkPhoneNo`, `ApplicantStatus`) VALUES
('121215151', 2147483647, 'Kholid', '2023-05-14', 50, 'Lelaki', 'satiyaganes.sg@gmail.com', 'Melayu', '110, Lorong Peramkkku Permai 7, 26600, Pekan, Pahang', '01542222244', '2222222221', 'PHD & Master', 'PROGRAMMERS', 1500.00, '5, Jln 4/1, Perak Darul Ridzuan, Malaysia', '0327378730', NULL),
('970608232207', 646590, 'M. K. Sybil', '9997-02-05', 21, 'Lelaki', 'ruslan24@hotmail.com', 'Melayu', '29, Jalan 6, Simpang Empat, 89096, Pahang', '60152211779', '2222222221', 'PHD & Master', 'PROGRAMMERS', 5500.00, '5, Jln 4/1, Perak Darul Ridzuan, Malaysia', '0327378730', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_occupation_info`
--

CREATE TABLE `applicant_occupation_info` (
  `Occupation_Id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `OccupationName` varchar(30) NOT NULL,
  `OccupationType` varchar(20) NOT NULL,
  `OccupationSalary` float NOT NULL,
  `CompanyName` varchar(30) NOT NULL,
  `CompanyAddress` varchar(50) NOT NULL,
  `CompanyPhoneNo` varchar(15) NOT NULL,
  `EmployerName` varchar(30) NOT NULL,
  `EmployerPhoneNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_info`
--

CREATE TABLE `complaint_info` (
  `Complaint_Id` int(11) NOT NULL,
  `Consultation_Id` int(11) NOT NULL,
  `Admin_Id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `ComplaintDetail` varchar(200) NOT NULL,
  `ComplaintDate` date NOT NULL DEFAULT current_timestamp(),
  `ComplaintStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultation_info`
--

CREATE TABLE `consultation_info` (
  `Consultation_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `ConsultationDate` date NOT NULL,
  `ConsultationTime` time NOT NULL,
  `ConsultationPlace` varchar(50) NOT NULL,
  `ConsultationResult` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_info`
--

CREATE TABLE `document_info` (
  `Doc_id` int(11) NOT NULL,
  `DocType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heir_info`
--

CREATE TABLE `heir_info` (
  `Heir_Id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `HeirName` varchar(30) NOT NULL,
  `HeirRelationship` varchar(30) NOT NULL,
  `HeirPhoneNo` varchar(15) NOT NULL,
  `HeirEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incentive_doc`
--

CREATE TABLE `incentive_doc` (
  `Doc_id` int(11) NOT NULL,
  `Incentive_Id` int(11) NOT NULL,
  `DocLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_course_application`
--

CREATE TABLE `marriage_course_application` (
  `Applicant_IC` varchar(15) NOT NULL,
  `Marriage_Course_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `MCStatus` tinyint(1) NOT NULL,
  `MCResult` tinyint(1) NOT NULL,
  `MarriageCourseCertificateNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_course_info`
--

CREATE TABLE `marriage_course_info` (
  `Marriage_Course_Id` int(11) NOT NULL,
  `Organize` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL,
  `DateStart` date NOT NULL,
  `DateFinish` date NOT NULL,
  `TimeStart` time NOT NULL,
  `TimeFinish` time NOT NULL,
  `StaffName` varchar(30) NOT NULL,
  `StaffPhoneNumber` varchar(15) NOT NULL,
  `Notes` varchar(200) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Vacancy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_doc`
--

CREATE TABLE `marriage_doc` (
  `Marriage_Id` int(11) NOT NULL,
  `Doc_id` int(11) NOT NULL,
  `DocLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_info`
--

CREATE TABLE `marriage_info` (
  `Marriage_Id` int(11) NOT NULL,
  `Wali_IC` varchar(15) NOT NULL,
  `Witness_IC` varchar(15) NOT NULL,
  `RequestDate` date NOT NULL DEFAULT current_timestamp(),
  `MarriageDate` date NOT NULL,
  `MarriageAddress` varchar(50) NOT NULL,
  `DowryType` varchar(30) NOT NULL,
  `Dowry` int(11) NOT NULL,
  `Gift` varchar(30) NOT NULL,
  `MarriageCertificateNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_request_info`
--

CREATE TABLE `marriage_request_info` (
  `Marriage_Id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `Admin_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `RequestStatus` tinyint(1) NOT NULL,
  `Partner_IC` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_voluntary_info`
--

CREATE TABLE `marriage_voluntary_info` (
  `Voluntary_id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `No_Akuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `Fee_id` int(11) NOT NULL,
  `Applicat_IC` varchar(15) NOT NULL,
  `TypeOfFee` varchar(30) NOT NULL,
  `receiptID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_incentive_info`
--

CREATE TABLE `special_incentive_info` (
  `Incentive_Id` int(11) NOT NULL,
  `Admin_Id` int(11) NOT NULL,
  `Applicant_IC` varchar(15) NOT NULL,
  `IncentiveAmount` float NOT NULL,
  `IncentiveStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `Staff_Id` varchar(13) NOT NULL,
  `Account_Id` varchar(14) NOT NULL,
  `StaffName` varchar(30) NOT NULL,
  `StaffAddress` varchar(100) NOT NULL,
  `StaffNumberPhone` varchar(11) NOT NULL,
  `StaffEmail` varchar(30) NOT NULL,
  `StaffType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`Staff_Id`, `Account_Id`, `StaffName`, `StaffAddress`, `StaffNumberPhone`, `StaffEmail`, `StaffType`) VALUES
('645fdb54c787d', '645fdb54b6372', 'AHMAD KHOLID BIN KHUZAIN', '110, Lorong Peramkkku Permai 7, 26600, Pekan, Pahang', '01542222244', 'navig543@gmail.com', 'Jaip Staff'),
('64626cb45f930', '64626cb44e1d9', 'Neo Beng Qu', '47, Jln Maharajalela 6P', '04-9021355', 'csyafrin@example.org', 'Penasihat'),
('64627014da82b', '64627014bd988', 'Pushpa Saravanan a/l Maniam', '383, Jalan Cantonment 91', '0198901414', 'kasthuriraani.pg@hotmail.com', 'Jaip Staff'),
('6465964b2c828', '6465964b19391', 'Haji Nazrin bin Che Badri Shar', '383, Jalan Cantonment 9', '60127253211', 'mazlan.chris@hotmail.com', 'Jaip Staff');

-- --------------------------------------------------------

--
-- Table structure for table `voluntary_doc`
--

CREATE TABLE `voluntary_doc` (
  `Voluntary_id` int(11) NOT NULL,
  `Doc_id` int(11) NOT NULL,
  `DocLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wali_info`
--

CREATE TABLE `wali_info` (
  `Wali_IC` varchar(15) NOT NULL,
  `WaliName` varchar(30) NOT NULL,
  `WaliAddress` varchar(30) NOT NULL,
  `WaliBirthDate` date NOT NULL,
  `WaliAge` int(11) NOT NULL,
  `WaliNumberPhone` varchar(15) NOT NULL,
  `WaliRelationship` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `witness_info`
--

CREATE TABLE `witness_info` (
  `Witness_IC` varchar(15) NOT NULL,
  `WitnessName` varchar(30) NOT NULL,
  `WitnessAddress` varchar(50) NOT NULL,
  `WitnessBirthDate` date NOT NULL,
  `WitnessAge` int(11) NOT NULL,
  `WitnessNumberPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`Account_Id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `applicant_info`
--
ALTER TABLE `applicant_info`
  ADD PRIMARY KEY (`Applicant_Ic`),
  ADD UNIQUE KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `applicant_occupation_info`
--
ALTER TABLE `applicant_occupation_info`
  ADD PRIMARY KEY (`Occupation_Id`);

--
-- Indexes for table `complaint_info`
--
ALTER TABLE `complaint_info`
  ADD PRIMARY KEY (`Complaint_Id`);

--
-- Indexes for table `consultation_info`
--
ALTER TABLE `consultation_info`
  ADD PRIMARY KEY (`Consultation_Id`);

--
-- Indexes for table `document_info`
--
ALTER TABLE `document_info`
  ADD PRIMARY KEY (`Doc_id`);

--
-- Indexes for table `heir_info`
--
ALTER TABLE `heir_info`
  ADD PRIMARY KEY (`Heir_Id`);

--
-- Indexes for table `marriage_course_info`
--
ALTER TABLE `marriage_course_info`
  ADD PRIMARY KEY (`Marriage_Course_Id`);

--
-- Indexes for table `marriage_info`
--
ALTER TABLE `marriage_info`
  ADD PRIMARY KEY (`Marriage_Id`);

--
-- Indexes for table `marriage_voluntary_info`
--
ALTER TABLE `marriage_voluntary_info`
  ADD PRIMARY KEY (`Voluntary_id`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`Fee_id`);

--
-- Indexes for table `special_incentive_info`
--
ALTER TABLE `special_incentive_info`
  ADD PRIMARY KEY (`Incentive_Id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`Staff_Id`);

--
-- Indexes for table `wali_info`
--
ALTER TABLE `wali_info`
  ADD PRIMARY KEY (`Wali_IC`);

--
-- Indexes for table `witness_info`
--
ALTER TABLE `witness_info`
  ADD PRIMARY KEY (`Witness_IC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_occupation_info`
--
ALTER TABLE `applicant_occupation_info`
  MODIFY `Occupation_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_info`
--
ALTER TABLE `complaint_info`
  MODIFY `Complaint_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation_info`
--
ALTER TABLE `consultation_info`
  MODIFY `Consultation_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_info`
--
ALTER TABLE `document_info`
  MODIFY `Doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heir_info`
--
ALTER TABLE `heir_info`
  MODIFY `Heir_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marriage_course_info`
--
ALTER TABLE `marriage_course_info`
  MODIFY `Marriage_Course_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marriage_info`
--
ALTER TABLE `marriage_info`
  MODIFY `Marriage_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marriage_voluntary_info`
--
ALTER TABLE `marriage_voluntary_info`
  MODIFY `Voluntary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `Fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_incentive_info`
--
ALTER TABLE `special_incentive_info`
  MODIFY `Incentive_Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
