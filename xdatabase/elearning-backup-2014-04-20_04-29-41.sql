-- Database: `elearning`
-- Generation time: Sat 19th Apr 2014 23:29:41


DROP TABLE IF EXISTS adminips;

CREATE TABLE `adminips` (
  `userid` int(11) NOT NULL,
  `ipid` char(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`ipid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO adminips VALUES('1','127.0.0.1');
INSERT INTO adminips VALUES('21','127.0.0.3');
INSERT INTO adminips VALUES('27','');



DROP TABLE IF EXISTS admins;

CREATE TABLE `admins` (
  `userid` int(11) NOT NULL,
  `status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `bankaccountinfoadmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO admins VALUES('1','on','12345678');
INSERT INTO admins VALUES('21','off','');
INSERT INTO admins VALUES('27','off','');



DROP TABLE IF EXISTS attempts;

CREATE TABLE `attempts` (
  `id` char(36) NOT NULL DEFAULT '',
  `ip` varchar(64) DEFAULT NULL,
  `action` varchar(32) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`,`action`),
  KEY `expires` (`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO attempts VALUES('53528dab-c514-47cb-a427-10fc8fa129d9','teacher','login','2014-04-19 16:52:27','2014-04-19 18:32:27');
INSERT INTO attempts VALUES('5350950c-b364-47a1-9887-0ffc8fa129d9','student','login','2014-04-18 04:59:24','2014-04-18 06:39:24');
INSERT INTO attempts VALUES('535094f1-eedc-40c6-8561-0ffc8fa129d9','student','login','2014-04-18 04:58:57','2014-04-18 06:38:57');
INSERT INTO attempts VALUES('534fd667-75fc-428c-8b26-0e288fa129d9','127.0.0.1','login','2014-04-17 15:25:59','2014-04-17 17:05:59');
INSERT INTO attempts VALUES('534fb4cc-13d4-4e7d-969f-012c8fa129d9','127.0.0.1','login','2014-04-17 13:02:36','2014-04-17 14:42:36');



DROP TABLE IF EXISTS bannedlectures;

CREATE TABLE `bannedlectures` (
  `lectureid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lectureid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS blocks;

CREATE TABLE `blocks` (
  `blockid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`blockid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS cds;

CREATE TABLE `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO cds VALUES('Beauty','Ryuichi Sakamoto','1990','1');
INSERT INTO cds VALUES('Goodbye Country (Hello Nightclub)','Groove Armada','2001','4');
INSERT INTO cds VALUES('Glee','Bran Van 3000','1997','5');



DROP TABLE IF EXISTS comments;

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` date NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`commentid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO comments VALUES('1','19','24','2014-04-18','good');



DROP TABLE IF EXISTS delaccounts;

CREATE TABLE `delaccounts` (
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS files;

CREATE TABLE `files` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `storelink` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO files VALUES('38','fumi.mp4','http://localhost/elearning18.04final/files/fumi.mp4','18');
INSERT INTO files VALUES('39','khiem nhuong 0.MP3','http://localhost/elearning18.04final/files/khiem nhuong 0.MP3','18');
INSERT INTO files VALUES('40','mensetsu_p6-8.pdf','http://localhost/elearning18.04final/files/mensetsu_p6-8.pdf','18');
INSERT INTO files VALUES('41','N2_KIKU_A_09.mp3','http://localhost/elearning18.04final/files/N2_KIKU_A_09.mp3','18');
INSERT INTO files VALUES('42','fumi.mp4','http://localhost/elearning18.04final/files/fumi.mp4','19');
INSERT INTO files VALUES('43','khiem nhuong 0.MP3','http://localhost/elearning18.04final/files/khiem nhuong 0.MP3','19');
INSERT INTO files VALUES('44','mensetsu_p6-8.pdf','http://localhost/elearning18.04final/files/mensetsu_p6-8.pdf','19');
INSERT INTO files VALUES('45','N2_KIKU_A_09.mp3','http://localhost/elearning18.04final/files/N2_KIKU_A_09.mp3','19');
INSERT INTO files VALUES('46','fumi.mp4','http://localhost/elearning20.4final/files/fumi.mp4','20');
INSERT INTO files VALUES('47','khiem nhuong 0.MP3','http://localhost/elearning20.4final/files/khiem nhuong 0.MP3','20');
INSERT INTO files VALUES('48','mensetsu_p6-8.pdf','http://localhost/elearning20.4final/files/mensetsu_p6-8.pdf','20');
INSERT INTO files VALUES('49','N2_KIKU_A_09.mp3','http://localhost/elearning20.4final/files/N2_KIKU_A_09.mp3','20');
INSERT INTO files VALUES('50','mensetsu_p6-8.pdf','http://localhost/elearning20.4final/files/mensetsu_p6-8.pdf','21');
INSERT INTO files VALUES('51','N2_KIKU_A_09.mp3','http://localhost/elearning20.4final/files/N2_KIKU_A_09.mp3','21');
INSERT INTO files VALUES('52','N2_KIKU_A_09.mp3','http://localhost/elearning20.4final/files/N2_KIKU_A_09.mp3','21');
INSERT INTO files VALUES('53','fumi.mp4','http://localhost/elearning20.4final/files/fumi.mp4','21');



DROP TABLE IF EXISTS lecturehastags;

CREATE TABLE `lecturehastags` (
  `lectureid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  PRIMARY KEY (`lectureid`,`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS lectures;

CREATE TABLE `lectures` (
  `lectureid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `create_time` date NOT NULL,
  PRIMARY KEY (`lectureid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO lectures VALUES('18','åé¡I','åé¡','22','2014-04-18');
INSERT INTO lectures VALUES('19','è´è§£I','è´è§£I','23','2014-04-18');
INSERT INTO lectures VALUES('20','å¹¼ç¨å','å¹¼ç¨åã®åçã«ãªãããã','22','2014-04-19');
INSERT INTO lectures VALUES('21','æ©ææè²','æ©ææè²ãåå¼·ãããäººã®ãã','22','2014-04-19');



DROP TABLE IF EXISTS likes;

CREATE TABLE `likes` (
  `likeid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`likeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS registerrequests;

CREATE TABLE `registerrequests` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS reports;

CREATE TABLE `reports` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `lectureid` int(11) NOT NULL,
  `reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reportid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO reports VALUES('1','23','21','copyright');



DROP TABLE IF EXISTS results;

CREATE TABLE `results` (
  `resultid` int(11) NOT NULL AUTO_INCREMENT,
  `testid` int(11) DEFAULT NULL,
  `question` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO results VALUES('1','22','0','0','14');
INSERT INTO results VALUES('2','22','1','0','14');
INSERT INTO results VALUES('3','22','2','0','14');
INSERT INTO results VALUES('4','22','3','0','14');
INSERT INTO results VALUES('5','22','0','0','17');
INSERT INTO results VALUES('6','22','1','0','17');
INSERT INTO results VALUES('7','22','2','0','17');
INSERT INTO results VALUES('8','22','3','0','17');
INSERT INTO results VALUES('9','25','0','0','24');
INSERT INTO results VALUES('10','25','1','2','24');
INSERT INTO results VALUES('11','25','2','2','24');
INSERT INTO results VALUES('12','25','3','2','24');



DROP TABLE IF EXISTS studentdotests;

CREATE TABLE `studentdotests` (
  `studentdotestid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `point` int(50) NOT NULL,
  PRIMARY KEY (`studentdotestid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO studentdotests VALUES('1','24','25','2014-04-19 11:17:01','15');



DROP TABLE IF EXISTS studentlearnlectures;

CREATE TABLE `studentlearnlectures` (
  `isblock` int(11) NOT NULL,
  `studentlearnlectureid` int(11) NOT NULL AUTO_INCREMENT,
  `lectureid` int(11) NOT NULL,
  `time` date NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`studentlearnlectureid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO studentlearnlectures VALUES('0','1','19','2014-04-18','24');
INSERT INTO studentlearnlectures VALUES('0','2','19','2014-04-18','25');



DROP TABLE IF EXISTS students;

CREATE TABLE `students` (
  `userid` int(11) NOT NULL,
  `creditcardinfo` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO students VALUES('24','12345678');
INSERT INTO students VALUES('25','12345678');



DROP TABLE IF EXISTS systems;

CREATE TABLE `systems` (
  `systemid` int(11) NOT NULL AUTO_INCREMENT,
  `numberwrongpassword` int(11) NOT NULL,
  `numberviolation` int(11) NOT NULL,
  `timeblocksession` int(11) NOT NULL,
  `lecturecost` int(11) NOT NULL,
  `lecturetime` int(11) NOT NULL,
  `ratiomoney` int(11) NOT NULL,
  `filebillpath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`systemid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO systems VALUES('1','4','4','100','20000','7','30','');



DROP TABLE IF EXISTS tags;

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`tagid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tags VALUES('18','åé¡','18');
INSERT INTO tags VALUES('19','æ¥æ¬èª','18');
INSERT INTO tags VALUES('20','Japanese','18');
INSERT INTO tags VALUES('21','è´è§£','19');
INSERT INTO tags VALUES('22','æ¥æ¬èª','19');
INSERT INTO tags VALUES('23','Japanese','19');
INSERT INTO tags VALUES('24','å¹¼ç¨å','20');
INSERT INTO tags VALUES('25','æè²','20');
INSERT INTO tags VALUES('26','æ¥æ¬','20');



DROP TABLE IF EXISTS teachers;

CREATE TABLE `teachers` (
  `userid` int(11) NOT NULL,
  `bankaccountinfo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `previousip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `reportednumber` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO teachers VALUES('22','12345678','127.0.0.1','0');
INSERT INTO teachers VALUES('23','12345678','127.0.0.1','0');



DROP TABLE IF EXISTS tests;

CREATE TABLE `tests` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `storelink` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lectureid` int(11) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tests VALUES('23','test.tsv','http://localhost/elearning18.04final/tests/test.tsv','18');
INSERT INTO tests VALUES('24','test2.tsv','http://localhost/elearning18.04final/tests/test2.tsv','18');
INSERT INTO tests VALUES('25','test.tsv','http://localhost/elearning18.04final/tests/test.tsv','19');
INSERT INTO tests VALUES('26','test2.tsv','http://localhost/elearning18.04final/tests/test2.tsv','19');
INSERT INTO tests VALUES('27','test.tsv','http://localhost/elearning20.4final/tests/test.tsv','20');
INSERT INTO tests VALUES('28','test2.tsv','http://localhost/elearning20.4final/tests/test2.tsv','20');
INSERT INTO tests VALUES('29','test.tsv','http://localhost/elearning20.4final/tests/test.tsv','21');
INSERT INTO tests VALUES('30','test2.tsv','http://localhost/elearning20.4final/tests/test2.tsv','21');



DROP TABLE IF EXISTS user_pwd;

CREATE TABLE `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO user_pwd VALUES('xampp','wampp');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO users VALUES('1','admin','7a8c143e48c2e081212cecf673902065a9d82d96','admin','7a8c143e48c2e081212cecf673902065a9d82d96','admin','1993-06-13','T03','12345678','d56784559ed74d4178ebc40de9848b17e6e5d2e8','7a8c143e48c2e081212cecf673902065a9d82d96','d56784559ed74d4178ebc40de9848b17e6e5d2e8');
INSERT INTO users VALUES('21','admin02','7a8c143e48c2e081212cecf673902065a9d82d96','admin','7a8c143e48c2e081212cecf673902065a9d82d96','admin02','2014-01-01','12345678','12345678','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96');
INSERT INTO users VALUES('22','teacher01','7a8c143e48c2e081212cecf673902065a9d82d96','teacher','7a8c143e48c2e081212cecf673902065a9d82d96','teacher01','2014-01-01','12345678','12345678','d56784559ed74d4178ebc40de9848b17e6e5d2e8','7a8c143e48c2e081212cecf673902065a9d82d96','d56784559ed74d4178ebc40de9848b17e6e5d2e8');
INSERT INTO users VALUES('23','teacher02','7a8c143e48c2e081212cecf673902065a9d82d96','teacher','7a8c143e48c2e081212cecf673902065a9d82d96','teacher02','2014-01-01','12345678','12345678','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96');
INSERT INTO users VALUES('24','student01','7a8c143e48c2e081212cecf673902065a9d82d96','student','7a8c143e48c2e081212cecf673902065a9d82d96','student01','2012-01-03','12345678','12345678','d56784559ed74d4178ebc40de9848b17e6e5d2e8','7a8c143e48c2e081212cecf673902065a9d82d96','d56784559ed74d4178ebc40de9848b17e6e5d2e8');
INSERT INTO users VALUES('25','student02','7a8c143e48c2e081212cecf673902065a9d82d96','student','7a8c143e48c2e081212cecf673902065a9d82d96','student02','2012-03-03','12345678','12345678','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96');
INSERT INTO users VALUES('27','admin03','7a8c143e48c2e081212cecf673902065a9d82d96','admin','7a8c143e48c2e081212cecf673902065a9d82d96','admin03','1991-09-01','12345678','12345678','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96','7a8c143e48c2e081212cecf673902065a9d82d96');



