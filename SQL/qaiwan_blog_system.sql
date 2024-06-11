-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 11, 2024 at 07:54 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

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
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(10, 'some clube name', 'some description', '../../uploads/clubs/84631.jpg', '2024-06-08 13:00:24', '2024-06-08 13:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `club_activities`
--

CREATE TABLE `club_activities` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text,
  `is_accepted` tinyint(1) DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_activities`
--

INSERT INTO `club_activities` (`id`, `club_id`, `name`, `description`, `is_accepted`, `image`, `created_at`, `updated_at`) VALUES
(5, 10, 'some name', 'some description', 0, '../../uploads/club_activity/298425.jpg', '2024-06-11 09:02:56', '2024-06-11 09:02:56');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_activity_chats`
--

INSERT INTO `club_activity_chats` (`id`, `club_activity_id`, `club_id`, `name`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 5, 10, 'someone', ' ASDasdaSF', '2024-06-11 18:45:10', '2024-06-11 18:45:10', 5),
(2, 5, 10, 'someone', 'a sdfasdf asdf asd', '2024-06-11 18:46:00', '2024-06-11 18:46:00', 5),
(3, 5, 10, 'someone', 'some text here', '2024-06-11 18:47:46', '2024-06-11 18:47:46', 5),
(4, 5, 10, 'someone', 'a sdf asd fasdf asdf', '2024-06-11 19:23:59', '2024-06-11 19:23:59', 5),
(5, 5, 10, 'someone', ' asdfa sdf asdf', '2024-06-11 19:26:33', '2024-06-11 19:26:33', 5),
(6, 5, 10, 'someone', ' asdf asdf asdf asdf', '2024-06-11 19:27:58', '2024-06-11 19:27:58', 5),
(7, 5, 10, 'someone', 'as dfas dfasdfasdf asd fasdf', '2024-06-11 19:37:26', '2024-06-11 19:37:26', 5),
(8, 5, 10, 'someone', 'a sdfl asldk fjalksjdf', '2024-06-11 19:37:43', '2024-06-11 19:37:43', 5),
(9, 5, 10, 'someone', 'hello worl dit\'s me', '2024-06-11 19:37:51', '2024-06-11 19:37:51', 5),
(10, 5, 10, 'someone', 'hellow world', '2024-06-11 19:39:58', '2024-06-11 19:39:58', 5);

-- --------------------------------------------------------

--
-- Table structure for table `club_activity_images`
--

CREATE TABLE `club_activity_images` (
  `id` int(11) NOT NULL,
  `club_activity_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `club_heads`
--

CREATE TABLE `club_heads` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_heads`
--

INSERT INTO `club_heads` (`id`, `club_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 5, '2024-06-08 20:51:12', '2024-06-08 20:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_contents`
--

CREATE TABLE `post_contents` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content_type` enum('text','file','image','video') NOT NULL,
  `content` text,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_size` int(11) DEFAULT NULL,
  `file_format` varchar(50) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `file_size` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_ids`
--

CREATE TABLE `student_ids` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `user_is_active` tinyint(1) DEFAULT '0',
  `head_is_active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_ids`
--

INSERT INTO `student_ids` (`id`, `student_id`, `user_is_active`, `head_is_active`) VALUES
(2, 'aaqu8008623', 1, 1),
(23, 'aaqu110010', 1, 0);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`, `student_id`) VALUES
(1, 'alan', 'alan@gmail.com', '$2y$10$Ulpbx39EmFKAZmnrCxe0IubPMUE7aeGNoY7dC/u51Mv2pel6o085.', 'admin', '2024-05-13 22:48:34', '2024-05-13 22:48:34', NULL),
(5, 'someone', 'aalan376@gmail.com', '$2y$10$93yTkjNdx9XYzAB1F.KAZuV748qf9HV1NDTKG9TXSLqjoxpFqwqiy', 'head', '2024-05-17 16:01:25', '2024-05-17 16:01:25', 2),
(6, 'me', 'aaalan376@gmail.com', '$2y$10$5GgqNgQ8vSAkk08p5lH7nu9Zu97M0gRflUbMQ3wIXsqyL0OQD7XWW', 'user', '2024-05-17 19:26:19', '2024-05-17 19:26:19', 2),
(7, 'karo', 'karo@gmail.com', '$2y$10$JBWY9AUfAuTZRpFJhc.cJ.VQjk9IiK7bEs6/SVZ2DTGkUXcK.pQ7W', 'user', '2024-06-04 23:57:20', '2024-06-04 23:57:20', 23);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `club_activities`
--
ALTER TABLE `club_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `club_activity_chats`
--
ALTER TABLE `club_activity_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `club_activity_images`
--
ALTER TABLE `club_activity_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_heads`
--
ALTER TABLE `club_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_contents`
--
ALTER TABLE `project_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_ids`
--
ALTER TABLE `student_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
