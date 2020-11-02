-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 04:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `clean`
--

CREATE TABLE `clean` (
  `id` int(11) NOT NULL,
  `clean_message_id` int(11) NOT NULL,
  `clean_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clean`
--

INSERT INTO `clean` (`id`, `clean_message_id`, `clean_user_id`) VALUES
(1, 12, 5),
(2, 81, 2),
(3, 83, 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `msg_type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `msg_type`, `user_id`, `msg_time`) VALUES
(1, 'hello', 'text', 2, '2020-10-15 03:28:59'),
(2, 'yippper', 'text', 2, '2020-10-15 03:29:16'),
(3, 'Hellooooo', 'text', 2, '2020-10-15 03:31:00'),
(4, 'helllooo', 'text', 2, '2020-10-15 03:31:19'),
(5, 'helllooo', 'text', 2, '2020-10-15 03:31:36'),
(6, 'balu 01.docx', 'docx', 2, '2020-10-15 14:57:44'),
(7, 'balu 01.docx', 'docx', 2, '2020-10-15 14:59:26'),
(8, 'Balu.docx', 'docx', 2, '2020-10-15 15:11:13'),
(9, 'hello hi how do you do', 'text', 2, '2020-10-15 15:12:13'),
(10, 'assets/emoji/emoji13.png', 'emoji', 2, '2020-10-15 15:25:38'),
(11, 'assets/emoji/emoji2.png', 'emoji', 2, '2020-10-15 15:25:46'),
(27, 'Hi I a Shreedhar', 'text', 2, '2020-10-18 13:20:18'),
(28, 'what is the khabar?', 'text', 2, '2020-10-18 13:23:42'),
(30, '36578962_1831604370218749_1938539343090024448_n.jpg', 'jpg', 2, '2020-10-18 13:37:39'),
(31, '8th.zip', 'zip', 2, '2020-10-18 13:39:49'),
(32, 'BIM Online Class routine - Sheet1.pdf', 'pdf', 2, '2020-10-18 13:41:59'),
(33, 'business plan.docx', 'docx', 2, '2020-10-18 13:43:26'),
(34, 'nikki.xlsx', 'xlsx', 2, '2020-10-18 13:43:38'),
(35, 'assets/emoji/emoji12.png', 'emoji', 2, '2020-10-18 13:47:12'),
(38, 'Why?', 'text', 2, '2020-10-18 13:49:18'),
(42, 'assets/emoji/emoji16.png', 'emoji', 2, '2020-10-19 03:55:57'),
(43, 'assets/emoji/emoji16.png', 'emoji', 2, '2020-10-19 03:57:05'),
(44, 'assets/emoji/emoji10.png', 'emoji', 2, '2020-10-19 03:58:24'),
(45, 'Balu CV.docx', 'docx', 2, '2020-10-19 03:58:40'),
(65, 'assets/emoji/emoji13.png', 'emoji', 2, '2020-10-19 04:20:42'),
(66, 'assets/emoji/emoji10.png', 'emoji', 2, '2020-10-19 04:21:11'),
(67, 'assets/emoji/emoji10.png', 'emoji', 2, '2020-10-19 04:21:19'),
(68, 'hello', 'text', 2, '2020-10-19 04:21:24'),
(69, 'assets/emoji/emoji5.png', 'emoji', 2, '2020-10-19 04:25:41'),
(70, 'assets/emoji/emoji7.png', 'emoji', 2, '2020-10-19 04:25:46'),
(71, 'IMG_9629.JPG', 'JPG', 2, '2020-10-19 04:31:16'),
(72, 'what', 'text', 2, '2020-10-19 04:34:22'),
(73, 'what', 'text', 2, '2020-10-19 04:34:28'),
(74, 'IMG_9632.JPG', 'JPG', 2, '2020-10-19 04:35:32'),
(75, 'hey', 'text', 2, '2020-10-19 04:37:39'),
(76, 'assets/emoji/emoji17.png', 'emoji', 2, '2020-10-19 05:01:29'),
(77, 'What?', 'text', 2, '2020-10-19 05:01:35'),
(78, 'hi', 'text', 2, '2020-10-19 13:57:44'),
(79, 'Hey whats up!!!!', 'text', 2, '2020-10-19 13:58:51'),
(80, 'BIM-8th-Sem-Syllabus-2017.pdf', 'pdf', 2, '2020-10-19 14:20:19'),
(81, 'Hey', 'text', 6, '2020-10-19 14:51:38'),
(82, 'Hi Ola', 'text', 2, '2020-10-19 14:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `clean_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `clean_status`) VALUES
(2, 'Shreedhar Bhandari', 'shreedhar.bhandari@yahoo.com', '$2y$10$Y7tZM11ha8e7V4ZN/P6cvOJ98H8jgP6wmwFOl8nsm3DC64dcsZVp.', '37909114_1783730631717845_8359848937640689664_o.jpg', 1, 1),
(3, 'Apple', 'shreedharbhandari@yahoo.com', '$2y$10$Yo1StjVMQ5JB5GyCeSZlk.Lv7UBjyJafXA1Qxiv6ikbCY02MHLaiy', 'IMG_9626.JPG', 0, 0),
(4, 'Shreedhar Bhandari', 'williamwallowziz@yahoo.com', '$2y$10$FnooMC.f6/j4eiOQBNd4M.trD9aTk61GvbFEQebS2/KbtRenfqoye', 'IMG_6025.JPG', 0, 0),
(6, 'Nikita Bhandari', 'nikita@gmail.com', '$2y$10$4gxKYVbzB1gwTvZfC2afD.hr4E578V0fGNVYW41gWKyIQCBcyx3ai', 'adele-facts.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `user_id`, `login_time`) VALUES
(1, 2, '1603118838'),
(2, 6, '1603119064');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clean`
--
ALTER TABLE `clean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clean`
--
ALTER TABLE `clean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
