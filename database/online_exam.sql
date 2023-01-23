-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 08:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `professor_qa_entries`
--

CREATE TABLE `professor_qa_entries` (
  `pqe_id` int(11) NOT NULL,
  `pqe_professor_id` int(11) NOT NULL,
  `pqe_subject_id` int(11) NOT NULL,
  `pqe_question` text NOT NULL,
  `pqe_option1` varchar(255) NOT NULL,
  `pqe_option2` varchar(255) NOT NULL,
  `pqe_option3` varchar(255) NOT NULL,
  `pqe_option4` varchar(255) NOT NULL,
  `pqe_answer` int(11) NOT NULL,
  `pqe_created_at` datetime NOT NULL,
  `pqe_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor_qa_entries`
--

INSERT INTO `professor_qa_entries` (`pqe_id`, `pqe_professor_id`, `pqe_subject_id`, `pqe_question`, `pqe_option1`, `pqe_option2`, `pqe_option3`, `pqe_option4`, `pqe_answer`, `pqe_created_at`, `pqe_updated_at`) VALUES
(1, 35, 2, 'Test question one?', 'one', 'two', 'three', 'four', 1, '2022-11-18 00:00:00', '2022-11-18 06:46:39'),
(2, 35, 2, 'Test question two?', 'one', 'two', 'three', 'four', 2, '2022-11-18 00:00:00', '2022-11-18 06:57:23'),
(3, 35, 2, 'Test question 3?', 'one', 'two', 'three', 'four', 3, '2022-11-18 23:33:01', '2022-11-18 18:03:01'),
(5, 35, 2, 'Test question 4?', 'one', 'two', 'three', 'four', 4, '2022-11-18 23:34:46', '2022-11-18 18:04:46'),
(6, 38, 3, 'First question?', 'one', 'two', 'three', 'four', 1, '2022-11-21 12:57:21', '2022-11-21 07:27:21'),
(7, 38, 3, 'Second question?', 'one', 'two', 'three', 'four', 2, '2022-11-21 12:57:36', '2022-11-21 07:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `professor_subjects`
--

CREATE TABLE `professor_subjects` (
  `ps_id` int(11) NOT NULL,
  `ps_user_id` int(11) NOT NULL,
  `ps_subject_id` int(11) NOT NULL,
  `ps_created_at` datetime NOT NULL,
  `ps_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor_subjects`
--

INSERT INTO `professor_subjects` (`ps_id`, `ps_user_id`, `ps_subject_id`, `ps_created_at`, `ps_updated_at`) VALUES
(13, 35, 2, '2022-11-18 00:00:00', '2022-11-18 06:27:09'),
(14, 38, 3, '2022-11-21 12:56:53', '2022-11-21 07:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_created_at` datetime NOT NULL,
  `r_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`r_id`, `r_name`, `r_created_at`, `r_updated_at`) VALUES
(1, 'Admin', '2022-11-16 08:13:47', '2022-11-16 07:14:03'),
(2, 'Professor', '2022-11-16 08:13:47', '2022-11-16 07:14:03'),
(3, 'Student', '2022-11-16 08:14:06', '2022-11-16 07:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_test_submissions`
--

CREATE TABLE `student_test_submissions` (
  `sts_id` int(11) NOT NULL,
  `sts_test_id` bigint(11) NOT NULL,
  `sts_user_id` int(11) NOT NULL,
  `sts_question_id` int(11) NOT NULL,
  `sts_student_answer` int(11) NOT NULL,
  `sts_marks` int(11) NOT NULL,
  `sts_created_at` datetime NOT NULL,
  `sts_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_test_submissions`
--

INSERT INTO `student_test_submissions` (`sts_id`, `sts_test_id`, `sts_user_id`, `sts_question_id`, `sts_student_answer`, `sts_marks`, `sts_created_at`, `sts_updated_at`) VALUES
(1, 8208912423, 8, 1, 1, 1, '2022-11-21 12:46:30', '2022-11-21 07:16:30'),
(2, 8208912423, 8, 2, 2, 1, '2022-11-21 12:46:30', '2022-11-21 07:16:30'),
(3, 8208912423, 8, 3, 3, 1, '2022-11-21 12:46:30', '2022-11-21 07:16:30'),
(4, 8208912423, 8, 5, 4, 1, '2022-11-21 12:46:30', '2022-11-21 07:16:30'),
(5, 3360414084, 8, 1, 2, 0, '2022-11-21 12:50:17', '2022-11-21 07:20:17'),
(6, 3360414084, 8, 2, 4, 0, '2022-11-21 12:50:17', '2022-11-21 07:20:17'),
(7, 3360414084, 8, 3, 1, 0, '2022-11-21 12:50:17', '2022-11-21 07:20:17'),
(8, 3360414084, 8, 5, 1, 0, '2022-11-21 12:50:17', '2022-11-21 07:20:17'),
(9, 8530053196, 8, 1, 1, 1, '2022-11-21 12:50:30', '2022-11-21 07:20:30'),
(10, 8530053196, 8, 2, 2, 1, '2022-11-21 12:50:30', '2022-11-21 07:20:30'),
(11, 8530053196, 8, 3, 1, 0, '2022-11-21 12:50:30', '2022-11-21 07:20:30'),
(12, 8530053196, 8, 5, 1, 0, '2022-11-21 12:50:30', '2022-11-21 07:20:30'),
(13, 7158103873, 8, 6, 1, 1, '2022-11-21 13:02:24', '2022-11-21 07:32:24'),
(14, 7158103873, 8, 7, 2, 1, '2022-11-21 13:02:24', '2022-11-21 07:32:24'),
(15, 5424391451, 8, 6, 1, 1, '2022-11-21 13:25:18', '2022-11-21 07:55:18'),
(16, 5424391451, 8, 7, 2, 1, '2022-11-21 13:25:18', '2022-11-21 07:55:18'),
(17, 5994042628, 1, 1, 1, 1, '2022-11-21 13:27:44', '2022-11-21 07:57:44'),
(18, 5994042628, 1, 2, 2, 1, '2022-11-21 13:27:44', '2022-11-21 07:57:44'),
(19, 5994042628, 1, 3, 3, 1, '2022-11-21 13:27:44', '2022-11-21 07:57:44'),
(20, 5994042628, 1, 5, 4, 1, '2022-11-21 13:27:44', '2022-11-21 07:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_created_at` datetime NOT NULL,
  `s_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`s_id`, `s_name`, `s_created_at`, `s_updated_at`) VALUES
(1, 'Physics', '2022-11-17 00:00:00', '2022-11-17 06:25:33'),
(2, 'Chemistry', '2022-11-17 00:00:00', '2022-11-17 06:25:33'),
(3, 'English', '2022-11-17 00:00:00', '2022-11-17 06:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_role_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_created_at` datetime NOT NULL,
  `u_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_role_id`, `u_name`, `u_email`, `u_password`, `u_created_at`, `u_updated_at`) VALUES
(1, 3, 'surya', 'surya@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-11-16 13:36:47', '2022-11-16 08:06:47'),
(8, 3, 'sadguna', 'sadguna@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-11-16 13:41:57', '2022-11-16 08:11:57'),
(11, 1, 'admin', 'admin@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-11-16 23:44:19', '2022-11-16 18:14:19'),
(35, 2, 'rohit', 'rohit@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-11-18 11:57:09', '2022-11-18 06:27:09'),
(38, 2, 'english professor', 'englishprofessor@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-11-21 12:56:53', '2022-11-21 07:26:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `professor_qa_entries`
--
ALTER TABLE `professor_qa_entries`
  ADD PRIMARY KEY (`pqe_id`);

--
-- Indexes for table `professor_subjects`
--
ALTER TABLE `professor_subjects`
  ADD PRIMARY KEY (`ps_id`),
  ADD UNIQUE KEY `ps_subject_id` (`ps_subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `student_test_submissions`
--
ALTER TABLE `student_test_submissions`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_name` (`s_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `professor_qa_entries`
--
ALTER TABLE `professor_qa_entries`
  MODIFY `pqe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professor_subjects`
--
ALTER TABLE `professor_subjects`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_test_submissions`
--
ALTER TABLE `student_test_submissions`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
