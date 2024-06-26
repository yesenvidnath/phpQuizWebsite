-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 06:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Rukmal Hettiarachchi', 'rhettiarachchi@swin.edu.au', 'Swin123#');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_responses`
--

CREATE TABLE `quiz_responses` (
  `quiz_responses_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `student_number` int(10) NOT NULL,
  `attempt_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `q1` text NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(255) DEFAULT NULL,
  `q4` varchar(50) NOT NULL,
  `q5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_responses`
--

INSERT INTO `quiz_responses` (`quiz_responses_id`, `user_id`, `first_name`, `last_name`, `student_number`, `attempt_date`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES
(64, 18, 'Nadeesha', 'Prashan', 1234568, '2023-09-09 03:03:31', 'Web development', 'B. New Programming Method', 'A. fs, B. HTTP', 'npm install', 'console.log(\"Hello, Node.js!\");'),
(65, 18, 'Yesen', 'Kandalama', 1234568, '2023-09-09 03:03:49', 'Web development', 'A. Node Package Manager', 'A. fs, B. HTTP', 'npm install', 'console.log(\"Hello, Node.js!\");'),
(66, 18, 'Yesen', 'Kandalama', 1234568, '2023-09-09 03:04:14', 'Web development', 'C. Node Programming Module', 'C. js, D. css', 'npm install', 'Print : hello '),
(67, 18, 'Yesen', 'Kandalama', 1234568, '2023-09-09 03:04:33', 'Web Development ', 'B. New Programming Method', 'A. fs', 'npm install', 'console.log(\"Hello, Node.js!\");');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `attempt_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `score` int(11) DEFAULT NULL,
  `q1_correct` tinyint(1) DEFAULT NULL,
  `q2_correct` tinyint(1) DEFAULT NULL,
  `q3_correct` tinyint(1) DEFAULT NULL,
  `q4_correct` tinyint(1) DEFAULT NULL,
  `q5_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`id`, `user_id`, `attempt_date`, `score`, `q1_correct`, `q2_correct`, `q3_correct`, `q4_correct`, `q5_correct`) VALUES
(50, 18, '2023-09-09 03:03:31', 4, 1, 0, 1, 1, 1),
(51, 18, '2023-09-09 03:03:49', 5, 1, 1, 1, 1, 1),
(52, 18, '2023-09-09 03:04:14', 2, 1, 0, 0, 1, 0),
(53, 18, '2023-09-09 03:04:33', 2, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `student_number` varchar(10) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `student_number`, `registration_date`) VALUES
(18, 'Yesen', 'Kandalama', '1234568', '2023-09-09 03:03:31'),
(20, 'Jimmy', 'Hamlen', '2345678', '2023-09-10 02:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  ADD PRIMARY KEY (`quiz_responses_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_scores_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  MODIFY `quiz_responses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  ADD CONSTRAINT `quiz_responses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD CONSTRAINT `quiz_scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
