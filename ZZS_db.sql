-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql12.freemysqlhosting.net
-- Generation Time: May 18, 2023 at 12:54 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZZS_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account_Info`
--

CREATE TABLE `Account_Info` (
  `Account_Id` varchar(13) NOT NULL,
  `User_IC` varchar(14) NOT NULL,
  `UserPassword` varchar(500) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `firstLogin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Account_Info`
--

INSERT INTO `Account_Info` (`Account_Id`, `User_IC`, `UserPassword`, `UserType`, `firstLogin`) VALUES
('645e692150c43', '0121215151', '$2y$10$mal3TfYXg3tqqYMF/qoSUO1JVVvDC501mELMrMmalZlgWOhKL.xa.', 'Pemohon', 0),
('645fdb54b6372', '0101658445', '$2y$10$mFajJPL07R655yXpgLWnquDjNZ3p38V6zMhBhXRIPfslTNOzyVzLS', 'Kakitangan', 0),
('64626cb44e1d9', '0101658445', '$2y$10$ITG9NQLLAtsEYEqHJCRyjuzu1tPxXGo/vhTUJydgK9pskpvq0a23C', 'Kakitangan', 0),
('64627014bd988', '010996071125', '$2y$10$45OIy07hzeQS8KTia0oB4.j0.moMjdckJt3oJBxI54Hv.hetskZSG', 'Kakitangan', 0),
('646590f86ea65', '970608232207', '$2y$10$3Ovw9j1sh3dZnsHtmU/NNu0Bbrm/iz1PviQAR0pkAuSAXKzgPXAfO', 'Pemohon', 0),
('6465964b19391', '010926020454', '$2y$10$vuFriw2TlegcPGJjpJwUJeeQDFb.S/jK.VkcjM9EqjEEEAEN7JNYS', 'Kakitangan', 0),
('admin', '010906040015', '$2y$10$2.oSr1lCRN.TbeZFbG51yetyDydwzpBA14frIP3lTAB13a3Y.NdN6', 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Admin_Info`
--

CREATE TABLE `Admin_Info` (
  `Admin_Id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Account_Id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `AdminName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `AdminAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AdminNumberPhone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `AdminEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Admin_Info`
--

INSERT INTO `Admin_Info` (`Admin_Id`, `Account_Id`, `AdminName`, `AdminAddress`, `AdminNumberPhone`, `AdminEmail`) VALUES
('624ee', 'admin', 'Shatiya Ganes', '383, Jalan Cantonment 9, 09485, Kelantan', '0112222221', 'satiyaganes.sg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Applicant_Info`
--

CREATE TABLE `Applicant_Info` (
  `Applicant_Ic` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `Account_Id` int(5) NOT NULL,
  `ApplicantName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ApplicantBirthDate` date DEFAULT NULL,
  `ApplicantAge` int(3) DEFAULT NULL,
  `ApplicantGender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ApplicantEmail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantRace` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantAddress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantPhoneNo` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `ApplicantHomePhoneNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantEduLevel` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantPosition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantSalary` double(10,2) DEFAULT NULL,
  `ApplicantWorkAddress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantWorkPhoneNo` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApplicantStatus` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Applicant_Info`
--

INSERT INTO `Applicant_Info` (`Applicant_Ic`, `Account_Id`, `ApplicantName`, `ApplicantBirthDate`, `ApplicantAge`, `ApplicantGender`, `ApplicantEmail`, `ApplicantRace`, `ApplicantAddress`, `ApplicantPhoneNo`, `ApplicantHomePhoneNo`, `ApplicantEduLevel`, `ApplicantPosition`, `ApplicantSalary`, `ApplicantWorkAddress`, `ApplicantWorkPhoneNo`, `ApplicantStatus`) VALUES
('121215151', 2147483647, 'Kholid', '2023-05-14', 50, 'Lelaki', 'satiyaganes.sg@gmail.com', 'Melayu', '110, Lorong Peramkkku Permai 7, 26600, Pekan, Pahang', '01542222244', '2222222221', 'PHD & Master', 'PROGRAMMERS', 1500.00, '5, Jln 4/1, Perak Darul Ridzuan, Malaysia', '0327378730', NULL),
('970608232207', 646590, 'M. K. Sybil', '9997-02-05', 21, 'Lelaki', 'ruslan24@hotmail.com', 'Melayu', '29, Jalan 6, Simpang Empat, 89096, Pahang', '60152211779', '2222222221', 'PHD & Master', 'PROGRAMMERS', 5500.00, '5, Jln 4/1, Perak Darul Ridzuan, Malaysia', '0327378730', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Staff_Info`
--

CREATE TABLE `Staff_Info` (
  `Staff_Id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Account_Id` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `StaffName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `StaffAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StaffNumberPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `StaffEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `StaffType` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Staff_Info`
--

INSERT INTO `Staff_Info` (`Staff_Id`, `Account_Id`, `StaffName`, `StaffAddress`, `StaffNumberPhone`, `StaffEmail`, `StaffType`) VALUES
('645fdb54c787d', '645fdb54b6372', 'AHMAD KHOLID BIN KHUZAIN', '110, Lorong Peramkkku Permai 7, 26600, Pekan, Pahang', '01542222244', 'navig543@gmail.com', 'Jaip Staff'),
('64626cb45f930', '64626cb44e1d9', 'Neo Beng Qu', '47, Jln Maharajalela 6P', '04-9021355', 'csyafrin@example.org', 'Penasihat'),
('64627014da82b', '64627014bd988', 'Pushpa Saravanan a/l Maniam', '383, Jalan Cantonment 91', '0198901414', 'kasthuriraani.pg@hotmail.com', 'Jaip Staff'),
('6465964b2c828', '6465964b19391', 'Haji Nazrin bin Che Badri Shar', '383, Jalan Cantonment 9', '60127253211', 'mazlan.chris@hotmail.com', 'Jaip Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account_Info`
--
ALTER TABLE `Account_Info`
  ADD PRIMARY KEY (`Account_Id`);

--
-- Indexes for table `Admin_Info`
--
ALTER TABLE `Admin_Info`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `Applicant_Info`
--
ALTER TABLE `Applicant_Info`
  ADD PRIMARY KEY (`Applicant_Ic`),
  ADD UNIQUE KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `Staff_Info`
--
ALTER TABLE `Staff_Info`
  ADD PRIMARY KEY (`Staff_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
