-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 03:40 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('SuperAdmin', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('RbacAdmin', 2, '', '', ''),
('RbacAssignmentEditor', 1, '', '', ''),
('RbacAssignmentViewer', 0, '', '', ''),
('RbacEditor', 1, '', '', ''),
('RbacViewer', 0, '', '', ''),
('registered', 2, 'Default role by Yii-conf', 'return !Yii::app()->user->isGuest;', ''),
('SuperAdmin', 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('SuperAdmin', 'RbacAdmin'),
('RbacAdmin', 'RbacAssignmentEditor'),
('RbacAssignmentEditor', 'RbacAssignmentViewer'),
('RbacAdmin', 'RbacEditor'),
('RbacEditor', 'RbacViewer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbook`
--

CREATE TABLE IF NOT EXISTS `tbl_cashbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemeid` int(11) NOT NULL,
  `from` int(11) NOT NULL COMMENT 'userid',
  `to` int(11) NOT NULL COMMENT 'userid',
  `amount` double NOT NULL,
  `dateoftr` date NOT NULL,
  `trtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trdetails` text COLLATE utf8_unicode_ci NOT NULL,
  `trdoc` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `code`) VALUES
(1, 'Rural Development Department', 'rd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE IF NOT EXISTS `tbl_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_type_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('district','department','govt') COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `district` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`id`, `designation_type_id`, `details`, `user`, `level`, `level_id`) VALUES
(1, 0, 'District Magistrate', '3', 'district', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation_types`
--

CREATE TABLE IF NOT EXISTS `tbl_designation_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('district','department','govt') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'district',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_designation_types`
--

INSERT INTO `tbl_designation_types` (`id`, `name`, `level`) VALUES
(1, 'जिलाधिकारी', 'district'),
(2, 'मुख्य विकास अधिकारी', 'district'),
(3, 'परियोजना निदेशक', 'district');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `districtcode` tinyint(4) NOT NULL,
  `hqr` text COLLATE utf8_unicode_ci NOT NULL,
  `loc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tehsils` tinyint(4) NOT NULL,
  `blocks` tinyint(4) NOT NULL,
  `revvill` mediumint(9) NOT NULL,
  `panchayats` mediumint(9) NOT NULL,
  `area` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `districtcode`, `hqr`, `loc`, `tehsils`, `blocks`, `revvill`, `panchayats`, `area`) VALUES
(1, 'Mainpuri', 25, '', '', 3, 9, 853, 503, 2345);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `path` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleteAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updateAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `viewAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `originalname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objecttype` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'object to which files are attached',
  `objectid` int(11) NOT NULL DEFAULT '0' COMMENT 'id of the object to which attached',
  `uploadedby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `title`, `desc`, `mimetype`, `size`, `path`, `deleteAccess`, `updateAccess`, `viewAccess`, `originalname`, `md5`, `objecttype`, `objectid`, `uploadedby`) VALUES
(1, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(2, 'test1.xls', '', 'application/vnd.ms-excel', '18944', 'application.data.files', '', '', '', 'test1.xls', '1bfa1223cd4fa9b3ee3fd1c562d2f5e5', '', 0, ''),
(3, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(4, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(5, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(6, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(7, 'LICENSE', '', 'text/plain', '1626', 'application.data.files', '', '', '', 'LICENSE', 'fe6316d29b7ddc7620263074835d28f2', '', 0, ''),
(8, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(9, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(10, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(11, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(12, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(13, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(14, 'Chennai-Jhansi.pdf', '', 'application/pdf', '77636', 'application.data.files', '', '', '', 'Chennai-Jhansi.pdf', '1c633b1d86524b213a6690c1615509b7', '', 0, ''),
(15, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(16, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(17, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(18, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(19, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(20, 'test1.xls', '', 'application/vnd.ms-excel', '18944', 'application.data.files', '', '', '', 'test1.xls', '1bfa1223cd4fa9b3ee3fd1c562d2f5e5', '', 0, ''),
(21, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(22, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(23, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(24, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(25, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(26, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(27, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(28, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(29, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(30, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(31, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(32, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(33, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, ''),
(34, 'Book1.xlsx', '', 'application/zip', '7906', 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, ''),
(35, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(36, 'user1_test1.xml', '', 'application/xml', '415', 'application.data.files', '', '', '', 'user1_test1.xml', 'fa5aa0bcbe86602922c89996a798e0b8', '', 0, ''),
(37, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(38, '_test_test1.xml', '', 'application/xml', '491', 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, ''),
(39, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', '38400', 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_govt`
--

CREATE TABLE IF NOT EXISTS `tbl_govt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructions`
--

CREATE TABLE IF NOT EXISTS `tbl_instructions` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `instruction` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `attachments` blob NOT NULL,
  `parentinst` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`),
  KEY `parentinst` (`parentinst`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issues`
--

CREATE TABLE IF NOT EXISTS `tbl_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemeid` int(11) NOT NULL,
  `parentissue` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `history` text COLLATE utf8_unicode_ci NOT NULL,
  `tagid` int(11) NOT NULL,
  `attachments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `author_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`),
  KEY `parentissue` (`parentissue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_issues`
--

INSERT INTO `tbl_issues` (`id`, `schemeid`, `parentissue`, `from`, `to`, `description`, `status`, `history`, `tagid`, `attachments`, `create_time`, `author_id`, `update_time`, `district_id`) VALUES
(1, 1, 0, 1, 1, '', 0, '', 0, '', 0, '', 0, 0),
(3, 1, 0, 1, 1, '', 0, '', 0, '', 0, '', 0, 0),
(4, 1, 0, 1, 1, '', 0, '', 1, ',26', 0, '', 0, 0),
(5, 1, 0, 1, 0, '', 0, '', 1, '', 0, '', 0, 0),
(6, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(7, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(8, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(9, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(11, 1, 0, 1, 0, '', 0, '', 1, '', 0, '', 0, 0),
(12, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(13, 1, 0, 1, 1, '', 0, '', 1, '', 0, '', 0, 0),
(14, 1, 0, 1, 1, '', 0, '', 1, ',27', 0, '', 0, 0),
(17, 1, 0, 1, 1, '', 0, '', 1, ',28', 0, '', 0, 0),
(18, 1, 0, 1, 1, '', 0, '', 1, ',28', 0, '', 0, 0),
(19, 1, 0, 1, 1, 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(20, 1, 0, 1, 1, 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(21, 1, 0, 1, 1, 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(22, 1, 0, 1, 1, 'hi', 0, '', 1, '', 0, '', 0, 0),
(23, 1, 0, 1, 1, 'kdfjkdfkdkf', 0, '', 1, ',30', 0, '', 0, 0),
(24, 1, 0, 1, 1, 'hiii', 0, '', 1, ',31', 0, '', 0, 0),
(25, 1, 0, 1, 1, 'hiii', 0, '', 1, ',31,31', 0, '', 0, 0),
(26, 1, 0, 1, 1, 'hjhjjhj', 0, '', 1, ',32', 0, '', 0, 0),
(27, 1, 0, 1, 1, 'hihi', 0, '', 1, '', 0, '', 0, 0),
(28, 1, 0, 1, 1, 'hii', 0, '', 1, '', 0, '', 0, 0),
(29, 1, 0, 1, 1, 'hihihiih', 0, '', 1, '', 0, '', 0, 0),
(30, 1, 0, 1, 1, 'hihii', 0, '', 1, '', 0, '', 0, 0),
(31, 1, 0, 1, 1, 'hjjj', 0, '', 1, '', 0, '', 0, 0),
(32, 1, 0, 1, 1, 'hihcid', 0, '', 1, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milestones`
--

CREATE TABLE IF NOT EXISTS `tbl_milestones` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` int(11) NOT NULL,
  `dofmst` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00'),
(2, 'Demo', 'Demo', '0000-00-00'),
(3, 'User', 'Useer', '2012-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE IF NOT EXISTS `tbl_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `update_time` int(11) NOT NULL,
  `attachments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`id`, `issue_id`, `content`, `create_time`, `author_id`, `status`, `update_time`, `attachments`) VALUES
(1, 0, 'What can be done?', 0, 0, 0, 0, ''),
(2, 26, 'hi we are so happy', 0, 0, 0, 0, ''),
(3, 26, 'We are not known outside this world.', 0, 0, 0, 0, ''),
(4, 26, 'hihihiihhhii', 0, 0, 0, 0, ',38'),
(5, 26, 'I am not happy', 0, 1, 0, 0, ',39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schemes`
--

CREATE TABLE IF NOT EXISTS `tbl_schemes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `depid` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depid` (`depid`),
  KEY `admin` (`admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_schemes`
--

INSERT INTO `tbl_schemes` (`id`, `parentid`, `name`, `depid`, `code`, `admin`) VALUES
(1, 0, 'Socio-Economic and Caste Census-2011', 1, 'SECC-2011', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scheme_parameters`
--

CREATE TABLE IF NOT EXISTS `tbl_scheme_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemeid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_summary`
--

CREATE TABLE IF NOT EXISTS `tbl_summary` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `allottment` double NOT NULL,
  `received` double NOT NULL,
  `allotcentral` double NOT NULL,
  `allotstate` double NOT NULL,
  `receivedstate` double NOT NULL,
  `receivedcentral` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schemeid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schemeid` (`schemeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `tag`, `schemeid`) VALUES
(1, 'Tablet PCs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1339574264, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 0, 0, 1),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user@example.com', '112da71d1c917dd1c058a939d0422377', 1338314855, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE IF NOT EXISTS `tbl_vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cashbook`
--
ALTER TABLE `tbl_cashbook`
  ADD CONSTRAINT `tbl_cashbook_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`);

--
-- Constraints for table `tbl_instructions`
--
ALTER TABLE `tbl_instructions`
  ADD CONSTRAINT `tbl_instructions_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`),
  ADD CONSTRAINT `tbl_instructions_ibfk_2` FOREIGN KEY (`parentinst`) REFERENCES `tbl_instructions` (`id`);

--
-- Constraints for table `tbl_issues`
--
ALTER TABLE `tbl_issues`
  ADD CONSTRAINT `tbl_issues_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`);

--
-- Constraints for table `tbl_milestones`
--
ALTER TABLE `tbl_milestones`
  ADD CONSTRAINT `tbl_milestones_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`);

--
-- Constraints for table `tbl_schemes`
--
ALTER TABLE `tbl_schemes`
  ADD CONSTRAINT `tbl_schemes_ibfk_1` FOREIGN KEY (`depid`) REFERENCES `tbl_department` (`id`);

--
-- Constraints for table `tbl_scheme_parameters`
--
ALTER TABLE `tbl_scheme_parameters`
  ADD CONSTRAINT `tbl_scheme_parameters_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD CONSTRAINT `tbl_tags_ibfk_1` FOREIGN KEY (`schemeid`) REFERENCES `tbl_schemes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
