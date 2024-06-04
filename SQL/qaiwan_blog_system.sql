-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2024 at 11:46 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET NAMES utf8mb4;

--
-- Database: `qaiwan_blog_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 'a sdfasdf', 'a sdfasdf', '../../uploads/clubs/89317.png', '2024-06-04 21:27:33', '2024-06-04 21:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `club_activities`
--

CREATE TABLE `club_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text,
  `is_accepted` tinyint(1) DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `club_activity_chats`
--

CREATE TABLE `club_activity_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_activity_id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `club_activity_id` (`club_activity_id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `club_activity_images`
--

CREATE TABLE `club_activity_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_activity_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `club_activity_id` (`club_activity_id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `club_heads`
--

CREATE TABLE `club_heads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `club_id` (`club_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_heads`
--

INSERT INTO `club_heads` (`id`, `club_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 8, 5, '2024-06-04 23:04:20', '2024-06-04 23:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_contents`
--

CREATE TABLE `post_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `content_type` enum('text','file','image','video') NOT NULL,
  `content` text,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_size` int(11) DEFAULT NULL,
  `file_format` varchar(50) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `content_ibfk_1` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'something', 'This is my test project description', '2024-05-30 20:59:43', '2024-05-30 20:59:43'),
(3, 1, 'something', 'this is the description', '2024-05-30 21:02:24', '2024-05-30 21:02:24'),
(4, 1, 'name', 'another description', '2024-05-30 21:05:49', '2024-05-30 21:05:49'),
(5, 1, 'another', 'this is the description', '2024-05-30 21:12:06', '2024-05-30 21:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `project_contents`
--

CREATE TABLE `project_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `file_name` varchar(1024) NOT NULL,
  `file_dir` varchar(2048) NOT NULL,
  `file_type` varchar(256) NOT NULL,
  `file_size` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_contents`
--

INSERT INTO `project_contents` (`id`, `project_id`, `file_name`, `file_dir`, `file_type`, `file_size`, `created_at`, `updated_at`) VALUES
(7, 4, '6377265647529054117373706.docx', '../../uploads/projects/files/', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 13217, '2024-05-30 21:05:49', '2024-05-30 21:05:49'),
(8, 4, '50413.jpg', '../../uploads/projects/images/', 'image/jpeg', 760375, '2024-05-30 21:05:49', '2024-05-30 21:05:49'),
(9, 5, 'BlogSystem_2.pdf', '../../uploads/projects/files/', 'application/pdf', 25651, '2024-05-30 21:12:06', '2024-05-30 21:12:06'),
(10, 5, '84631.jpg', '../../uploads/projects/images/', 'image/jpeg', 490253, '2024-05-30 21:12:06', '2024-05-30 21:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_ids`
--

CREATE TABLE `student_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `user_is_active` tinyint(1) DEFAULT '0',
  `head_is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_ids`
--

INSERT INTO `student_ids` (`id`, `student_id`, `user_is_active`, `head_is_active`) VALUES
(2, 'aaqu8008623', 1, 1),
(23, 'aaqu110010', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','head','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `users_ibfk_1` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`, `student_id`) VALUES
(1, 'alan', 'alan@gmail.com', '$2y$10$Ulpbx39EmFKAZmnrCxe0IubPMUE7aeGNoY7dC/u51Mv2pel6o085.', 'admin', '2024-05-13 22:48:34', '2024-05-13 22:48:34', NULL),
(5, 'someone', 'aalan376@gmail.com', '$2y$10$93yTkjNdx9XYzAB1F.KAZuV748qf9HV1NDTKG9TXSLqjoxpFqwqiy', 'head', '2024-05-17 16:01:25', '2024-05-17 16:01:25', 2),
(6, 'me', 'aaalan376@gmail.com', '$2y$10$5GgqNgQ8vSAkk08p5lH7nu9Zu97M0gRflUbMQ3wIXsqyL0OQD7XWW', 'user', '2024-05-17 19:26:19', '2024-05-17 19:26:19', 2);

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--

--
-- Indexes for table `club_activities`
--

--
-- Indexes for table `club_activity_chats`
--

--
-- Indexes for table `club_activity_images`
--

--
-- Indexes for table `club_heads`
--

--
-- Indexes for table `posts`
--

--
-- Indexes for table `post_contents`
--

--
-- Indexes for table `projects`
--

--
-- Indexes for table `project_contents`
--

--
-- Indexes for table `student_ids`
--

--
-- Indexes for table `users`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `club_activities`
--
ALTER TABLE `club_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_activity_chats`
--
ALTER TABLE `club_activity_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `post_contents`
--
ALTER TABLE `post_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_contents`
--
ALTER TABLE `project_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_ids`
--
ALTER TABLE `student_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `club_activity_chats_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

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

SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
