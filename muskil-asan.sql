-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 02:15 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `muskil-asan`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Hasan is now on comilla, where are you?', '2014-10-02 09:18:41', '2014-10-02 09:18:41'),
(2, 1, 6, 'Kisui to paros na, ki poros ?', '2014-10-02 09:20:45', '2014-10-02 09:20:45'),
(3, 1, 6, 'Hasan is now on comilla, where are you?', '2014-10-02 09:47:58', '2014-10-02 09:47:58'),
(4, 1, 6, 'Pagol er subject, Pagol Chagol.', '2014-10-02 10:01:31', '2014-10-02 10:01:31'),
(5, 1, 4, 'Are you beautiful ?', '2014-10-02 10:04:02', '2014-10-02 10:04:02'),
(6, 1, 4, 'You are so beautiful.', '2014-10-02 10:05:56', '2014-10-02 10:05:56'),
(7, 1, 5, 'Kobe ascho ?', '2014-10-02 10:06:45', '2014-10-02 10:06:45'),
(8, 3, 6, 'Pagol Ho gaya naki ?', '2014-10-02 10:25:00', '2014-10-02 10:25:00'),
(9, 3, 2, 'Vai bepar ta clear na, Clear korben ki ?', '2014-10-02 10:38:39', '2014-10-02 10:38:39'),
(10, 1, 7, 'FIrst Prototype''s are complete.', '2014-10-03 02:30:54', '2014-10-03 02:30:54'),
(11, 3, 7, 'Kiser Project vaia ?', '2014-10-04 10:08:10', '2014-10-04 10:08:10'),
(12, 3, 7, 'Kisui to bujlam na...', '2014-10-04 10:09:25', '2014-10-04 10:09:25'),
(13, 3, 6, 'Ami pagol naki ?', '2014-10-04 10:10:26', '2014-10-04 10:10:26'),
(14, 3, 5, 'Comillay ki ?', '2014-10-04 10:11:59', '2014-10-04 10:11:59'),
(15, 3, 6, 'ami pora sun akori, tui koros na.', '2014-10-04 10:14:40', '2014-10-04 10:14:40'),
(16, 3, 5, 'Comilla ay ar ke ke ke ace ?', '2014-10-04 10:15:49', '2014-10-04 10:15:49'),
(17, 3, 4, 'He e he he he , kare bolli ?', '2014-10-04 10:17:34', '2014-10-04 10:17:34'),
(18, 3, 4, 'ki ta kos ai gula, cic iciiiicic', '2014-10-04 10:18:02', '2014-10-04 10:18:02'),
(19, 3, 8, 'Is Every thing is right ?', '2014-10-04 10:20:07', '2014-10-04 10:20:07'),
(20, 1, 8, 'Tell us about your status.', '2014-10-04 11:53:54', '2014-10-04 11:53:54'),
(21, 1, 8, 'Are this project ok?', '2014-10-04 11:54:22', '2014-10-04 11:54:22'),
(22, 1, 7, 'Voting are complete?', '2014-10-04 11:55:23', '2014-10-04 11:55:23'),
(23, 1, 7, 'Needed time to complete this project ?', '2014-10-04 11:55:52', '2014-10-04 11:55:52'),
(24, 1, 3, 'Bujen nai apu ', '2014-10-04 11:56:17', '2014-10-04 11:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_26_061524_create_table_users', 1),
('2014_09_27_190534_create_questions_table', 1),
('2014_10_02_063734_create_answers_table', 2),
('2014_10_04_141217_create_votes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `questiontitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solved` tinyint(1) NOT NULL,
  `numsofview` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `questiontitle`, `question`, `solved`, `numsofview`, `created_at`, `updated_at`) VALUES
(2, 1, 'What is muskil asan?', 'What does it do ?', 0, 10, '2014-09-28 04:12:49', '2014-10-04 12:04:54'),
(3, 1, 'vaijan,What is muskil asan?', 'Vai, Muskil asan Site ta ki kore , er kam ki ?', 0, 16, '2014-09-29 08:03:49', '2014-10-04 12:05:12'),
(4, 1, 'Hi Beautiful?', 'This is a lorem text .', 0, 12, '2014-09-29 14:23:57', '2014-10-04 10:22:15'),
(5, 2, 'Where is hasan?', 'This question asked by Haasan.', 0, 20, '2014-09-29 15:30:56', '2014-10-04 10:15:49'),
(6, 3, 'What is Psychology ?', 'Psychology is the scientific process of.......(Edit Later) . Pore ki edit korbo? kisui to pari na. :D:D::D::D:::D:', 0, 32, '2014-10-01 13:29:50', '2014-10-09 08:52:28'),
(7, 1, 'Status of your Project?', 'What''s the condition of your project ??', 0, 49, '2014-10-03 02:18:51', '2014-10-11 21:45:32'),
(8, 3, 'This is new Test Question?', 'This test question is used to check every things for all is Right or wrong ?\r\n', 0, 23, '2014-10-04 10:19:31', '2014-10-11 21:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `password_temp` text COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `password_temp`, `code`, `active`, `remember_token`, `points`, `created_at`, `updated_at`) VALUES
(1, 'pasha', 'Hasan Hafiz Pasha', 'pasha.jnu@gmail.com', '$2y$10$4khoBFTzkwgOKoQr635mEe9DoWGSIUJf8Tt7wJh8bjtBPEqKcT846', '', '', 1, '9rTswpGpe18paOcVjTzcxMmpBpWufsClpBvbPlYJvzy2gBQkaJpw9iqFbarz', 17, '2014-09-27 11:00:33', '2014-10-11 21:45:17'),
(2, 'Hasan', 'Sezam Mahmud', 'mac_pasha@ovi.com', '$2y$10$annCG.zVHIei8izolOxkwuoCL/zMTq7EHSUliDAnWg746Cqo2Buny', '', '', 1, NULL, 1, '2014-09-29 15:29:19', '2014-09-29 15:30:17'),
(3, 'dibaRaat', 'Jarin Tasnim Diba', 'diba.ipsc@gmail.com', '$2y$10$RepMaUvCC6S2JhkQIFVj5.Asg2s2gG6jb7dA2fgdvD5Qodxv.ZaDe', '', '', 1, 'ApIble7dMRDQusb2rd9ZjLl9YGIwHOBqLXDYUp9CvtrhtYcAIxnEKiP2PCgD', 19, '2014-10-01 13:26:19', '2014-10-05 12:26:12'),
(4, 'manik', 'Fokor Uddin Manik', 'fokoruddincse@gmail.com', '$2y$10$JKLP2Y0lB3i2yJTwnoDZMO5yvlN7kMWaYSwoFeqo/f2bVnGYxvAqi', '', '', 1, NULL, 1, '2014-10-09 08:54:27', '2014-10-09 08:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`user_id`, `question_id`, `vote`) VALUES
(1, 3, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 0),
(2, 7, 1),
(3, 2, 1),
(3, 4, 1),
(3, 6, 0),
(3, 7, 1),
(3, 8, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
