-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 05:11 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--
CREATE DATABASE IF NOT EXISTS `chat_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `chat_app`;

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `qid` int NOT NULL,
  `username` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ans` varchar(15000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`qid`, `username`, `time`, `ans`) VALUES
(34, 'chat_app', '2021-02-26 08:18:53', 'this is ans'),
(34, 'chat_app', '2021-02-26 08:20:39', 'tjis is 2nd ans'),
(34, 'chat_app', '2021-02-26 08:25:33', 'adqwe'),
(33, 'chat_app', '2021-02-26 08:29:17', 'ahgshdfg'),
(32, 'chat_app', '2021-02-26 08:29:27', 'jkhfuyfujgkjgho8uioguiy'),
(32, 'dkdeepak001', '2021-02-26 08:29:59', '15487'),
(32, 'chat_app', '2021-02-26 13:33:26', 'asdqweqedfgcxgdfgwrq'),
(34, '', '2021-02-27 01:33:59', 'qweqwras'),
(34, 'chat_app', '2021-02-27 01:34:13', 'asdqwewzxczxczc'),
(35, 'dkdeepak001', '2021-03-02 01:57:48', 'asdwqe'),
(35, 'dkdeepak001', '2021-03-02 02:06:16', 'qweqwevcxvncbvcn'),
(35, 'dkdeepak001', '2021-03-02 02:12:27', 'asdwqe'),
(33, 'dkdeepak001', '2021-03-02 02:13:47', 'qweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `uname` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(10000) NOT NULL,
  `dept` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`uname`, `time`, `message`, `dept`) VALUES
('admin1', '2021-02-25 03:10:25', 'bsc ct', 'Bsc(CT)'),
('admin1', '2021-02-25 03:10:29', 'ct', 'Bsc(CT)'),
('chat_app', '2021-02-25 03:10:37', 'asdasdqwe', 'Bsc(CS)'),
('chat_app', '2021-02-25 03:10:43', 'cs', 'Bsc(CS)'),
('admin1', '2021-02-25 03:11:01', 'ct', 'Bsc(CT)'),
('chat_app', '2021-02-25 03:11:41', 'cs', 'Bsc(CS)'),
('admin1', '2021-02-25 03:18:27', 'ct', 'Bsc(CT)'),
('chat_app', '2021-02-25 03:22:50', 'hi iam fromcs', 'Bsc(CS)'),
('dkdeepak001', '2021-02-25 03:23:44', 'i amd deepak', 'Bsc(CT)'),
('admin1', '2021-02-25 03:24:16', 'hi', 'Bsc(CT)'),
('dkdeepak001', '2021-02-25 03:24:23', 'i am the ct don', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:04:45', 'loasdkdsamljxca', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:04:48', 'asdasd', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:10:45', 'qweqweasd', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:19:26', 'asd', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:19:32', 'asdqwe', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:20:25', 'dsa', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:20:31', 'asd', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:20:54', 'qweasdzxc', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:20:58', 'asdzcx', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:29:10', 'ih', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:29:16', 'asdqwewe', 'Bsc(CT)'),
('dkdeepak001', '2021-03-01 02:30:14', 'asdasd', 'Bsc(CT)'),
('dkdeepak001', '2021-03-25 04:41:25', 'hi', 'Bsc(CT)'),
('dkdeepak001', '2021-03-25 04:41:34', ' i am admin', 'Bsc(CT)'),
('dkdeepak001', '2021-03-25 04:41:46', 'who are you', 'Bsc(CT)'),
('dkdeepak001', '2021-03-25 04:41:59', 'i am from bsc cs', 'Bsc(CT)');

-- --------------------------------------------------------

--
-- Table structure for table `forumroom`
--

CREATE TABLE `forumroom` (
  `uid` int NOT NULL,
  `username` varchar(150) NOT NULL,
  `year` varchar(150) NOT NULL,
  `dept` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forumroom`
--

INSERT INTO `forumroom` (`uid`, `username`, `year`, `dept`, `time`, `message`) VALUES
(32, 'chat_app', '3', 'Bsc(CS)', '2021-02-26 04:35:02', 'i am dk\r\n'),
(33, 'dkdeepak001', '3', 'Bsc(CT)', '2021-02-26 05:01:52', 'thi s isdf nxt'),
(34, 'chat_app', '3', 'Bsc(CS)', '2021-02-26 08:17:41', 'last\r\n'),
(35, 'dkdeepak001', '3', 'Bsc(CT)', '2021-03-01 04:08:19', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `User_Details`
--

CREATE TABLE `User_Details` (
  `uid` int NOT NULL,
  `uname` varchar(150) NOT NULL,
  `upass` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `year` int NOT NULL,
  `dept` varchar(150) NOT NULL,
  `sec` varchar(150) NOT NULL,
  `session_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User_Details`
--

INSERT INTO `User_Details` (`uid`, `uname`, `upass`, `email`, `year`, `dept`, `sec`, `session_id`) VALUES
(48, 'admin1', 'admin1', 'admin1@skasc.ac.in', 3, 'Bsc(CT)', 'A', 'tdl1h6uuba5uf2j7r109fiel1v60379a4015b6e'),
(49, 'chat_app', 'Password#123', 'chatapp@skasc.ac.in', 3, 'Bsc(CS)', 'B', '936o4o2k16ko7hn3p6vnnp25tj603b22993e6e1'),
(50, 'dkdeepak001', 'Password#123', 'dpakeswar@skasc.ac.in', 3, 'Bsc(CT)', 'A', '6bs121cc4l3a41cuan6nu817b6605c14599e1fd'),
(51, 'addddddd', 'dddd', 'dddd@skasc.ac.in', 1, 'Bsc(CT)', 'A', ''),
(52, 'qweqweqwe', 'qwqwqw', 'adminsss1@skasc.ac.in', 1, 'Bsc(CT)', 'A', ''),
(53, 'qweqweqweqq', 'Password#123', 'deepakeswarqq@skasc.ac.in', 1, 'Bsc(CT)', 'A', ''),
(54, 'asdddddddd', 'Password#123', 'admin1asdqwe@skasc.ac.in', 1, 'Bsc(CT)', 'A', ''),
(55, 'admin1123', 'admin1', 'deepakeswa1243124r@skasc.ac.in', 2, 'Bsc(CT)', 'A', ''),
(56, 'chat_appasd', 'Password#123', 'deepakeswarqwesdfdf@skasc.ac.in', 1, 'Bsc(CT)', 'A', ''),
(57, 'chat_appasdasd', 'Password#123', 'deepakeswarqwesdsadfdf@skasc.ac.in', 3, 'Bsc(CT)', 'B', ''),
(58, 'dkdeepak001001', 'Password#123', 'deepakeswarqwasdefdghnj@skasc.ac.in', 2, 'Bsc(CS)', 'A', ''),
(59, 'test123', 'Password#123', 'test123@skasc.ac.in', 1, 'Bsc(CS)', 'A', ''),
(60, 'admin1890', 'admin1', 'dpakeswar123hjdfg@skasc.ac.in', 2, 'Bsc(CS)', 'A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forumroom`
--
ALTER TABLE `forumroom`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `User_Details`
--
ALTER TABLE `User_Details`
  ADD PRIMARY KEY (`uid`,`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forumroom`
--
ALTER TABLE `forumroom`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `User_Details`
--
ALTER TABLE `User_Details`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
