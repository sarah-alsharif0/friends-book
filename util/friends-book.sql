-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 10:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `friends-book`
--
CREATE DATABASE IF NOT EXISTS `friends-book` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `friends-book`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL,
  `commentedUser-id` int(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post-id`, `commentedUser-id`, `content`) VALUES
(94, 18, 1, 'Hi tm'),
(96, 18, 1, 'hi'),
(98, 18, 1, 'hii'),
(99, 18, 1, 'hello'),
(100, 18, 1, 'helloo'),
(101, 18, 1, 'how are you'),
(103, 18, 1, 'this ain\'t working'),
(104, 18, 1, 'again'),
(106, 17, 1, 'hi'),
(107, 17, 1, 'what\'s going on'),
(108, 17, 1, 'what about school'),
(109, 17, 1, 'all good?'),
(111, 17, 1, 'what about this'),
(113, 17, 1, 'fdsa'),
(115, 17, 1, 'hi'),
(116, 17, 1, 'fdsa'),
(117, 17, 1, 'gfds'),
(118, 17, 1, 'gfdsgfds'),
(119, 17, 1, 'gfdsfgsd'),
(120, 17, 1, 'fdgsfdsg'),
(121, 17, 1, 'vdcdcdcdc'),
(122, 17, 1, 'gfvfvfvfdvdfvd'),
(123, 17, 1, 'erqewqrewqr'),
(124, 17, 1, 'erqqrereqw'),
(125, 17, 1, 'rweqwerqerwqweqr'),
(126, 18, 1, 'fsdadsfafdsaafsd'),
(127, 18, 1, 'fdsadsa'),
(128, 18, 1, 'dsfasdaf'),
(129, 17, 1, 'fsdasda'),
(130, 17, 1, 'fdfdfdfd'),
(131, 18, 1, 'fdsadsaffdas'),
(132, 17, 1, 'hihihi'),
(139, 21, 1, 'hello'),
(140, 21, 4, 'hi'),
(142, 21, 1, 'I&#039;m fine');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(20) NOT NULL,
  `user1-id` int(20) NOT NULL,
  `user2-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user1-id`, `user2-id`) VALUES
(11, 3, 1),
(12, 1, 6),
(13, 4, 6),
(14, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(20) NOT NULL,
  `likedUser-id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `likedUser-id`, `post-id`) VALUES
(74, 1, 18),
(82, 1, 17),
(87, 1, 21),
(89, 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(20) NOT NULL,
  `user1-id` int(20) NOT NULL,
  `user2-id` int(20) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user1-id`, `user2-id`, `content`, `date`) VALUES
(1, 1, 4, 'hello', '2022-05-16 21:36:15'),
(2, 1, 4, 'how are you', '2022-05-16 21:36:57'),
(3, 1, 4, 'why not responding', '2022-05-16 21:37:43'),
(4, 1, 4, 'how are you', '2022-05-16 21:44:53'),
(5, 4, 1, 'I&#039;m fine sarah', '2022-05-16 21:46:27'),
(6, 1, 4, 'how you doin', '2022-05-16 21:46:43'),
(7, 4, 1, 'so far so good', '2022-05-16 21:50:02'),
(8, 1, 4, 'cool', '2022-05-16 21:50:12'),
(9, 4, 1, 'lsdfa;lafsd', '2022-05-16 21:51:01'),
(10, 4, 1, ';asfdkfdlas;', '2022-05-16 21:51:05'),
(11, 4, 1, 'dfask;lfkdsa&#039;;', '2022-05-16 21:51:48'),
(12, 4, 1, 'fdsafdsafads', '2022-05-16 21:51:55'),
(13, 4, 1, 'fkdlssdflk', '2022-05-16 21:54:52'),
(14, 1, 4, 'good', '2022-05-16 22:25:04'),
(15, 1, 4, 'hello', '2022-05-16 22:25:58'),
(16, 1, 4, 'how are you', '2022-05-16 22:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(20) NOT NULL,
  `user-id` int(20) NOT NULL,
  `image-url` text NOT NULL,
  `text-content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user-id`, `image-url`, `text-content`, `date`) VALUES
(17, 3, '', 'hello', '2022-05-16 16:19:03'),
(18, 3, '', 'Everyone', '2022-05-16 16:19:08'),
(21, 1, '', 'test everyone', '2022-05-16 19:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(20) NOT NULL,
  `userSent-id` int(20) NOT NULL,
  `userRecieved-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `userSent-id`, `userRecieved-id`) VALUES
(77, 1, 5),
(78, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1-id` (`user1-id`),
  ADD KEY `user2-id` (`user2-id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user1-id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user2-id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
