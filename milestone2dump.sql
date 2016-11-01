-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 01, 2016 at 07:26 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cs518`
--
CREATE DATABASE IF NOT EXISTS `cs518` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cs518`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `ans_content` varchar(1100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ans_approval` int(11) NOT NULL DEFAULT '0',
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `ans_content`, `user_id`, `ans_posted_dt`, `ans_approval`, `q_id`) VALUES
(1, 'Hello', 1, '2016-10-31 23:58:00', 0, 1),
(2, '\r\nI created the following Relational Diagram in Sql Power Architect (as I was told to do at school). The next step presented in the course is to use Forward Engineer to get the script and paste it in Sql Management Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t execute without errrors. ( I read previous asked questions but I am not sure the answers apply to my script.)\r\n', 5, '2016-11-01 05:07:13', 0, 1),
(3, '\r\nI created the following Relational Diagram in Sql Power Architect (as I was told to do at school). The next step presented in the course is to use Forward Engineer to get the script and paste it in Sql Management Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t execute without errrors. ( I read previous asked questions but I am not sure the answers apply to my script.)\r\n', 5, '2016-11-01 05:07:17', 0, 1),
(4, '\r\nI created the following Relational Diagram in Sql Power Architect (as I was told to do at school). The next step presented in the course is to use Forward Engineer to get the script and paste it in Sql Management Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t execute without errrors. ( I read previous asked questions but I am not sure the answers apply to my script.)\r\n', 1, '2016-11-01 05:07:19', 0, 1),
(5, '\r\nI created the following Relatio\r\n\r\nnal Diagram in Sql Power Architect (as I was told to do at school). The next step presented in the course is to use Forward Engineer to get the script and paste it in Sql Management Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t execute without errrors. ( I read previous asked questions but I am not sure the answers apply to my script.)\r\n', 1, '2016-11-01 05:08:27', 0, 1),
(6, 'Hello', 1, '2016-11-01 05:14:45', 0, 1),
(7, 'nt Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t ', 1, '2016-11-01 05:44:08', 0, 1),
(8, ' use Google Cloud Vision Api (Text_Detection) it is working normal but when ı return answer from the Google, message style like image I want just one text e.g "ACADEMIC PLANNER" so how can ı remove front of Academic "null:" and other w', 1, '2016-11-01 08:10:56', 0, 3),
(9, 'Wikipedia is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Wikimedia Foundation.', 14, '2016-11-01 08:48:40', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `answers_votes`
--

DROP TABLE IF EXISTS `answers_votes`;
CREATE TABLE IF NOT EXISTS `answers_votes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `filename`) VALUES
(1, 'default.jpg'),
(2, 'D04.png'),
(3, 'default_0.jpg'),
(4, 'download.jpg'),
(5, 'd.jpg'),
(6, 'user-profile.jpg'),
(7, 'brunelle.jpeg'),
(8, 'profile.jpeg'),
(9, 'up.png'),
(10, 'pu.jpg'),
(11, 'pu.jpeg'),
(12, 'ad.jpg'),
(13, 'km.png');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_title` varchar(100) NOT NULL,
  `q_content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `q_title`, `q_content`, `user_id`, `posted_dt`) VALUES
(2, 'Ensembles Linking with OS X Swift App', 'I\'m trying to incorporate Ensembles 1.0 into my Cocoa app (Swift). Followed instructions to the letter, and it cleanly compiles. Can\'t get past some link errors though:', 1, '2016-11-01 01:55:21'),
(3, 'How can ı fix response text?', ' use Google Cloud Vision Api (Text_Detection) it is working normal but when ı return answer from the Google, message style like image\r\n\r\nI want just one text e.g "ACADEMIC PLANNER" so how can ı remove front of Academic "null:" and other words ?', 1, '2016-11-01 05:37:58'),
(4, 'nt Server using new Query. I get this Error " There is already an object named \'Author', 'nt Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t ', 1, '2016-11-01 05:44:46'),
(5, '2016 Presidential Election', '2016 Presidential Election', 6, '2016-11-01 07:51:21'),
(6, 'Plain Picture and Plain text in Tableview', 'Plain Picture and Plain text in Tableview', 6, '2016-11-01 07:52:53'),
(7, 'Spring-Session with Redis, Spring-Security, and UI Gateway pattern does not save session behind gate', 'The example is composed of 4 Spring Boot applications:\r\n\r\nGateway: this is the Zuul proxy, responsible for authentication, and proxying requests to the other three\r\nUI: the general UI for the app\r\nResource: an api server that the UI connects to\r\nAdmin: another UI, similar to 2)', 14, '2016-11-01 16:58:14'),
(8, 'Session Security ', 'It is important keeping HTTP session mangement secure. Session releated security is described in Session Security section of Session module reference.', 11, '2016-11-01 17:49:08'),
(9, 'POST method uploads ', 'This feature lets people upload both text and binary files. With PHP\'s authentication and file manipulation functions, you have full control over who is allowed to upload and what is to be done with the file once it has been uploaded.\r\n\r\nPHP is capable of receiving file uploads from any RFC-1867 compliant browser.', 9, '2016-11-01 17:51:22'),
(10, 'Uploading multiple files ', 'Multiple files can be uploaded using different name for input.\r\n\r\nIt is also possible to upload multiple files simultaneously and have the information organized automatically in arrays for you. To do so, you need to use the same array submission syntax in the HTML form as you do with multiple selects and checkboxes:', 7, '2016-11-01 18:06:12'),
(11, 'Why Study JavaScript?', 'JavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nThis tutorial is about JavaScript, and how JavaScript works with HTML and CSS.', 10, '2016-11-01 18:09:37'),
(12, 'JavaScript Objects', 'Objects are variables too. But objects can contain many values.\r\n\r\nThis code assigns many values (Fiat, 500, white) to a variable named car:\r\n<!DOCTYPE html>\r\n<html>\r\n<body>\r\n\r\n<p>Creating a JavaScript Object.</p>\r\n\r\n<p id="demo"></p>\r\n\r\n<script>\r\nvar car = {type:"Fiat", model:"500", color:"white"};\r\ndocument.getElementById("demo").innerHTML = car.type;\r\n</script>\r\n\r\n</body>\r\n</html>', 15, '2016-11-01 18:12:25'),
(13, 'Math.round()', 'Math.round(x) returns the value of x rounded to its nearest integer:\r\n\r\nMath.round(4.7);    // returns 5\r\nMath.round(4.4);    // returns 4', 8, '2016-11-01 18:16:23'),
(14, 'JavaScript Date Formats', 'var d = new Date("2015-03-25");', 12, '2016-11-01 18:18:57'),
(15, 'JavaScript Arrays', 'An array is a special variable, which can hold more than one value at a time', 13, '2016-11-01 18:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `question_tags`
--

DROP TABLE IF EXISTS `question_tags`;
CREATE TABLE IF NOT EXISTS `question_tags` (
  `q_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_votes`
--

DROP TABLE IF EXISTS `question_votes`;
CREATE TABLE IF NOT EXISTS `question_votes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(22) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar_id` int(1) NOT NULL,
  `avatar_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `avatar_id`, `avatar_type`) VALUES
(1, 'admin', '4e77c5eed085c1a433a6ddc8bf4130c9', 2, 0),
(2, 'pvenkman', '41f05c9bf093ca30867d7f352849fe15', 1, 0),
(3, 'rstantz', '3a6ac1b0a7dc16801e2522454d778f01', 0, 0),
(4, 'dbarrett', 'fda14faa279c1123604c06f756c7af14', 0, 0),
(5, 'ltully', '50f8b210f0fb2ccdf14bb51804a8967f', 1, 0),
(6, 'espengler', 'f169a4141e900076e5f2b0bb2083b4a4', 3, 0),
(7, 'jbrunelle', '40e77c0dcd4c2f84b93a340695c4a22c', 7, 0),
(8, 'janine', 'f4afa63a631c17ac6add6707f6de62af', 11, 0),
(9, 'winston ', '8e19620f4c93ab0d3e348c5d1adc6805', 6, 0),
(10, 'gozer', '87243a29a6a3a9f16ff76ec0dcf8a867', 8, 0),
(11, 'slimer', '5c117248e1c5aee2eaf29e00b8d1086c', 5, 0),
(12, 'zuul', '9e775e3f55ca51fcd129c19e055331d2', 12, 0),
(13, 'keymaster ', 'a542e1dcfab848d32cff6624c42cb2b3', 13, 0),
(14, 'gatekeeper', 'f37dfd8c66add2172d5dbad7590e29e5', 4, 0),
(15, 'staypuft', '91d0f8c24026b7e757c55fceabfecdd4', 9, 0);
