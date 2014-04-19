-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2014 at 09:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
(1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `userid` int(11) NOT NULL,
  `status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `bankaccountinfoadmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`userid`, `status`, `bankaccountinfoadmin`) VALUES
(1, 'on', '');

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
('534e0db4-8098-4169-8531-13948fa129d9', '127.0.0.1', 'login', '2014-04-16 06:57:24', '2014-04-16 07:02:24'),
('534e08f2-76e8-4634-a281-13948fa129d9', '127.0.0.1', 'login', '2014-04-16 06:37:06', '2014-04-16 06:42:06'),
('534dfb0c-4600-4a69-b268-13948fa129d9', '127.0.0.1', 'login', '2014-04-16 05:37:48', '2014-04-16 05:40:48'),
('534d6db6-1534-49dd-9ab4-06548fa129d9', '::1', 'login', '2014-04-15 19:34:46', '2014-04-15 19:37:46'),
('534e0dbc-6ef8-46e7-94cc-13948fa129d9', '127.0.0.1', 'login', '2014-04-16 06:57:32', '2014-04-16 07:02:32');

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
  `blockid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`blockid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

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
  `storelink` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `title`, `storelink`, `lectureid`) VALUES
(22, 'fumi.mp4', 'http://localhost/elearning2/files/fumi.mp4', 9),
(23, 'mensetsu_p6-8.pdf', 'http://localhost/elearning2/files/mensetsu_p6-8.pdf', 9),
(24, 'N2_KIKU_A_09.mp3', 'http://localhost/elearning2/files/N2_KIKU_A_09.mp3', 9),
(25, 'fumi.mp4', 'http://localhost/elearning2/files/fumi.mp4', 10),
(26, 'mensetsu_p6-8.pdf', 'http://localhost/elearning2/files/mensetsu_p6-8.pdf', 10),
(27, 'N2_KIKU_A_09.mp3', 'http://localhost/elearning2/files/N2_KIKU_A_09.mp3', 10),
(28, 'fumi.mp4', 'http://localhost/elearning2/files/fumi.mp4', 11),
(29, 'mensetsu_p6-8.pdf', 'http://localhost/elearning2/files/mensetsu_p6-8.pdf', 11),
(30, 'N2_KIKU_A_09.mp3', 'http://localhost/elearning2/files/N2_KIKU_A_09.mp3', 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lectureid`, `title`, `description`, `userid`, `create_time`) VALUES
(9, 'Mondai', 'mondai', 7, '2014-04-16'),
(10, 'sakubun', 'sakubun', 7, '2014-04-16'),
(11, 'Hoahoc', 'hoahoc', 5, '2014-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `likeid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`likeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeid`, `lectureid`, `userid`) VALUES
(9, 10, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `registerrequests`
--

INSERT INTO `registerrequests` (`registerrequestid`, `username`, `role`, `initialverifycode`, `password`, `name`, `birthday`, `address`, `bankaccountinfo`, `phonenumber`, `creditcardinfo`, `secretquestion`) VALUES
(2, 'dattest', 'teacher', '12345678', '12345678', 'dattest', '2014-01-01', '12345678', '12345678', '12345678', '', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `lectureid` int(11) NOT NULL,
  `reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reportid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `isblock` int(11) NOT NULL,
  `studentlearnlectureid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `time` date NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`studentlearnlectureid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `studentlearnlectures`
--

INSERT INTO `studentlearnlectures` (`isblock`, `studentlearnlectureid`, `lectureid`, `time`, `userid`) VALUES
(0, 1, 11, '2014-04-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `userid` int(11) NOT NULL,
  `creditcardinfo` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 5, 4, 1, 20000, 7, 40, 'hieustupid');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tagid` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`tagid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tagname`, `lectureid`) VALUES
(1, 'Mondai', 9),
(2, 'Choukai', 9),
(3, 'Sakubun', 9),
(4, 'Mondai', 10),
(5, 'Choukai', 10),
(6, 'Sakubun', 10),
(7, 'hoa', 10),
(8, 'hoa', 11),
(9, ' vat ly', 11),
(10, ' toan', 11);

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
(5, '12345678', '127.0.0.1', 0),
(7, '12345678', '127.0.0.1', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `title`, `storelink`, `lectureid`) VALUES
(15, 'test.tsv', 'http://localhost/elearning2/tests/test.tsv', 9),
(16, 'test2.tsv', 'http://localhost/elearning2/tests/test2.tsv', 9),
(17, 'test.tsv', 'http://localhost/elearning2/tests/test.tsv', 10),
(18, 'test2.tsv', 'http://localhost/elearning2/tests/test2.tsv', 10),
(19, 'test.tsv', 'http://localhost/elearning2/tests/test.tsv', 11),
(20, 'test2.tsv', 'http://localhost/elearning2/tests/test2.tsv', 11);

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
  `birthday` date DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secretquestion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `initialverifycode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verifycode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`, `initialpassword`, `name`, `birthday`, `address`, `phonenumber`, `secretquestion`, `initialverifycode`, `verifycode`) VALUES
(1, 'admin', '7a8c143e48c2e081212cecf673902065a9d82d96', 'admin', '7a8c143e48c2e081212cecf673902065a9d82d96', 'admin', '1993-06-13', 'T03', '12345678', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', '7a8c143e48c2e081212cecf673902065a9d82d96', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8'),
(2, 'student', '7a8c143e48c2e081212cecf673902065a9d82d96', 'student', '7a8c143e48c2e081212cecf673902065a9d82d96', 'student', '1993-06-13', 'T03', '12345678', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', '7a8c143e48c2e081212cecf673902065a9d82d96', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8'),
(3, 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher1', '1993-06-13', 'T03', '12345678', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', '7a8c143e48c2e081212cecf673902065a9d82d96', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8'),
(4, 'teacher1', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'teacher1', '2000-01-01', '123456789', '123456789', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8', 'd56784559ed74d4178ebc40de9848b17e6e5d2e8'),
(5, 'gondaisensei', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'gondaisensei', '1999-01-16', '12345678', '12345678', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96'),
(6, 'khoikun', '7a8c143e48c2e081212cecf673902065a9d82d96', 'student', '7a8c143e48c2e081212cecf673902065a9d82d96', 'khoikun', '2004-04-07', '12345678', '12345678', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96'),
(7, 'hoangsensei', '7a8c143e48c2e081212cecf673902065a9d82d96', 'teacher', '7a8c143e48c2e081212cecf673902065a9d82d96', 'hoangsensei', '2000-12-16', '12345678', '12345678', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96', '7a8c143e48c2e081212cecf673902065a9d82d96');

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
