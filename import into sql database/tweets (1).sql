-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 08:23 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `tweet_num` int(11) NOT NULL,
  `tweet_author` varchar(10) NOT NULL,
  `tweet_content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`tweet_num`, `tweet_author`, `tweet_content`) VALUES
(1, 'asharp', 'This is my first snip!'),
(2, 'asharp', 'Wow snippets is awesome!'),
(3, 'thisguy', 'Who is this guy??'),
(4, 'notabot', 'I am not a bot.'),
(5, 'notabot', 'More like you totally are a bot.'),
(6, 'notabot', 'Who is talking about all these bots?'),
(7, 'notabot', 'I am not a bot.'),
(8, 'notabot', 'I am not a bot.'),
(9, 'notabot', 'I am not a bot.'),
(11, 'test2', 'This is a snip!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_num`),
  ADD KEY `tweet_author` (`tweet_author`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
