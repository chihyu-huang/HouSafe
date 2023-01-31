-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2022 at 11:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `b_id` int(10) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`b_id`, `b_name`, `arrival`, `departure`, `email`) VALUES
(1, 'happy', '2022-08-08', '2022-08-10', 'f@f'),
(3, 'happy', '2022-08-14', '2022-08-20', 's@s');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(20) DEFAULT NULL,
  `price` int(8) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `owner_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `photo`, `name`, `location`, `price`, `owner`, `email`, `owner_id`) VALUES
(2, 'a.jpg', '200', 'heyyy', 180, 'cool', 'f@f', 4),
(3, '2.jpeg', '3', 'island', 300, ' abc123', 'aa@1', 14),
(4, 'a.jpg', 'factory', 'galway', 100, 'abc123', 'aa@1', 14),
(13, '1.jpeg', 'koala', 'west', 420, 'cool', 'f@f', 4),
(22, 'b.png', 'employee', 'galway', 180, ' abc123', 'aa@1', 14),
(23, 'a.png', 'a', 'a', 2, 'f', 's@1', 16),
(25, 'a.jpg', 'biubiu', 'earth', 2000, 'abc123', 'aa@1', 14),
(26, '2.jpeg', 'mucho', 'g00d', 100, 'cool', 'f@f', 4),
(27, 'house.jpeg', 'House', 'Howth', 200, 'cool', 'f@f', 4),
(31, '1.jpeg', 'room', 'Dublin 14', 400, 'f', 's@1', 16),
(40, 'meow.jpg', 'meowwww', 'mars', 10000, 'g', 'g@1', 40),
(41, '1.jpeg', 'hooo', 'Dublin 1', 200, 'meow', 's@s', 52);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `userImage` varchar(50) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `id_pic` varchar(50) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `password`, `username`, `userImage`, `bio`, `id_pic`, `status`) VALUES
(4, 'f@f', '2', 'mimi', 'meow.jpg', 'I\'m a smart cat:)) hehehe', 'meow.jpg', 'ok'),
(14, 'aa@1', '1', 'abc123', 'b.jpg', 'Hi, it\'s nice to meet you!', NULL, NULL),
(16, 's@1', '1', 'f', 'a.png', 'Hello, I\'m new here.', NULL, NULL),
(40, 'g@1', 'g', 'g', NULL, '', 'b.jpg', 'ok'),
(41, 'd@4', 'd', 'd', 'b.png', '', 'meow.jpg', 'ok'),
(43, 'z@1', 'z', 'z', 'house.jpeg', '', 'c.png', 'ok'),
(44, 'l@1', '1', '1', 'b.png', '', 'c.png', 'ok'),
(51, 'j@1', '1', '1', NULL, NULL, NULL, NULL),
(52, 's@s', '1', 'meow', 'meow.jpg', 'I\'m meow', 'a.jpg', 'ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
