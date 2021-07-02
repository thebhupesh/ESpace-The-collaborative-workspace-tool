-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2021 at 12:17 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcwt`
--
CREATE DATABASE IF NOT EXISTS `tcwt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tcwt`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MID` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Username`, `Password`, `MID`, `type`) VALUES
('M3981', '1234', 'M3981', 'mm'),
('PM101', '1234abcd', 'PM101', 'pm'),
('M6740', 'M6740', 'M6740', 'th'),
('M3939', '1234', 'M3939', 'th'),
('M3480', 'M3480', 'M3480', 'mm'),
('M3290', 'M3290', 'M3290', 'th');

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

DROP TABLE IF EXISTS `communication`;
CREATE TABLE IF NOT EXISTS `communication` (
  `MsgID` varchar(6) NOT NULL,
  `Msg` text NOT NULL,
  `TID` varchar(6) NOT NULL,
  `PID` varchar(6) NOT NULL,
  `type` varchar(6) NOT NULL,
  `SenderID` varchar(6) NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`MsgID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`MsgID`, `Msg`, `TID`, `PID`, `type`, `SenderID`, `Time`) VALUES
('B9326', 'hiii', 'T1958', 'P2157', 't', 'PM101', '2021-05-21 20:05:34'),
('B1071', 'Keep it up guys!!!', 'T1958', 'P2157', 't', 'M3939', '2021-05-21 01:20:02'),
('B6072', 'Hello Team Design...', 'T1958', 'P2157', 't', 'PM101', '2021-05-21 01:02:43'),
('B1788', 'Hello UI Team...', 'T1958', 'P2157', 'p', 'PM101', '2021-05-21 01:00:35'),
('B7449', 'Hello Everyone!!!', 'T1958', 'P2157', 'p', 'PM101', '2021-05-21 01:00:08'),
('B1210', 'hi team mates', 'T1958', 'P2157', 't', 'M3939', '2021-05-21 20:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `MID` varchar(6) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TID` varchar(6) NOT NULL,
  `PID` varchar(6) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`MID`,`PID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MID`, `Name`, `TID`, `PID`, `Designation`, `DOB`, `contact`) VALUES
('PM101', 'Aditya Anavekar', '', '', 'Project Manager', '2001-06-14', '9876543210'),
('M3939', 'Bhupesh Pandey', 'T1958', 'P2157', 'Team Head', '2000-06-17', '8877665544'),
('M6740', 'Divyansh Jain', 'T1859', 'P2157', 'Team Head', '2001-08-08', '7766554433'),
('M3981', 'Noob', 'T1958', 'P2157', 'Member', '2001-01-01', '6655443322'),
('M3480', 'Shahrukh Khan', 'T1958', 'P2157', 'Member', '1977-11-02', '7777777777'),
('M3290', 'Divyansh Jain', 'T4770', 'P2157', 'Team Head', '2021-05-11', '6666666666');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `PID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Due_date` date NOT NULL,
  `Description` text NOT NULL,
  `PMID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`PID`, `PName`, `Due_date`, `Description`, `PMID`) VALUES
('P7977', 'AI Tic-Tac-Toe', '2021-06-30', 'Unbeatable tic tac toe game.', 'PM101'),
('P6743', 'Project Tiger', '2022-05-17', 'Save tigers.', 'PM101'),
('P2157', 'Exam Portal', '2020-05-31', 'Secure examination system.', 'PM101');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `TID` varchar(6) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PID` varchar(6) NOT NULL,
  `THID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`TID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`TID`, `Name`, `Description`, `PID`, `THID`) VALUES
('T1958', 'UI Team', 'Team deals with UI Design.', 'P2157', 'M3939'),
('T1859', 'Security Team', 'Deals with website security.', 'P2157', 'M6740'),
('T4770', 'Backend Team', 'Deals with back-end functioning of website.', 'P2157', 'M3290');

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

DROP TABLE IF EXISTS `workspace`;
CREATE TABLE IF NOT EXISTS `workspace` (
  `WID` varchar(6) NOT NULL,
  `WName` varchar(20) NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TID` varchar(6) NOT NULL,
  `PID` varchar(6) NOT NULL,
  PRIMARY KEY (`WID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`WID`, `WName`, `Description`, `TID`, `PID`) VALUES
('W7726', 'CSS Details', 'Style sheet code.', 'T1958', 'P2157');

-- --------------------------------------------------------

--
-- Table structure for table `workspace_files`
--

DROP TABLE IF EXISTS `workspace_files`;
CREATE TABLE IF NOT EXISTS `workspace_files` (
  `WID` varchar(6) NOT NULL,
  `version` int NOT NULL,
  `title` text NOT NULL,
  `data` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `TID` varchar(6) NOT NULL,
  `PID` varchar(6) NOT NULL,
  `EID` varchar(6) NOT NULL,
  PRIMARY KEY (`WID`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workspace_files`
--

INSERT INTO `workspace_files` (`WID`, `version`, `title`, `data`, `timestamp`, `TID`, `PID`, `EID`) VALUES
('W7726', 2, 'Title', 'Good to startsadadasdsadas asbdasd<br>', '2021-05-21 08:07:05', ' ', ' ', 'M3939'),
('W7726', 1, 'Title', 'Good to startsadadasdsadas', '2021-05-21 08:06:52', ' ', ' ', 'M3939'),
('W3834', 1, 'UI Details<br>', 'CSS file name: main.css<br>', '2021-05-21 01:19:37', ' ', ' ', 'M3939');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
