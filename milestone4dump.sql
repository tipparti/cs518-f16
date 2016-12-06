-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2016 at 06:47 PM
-- Server version: 5.6.28
-- PHP Version: 5.6.25

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

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `ans_content` varchar(1100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ans_approval` int(11) NOT NULL DEFAULT '0',
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 'Hello\r\n', 1, '2016-11-01 15:01:29', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `answers_votes`
--

CREATE TABLE `answers_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `filename` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `filename`) VALUES
(1, 'default.jpg'),
(2, 'D04.png'),
(3, 'default_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qa_blobs`
--

CREATE TABLE `qa_blobs` (
  `blobid` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `userid` int(10) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_blobs`
--

INSERT INTO `qa_blobs` (`blobid`, `filename`, `userid`, `created`) VALUES
(1, 'thumb_583419ae0292e.jpg', 3, '2016-11-22 05:10:54'),
(2, 'thumb_58344e3e0aaaa.jpg', 1, '2016-11-22 08:55:10'),
(3, 'thumb_58347c65495ee.png', 1, '2016-11-22 12:12:05'),
(4, 'thumb_5834bf1e03bb0.png', 1, '2016-11-22 16:56:46'),
(5, 'thumb_5834bf234df87.png', 1, '2016-11-22 16:56:51'),
(6, 'thumb_583e27da04f37.jpg', 1, '2016-11-29 20:14:02'),
(7, 'thumb_583e27ff2474f.jpg', 1, '2016-11-29 20:14:39'),
(8, 'thumb_583e2821bc99d.jpg', 1, '2016-11-29 20:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `qa_posts`
--

CREATE TABLE `qa_posts` (
  `postid` int(10) UNSIGNED NOT NULL,
  `type` enum('Q','A','C','Q_HIDDEN','A_HIDDEN','C_HIDDEN','Q_QUEUED','A_QUEUED','C_QUEUED','NOTE') NOT NULL,
  `parentid` int(10) UNSIGNED DEFAULT NULL,
  `acount` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `amaxvote` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `userid` int(10) UNSIGNED DEFAULT NULL,
  `upvotes` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `downvotes` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `netvotes` smallint(6) NOT NULL DEFAULT '0',
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `flagcount` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `format` varchar(20) CHARACTER SET ascii NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `title` varchar(800) DEFAULT NULL,
  `content` varchar(8000) DEFAULT NULL,
  `tags` varchar(800) DEFAULT NULL,
  `selects` tinyint(1) DEFAULT NULL,
  `s_userid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_posts`
--

INSERT INTO `qa_posts` (`postid`, `type`, `parentid`, `acount`, `amaxvote`, `userid`, `upvotes`, `downvotes`, `netvotes`, `views`, `flagcount`, `format`, `created`, `updated`, `title`, `content`, `tags`, `selects`, `s_userid`) VALUES
(2, 'Q', NULL, 4, 0, 1, 0, 0, 2, 0, 0, 'html', '2016-11-22 02:13:11', NULL, 'b&gt;DO&lt;/b&gt; Exist', '<pre>\r\n~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*? \\n\\n &lt;!-- unless you cannot read this --&gt;</pre>\r\n', NULL, NULL, 0),
(3, 'A', 2, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 04:14:06', NULL, NULL, '<p>?:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*? \\n\\n &lt;!-- unless you canno</p>\r\n', NULL, NULL, 0),
(4, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 09:16:30', NULL, 'Alerts', '<p>Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.</p>\r\n', NULL, NULL, 0),
(5, 'Q', NULL, 0, 0, 3, 0, 0, 0, 0, 0, 'html', '2016-11-22 13:01:59', NULL, 'Ghosts &lt;b&gt;DO&lt;/b&gt;', '<pre>\r\n~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*? \\n\\n &lt;!-- unless you cannot read this --&gt;\r\n</pre>\r\n', NULL, NULL, 0),
(6, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:33:20', NULL, 'ellejbrunellejbrunellejbrunellej', '<pre>\r\nrunellejbrunellejbrunellejbrunellejbrunellejbrunellejbrunellejbrunelle</pre>\r\n\r\n<pre>\r\nellejbrunellejbrunellejbrunellej</pre>\r\n', NULL, NULL, 0),
(7, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:33:35', NULL, 'ellejbrunelle', '<pre>\r\nellejbrunellejbrunellejbrunellej</pre>\r\n', NULL, NULL, 0),
(8, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:36:28', NULL, '&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(9, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:36:40', NULL, '?:{}+}\\|}{P{}|-/*?&quot; 		&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(10, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:36:46', NULL, '?:{}+}\\|}{P{}|-/*?&quot; 		&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(11, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:36:51', NULL, '?:{}+}\\|}{P{}|-/*?&quot; 		&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(12, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:36:58', NULL, '?:{}+}\\|}{P{}|-/*?&quot; 		&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(13, 'Q', NULL, 0, 0, 1, 0, 0, 1, 0, 0, 'html', '2016-11-22 16:37:37', NULL, '?:{}+}\\|}{P{}|-/*?&quot; 		&quot;123456789 123456789123456789123456789&quot;', '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(14, 'A', 2, 0, 0, 1, 0, 0, 0, 0, 0, 'html', '2016-11-22 16:37:54', NULL, NULL, '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(15, 'A', 2, 0, 0, 1, 0, 0, -1, 0, 0, 'html', '2016-11-22 16:37:59', NULL, NULL, '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0),
(16, 'A', 2, 0, 0, 1, 0, 0, 1, 0, 0, 'html', '2016-11-22 16:38:04', NULL, NULL, '<pre>\r\n?:{}+}\\|}{P{}|-/*?&quot;\r\n		&quot;123456789 123456789123456789123456789&quot;</pre>\r\n', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qa_userpoints`
--

CREATE TABLE `qa_userpoints` (
  `userid` int(10) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `qposts` mediumint(9) NOT NULL DEFAULT '0',
  `aposts` mediumint(9) NOT NULL DEFAULT '0',
  `cposts` mediumint(9) NOT NULL DEFAULT '0',
  `aselects` mediumint(9) NOT NULL DEFAULT '0',
  `aselecteds` mediumint(9) NOT NULL DEFAULT '0',
  `qupvotes` mediumint(9) NOT NULL DEFAULT '0',
  `qdownvotes` mediumint(9) NOT NULL DEFAULT '0',
  `aupvotes` mediumint(9) NOT NULL DEFAULT '0',
  `adownvotes` mediumint(9) NOT NULL DEFAULT '0',
  `qvoteds` int(11) NOT NULL DEFAULT '0',
  `avoteds` int(11) NOT NULL DEFAULT '0',
  `upvoteds` int(11) NOT NULL DEFAULT '0',
  `downvoteds` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_userpoints`
--

INSERT INTO `qa_userpoints` (`userid`, `points`, `qposts`, `aposts`, `cposts`, `aselects`, `aselecteds`, `qupvotes`, `qdownvotes`, `aupvotes`, `adownvotes`, `qvoteds`, `avoteds`, `upvoteds`, `downvoteds`, `bonus`) VALUES
(1, 360, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 130, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 1, 1, 0),
(3, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qa_users`
--

CREATE TABLE `qa_users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `handle` varchar(20) NOT NULL,
  `avatarblobid` bigint(20) UNSIGNED DEFAULT NULL,
  `avatarwidth` smallint(5) UNSIGNED DEFAULT NULL,
  `avatarheight` smallint(5) UNSIGNED DEFAULT NULL,
  `passcheck` text,
  `loggedin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_users`
--

INSERT INTO `qa_users` (`userid`, `created`, `email`, `handle`, `avatarblobid`, `avatarwidth`, `avatarheight`, `passcheck`, `loggedin`) VALUES
(1, '2016-11-22 01:51:08', 'admin@xyz.edu', 'admin', 8, NULL, NULL, '4e77c5eed085c1a433a6ddc8bf4130c9', '2016-11-22 01:51:08'),
(2, '2016-11-22 02:26:33', 'jbrunelle@xyz.edu', 'jbrunelle', NULL, NULL, NULL, '40e77c0dcd4c2f84b93a340695c4a22c', '2016-11-22 02:26:33'),
(3, '2016-11-21 00:27:06', 'dbarrett@xyz.edu', 'dbarrett', 1, NULL, NULL, 'fda14faa279c1123604c06f756c7af14', '2016-11-22 04:27:06'),
(4, '2016-11-22 04:28:50', 'pvenkman@xyz.edu', 'pvenkman', NULL, NULL, NULL, '41f05c9bf093ca30867d7f352849fe15', '2016-11-22 04:28:50'),
(5, '2016-11-22 04:31:13', 'rstantz@xyz.edu', 'rstantz', NULL, NULL, NULL, '3a6ac1b0a7dc16801e2522454d778f01', '2016-11-22 04:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `qa_uservotes`
--

CREATE TABLE `qa_uservotes` (
  `postid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `vote` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_uservotes`
--

INSERT INTO `qa_uservotes` (`postid`, `userid`, `vote`, `flag`) VALUES
(1, 2, -1, 0),
(2, 2, 1, 0),
(2, 3, 1, 0),
(3, 3, 0, 0),
(4, 3, 0, 0),
(13, 3, 1, 0),
(14, 3, 0, 0),
(15, 3, -1, 0),
(16, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_tags`
--

CREATE TABLE `question_tags` (
  `q_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_votes`
--

CREATE TABLE `question_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_votes`
--

INSERT INTO `question_votes` (`id`, `question_id`, `user_id`, `votes`) VALUES
(1, 5, 1, 1),
(2, 6, 1, 1),
(10, 6, 6, 1),
(11, 6, 4, -1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `q_title` varchar(100) NOT NULL,
  `q_content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT '0',
  `dnvote` int(11) NOT NULL DEFAULT '0',
  `posted_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `q_title`, `q_content`, `user_id`, `upvote`, `dnvote`, `posted_dt`) VALUES
(2, 'Ensembles Linking with OS X Swift App', 'I\'m trying to incorporate Ensembles 1.0 into my Cocoa app (Swift). Followed instructions to the letter, and it cleanly compiles. Can\'t get past some link errors though:', 1, 0, 0, '2016-11-01 01:55:21'),
(3, 'How can ı fix response text?', ' use Google Cloud Vision Api (Text_Detection) it is working normal but when ı return answer from the Google, message style like image\r\n\r\nI want just one text e.g "ACADEMIC PLANNER" so how can ı remove front of Academic "null:" and other words ?', 1, 0, 0, '2016-11-01 05:37:58'),
(4, 'nt Server using new Query. I get this Error " There is already an object named \'Author', 'nt Server using new Query. I get this Error " There is already an object named \'Author\' in the database." I have no knowledge of what it means or how should be corrected. I can not go to the next steps in the course if I ca`t ', 1, 0, 0, '2016-11-01 05:44:46'),
(5, '2016 Presidential Election', '2016 Presidential Election', 6, 0, 0, '2016-11-01 07:51:21'),
(6, 'Plain Picture and Plain text in Tableview', 'Plain Picture and Plain text in Tableview', 6, 0, 0, '2016-11-01 07:52:53'),
(7, 'Xcode Search Bar - Can\'t search through NSObjects containing NS', '<pre>\r\n ~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*?~!@#$%^&amp;*()_+_)(*&amp;^%$#@!~}{:&quot;&gt;&lt;??:{}+}\\|}{P{}|-/*? \\n\\n &lt;!-- unless you cannot read this --&gt;</pre>\r\n', 1, 0, 0, '2016-11-06 00:01:14'),
(8, 'safasdf', '<p>I think some of my user setting have been changed by someone else. when I open the share property, I accidentally find that all my pass have an extra route, P\\ as you can see in the following picture. And this P, I guess stands for a network computers I found in my WLAN network show in the second picture. Do anyone know what is going on here and what should I do to remove this route? It seems like that all my files right now is being shared on the network router I connected.</p>\r\n\r\n<p><a href="https://i.stack.imgur.com/g947K.png" rel="nofollow noreferrer"><img alt="enter image description here" src="https://i.stack.imgur.com/g947K.png" /></a></p>\r\n', 4, 0, 0, '2016-11-06 00:22:15'),
(9, 'jhkhlk', '<p>&lt;script type=&#39;text/ajvascript&#39; src=&#39;<a href="http://badserver/evilJavascript.js" rel="nofollow" target="_blank">http://badserver/evilJavascript.js</a>&#39;&gt;</p>\r\n', 4, 0, 0, '2016-11-06 15:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(22) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar_id` int(1) NOT NULL,
  `avatar_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `avatar_id`, `avatar_type`) VALUES
(1, 'admin', '4e77c5eed085c1a433a6ddc8bf4130c9', 2, 0),
(2, 'pvenkman', '41f05c9bf093ca30867d7f352849fe15', 1, 0),
(3, 'rstantz', '3a6ac1b0a7dc16801e2522454d778f01', 0, 0),
(4, 'dbarrett', 'fda14faa279c1123604c06f756c7af14', 0, 0),
(5, 'ltully', '50f8b210f0fb2ccdf14bb51804a8967f', 1, 0),
(6, 'espengler', 'f169a4141e900076e5f2b0bb2083b4a4', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `answers_votes`
--
ALTER TABLE `answers_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_blobs`
--
ALTER TABLE `qa_blobs`
  ADD PRIMARY KEY (`blobid`);

--
-- Indexes for table `qa_posts`
--
ALTER TABLE `qa_posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `type` (`type`,`created`),
  ADD KEY `type_2` (`type`,`acount`,`created`),
  ADD KEY `type_4` (`type`,`netvotes`,`created`),
  ADD KEY `type_5` (`type`,`views`,`created`),
  ADD KEY `type_6` (`type`),
  ADD KEY `type_7` (`type`,`amaxvote`,`created`),
  ADD KEY `parentid` (`parentid`,`type`),
  ADD KEY `userid` (`userid`,`type`,`created`),
  ADD KEY `selchildid` (`type`,`created`),
  ADD KEY `catidpath1` (`type`,`created`),
  ADD KEY `catidpath2` (`type`,`created`),
  ADD KEY `catidpath3` (`type`,`created`),
  ADD KEY `categoryid` (`type`,`created`),
  ADD KEY `createip` (`created`),
  ADD KEY `updated` (`updated`,`type`),
  ADD KEY `flagcount` (`flagcount`,`created`,`type`),
  ADD KEY `catidpath1_2` (`updated`,`type`),
  ADD KEY `catidpath2_2` (`updated`,`type`),
  ADD KEY `catidpath3_2` (`updated`,`type`),
  ADD KEY `categoryid_2` (`updated`,`type`),
  ADD KEY `lastuserid` (`updated`,`type`),
  ADD KEY `lastip` (`updated`,`type`);

--
-- Indexes for table `qa_userpoints`
--
ALTER TABLE `qa_userpoints`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `points` (`points`);

--
-- Indexes for table `qa_users`
--
ALTER TABLE `qa_users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `handle_2` (`handle`),
  ADD KEY `email` (`email`),
  ADD KEY `handle` (`handle`),
  ADD KEY `created` (`created`);

--
-- Indexes for table `qa_uservotes`
--
ALTER TABLE `qa_uservotes`
  ADD UNIQUE KEY `userid` (`userid`,`postid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `question_votes`
--
ALTER TABLE `question_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `answers_votes`
--
ALTER TABLE `answers_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qa_blobs`
--
ALTER TABLE `qa_blobs`
  MODIFY `blobid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `qa_posts`
--
ALTER TABLE `qa_posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `qa_users`
--
ALTER TABLE `qa_users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question_votes`
--
ALTER TABLE `question_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
