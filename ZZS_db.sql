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
