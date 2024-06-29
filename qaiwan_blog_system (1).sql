-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 09:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qaiwan_blog_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(11, 'music club', 'music club', '../../uploads/clubs/music.png', '2024-06-11 21:44:23', '2024-06-11 21:44:23'),
(12, 'art club', 'art club', '../../uploads/clubs/art.png', '2024-06-11 21:44:55', '2024-06-11 21:44:55'),
(14, 'sports club', 'new', '../../uploads/clubs/sport.png', '2024-06-20 17:26:20', '2024-06-20 17:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `club_activities`
--

CREATE TABLE `club_activities` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT 0,
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `club_activities`
--

INSERT INTO `club_activities` (`id`, `club_id`, `name`, `description`, `is_accepted`, `image`, `created_at`, `updated_at`) VALUES
(7, 12, 'Van Gogh', 'show image for student', 0, '../../uploads/club_activity/image.png', '2024-06-11 21:52:14', '2024-06-11 21:52:14'),
(9, 12, 'hiking', 'new', 0, '../../uploads/club_activity/hiking.png', '2024-06-20 18:00:55', '2024-06-20 18:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `club_activity_chats`
--

CREATE TABLE `club_activity_chats` (
  `id` int(11) NOT NULL,
  `club_activity_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `club_activity_chats`
--

INSERT INTO `club_activity_chats` (`id`, `club_activity_id`, `club_id`, `name`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
(22, 7, 12, 'karo', 'hello ', '2024-06-20 10:30:49', '2024-06-20 10:30:49', 7),
(23, 7, 12, 'alan', 'hello every one ', '2024-06-20 16:39:19', '2024-06-20 16:39:19', 1),
(24, 7, 12, 'alan', 'hi again', '2024-06-20 17:05:08', '2024-06-20 17:05:08', 1),
(25, 7, 12, 'paiwand', 'hello there\n', '2024-06-20 17:12:54', '2024-06-20 17:12:54', 8),
(26, 7, 12, 'paiwand', 'hi\n', '2024-06-20 18:00:32', '2024-06-20 18:00:32', 8),
(27, 9, 12, 'karo', 'hi', '2024-06-20 18:08:20', '2024-06-20 18:08:20', 7);

-- --------------------------------------------------------

--
-- Table structure for table `club_activity_images`
--

CREATE TABLE `club_activity_images` (
  `id` int(11) NOT NULL,
  `club_activity_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_heads`
--

CREATE TABLE `club_heads` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `club_heads`
--

INSERT INTO `club_heads` (`id`, `club_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 12, 8, '2024-06-11 21:48:24', '2024-06-11 21:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_contents`
--

CREATE TABLE `post_contents` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content_type` enum('text','file','image','video') NOT NULL,
  `content` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_size` int(11) DEFAULT NULL,
  `file_format` varchar(50) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 5, 'paiwand55', 'final project55', '2024-06-11 20:50:59', '2024-06-11 20:50:59'),
(6, 8, 'paiwand', 'final project', '2024-06-20 17:08:12', '2024-06-20 17:08:12'),
(8, 7, 'new1', 'aaa', '2024-06-20 18:07:40', '2024-06-20 18:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `project_contents`
--

CREATE TABLE `project_contents` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_name` varchar(1024) NOT NULL,
  `file_dir` varchar(2048) NOT NULL,
  `file_type` varchar(256) NOT NULL,
  `file_size` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_contents`
--

INSERT INTO `project_contents` (`id`, `project_id`, `file_name`, `file_dir`, `file_type`, `file_size`, `created_at`, `updated_at`) VALUES
(5, 3, '~$رەسم.docx', '../../uploads/projects/files/', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 162, '2024-06-11 20:50:59', '2024-06-11 20:50:59'),
(6, 3, '2.jpeg', '../../uploads/projects/images/', 'image/jpeg', 8479, '2024-06-11 20:50:59', '2024-06-11 20:50:59'),
(11, 6, 'Final_Year_Project_Qaiwan_Blog_System.docx', '../../uploads/projects/files/', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 2658953, '2024-06-20 17:08:12', '2024-06-20 17:08:12'),
(12, 6, 'Screenshot 2024-06-20 132500.png', '../../uploads/projects/images/', 'image/png', 2394906, '2024-06-20 17:08:12', '2024-06-20 17:08:12'),
(15, 8, 'new.docx', '../../uploads/projects/files/', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0, '2024-06-20 18:07:40', '2024-06-20 18:07:40'),
(16, 8, 'pro1.jpg', '../../uploads/projects/images/', 'image/jpeg', 296641, '2024-06-20 18:07:40', '2024-06-20 18:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_ids`
--

CREATE TABLE `student_ids` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `user_is_active` tinyint(1) DEFAULT 0,
  `head_is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_ids`
--

INSERT INTO `student_ids` (`id`, `student_id`, `user_is_active`, `head_is_active`) VALUES
(2, 'aaqu8008623', 1, 1),
(23, 'aaqu110010', 1, 0),
(24, 'ph2000', 0, 1),
(25, 'km1999', 1, 0),
(26, 'aa1998', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','head','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`, `student_id`) VALUES
(1, 'alan', 'alan@gmail.com', '$2y$10$Ulpbx39EmFKAZmnrCxe0IubPMUE7aeGNoY7dC/u51Mv2pel6o085.', 'admin', '2024-05-13 22:48:34', '2024-05-13 22:48:34', NULL),
(5, 'someone', 'aalan376@gmail.com', '$2y$10$93yTkjNdx9XYzAB1F.KAZuV748qf9HV1NDTKG9TXSLqjoxpFqwqiy', 'head', '2024-05-17 16:01:25', '2024-05-17 16:01:25', 2),
(6, 'me', 'aaalan376@gmail.com', '$2y$10$5GgqNgQ8vSAkk08p5lH7nu9Zu97M0gRflUbMQ3wIXsqyL0OQD7XWW', 'user', '2024-05-17 19:26:19', '2024-05-17 19:26:19', 2),
(7, 'karo', 'karo@gmail.com', '$2y$10$JBWY9AUfAuTZRpFJhc.cJ.VQjk9IiK7bEs6/SVZ2DTGkUXcK.pQ7W', 'user', '2024-06-04 23:57:20', '2024-06-04 23:57:20', 23),
(8, 'paiwand', 'paiwand@gmail.com', '$2y$10$lv4QiANrXhq/BCnD1ZdjJuppeF9xfpEU69NE5ZT.W9d.0rfvt6eTW', 'head', '2024-06-11 20:40:12', '2024-06-11 20:40:12', 24),
(12, 'new', 'new@gmail.com', '$2y$10$e65tYvd6.6KEplUlbpMg8uuNAfLXqNHSBslAgG7y4E0sIKtRrlzO.', 'head', '2024-06-20 17:57:23', '2024-06-20 17:57:23', 26),
(16, 'didan', 'didan1@gmail.com', '$2y$10$4nqEgM21SZeRaihEe1HQ8.i6I9h6vLOziEElm0a7LQ/NbFOb71heC', 'user', '2024-06-20 18:22:32', '2024-06-20 18:22:32', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_activities`
--
ALTER TABLE `club_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `club_activity_chats`
--
ALTER TABLE `club_activity_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_activity_id` (`club_activity_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `club_activity_images`
--
ALTER TABLE `club_activity_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_activity_id` (`club_activity_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `club_heads`
--
ALTER TABLE `club_heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_id` (`club_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_contents`
--
ALTER TABLE `post_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_ibfk_1` (`post_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_contents`
--
ALTER TABLE `project_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `student_ids`
--
ALTER TABLE `student_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `club_activities`
--
ALTER TABLE `club_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `club_activity_chats`
--
ALTER TABLE `club_activity_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `club_activity_images`
--
ALTER TABLE `club_activity_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_heads`
--
ALTER TABLE `club_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_contents`
--
ALTER TABLE `post_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_contents`
--
ALTER TABLE `project_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_ids`
--
ALTER TABLE `student_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_activities`
--
ALTER TABLE `club_activities`
  ADD CONSTRAINT `club_activities_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_activity_chats`
--
ALTER TABLE `club_activity_chats`
  ADD CONSTRAINT `club_activity_chats_ibfk_1` FOREIGN KEY (`club_activity_id`) REFERENCES `club_activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_activity_chats_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `club_activity_images`
--
ALTER TABLE `club_activity_images`
  ADD CONSTRAINT `club_activity_images_ibfk_1` FOREIGN KEY (`club_activity_id`) REFERENCES `club_activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_activity_images_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_heads`
--
ALTER TABLE `club_heads`
  ADD CONSTRAINT `club_heads_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_heads_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_contents`
--
ALTER TABLE `post_contents`
  ADD CONSTRAINT `post_contents_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_contents`
--
ALTER TABLE `project_contents`
  ADD CONSTRAINT `project_contents_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_ids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
