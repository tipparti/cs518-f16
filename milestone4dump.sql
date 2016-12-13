-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2016 at 05:37 PM
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
-- Table structure for table `qa_blobs`
--

CREATE TABLE `qa_blobs` (
  `blobid` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `gravatar` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_blobs`
--

INSERT INTO `qa_blobs` (`blobid`, `filename`, `userid`, `gravatar`, `created`) VALUES
(1, '16783195.jpg', 23, 0, '2016-12-11 20:04:29'),
(4, 'thumb_584df9b778759.jpg', 1, 0, '2016-12-11 20:13:27'),
(7, 'https://www.gravatar.com/avatar/117228c7cf51dc14ea3605642684b6d1?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 1, 1, '2016-12-11 20:34:38'),
(8, 'https://www.gravatar.com/avatar/fe283dd0f08480d6476882afe08b7554?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 2, 1, '2016-12-11 22:04:01'),
(9, 'https://www.gravatar.com/avatar/4bf09dfca45ad47c7ba68c51201ebbc4?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 3, 1, '2016-12-11 22:05:59'),
(10, 'https://www.gravatar.com/avatar/526a81ee4584cc3ccc80d39fe2b1920f?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 4, 1, '2016-12-11 22:07:37'),
(11, 'https://www.gravatar.com/avatar/7e79510751e0d7c716c2090a290233cb?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 5, 1, '2016-12-11 22:08:17'),
(12, 'https://www.gravatar.com/avatar/2c04afec1332f3daa717122cdb68d589?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 6, 1, '2016-12-11 22:09:05'),
(13, 'https://www.gravatar.com/avatar/dcb4411ac77c4ab6d7775805f9d4b6a3?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 7, 1, '2016-12-11 22:09:39'),
(14, 'https://www.gravatar.com/avatar/354cf6559ca3eb774c43c8626d6f9db0?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 8, 1, '2016-12-11 22:10:13'),
(15, 'https://www.gravatar.com/avatar/6c66ec47be3150a12bcbfbaa61be9bff?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 9, 1, '2016-12-11 22:10:43'),
(16, 'https://www.gravatar.com/avatar/fe2614d65e5a307237f374aa30c7f641?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 10, 1, '2016-12-11 22:11:45'),
(17, 'https://www.gravatar.com/avatar/d2d3c8b5add607a993d1a12af2cac98b?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 11, 1, '2016-12-11 22:12:26'),
(18, 'https://www.gravatar.com/avatar/96c87722f5469e53dd4cd50e02f5fcfb?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 12, 1, '2016-12-11 22:12:58'),
(19, 'https://www.gravatar.com/avatar/ae9783e999fff575cd2bfaef5b8aae1c?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 13, 1, '2016-12-11 22:13:26'),
(20, 'https://www.gravatar.com/avatar/55f1736b72335675508d4452cd62b35b?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 14, 1, '2016-12-11 22:13:50'),
(21, 'https://www.gravatar.com/avatar/22de2ac897255f7741946283351d661a?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 15, 1, '2016-12-11 22:14:29'),
(22, 'https://www.gravatar.com/avatar/f71d757df1b7f29a042f7a0e4f5e9317?d=https%3A%2F%2Fwww.gravatar.com%2Favatar%2F&s=200', 23, 1, '2016-12-12 10:07:31');

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
  `flagged` tinyint(1) NOT NULL,
  `flag_id` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `qa_posts` (`postid`, `type`, `parentid`, `acount`, `amaxvote`, `userid`, `upvotes`, `downvotes`, `netvotes`, `views`, `flagged`, `flag_id`, `flagcount`, `format`, `created`, `updated`, `title`, `content`, `tags`, `selects`, `s_userid`) VALUES
(1, 'Q', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 13:49:45', NULL, 'Find a repeat word in each line', '<div class="post-text">\r\n<p>I have a string and I want to find the index of repeated word in each line:</p>\r\n\r\n<pre>\r\n<code>string = &quot;string3 is nice, string2 . string3 is good.&quot;\r\nx = &quot;string3&quot;\r\nfor word in set(string.split()):\r\n if &quot;string3&quot; in word: \r\n    u =  string.index(x)\r\n    print(x, u)</code></pre>\r\n\r\n<p>I want to find &quot;<strong>string3</strong>&quot; and their indexes. The problem in my code it&#39;s only finding the first &quot;<strong>string3</strong>&quot; in &quot;<code>string3 is nice</code>&quot; and doesn&#39;t go to next line <code>&quot;string3 is good&quot;</code></p>\r\n\r\n<p>any idea why?..</p>\r\n</div>\r\n', 'python', NULL, 0),
(2, 'Q', NULL, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 13:54:14', NULL, 'How does react native compile it\'s code into native apps?', '<div class="post-text">\r\n<p>recently started working with react native and project requires for apps to be build on server. So the theory is that app could be build on request, which means something, lets call this something react native compiler, needs to be on some server which allows me to do this.</p>\r\n\r\n<p>For example, this is the location where is react native compiler is &quot;<a href="http://example.com/compile" rel="nofollow noreferrer">http://example.com/compile</a>&quot;, and you have some settings options and button &quot;compile&quot; on that site, and when you click on button, application compiler starts, and after x seconds android and iphone apps are ready to be downloaded. Is this possible?</p>\r\n</div>\r\n', 'reaact,angular', NULL, 0),
(3, 'Q', NULL, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 13:58:15', NULL, 'Can i populate a database from another database', '<p>I&#39;m trying to create a data warehouse.</p>\r\n\r\n<p>Is it possible to populate a table in db1, from data in db2.</p>\r\n\r\n<p>For example</p>\r\n\r\n<p>Corporate Database Table Route</p>\r\n\r\n<pre>\r\n<code>CREATE TABLE ROUTE (\r\nRouteID INTEGER(4) PRIMARY KEY,\r\nRouteName VARCHAR (50) NOT NULL,\r\nBoardingStop VARCHAR (50) NOT NULL,\r\nAlightingStop VARCHAR (50) NOT NULL\r\n);</code></pre>\r\n\r\n<p>Insert Information INSERT INTO <code>ROUTE</code> (<code>RouteID</code>,<code>RouteName</code>,<code>BoardingStop</code>,<code>AlightingStop</code>) VALUES (1,&quot;ab&quot;,&quot;B&quot;,&quot;C&quot;)</p>\r\n\r\n<p>Data warehouse table dimRoute</p>\r\n\r\n<pre>\r\n<code>CREATE TABLE DimROUTE (\r\nRouteID INTEGER(4),\r\nRouteName VARCHAR (50) NOT NULL,\r\nBoardingStop VARCHAR (50) NOT NULL,\r\nAlightingStop VARCHAR (50) NOT NULL,\r\nPRIMARY KEY(RouteID)\r\n);</code></pre>\r\n', 'phpmyadmin,sql', NULL, 0),
(4, 'Q', NULL, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:01:45', NULL, 'Drag and Drop with a button to upload', '<div class="post-text">\r\n<p>I am trying to implement a drag-and-drop interface for web browsers with the following behavior.</p>\r\n\r\n<ol>\r\n	<li>There should be a drag-n-drop area which people can use to upload images (They can upload only one at a time).</li>\r\n	<li>Once they drop an image, a preview should be shown with a button to upload the file to a server</li>\r\n	<li>On click, a POST request is sent to the webserver, which does some processing and returns back an image.</li>\r\n	<li>And now, we display both the images in parallel.</li>\r\n</ol>\r\n\r\n<p>I am trying to implement the example from here <a href="http://html5demos.com/dnd-upload" rel="nofollow noreferrer">http://html5demos.com/dnd-upload</a></p>\r\n\r\n<p>However, I need to be able to upload only when I click a button instead of auto-upload.</p>\r\n\r\n<p>How do I do this? [JS newbie, so spare no detail :) ]</p>\r\n</div>\r\n', 'html,javascript,php,css', NULL, 0),
(5, 'Q', NULL, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:03:28', NULL, 'cache pictures from remote server with varnish', '<p>I&#39;m creating simple page where will a lot of pictures. All pictures are hosted on remote provider (hosted on object storage and I have only links to all pictures) To speed up www I would like to use varnish to cache this pictures but I have problem:<br />\r\nAll pictures are served with https, so I&#39;ve used haproxy to terminate ssl and next traffic go to varnish, but how to map in varnish website address that should be visible for end user like <a href="https://www.website.com/picture.jpg" rel="nofollow noreferrer">https://www.website.com/picture.jpg</a> with remote address where is picture hosted(<a href="https://www.remotehostedpictures.com/picture.jpg" rel="nofollow noreferrer">https://www.remotehostedpictures.com/picture.jpg</a>) . So, in final result user must see first link, remote address remotehostedpictures.com/picture.jpg can&#39;t be visible.</p>\r\n', 'wordpress,html,ajax', NULL, 0),
(6, 'Q', NULL, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:05:01', NULL, 'How to see backup size in Cloudberry Backup before running it', '<p>I am evaluating using Cloudberry Backup. I was previously using Mozy backup service, and I really liked how when you were creating a backup plan, it would show you in real time the total size of the backup as you were creating it. Since with Cloudberry Backup, I am paying a 3rd party to store the data (in my case Amazon S3), I want to see how much data I&#39;ll be actually using before running the backup. Is there a way to see this in Cloudberry Backup?</p>\r\n', 'css,php,angular', NULL, 0),
(7, 'Q', NULL, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:06:37', NULL, 'Replace unknown numeric value within binary file on command line', '<div class="post-text">\r\n<p>I&#39;d like to replace some unknown values within a directory of binary files. Some, but now all the the files in the directory contain (mid way through a line) something like the following.</p>\r\n\r\n<p>&quot;myValue&quot;:&quot;65&quot;</p>\r\n\r\n<p>I&#39;d like to be able to modify them all to something like</p>\r\n\r\n<p>&quot;myValue&quot;:&quot;57&quot;</p>\r\n\r\n<p>I don&#39;t know the initial value as it&#39;s different in each file but I&#39;d like them all to be the same. I guess i&#39;m going to need sed with regex but I&#39;m absolutely useless with regular expressions.</p>\r\n</div>\r\n', 'python,ajax', NULL, 0),
(8, 'Q', NULL, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:07:41', NULL, 'HTML/Javascript - popup box', '<p>I have a problem with a modal popup window on my site.</p>\r\n\r\n<p>The problem is that my modal popup window is used for a promotion code so every time someone puts an promotion code and presses Submit button it doesn&#39;t work...</p>\r\n\r\n<p>It should change the amount of coins to 100.</p>\r\n\r\n<p>Here is the code:</p>\r\n\r\n<pre>\r\n<code>&lt;input type=&quot;submit&quot; value=&quot;SUBMIT CODE&quot; onclick=&quot;myFunction()&quot;&gt;\r\n\r\n&lt;script&gt;\r\n  function myFunction() {\r\n    document.getElementById(&quot;coin&quot;).innerHTML = document.getElementById(&quot;pcode&quot;).value;\r\n&lt;/script&gt;</code></pre>\r\n', 'jquery,javascript,css', NULL, 0),
(9, 'Q', NULL, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:09:25', NULL, 'Matching a number to closest number in a set in Javascript', '<p>I won&#39;t give you a written algorithm, but the general idea: Have a variable of <code>lowestDifference</code>, initially set to JavaScript&#39;s Infinity. Iterate over the array, calculate the difference between the input number (or numbers for that matter) and the current number in the array (use Math.abs on the result). If the difference is lower than the <code>lowestDifference</code>, save it to a variable denoting the answer. And to be precise to your requirement, in case the difference is equal to the <code>lowestDifference</code>, change the answer to the new array element only if it&#39;s lower than the input number.</p>\r\n', 'javascript,angular', NULL, 0),
(10, 'Q', NULL, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:12:35', NULL, 'Matching a number to closest number in a set in Javascript', '<p>I won&#39;t give you a written algorithm, but the general idea: Have a variable of <code>lowestDifference</code>, initially set to JavaScript&#39;s Infinity. Iterate over the array, calculate the difference between the input number (or numbers for that matter) and the current number in the array (use Math.abs on the result). If the difference is lower than the <code>lowestDifference</code>, save it to <code>lowestDifference</code> and save the array element to a variable denoting the answer. And to be precise to your requirement, in case the difference is equal to the <code>lowestDifference</code>, change the answer to the new array element only if it&#39;s lower than the input number.</p>\r\n', 'javascript,html,css', NULL, 0),
(11, 'Q', NULL, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:14:00', NULL, 'Issues with function event - FireFox', '<div class="post-text">\r\n<p>I&#39;ve recently taken over a project from a previous developer and I&#39;m stuck on the below error that occurs on FireFox only. I&#39;m quite useless when it comes to jQuery so I&#39;m hoping it&#39;s a relatively easy fix.</p>\r\n\r\n<p>I&#39;m getting event is undefined for the service_init function. Any ideas? I&#39;ve tried adding</p>\r\n\r\n<pre>\r\n<code>event = event || window.event;</code></pre>\r\n\r\n<p>and have also added the event parameter to the function</p>\r\n\r\n<pre>\r\n<code>jQuery(document).ready(function() {\r\n\r\n    var $serviceClick = jQuery(&quot;.service-selector a&quot;);\r\n    var $serviceBox = jQuery(&quot;.post-content-ajax&quot;);\r\n    var $random = $serviceClick.eq([Math.floor(Math.random()*$serviceClick.length)]);\r\n\r\n    function service_init(event) {\r\n        event = event || window.event;\r\n        event.preventDefault();\r\n        event.stopPropagation();\r\n        jQuery(&quot;.post-content-ajax&quot;).css(&#39;display&#39;, &#39;none&#39;);\r\n        $dataTarget = $random.data(&#39;service&#39;);\r\n        $random.removeClass(&#39;active-service&#39;).addClass(&#39;active-service&#39;);\r\n        jQuery(&quot;#&quot; + $dataTarget).css(&#39;display&#39;, &#39;block&#39;);\r\n        jQuery(this).addClass(&#39;active-service&#39;);\r\n        jQuery(this).prev().removeClass(&#39;active-service&#39;);\r\n    }\r\n    service_init();\r\n\r\n    jQuery($serviceClick).click(function(event) {\r\n        event.preventDefault();\r\n        event.stopPropagation();            \r\n        jQuery($serviceClick).removeClass(&#39;active-service&#39;);\r\n        $dataTarget = jQuery(this).data(&#39;service&#39;);\r\n        jQuery(&quot;.post-content-ajax&quot;).css(&#39;display&#39;, &#39;none&#39;);\r\n        jQuery(&quot;#&quot; + $dataTarget).css(&#39;display&#39;, &#39;block&#39;);\r\n        jQuery(this).addClass(&#39;active-service&#39;);\r\n        jQuery(this).prev().removeClass(&#39;active-service&#39;);\r\n\r\n\r\n    });\r\n});</code></pre>\r\n</div>\r\n', 'jquery,ajax,javascript', NULL, 0),
(12, 'Q', NULL, 0, 0, 11, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:15:48', NULL, 'Android app crash while converting with media codec with MP4 formatting?', '<p>I have an app which get data as byte from onPreviewFrame and pass to my encoder which is another class implement media codec api of android get data and make a video file. It works file with format &quot;video/avc&quot; but crash fro &quot;mpeg4&quot; with showing a thread error. What could be the reason?</p>\r\n', 'andriod,php', NULL, 0),
(13, 'Q', NULL, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:17:29', NULL, 'How to sort and array of objects where the key is the date', '<p>I have seen this question and none of them answer my question. So consider the following:</p>\r\n\r\n<pre>\r\n<code>[\r\n  { &#39;August 17th 2016&#39;: [75] }, // 75 is the length of the array which contains up to 75 objects ... \r\n  { &#39;August 1st 2016&#39;: [5] },\r\n  { &#39;August 28th 2016&#39;: [5] },\r\n  ...\r\n]</code></pre>\r\n\r\n<p>Whats the best way to sort the objects in this array by their date and still keep the &quot;english&quot; representation of their key?</p>\r\n\r\n<p><strong>Note</strong>: The key is used as a chart label.</p>\r\n\r\n<p>Every where I look uses <code>array.sort</code> but thats on the objects key of say <code>created_at</code>.</p>\r\n\r\n<p>The result should be:</p>\r\n\r\n<pre>\r\n<code>[\r\n  { &#39;August 1st 2016&#39;: [5] },\r\n  { &#39;August 17th 2016&#39;: [75] }\r\n  { &#39;August 28th 2016&#39;: [5] },\r\n  ...\r\n]</code></pre>\r\n', 'javascript,html,css', NULL, 0),
(14, 'Q', NULL, 0, 0, 13, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 14:19:52', NULL, 'Html input is not selected on click', '<div class="post-text">\r\n<p>I am adding input via jQuery but can&#39;t type anything in it, on click the default blue outline appears and disappears at once. What can be wrong?</p>\r\n\r\n<pre>\r\n<code>$(&#39;#user_description&#39;).html(&#39;&lt;input type=&quot;text&quot; value=&quot;&quot; /&gt;&#39;)</code></pre>\r\n\r\n<p>css:</p>\r\n\r\n<pre>\r\n<code>#user_description input{\r\nwidth: 300px;\r\n height: 31px;\r\n      background: #403a48;\r\n    border: none;\r\n\r\n}</code></pre>\r\n</div>\r\n', 'html,css', NULL, 0),
(15, 'Q', NULL, 3, 0, 14, 0, 0, -1, 0, 0, 20, 0, 'html', '2016-12-11 14:21:41', NULL, 'How do I create a high score table?', '<div class="post-text">\r\n<p>I&#39;ve created a game (yatzy) for a school project and I would like to be able to save the scores and preferably sort them. When all score fields are filled in a message box will pop up telling you the total score. I would like this score to be saved together with previous and upcoming scores. The high score list should also be veiwable by clicking a button.</p>\r\n\r\n<p>I&#39;ve tried finding a solution but I have no idea how to proceed. I understand that I should use XML or something but I&#39;m not very familiar with it. Any help are appreciated, thanks.</p>\r\n</div>\r\n', 'html,css', NULL, 0),
(16, 'Q', NULL, 1, 0, 15, 0, 0, 2, 0, 0, 17, 0, 'html', '2016-12-11 14:23:00', NULL, 'Parse folder names and rename folders by using a batch command', '<div class="post-text">\r\n<p>I&#39;m trying to rename a large number of folders that have dates as names. I have created a test folder that contains just two such folders. Their names are</p>\r\n\r\n<p>1-23-2014 10-1-2016</p>\r\n\r\n<p>I want to rename them to</p>\r\n\r\n<p>2014-01-23 2016-10-01</p>\r\n\r\n<p>In a command window run as administrator (probably not necessary) I have entered these commands.</p>\r\n\r\n<pre>\r\n<code>C:\\Users\\Harry\\Documents\\Test Batch Job&gt;dir\r\n Volume in drive C is Windows\r\n Volume Serial Number is 30C3-D653\r\n\r\n Directory of C:\\Users\\Harry\\Documents\\Test Batch Job\r\n\r\n12/11/2016  01:52 PM    &lt;DIR&gt;          .\r\n12/11/2016  01:52 PM    &lt;DIR&gt;          ..\r\n11/27/2016  10:33 PM    &lt;DIR&gt;          1-23-2014\r\n11/27/2016  10:33 PM    &lt;DIR&gt;          10-1-2016\r\n               0 File(s)              0 bytes\r\n               4 Dir(s)  309,874,257,920 bytes free\r\n\r\nC:\\Users\\Harry\\Documents\\Test Batch Job&gt;for /f &quot;tokens=1,2,3 delims=-&quot; %%A in (&quot;%~dp0&quot;) do rename %%A-%%B-%%C %%C-%%A-%%B\r\n%%A was unexpected at this time.\r\n\r\nC:\\Users\\Harry\\Documents\\Test Batch Job&gt;\r\n</code></pre>\r\n\r\n<p>I&#39;m aware that I don&#39;t deal with the missing leading zeros with this command -- I&#39;ll deal with that after I get this command working.</p>\r\n\r\n<p>I am getting the error message</p>\r\n\r\n<p>%%A was unexpected at this time.</p>\r\n\r\n<p>How can I get past this error? Thanks.</p>\r\n</div>\r\n', 'ajax,jquery', NULL, 0),
(17, 'A', 16, 0, 0, 23, 0, 0, 1, 0, 1, 0, 0, 'html', '2016-12-11 22:58:05', NULL, NULL, '<p>I am getting the error message</p>\r\n\r\n<p>%%A was unexpected at this time</p>\r\n\r\n<p>How can I get past this error? Thanks.</p>\r\n', NULL, NULL, 0),
(18, 'A', 15, 0, 0, 23, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 22:58:25', NULL, NULL, '<p>hool project and I would like to be able to save the scores and pferably sort them. When all score fields are filled in a message box will pop up telling you the total score. I would like this score to be saved together with pvious and upcoming scores. The high score list should also be veiwable by clicking a button.</p>\r\n', NULL, NULL, 0),
(19, 'A', 15, 0, 0, 23, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-11 22:58:30', NULL, NULL, '<p>hool project and I would like to be able to save the scores and pferably sort them. When all score fields are filled in a message box will pop up telling you the total score. I would like this score to be saved together with pvious and upcoming scores. The high score list should also be veiwable by clicking a button.</p>\r\n', NULL, NULL, 0),
(20, 'A', 15, 0, 0, 23, 0, 0, -1, 0, 1, 0, 0, 'html', '2016-12-11 22:58:37', NULL, NULL, '<p>hool project and I would like to be able to save the scores and pferably sort them. When all score fields are filled in a message box will pop up telling you the total score. I would like this score to be saved together with pvious and upcoming scores. The high score list should also be veiwable by clicking a button.</p>\r\n', NULL, NULL, 0),
(21, 'Q', NULL, 0, 0, 23, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-12 11:14:04', NULL, 'Check both if empty or if contains value in Javascript object (ES2015)', '<div class="post-text">\r\n<p>I&#39;m trying to figure out the best and most clean/concise way to check first if an object even has any values, and if so, if one of those values is <code>71</code>.</p>\r\n\r\n<p>In essence, if the object is <code>empty</code> then the function should return <code>true</code>. Also if the function isn&#39;t <code>empty</code> but contains <code>71</code> as one of the values (they&#39;re numerically indexed) then it should be true. Everything else false.</p>\r\n\r\n<p>What I have at the moment works but seems kinda messy and lengthy:</p>\r\n\r\n<p><code>facets</code> is the object</p>\r\n\r\n<pre>\r\n<code>if (Object.keys(facets).length === 0) {\r\n  if (facets[index] == 71) {\r\n    return true;\r\n  } else {\r\n    return false;\r\n  }\r\n}</code></pre>\r\n</div>\r\n', 'javascript', NULL, 0),
(22, 'Q', NULL, 0, 0, 23, 0, 0, 0, 0, 0, 0, 0, 'html', '2016-12-12 21:44:04', NULL, 'Using sockets for JNI to java communication', '<p>&nbsp;I wish to use sockets for communication between JNI and Java source code. Are there any sample working implementations?</p>\r\n', 'java,sockets,native', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qa_posttags`
--

CREATE TABLE `qa_posttags` (
  `postid` int(10) UNSIGNED NOT NULL,
  `wordid` int(10) UNSIGNED NOT NULL,
  `postcreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_posttags`
--

INSERT INTO `qa_posttags` (`postid`, `wordid`, `postcreated`) VALUES
(8, 7, '2016-12-11 14:07:41'),
(9, 7, '2016-12-11 14:09:25'),
(10, 7, '2016-12-11 14:12:35'),
(14, 6, '2016-12-11 14:19:52'),
(21, 7, '2016-12-12 11:14:04'),
(22, 14, '2016-12-12 21:44:04'),
(22, 15, '2016-12-12 21:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `qa_tagwords`
--

CREATE TABLE `qa_tagwords` (
  `postid` int(10) UNSIGNED NOT NULL,
  `wordid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_tagwords`
--

INSERT INTO `qa_tagwords` (`postid`, `wordid`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(5, 10),
(5, 6),
(5, 11),
(6, 9),
(6, 8),
(6, 3),
(7, 1),
(7, 11),
(8, 12),
(8, 7),
(8, 9),
(9, 7),
(9, 3),
(10, 7),
(10, 6),
(10, 9),
(11, 12),
(11, 11),
(11, 7),
(12, 13),
(12, 8),
(13, 7),
(13, 6),
(13, 9),
(14, 6),
(14, 9),
(15, 6),
(15, 9),
(16, 11),
(16, 12),
(21, 7),
(22, 14),
(22, 15),
(22, 16);

-- --------------------------------------------------------

--
-- Table structure for table `qa_titlewords`
--

CREATE TABLE `qa_titlewords` (
  `postid` int(10) UNSIGNED NOT NULL,
  `wordid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, '2016-12-11 11:07:24', 'ntipp001@odu.edu', 'admin', 4, NULL, NULL, '4e77c5eed085c1a433a6ddc8bf4130c9', '2016-12-11 11:07:24'),
(2, '2016-12-11 11:09:33', 'jbrunelle@cs.odu.edu', 'jbrunelle', 8, NULL, NULL, '40e77c0dcd4c2f84b93a340695c4a22c', '2016-12-11 11:09:33'),
(3, '2016-12-11 11:10:57', 'pvenkman@xyz.edu', 'pvenkman', 9, NULL, NULL, '41f05c9bf093ca30867d7f352849fe15', '2016-12-11 11:10:57'),
(4, '2016-12-11 11:11:53', 'rstantz@odu.edu', 'rstantz', 10, NULL, NULL, '3a6ac1b0a7dc16801e2522454d778f01', '2016-12-11 11:11:53'),
(5, '2016-12-11 11:12:36', 'dbarrett@xyz.edu', 'dbarrett', 11, NULL, NULL, 'fda14faa279c1123604c06f756c7af14', '2016-12-11 11:12:36'),
(6, '2016-12-11 11:13:18', 'ltully@xyz.edu', 'ltully', 12, NULL, NULL, '50f8b210f0fb2ccdf14bb51804a8967f', '2016-12-11 11:13:18'),
(7, '2016-12-11 11:14:02', 'espengler@xyz.edu', 'espengler', 13, NULL, NULL, 'bda901c7f42ecc301fd7ca211cbfc7f1', '2016-12-11 11:14:02'),
(8, '2016-12-11 11:14:37', 'janine@xyz.edu', 'janine', 14, NULL, NULL, 'f4afa63a631c17ac6add6707f6de62af', '2016-12-11 11:14:37'),
(9, '2016-12-11 11:16:43', 'winston@xyz.edu', 'winston', 15, NULL, NULL, '8e19620f4c93ab0d3e348c5d1adc6805', '2016-12-11 11:16:43'),
(10, '2016-12-11 11:17:34', 'gozer@xyz.edu', 'gozer', 16, NULL, NULL, '87243a29a6a3a9f16ff76ec0dcf8a867', '2016-12-11 11:17:34'),
(11, '2016-12-11 11:18:08', 'slimer@xyz.edu', 'slimer', 17, NULL, NULL, '5c117248e1c5aee2eaf29e00b8d1086c', '2016-12-11 11:18:08'),
(12, '2016-12-11 11:18:50', 'zuul@xyz.edu', 'zuul', 18, NULL, NULL, '56e3d056e1273d276b1d5868d06660ba', '2016-12-11 11:18:50'),
(13, '2016-12-11 11:19:24', 'keymaster@xyz.edu', 'keymaster', 19, NULL, NULL, 'a542e1dcfab848d32cff6624c42cb2b3', '2016-12-11 11:19:24'),
(14, '2016-12-11 11:20:18', 'gatekeeper@xyz.edu', 'gatekeeper', 20, NULL, NULL, 'f37dfd8c66add2172d5dbad7590e29e5', '2016-12-11 11:20:18'),
(15, '2016-12-11 11:21:08', 'staypuft@xyz.edu', 'staypuft', 21, NULL, NULL, '91d0f8c24026b7e757c55fceabfecdd4', '2016-12-11 11:21:08'),
(23, '2016-12-11 20:04:29', 'ntippart@odu.edu', 'tipparti', 1, NULL, NULL, '9bf690704911733d1d5781316d4863f2', '2016-12-11 20:04:29');

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
(15, 1, -1, 0),
(16, 1, 1, 0),
(17, 1, 1, 0),
(18, 1, 0, 0),
(19, 1, 0, 0),
(20, 1, -1, 0),
(21, 1, 0, 0),
(16, 23, 1, 0),
(17, 23, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qa_words`
--

CREATE TABLE `qa_words` (
  `wordid` int(10) UNSIGNED NOT NULL,
  `word` varchar(80) NOT NULL,
  `titlecount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `contentcount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tagwordcount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tagcount` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_words`
--

INSERT INTO `qa_words` (`wordid`, `word`, `titlecount`, `contentcount`, `tagwordcount`, `tagcount`) VALUES
(1, 'python', 0, 0, 0, 0),
(2, 'reaact', 0, 0, 0, 0),
(3, 'angular', 0, 0, 0, 0),
(4, 'phpmyadmin', 0, 0, 0, 0),
(5, 'sql', 0, 0, 0, 0),
(6, 'html', 0, 0, 0, 0),
(7, 'javascript', 0, 0, 0, 0),
(8, 'php', 0, 0, 0, 0),
(9, 'css', 0, 0, 0, 0),
(10, 'wordpress', 0, 0, 0, 0),
(11, 'ajax', 0, 0, 0, 0),
(12, 'jquery', 0, 0, 0, 0),
(13, 'andriod', 0, 0, 0, 0),
(14, 'java', 0, 0, 0, 0),
(15, 'sockets', 0, 0, 0, 0),
(16, 'native', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

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
ALTER TABLE `qa_posts` ADD FULLTEXT KEY `index_name` (`title`);
ALTER TABLE `qa_posts` ADD FULLTEXT KEY `index_name2` (`content`);
ALTER TABLE `qa_posts` ADD FULLTEXT KEY `index_name3` (`tags`);

--
-- Indexes for table `qa_posttags`
--
ALTER TABLE `qa_posttags`
  ADD KEY `postid` (`postid`),
  ADD KEY `wordid` (`wordid`,`postcreated`);

--
-- Indexes for table `qa_tagwords`
--
ALTER TABLE `qa_tagwords`
  ADD KEY `postid` (`postid`),
  ADD KEY `wordid` (`wordid`);

--
-- Indexes for table `qa_titlewords`
--
ALTER TABLE `qa_titlewords`
  ADD KEY `postid` (`postid`),
  ADD KEY `wordid` (`wordid`);

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
-- Indexes for table `qa_words`
--
ALTER TABLE `qa_words`
  ADD PRIMARY KEY (`wordid`),
  ADD UNIQUE KEY `word_2` (`word`),
  ADD KEY `word` (`word`),
  ADD KEY `tagcount` (`tagcount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qa_blobs`
--
ALTER TABLE `qa_blobs`
  MODIFY `blobid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `qa_posts`
--
ALTER TABLE `qa_posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `qa_users`
--
ALTER TABLE `qa_users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `qa_words`
--
ALTER TABLE `qa_words`
  MODIFY `wordid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qa_posttags`
--
ALTER TABLE `qa_posttags`
  ADD CONSTRAINT `qa_posttags_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `qa_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_posttags_ibfk_2` FOREIGN KEY (`wordid`) REFERENCES `qa_words` (`wordid`);

--
-- Constraints for table `qa_tagwords`
--
ALTER TABLE `qa_tagwords`
  ADD CONSTRAINT `qa_tagwords_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `qa_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_tagwords_ibfk_2` FOREIGN KEY (`wordid`) REFERENCES `qa_words` (`wordid`);

--
-- Constraints for table `qa_titlewords`
--
ALTER TABLE `qa_titlewords`
  ADD CONSTRAINT `qa_titlewords_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `qa_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_titlewords_ibfk_2` FOREIGN KEY (`wordid`) REFERENCES `qa_words` (`wordid`);


  --
  -- Constraints for table `qa_posts`
  --
  ALTER TABLE `qa_posts`
      ADD FULLTEXT INDEX `IndexName` (`title`)
      ADD FULLTEXT INDEX `IndexName2` (`content`);
