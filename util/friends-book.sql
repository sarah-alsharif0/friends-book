-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 مايو 2022 الساعة 02:30
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `friends-book`
--

-- --------------------------------------------------------

--
-- بنية الجدول `comment`
--

CREATE TABLE `comment` (
  `id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL,
  `commentedUser-id` int(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `comment`
--

INSERT INTO `comment` (`id`, `post-id`, `commentedUser-id`, `content`) VALUES
(1, 2, 1, 'WOOOW!!'),
(2, 2, 2, 'Thanks dude'),
(3, 2, 2, 'Amazing!!'),
(4, 2, 1, 'hope this works');

-- --------------------------------------------------------

--
-- بنية الجدول `friends`
--

CREATE TABLE `friends` (
  `id` int(20) NOT NULL,
  `user1-id` int(20) NOT NULL,
  `user2-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `friends`
--

INSERT INTO `friends` (`id`, `user1-id`, `user2-id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `like`
--

CREATE TABLE `like` (
  `id` int(20) NOT NULL,
  `likedUser-id` int(20) NOT NULL,
  `post-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `like`
--

INSERT INTO `like` (`id`, `likedUser-id`, `post-id`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `post`
--

CREATE TABLE `post` (
  `id` int(20) NOT NULL,
  `user-id` int(20) NOT NULL,
  `image-url` text NOT NULL,
  `text-content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `post`
--

INSERT INTO `post` (`id`, `user-id`, `image-url`, `text-content`, `date`) VALUES
(1, 1, 'https://picsum.photos/200', 'hello', '2022-05-17'),
(2, 2, 'https://picsum.photos/200', 'world', '2022-05-11'),
(3, 3, 'https://picsum.photos/200', 'hi there', '2022-05-04');

-- --------------------------------------------------------

--
-- بنية الجدول `request`
--

CREATE TABLE `request` (
  `id` int(20) NOT NULL,
  `userSent-id` int(20) NOT NULL,
  `userRecieved-id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `user`
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
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `first-name`, `last-name`, `tele-No`, `address`, `gender`, `image-url`) VALUES
(1, 'sarah_sh', '1234', 'sarah@test.com', 'sarah first', 'alsharif', '123456789', 'alharas', 'female', 'https://picsum.photos/200'),
(2, 'sarah_alsharif_', '', 'test@test.com', 'sarah second', 'alsharif', '1234', 'hebron', 'female', 'https://picsum.photos/200'),
(3, 'tmp', '1234', 'tmp@tmp.com', 't', 'm', '3231321', 'fdsla;fj', 'male', 'https://picsum.photos/200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user-id`),
  ADD KEY `user-id_2` (`user-id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
