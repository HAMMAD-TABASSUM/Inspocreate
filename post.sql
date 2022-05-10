-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 02:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspocreate`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_video` text NOT NULL,
  `tital` text NOT NULL,
  `category` text NOT NULL,
  `discription` text NOT NULL,
  `tags` text NOT NULL,
  `collection` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `usid` int(11) NOT NULL,
  `is_like` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_image`, `post_video`, `tital`, `category`, `discription`, `tags`, `collection`, `public`, `usid`, `is_like`) VALUES
(31, 'img8.jpeg', '', 'Empowerment', 'w', '', 'Empowerment', 0, 0, 89, '3,4'),
(32, 'img5.jpeg', '', 'Successfull', '', 'a', 'Successfull', 0, 0, 89, '89,3,4'),
(34, 'img9.jpeg', '', 'Enterprenure', '', 'll', 'Enterprenure', 0, 0, 89, '$get_likes_by_users'),
(35, 'Hammad2.jpeg', '', 'Employs', '', 'fgsf', 'Employs', 0, 0, 89, '1,2,3'),
(36, 'Hammad2.jpeg', '', 'Entership', '', '', 'Entership', 0, 0, 89, ''),
(65, '', 'video.mkv', 'business', '', 'hgfjhgj', 'business', 0, 0, 89, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
