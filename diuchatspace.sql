-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 07:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `diuchatspace`;
USE `diuchatspace`;

--
-- Database: `diuchatspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_user` int(255) NOT NULL,
  `outgoing_msg_user` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `isLoggedIn` varchar(15) NOT NULL DEFAULT 'Not Active',
  `profile_pic` varchar(255) NOT NULL,
  `bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `gender`, `isLoggedIn`, `profile_pic`, `bio`) VALUES
(1, '', 'Sorry, no user found!', 'none@none.com', '', 'none', 'none', './images/profile.PNG', 'none'),
(3, 'asus', 'Asus Laptop', 'asus@g.co', '$2y$10$gwFds0joHLjFO0fvU/o.9.aGHDYxuTemK/BoJEsQVR64bJYwUqs/S', 'Male', 'Active Now', './images/asus.png', 'This is my asus laptop.'),
(4, 'mac', 'MAc Book', 'mac@m.co', '$2y$10$jGNnzECyxc6OsBIeI4rOP.V6YJ5gBAvBDbOh0Az47g/eTcvVK/kIW', 'Female', 'Not Active', './images/mac.jpeg', 'This is my macbook.'),
(5, 'ashik', 'Ashik Rahman', 'ashikrahman@gmail.com', '$2y$10$YMsNmDmG.le1jF.V.w9EO.3ENLioy70OPd6Z3dZ9aF8s/Dsp7iye6', 'Male', 'Not Active', './images/ashik.jpg', 'My name is Asahik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
