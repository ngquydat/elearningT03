-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2014 at 11:39 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elearning`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminips`
--

CREATE TABLE IF NOT EXISTS `adminips` (
  `userid` int(11) NOT NULL,
  `ipid` char(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`ipid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminips`
--

INSERT INTO `adminips` (`userid`, `ipid`) VALUES
(1, ''),
(1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `userid` int(11) NOT NULL,
  `status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`userid`, `status`) VALUES
(1, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
  `id` char(36) NOT NULL DEFAULT '',
  `ip` varchar(64) DEFAULT NULL,
  `action` varchar(32) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`,`action`),
  KEY `expires` (`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `action`, `created`, `expires`) VALUES
('5342525f-7ec4-469e-acd8-16c08fa129d9', '127.0.0.1', 'login', '2014-04-07 09:23:11', '2014-04-07 09:26:11'),
('53425125-ab6c-427e-a47a-16c08fa129d9', '127.0.0.1', 'login', '2014-04-07 09:17:57', '2014-04-07 09:20:57'),
('53425123-79ec-48a7-b77e-16c08fa129d9', '127.0.0.1', 'login', '2014-04-07 09:17:55', '2014-04-07 09:20:55'),
('53425120-1c78-42bc-86be-16c08fa129d9', '127.0.0.1', 'login', '2014-04-07 09:17:52', '2014-04-07 09:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `bannedlectures`
--

CREATE TABLE IF NOT EXISTS `bannedlectures` (
  `lectureid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lectureid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`lectureid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` date NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`commentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delaccounts`
--

CREATE TABLE IF NOT EXISTS `delaccounts` (
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `storelink` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturehastags`
--

CREATE TABLE IF NOT EXISTS `lecturehastags` (
  `lectureid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  PRIMARY KEY (`lectureid`,`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lectureid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `create_time` date NOT NULL,
  PRIMARY KEY (`lectureid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lectureid`, `title`, `description`, `userid`, `create_time`) VALUES
(2, '聴解', '聴解', 3, '2014-04-07'),
(3, '聴解', '聴解', 3, '2014-04-07'),
(4, '聴解', '聴解', 3, '2014-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `likeid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`likeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registerrequests`
--

CREATE TABLE IF NOT EXISTS `registerrequests` (
  `registerrequestid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `initialverifycode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankaccountinfo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `creditcardinfo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secretquestion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`registerrequestid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `userid` int(11) NOT NULL,
  `lectureid` int(11) NOT NULL,
  `reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`lectureid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `resultid` int(11) NOT NULL AUTO_INCREMENT,
  `testid` int(11) DEFAULT NULL,
  `question` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentdotests`
--

CREATE TABLE IF NOT EXISTS `studentdotests` (
  `studentdotestid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `point` int(50) NOT NULL,
  PRIMARY KEY (`studentdotestid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentlearnlectures`
--

CREATE TABLE IF NOT EXISTS `studentlearnlectures` (
  `lectureid` int(11) NOT NULL,
  `time` date NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`lectureid`,`time`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `userid` int(11) NOT NULL,
  `creditcardinfo` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userid`, `creditcardinfo`) VALUES
(2, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE IF NOT EXISTS `systems` (
  `systemid` int(11) NOT NULL,
  `numberwrongpassword` int(11) NOT NULL,
  `numberviolation` int(11) NOT NULL,
  `timeblocksession` int(11) NOT NULL,
  `lecturecost` int(11) NOT NULL,
  `lecturetime` int(11) NOT NULL,
  `ratiomoney` int(11) NOT NULL,
  `filebillpath` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`systemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`systemid`, `numberwrongpassword`, `numberviolation`, `timeblocksession`, `lecturecost`, `lecturetime`, `ratiomoney`, `filebillpath`) VALUES
(1, 3, 4, 1, 20000, 7, 40, 'hieustupid');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tagid` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`tagid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `userid` int(11) NOT NULL,
  `bankaccountinfo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `previousip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `reportednumber` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`userid`, `bankaccountinfo`, `previousip`, `reportednumber`) VALUES
(3, '12345678', '127.0.0.1', 0),
(4, '123456789', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `storelink` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `initialpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `displayname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secretquestion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `initialverifycode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verifycode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`, `initialpassword`, `name`, `displayname`, `birthday`, `address`, `phonenumber`, `secretquestion`, `initialverifycode`, `verifycode`) VALUES
(1, 'admin', '7a8c143e48c2e081212cecf673902065a9d82d96', 'admin', '7a8c143e48c2e081212cecf673902065a9d82d96', 'admin', NULL, '2014-04-01', '12345678', '12345678', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96'),
(2, 'Student', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'student', '7a8c143e48c2e081212cecf673902065a9d82d96', 'student', 'student', '2004-04-07', '12345678', '12345678', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96'),
(3, 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', NULL, '2005-04-07', 'T03', '12345678', 'a82bcb89d229cb7580d290b5e796b1686d4cf6db', '94e2bd9d5fef754aed7529861741bfeba66530dc', '94e2bd9d5fef754aed7529861741bfeba66530dc'),
(4, 'teacher1', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'teacher', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'teacher1', NULL, '2000-01-01', '123456789', '123456789', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8');

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
