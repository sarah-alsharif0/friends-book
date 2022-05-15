-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 04:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends-book`
--
CREATE DATABASE IF NOT EXISTS `friends-book` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `friends-book`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--
-- Creation: May 15, 2022 at 02:16 PM
--

CREATE TABLE `comment` (
  `id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL,
  `commentedUser-id` int(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `comment`:
--   `post-id`
--       `post` -> `id`
--   `commentedUser-id`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--
-- Creation: May 15, 2022 at 02:14 PM
--

CREATE TABLE `friends` (
  `id` int(20) NOT NULL,
  `user1-id` int(20) NOT NULL,
  `user2-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `friends`:
--   `user1-id`
--       `user` -> `id`
--   `user2-id`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `like`
--
-- Creation: May 15, 2022 at 02:14 PM
--

CREATE TABLE `like` (
  `id` int(20) NOT NULL,
  `likedUser-id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `like`:
--   `post-id`
--       `post` -> `id`
--   `likedUser-id`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--
-- Creation: May 15, 2022 at 02:12 PM
--

CREATE TABLE `post` (
  `id` int(20) NOT NULL,
  `user-id` int(20) NOT NULL,
  `image-url` text NOT NULL,
  `text-content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `post`:
--   `user-id`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--
-- Creation: May 15, 2022 at 02:07 PM
--

CREATE TABLE `request` (
  `id` int(20) NOT NULL,
  `userSent-id` int(20) NOT NULL,
  `userRecieved-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `request`:
--   `userRecieved-id`
--       `user` -> `id`
--   `userSent-id`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: May 15, 2022 at 02:18 PM
-- Last update: May 15, 2022 at 01:50 PM
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `first-name` varchar(40) NOT NULL,
  `last-name` varchar(40) NOT NULL,
  `tele-No` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image-url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `first-name`, `last-name`, `tele-No`, `address`, `gender`, `image-url`) VALUES
(1, 'sarah_sh', '1234', 'sarah@test.com', 'sarah first', 'alsharif', '123456789', 'alharas', 'female', 'https://picsum.photos/200'),
(3, 'tmp', '1234', 'tmp@tmp.com', 't', 'm', '3231321', 'fdsla;fj', 'male', 'https://picsum.photos/200'),
(4, 'ahmad', '1234', 'ahmad@tmp.com', 'Ahmad', 'Alsharif', '1234', 'Hebron', 'male', 'https://picsum.photos/400'),
(5, 'mo', '1234', 'mo@test.com', 'Mo', 'Ahmad', '1234', 'Hebron', 'male', 'https://picsum.photos/600'),
(6, 'suhair', '1234', 'suhair@test.com', 'Suhair', 'Alsharif', '1234', 'Hebron', 'female', 'https://picsum.photos/100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post-id` (`post-id`),
  ADD KEY `commentedUser-id` (`commentedUser-id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user1-id` (`user1-id`),
  ADD KEY `user2-id` (`user2-id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likedUser-id` (`likedUser-id`),
  ADD KEY `likedUser-id_2` (`likedUser-id`),
  ADD KEY `post-id` (`post-id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user-id`),
  ADD KEY `user-id_2` (`user-id`),
  ADD KEY `user-id_3` (`user-id`),
  ADD KEY `user-id_4` (`user-id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userSent-id` (`userSent-id`),
  ADD KEY `userRecieved-id` (`userRecieved-id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`,`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment-post-id` FOREIGN KEY (`post-id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment-user-id` FOREIGN KEY (`commentedUser-id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `user1-id` FOREIGN KEY (`user1-id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user2-id` FOREIGN KEY (`user2-id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like-post-id` FOREIGN KEY (`post-id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like-user-id` FOREIGN KEY (`likedUser-id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `userRecieved-id` FOREIGN KEY (`userRecieved-id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userSent-id` FOREIGN KEY (`userSent-id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
