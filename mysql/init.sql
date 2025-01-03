-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 08:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `hrm_holidy`
--

CREATE TABLE `hrm_holidy` (
  `hrm_HoliRwId` int(11) NOT NULL,
  `hrm_HoliName` varchar(255) NOT NULL,
  `hrm_HoliDescrip` varchar(255) NOT NULL,
  `hrm_HoliUniId` varchar(255) NOT NULL,
  `hrm_HoliIpAdds` varchar(255) NOT NULL,
  `hrm_HoliCretdBy` int(11) NOT NULL,
  `hrm_HoliCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_holidy`
--

INSERT INTO `hrm_holidy` (`hrm_HoliRwId`, `hrm_HoliName`, `hrm_HoliDescrip`, `hrm_HoliUniId`, `hrm_HoliIpAdds`, `hrm_HoliCretdBy`, `hrm_HoliCretdOn`) VALUES
(3, 'Memorial Day', 'Government Holiday', '64fd57baeef90', '::1', 1, '2023-09-10 11:15:25'),
(4, 'Ramazan', 'Government Holiday', '6502b411de96a', '::1', 1, '2023-09-14 12:49:58'),
(5, 'Christmas', 'December 25 26', '676bcf133f1e2', '::1', 1, '2024-12-25 14:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_leavreg`
--

CREATE TABLE `hrm_leavreg` (
  `LeavReg_RwId` int(11) NOT NULL,
  `LeavReg_StDat` date NOT NULL,
  `LeavReg_EnDat` date NOT NULL,
  `hrm_DepRwId` int(11) NOT NULL,
  `Staf_RwId` int(11) NOT NULL,
  `Emp_RwId` int(11) NOT NULL,
  `LeavReg_Stats` int(11) NOT NULL,
  `LeavReg_UnId` varchar(255) NOT NULL,
  `LeavReg_IpAds` varchar(255) NOT NULL,
  `LeavReg_CretdBy` int(11) NOT NULL,
  `LeavReg_CretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_leavreg`
--

INSERT INTO `hrm_leavreg` (`LeavReg_RwId`, `LeavReg_StDat`, `LeavReg_EnDat`, `hrm_DepRwId`, `Staf_RwId`, `Emp_RwId`, `LeavReg_Stats`, `LeavReg_UnId`, `LeavReg_IpAds`, `LeavReg_CretdBy`, `LeavReg_CretdOn`) VALUES
(3, '2023-09-22', '2023-09-23', 3, 6, 2, 1, '650a6db93f151', '::1', 1, '2023-09-20 09:28:02'),
(4, '2023-09-20', '2023-09-20', 1, 2, 1, 1, '650a6dcf0016b', '::1', 1, '2023-09-20 09:28:18'),
(5, '2024-12-25', '2024-12-25', 6, 7, 3, 1, '676bced649946', '::1', 1, '2024-12-25 14:52:44'),
(6, '2024-12-31', '2024-12-31', 6, 7, 1, 1, '6773952019c3d', '::1', 1, '2024-12-31 12:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_leavsetup`
--

CREATE TABLE `hrm_leavsetup` (
  `hrm_LvSetRwId` int(11) NOT NULL,
  `hrm_LeaveRwId` int(11) NOT NULL,
  `hrm_DesRwId` int(11) NOT NULL,
  `hrm_GendrRwId` int(11) NOT NULL,
  `hrm_ValidRwId` int(11) NOT NULL,
  `hrm_LvSetPrMnth` int(11) NOT NULL,
  `hrm_DepRwId` int(11) NOT NULL,
  `hrm_GradRwId` int(11) NOT NULL,
  `hrm_CarryRwId` int(11) NOT NULL,
  `hrm_LvSetTotDay` int(11) NOT NULL,
  `hrm_StatRwId` int(11) NOT NULL,
  `hrm_LvSetEncDy` int(11) NOT NULL,
  `hrm_BridRwId` int(11) NOT NULL,
  `hrm_LvSetMnthfre` int(11) NOT NULL,
  `hrm_LvSetUnId` varchar(255) NOT NULL,
  `hrm_LvSetIpAds` varchar(255) NOT NULL,
  `hrm_LvSetCretdBy` int(11) NOT NULL,
  `hrm_LvSetCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_leavsetup`
--

INSERT INTO `hrm_leavsetup` (`hrm_LvSetRwId`, `hrm_LeaveRwId`, `hrm_DesRwId`, `hrm_GendrRwId`, `hrm_ValidRwId`, `hrm_LvSetPrMnth`, `hrm_DepRwId`, `hrm_GradRwId`, `hrm_CarryRwId`, `hrm_LvSetTotDay`, `hrm_StatRwId`, `hrm_LvSetEncDy`, `hrm_BridRwId`, `hrm_LvSetMnthfre`, `hrm_LvSetUnId`, `hrm_LvSetIpAds`, `hrm_LvSetCretdBy`, `hrm_LvSetCretdOn`) VALUES
(1, 7, 6, 2, 3, 19, 6, 4, 3, 30, 1, 14, 5, 14, '6503fbaea39fa', '::1', 1, '2023-09-15 12:08:23'),
(2, 4, 6, 2, 3, 6, 6, 2, 3, 6, 1, 9, 3, 10, '6502c284c0214', '::1', 1, '2023-09-14 13:52:09'),
(3, 3, 4, 2, 3, 4, 4, 1, 3, 4, 1, 9, 2, 10, '6502c2b5a948f', '::1', 1, '2023-09-14 13:52:43'),
(4, 1, 3, 2, 2, 8, 2, 2, 2, 8, 1, 9, 2, 10, '6502c2d6ad225', '::1', 1, '2023-09-14 13:53:16'),
(6, 7, 3, 2, 3, 4, 6, 6, 3, 4, 1, 7, 3, 7, '67699e36039e5', '::1', 1, '2024-12-23 23:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setbridge`
--

CREATE TABLE `hrm_setbridge` (
  `hrm_BridRwId` int(11) NOT NULL,
  `hrm_BridNam` varchar(100) NOT NULL,
  `hrm_BridUnId` varchar(255) NOT NULL,
  `hrm_BridIpAd` varchar(255) NOT NULL,
  `hrm_BridCretdBy` int(11) NOT NULL,
  `hrm_BridCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setbridge`
--

INSERT INTO `hrm_setbridge` (`hrm_BridRwId`, `hrm_BridNam`, `hrm_BridUnId`, `hrm_BridIpAd`, `hrm_BridCretdBy`, `hrm_BridCretdOn`) VALUES
(1, 'A', '64ffe83354b37', '::1', 1, '2023-09-12 09:55:26'),
(2, 'B', '64ffe8418704d', '::1', 1, '2023-09-12 09:55:41'),
(3, 'C', '64ffe84d738b6', '::1', 1, '2023-09-12 09:55:52'),
(5, 'D', '6502cd418a0fa', '::1', 1, '2023-09-14 14:37:17'),
(7, 'E', '6502d491834f5', '::1', 1, '2023-09-14 15:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setcarry`
--

CREATE TABLE `hrm_setcarry` (
  `hrm_CarryRwId` int(11) NOT NULL,
  `hrm_CarryNam` varchar(100) NOT NULL,
  `hrm_CarryUId` varchar(255) NOT NULL,
  `hrm_CarryIpAds` varchar(255) NOT NULL,
  `hrm_CarryCretdBy` int(11) NOT NULL,
  `hrm_CarryCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setcarry`
--

INSERT INTO `hrm_setcarry` (`hrm_CarryRwId`, `hrm_CarryNam`, `hrm_CarryUId`, `hrm_CarryIpAds`, `hrm_CarryCretdBy`, `hrm_CarryCretdOn`) VALUES
(3, 'Carry Over A', '3', '::1', 1, '2023-09-14 16:14:24'),
(5, 'Carry Over C', '5', '::1', 1, '2023-09-14 16:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setdepart`
--

CREATE TABLE `hrm_setdepart` (
  `hrm_DepRwId` int(11) NOT NULL,
  `hrm_DepNam` varchar(255) NOT NULL,
  `hrm_DepUId` varchar(255) NOT NULL,
  `hrm_DepIpAds` varchar(255) NOT NULL,
  `hrm_DepCretdBy` int(11) NOT NULL,
  `hrm_DepCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setdepart`
--

INSERT INTO `hrm_setdepart` (`hrm_DepRwId`, `hrm_DepNam`, `hrm_DepUId`, `hrm_DepIpAds`, `hrm_DepCretdBy`, `hrm_DepCretdOn`) VALUES
(1, 'IT Department', '', '', 0, '2023-09-10 10:14:48'),
(2, 'HR Department', '', '', 0, '2023-09-10 10:14:48'),
(3, 'Operation Management Department', '', '', 0, '2023-09-10 10:14:48'),
(4, 'Marketing Department', '', '', 0, '2023-09-10 10:14:48'),
(6, 'Production', '64ffeae50f437', '::1', 1, '2023-09-12 10:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setdesig`
--

CREATE TABLE `hrm_setdesig` (
  `hrm_DesRwId` int(11) NOT NULL,
  `hrm_DesNam` varchar(255) NOT NULL,
  `hrm_DesUnId` varchar(255) NOT NULL,
  `hrm_DesIpAds` varchar(255) NOT NULL,
  `hrm_DesCretdBy` int(11) NOT NULL,
  `hrm_DesCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setdesig`
--

INSERT INTO `hrm_setdesig` (`hrm_DesRwId`, `hrm_DesNam`, `hrm_DesUnId`, `hrm_DesIpAds`, `hrm_DesCretdBy`, `hrm_DesCretdOn`) VALUES
(1, 'Manager', '', '', 0, '2024-12-21 15:17:08'),
(2, 'Head of department', '', '', 0, '2024-12-21 15:17:08'),
(4, 'Production supervisor', '', '', 0, '2024-12-21 15:19:14'),
(5, 'IT Assistant', '', '', 0, '2024-12-21 15:20:31'),
(6, 'Account assistant', '676bcfbf6ccc2', '::1', 1, '2024-12-25 14:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setemp`
--

CREATE TABLE `hrm_setemp` (
  `Emp_RwId` int(11) NOT NULL,
  `Emp_Nam` varchar(255) NOT NULL,
  `Emp_Num` int(4) NOT NULL,
  `Emp_StaffId` int(11) NOT NULL,
  `Emp_DepId` int(11) NOT NULL,
  `Emp_DesigId` int(11) NOT NULL,
  `Emp_UnId` varchar(255) NOT NULL,
  `Emp_IpAds` varchar(255) NOT NULL,
  `Emp_CretdBy` int(11) NOT NULL,
  `Emp_CretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setemp`
--

INSERT INTO `hrm_setemp` (`Emp_RwId`, `Emp_Nam`, `Emp_Num`, `Emp_StaffId`, `Emp_DepId`, `Emp_DesigId`, `Emp_UnId`, `Emp_IpAds`, `Emp_CretdBy`, `Emp_CretdOn`) VALUES
(1, 'Rangith Perera', 3829, 1, 1, 1, '', '', 0, '2024-12-22 00:48:03'),
(2, 'Sirimanna Dasanayaka', 3819, 2, 2, 2, '', '', 0, '2024-12-22 00:48:11'),
(3, 'Mahanama Silva', 3820, 6, 4, 5, '', '', 0, '2024-12-31 12:28:29'),
(4, 'Kithsiri Wijewardhana', 3830, 7, 6, 4, '', '', 0, '2024-12-22 00:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setgendr`
--

CREATE TABLE `hrm_setgendr` (
  `hrm_GendrRwId` int(11) NOT NULL,
  `hrm_GendrNam` varchar(15) NOT NULL,
  `hrm_GendrCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setgendr`
--

INSERT INTO `hrm_setgendr` (`hrm_GendrRwId`, `hrm_GendrNam`, `hrm_GendrCretdOn`) VALUES
(1, 'Male', '2023-09-10 13:47:10'),
(2, 'Female', '2023-09-10 13:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setgrad`
--

CREATE TABLE `hrm_setgrad` (
  `hrm_GradRwId` int(11) NOT NULL,
  `hrm_GradNam` varchar(100) NOT NULL,
  `hrm_GradUnId` varchar(255) NOT NULL,
  `hrm_GradIpAds` varchar(255) NOT NULL,
  `hrm_GradCretdBy` int(11) NOT NULL,
  `hrm_GradCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setgrad`
--

INSERT INTO `hrm_setgrad` (`hrm_GradRwId`, `hrm_GradNam`, `hrm_GradUnId`, `hrm_GradIpAds`, `hrm_GradCretdBy`, `hrm_GradCretdOn`) VALUES
(1, 'Grade E', '6503d62556829', '::1', 1, '2023-09-15 09:27:33'),
(2, 'Grade B', '64ffe4f72ddeb', '::1', 1, '2023-09-12 09:41:37'),
(4, 'Grade A', '6503ce5029db6', '::1', 1, '2023-09-15 08:54:06'),
(6, 'grade v', '6503db0e817f8', '::1', 1, '2023-09-15 09:48:24'),
(7, 'grade F', '6503db52ea370', '::1', 1, '2023-09-15 09:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setleave`
--

CREATE TABLE `hrm_setleave` (
  `hrm_LeaveRwId` int(11) NOT NULL,
  `hrm_LeaveNam` varchar(100) NOT NULL,
  `hrm_LeaveUnId` varchar(255) NOT NULL,
  `hrm_LeaveIpAds` varchar(255) NOT NULL,
  `hrm_LeaveCretdBy` int(11) NOT NULL,
  `hrm_LeaveCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setleave`
--

INSERT INTO `hrm_setleave` (`hrm_LeaveRwId`, `hrm_LeaveNam`, `hrm_LeaveUnId`, `hrm_LeaveIpAds`, `hrm_LeaveCretdBy`, `hrm_LeaveCretdOn`) VALUES
(1, 'Unpaid Leave', '65001ec29ca9f', '::1', 1, '2023-09-12 13:48:16'),
(2, 'Emergency Leave', '64fd9be22f954', '::1', 1, '2023-09-10 16:21:24'),
(3, 'Personal Leave', '64fd9f6b3ba6a', '::1', 1, '2023-09-10 16:20:31'),
(4, 'Military Leave', '64fd9fc355df0', '::1', 1, '2023-09-10 16:22:18'),
(5, 'Special Leave', '64fda4c95ed30', '::1', 1, '2023-09-10 16:43:24'),
(7, 'Voluntary', '6503d95b8ba46', '::1', 1, '2023-09-15 09:41:11'),
(8, 'nonVoluntary', '6503da3fb7fc2', '::1', 1, '2023-09-15 09:44:59'),
(11, 'short leave', '6766defd04b52', '::1', 1, '2024-12-21 21:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setstaf`
--

CREATE TABLE `hrm_setstaf` (
  `Staf_RwId` int(11) NOT NULL,
  `Staf_Nam` varchar(255) NOT NULL,
  `Staf_UnId` varchar(255) NOT NULL,
  `Staf_IpAds` varchar(255) NOT NULL,
  `Staf_CretdBy` int(11) NOT NULL,
  `Staf_CretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setstaf`
--

INSERT INTO `hrm_setstaf` (`Staf_RwId`, `Staf_Nam`, `Staf_UnId`, `Staf_IpAds`, `Staf_CretdBy`, `Staf_CretdOn`) VALUES
(1, 'Part-time', '', '', 0, '2023-09-17 15:49:54'),
(2, 'Full-time\r\n', '', '', 0, '2023-09-17 15:50:06'),
(3, 'Seasonal\r\n', '', '', 0, '2023-09-17 15:50:17'),
(4, 'Temporary\r\n', '', '', 0, '2023-09-17 15:50:30'),
(5, 'Leased', '', '', 0, '2023-09-17 15:50:46'),
(6, 'Contractors', '', '', 0, '2023-09-17 15:48:09'),
(7, 'Interns', '', '', 0, '2023-09-17 15:48:42'),
(8, 'Permenant', '', '', 0, '2023-09-17 15:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setstats`
--

CREATE TABLE `hrm_setstats` (
  `hrm_StatRwId` int(11) NOT NULL,
  `hrm_StatNam` varchar(100) NOT NULL,
  `hrm_StatCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setstats`
--

INSERT INTO `hrm_setstats` (`hrm_StatRwId`, `hrm_StatNam`, `hrm_StatCretdOn`) VALUES
(1, 'Pending', '2023-09-10 14:05:10'),
(2, 'Active', '2023-09-10 14:05:10'),
(3, 'Deactive', '2023-09-10 14:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setvalid`
--

CREATE TABLE `hrm_setvalid` (
  `hrm_ValidRwId` int(11) NOT NULL,
  `hrm_ValidNam` varchar(100) NOT NULL,
  `hrm_ValidUId` varchar(255) NOT NULL,
  `hrm_ValidIpAds` varchar(255) NOT NULL,
  `hrm_ValidCretdBy` int(11) NOT NULL,
  `hrm_ValidCretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_setvalid`
--

INSERT INTO `hrm_setvalid` (`hrm_ValidRwId`, `hrm_ValidNam`, `hrm_ValidUId`, `hrm_ValidIpAds`, `hrm_ValidCretdBy`, `hrm_ValidCretdOn`) VALUES
(2, 'Validity Two', '64ffdc13bceef', '::1', 1, '2023-09-12 09:03:49'),
(3, 'Validity Three', '64ffdc364e6f5', '::1', 1, '2023-09-12 09:04:30'),
(4, 'Validity Four', '64ffdc5861c04', '::1', 1, '2023-09-12 09:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_staffmonsal`
--

CREATE TABLE `hrm_staffmonsal` (
  `SalMon_RwId` int(11) NOT NULL,
  `Sal_empno` int(10) NOT NULL,
  `Sal_empnnam` varchar(100) NOT NULL,
  `Sal_Stafnam` varchar(100) NOT NULL,
  `Sal_Depnam` varchar(100) NOT NULL,
  `Sal_Desnam` varchar(100) NOT NULL,
  `Sal_Month` varchar(100) NOT NULL,
  `Sal_year` int(4) NOT NULL,
  `Sal_Workdays` int(11) NOT NULL,
  `Sal_BasicSlry` decimal(12,2) NOT NULL,
  `Sal_IncreA` decimal(12,2) NOT NULL,
  `Sal_IncreB` decimal(12,2) NOT NULL,
  `Sal_SpeAllow` decimal(12,2) NOT NULL,
  `Sal_ExpAllow` decimal(12,2) NOT NULL,
  `Sal_Gross` decimal(12,2) NOT NULL,
  `Sal_EPF` decimal(12,2) NOT NULL,
  `Sal_NoPay` decimal(12,2) NOT NULL,
  `Sal_Advance` decimal(12,2) NOT NULL,
  `Sal_MobleBill` decimal(12,2) NOT NULL,
  `Sal_Loan` decimal(12,2) NOT NULL,
  `Sal_IncmTax` decimal(12,2) NOT NULL,
  `Sal_WithHldTax` decimal(12,2) NOT NULL,
  `Sal_DedTot` decimal(12,2) NOT NULL,
  `Sal_SalryNet` decimal(12,2) NOT NULL,
  `SalMon_UnqId` varchar(255) NOT NULL,
  `SalMon_IPadds` varchar(255) NOT NULL,
  `SalMon_CretdBy` int(11) NOT NULL,
  `SalMon_CretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_staffmonsal`
--

INSERT INTO `hrm_staffmonsal` (`SalMon_RwId`, `Sal_empno`, `Sal_empnnam`, `Sal_Stafnam`, `Sal_Depnam`, `Sal_Desnam`, `Sal_Month`, `Sal_year`, `Sal_Workdays`, `Sal_BasicSlry`, `Sal_IncreA`, `Sal_IncreB`, `Sal_SpeAllow`, `Sal_ExpAllow`, `Sal_Gross`, `Sal_EPF`, `Sal_NoPay`, `Sal_Advance`, `Sal_MobleBill`, `Sal_Loan`, `Sal_IncmTax`, `Sal_WithHldTax`, `Sal_DedTot`, `Sal_SalryNet`, `SalMon_UnqId`, `SalMon_IPadds`, `SalMon_CretdBy`, `SalMon_CretdOn`) VALUES
(1, 3830, 'Kithsiri Wijewardhana', 'Interns', 'Production', 'Production supervisor', 'December', 2024, 26, 35000.00, 0.00, 0.00, 0.00, 0.00, 35000.00, 2800.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2800.00, 32200.00, '6769780f4f42d', '::1', 1, '2024-12-23 20:18:01'),
(3, 3819, 'Sirimanna Dasanayaka', 'Full-time', 'HR Department', 'Head of department', 'December', 2024, 26, 45000.00, 10000.00, 0.00, 0.00, 0.00, 55000.00, 4400.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4400.00, 50600.00, '6769783b0fd98', '::1', 1, '2024-12-23 20:18:41'),
(4, 3829, 'Rangith Perera', 'Part-time', 'IT Department', 'Manager', 'December', 2024, 26, 100000.00, 0.00, 0.00, 0.00, 0.00, 100000.00, 8000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8000.00, 92000.00, '67698742dc758', '::1', 1, '2024-12-23 21:22:45'),
(5, 3829, 'Rangith Perera', 'Part-time', 'IT Department', 'Manager', 'December', 2024, 10, 75000.00, 10000.00, 0.00, 0.00, 0.00, 85000.00, 6800.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 6800.00, 78200.00, '67698a7b52483', '::1', 1, '2024-12-23 21:36:38'),
(9, 3820, 'Mahanama Silva', 'Contractors', 'Marketing Department', 'IT Assistant', 'December', 2024, 15, 35000.00, 40000.00, 0.00, 0.00, 0.00, 75000.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 6000.00, 69000.00, '6773961c1ce8a', '::1', 1, '2024-12-31 12:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `sj_dhh_login`
--

CREATE TABLE `sj_dhh_login` (
  `SJ_DHH_RowID` int(11) NOT NULL,
  `SJ_DHH_UserID` varchar(4) NOT NULL,
  `SJ_DHH_UserName` varchar(20) NOT NULL,
  `SJ_DHH_Password` varchar(32) NOT NULL,
  `SJ_DHH_Status` int(11) NOT NULL,
  `SJ_DHH_Prive` int(11) NOT NULL,
  `SJ_DHH_CretdOn` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sj_dhh_login`
--

INSERT INTO `sj_dhh_login` (`SJ_DHH_RowID`, `SJ_DHH_UserID`, `SJ_DHH_UserName`, `SJ_DHH_Password`, `SJ_DHH_Status`, `SJ_DHH_Prive`, `SJ_DHH_CretdOn`) VALUES
(6, '3829', 'hansani', '25d55ad283aa400af464c76d713c07ad', 0, 1, '2024-12-27 13:57:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hrm_holidy`
--
ALTER TABLE `hrm_holidy`
  ADD PRIMARY KEY (`hrm_HoliRwId`);

--
-- Indexes for table `hrm_leavreg`
--
ALTER TABLE `hrm_leavreg`
  ADD PRIMARY KEY (`LeavReg_RwId`);

--
-- Indexes for table `hrm_leavsetup`
--
ALTER TABLE `hrm_leavsetup`
  ADD PRIMARY KEY (`hrm_LvSetRwId`);

--
-- Indexes for table `hrm_setbridge`
--
ALTER TABLE `hrm_setbridge`
  ADD PRIMARY KEY (`hrm_BridRwId`);

--
-- Indexes for table `hrm_setcarry`
--
ALTER TABLE `hrm_setcarry`
  ADD PRIMARY KEY (`hrm_CarryRwId`);

--
-- Indexes for table `hrm_setdepart`
--
ALTER TABLE `hrm_setdepart`
  ADD PRIMARY KEY (`hrm_DepRwId`);

--
-- Indexes for table `hrm_setdesig`
--
ALTER TABLE `hrm_setdesig`
  ADD PRIMARY KEY (`hrm_DesRwId`);

--
-- Indexes for table `hrm_setemp`
--
ALTER TABLE `hrm_setemp`
  ADD PRIMARY KEY (`Emp_RwId`);

--
-- Indexes for table `hrm_setgendr`
--
ALTER TABLE `hrm_setgendr`
  ADD PRIMARY KEY (`hrm_GendrRwId`);

--
-- Indexes for table `hrm_setgrad`
--
ALTER TABLE `hrm_setgrad`
  ADD PRIMARY KEY (`hrm_GradRwId`);

--
-- Indexes for table `hrm_setleave`
--
ALTER TABLE `hrm_setleave`
  ADD PRIMARY KEY (`hrm_LeaveRwId`);

--
-- Indexes for table `hrm_setstaf`
--
ALTER TABLE `hrm_setstaf`
  ADD PRIMARY KEY (`Staf_RwId`);

--
-- Indexes for table `hrm_setstats`
--
ALTER TABLE `hrm_setstats`
  ADD PRIMARY KEY (`hrm_StatRwId`);

--
-- Indexes for table `hrm_setvalid`
--
ALTER TABLE `hrm_setvalid`
  ADD PRIMARY KEY (`hrm_ValidRwId`);

--
-- Indexes for table `hrm_staffmonsal`
--
ALTER TABLE `hrm_staffmonsal`
  ADD PRIMARY KEY (`SalMon_RwId`);

--
-- Indexes for table `sj_dhh_login`
--
ALTER TABLE `sj_dhh_login`
  ADD PRIMARY KEY (`SJ_DHH_RowID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hrm_holidy`
--
ALTER TABLE `hrm_holidy`
  MODIFY `hrm_HoliRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hrm_leavreg`
--
ALTER TABLE `hrm_leavreg`
  MODIFY `LeavReg_RwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hrm_leavsetup`
--
ALTER TABLE `hrm_leavsetup`
  MODIFY `hrm_LvSetRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hrm_setbridge`
--
ALTER TABLE `hrm_setbridge`
  MODIFY `hrm_BridRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hrm_setcarry`
--
ALTER TABLE `hrm_setcarry`
  MODIFY `hrm_CarryRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hrm_setdepart`
--
ALTER TABLE `hrm_setdepart`
  MODIFY `hrm_DepRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hrm_setdesig`
--
ALTER TABLE `hrm_setdesig`
  MODIFY `hrm_DesRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hrm_setemp`
--
ALTER TABLE `hrm_setemp`
  MODIFY `Emp_RwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hrm_setgendr`
--
ALTER TABLE `hrm_setgendr`
  MODIFY `hrm_GendrRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hrm_setgrad`
--
ALTER TABLE `hrm_setgrad`
  MODIFY `hrm_GradRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hrm_setleave`
--
ALTER TABLE `hrm_setleave`
  MODIFY `hrm_LeaveRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hrm_setstaf`
--
ALTER TABLE `hrm_setstaf`
  MODIFY `Staf_RwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hrm_setstats`
--
ALTER TABLE `hrm_setstats`
  MODIFY `hrm_StatRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hrm_setvalid`
--
ALTER TABLE `hrm_setvalid`
  MODIFY `hrm_ValidRwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hrm_staffmonsal`
--
ALTER TABLE `hrm_staffmonsal`
  MODIFY `SalMon_RwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sj_dhh_login`
--
ALTER TABLE `sj_dhh_login`
  MODIFY `SJ_DHH_RowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
