-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 09:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1','2') NOT NULL DEFAULT '2',
  `photo` varchar(225) NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(1, 'Aung Min Oo', 'boyofpunk00@gmail.com', '$2y$10$nYlwV4hjKN2VtGhZ9wwnKumvxFGWDazjV/9rjREmXzhDp1l1k/hIW', '2', 'default.png', '2021-03-25 11:31:58'),
(2, 'admin', 'admin@gmail.com', '$2y$10$wvmluFlgS2XXVrcyqATKgO/YGYISn3T3IqjgfFc5Z2pz73yUXZt7m', '2', 'default.png', '2021-03-25 11:45:56'),
(3, 'Pro', 'aungminoo1314@gmail.com', '$2y$10$FO8oLmhpXJ.htBK/pcYHa.rf.6vWYVz2QyWRpk6lUw1TLwda.XCbq', '2', 'default.png', '2021-03-25 11:46:14'),
(4, 'Kyaw Gyii', 'aungminoo0911@gmail.com', '$2y$10$D/Coa7fHDZiA0y/3Nvk2seGZGCxWFVhebbgGuOa8oXQpHwQx7dli6', '2', 'default.png', '2021-03-25 11:48:11'),
(5, 'Kyaw Kyaw', 'aungminoo0911@gmail.com', '$2y$10$9s7p0l.0x5VAtv5Fi9Pbw./5A7dXa9v61KJ/lFh1Ps/ft6tWHbp8C', '2', 'default.png', '2021-03-25 11:49:20'),
(6, 'Kyaw Kyaw Aung', 'aungminoo091122@gmail.com', '$2y$10$T3/xEgQYFIgYmiPf/BEhUewQFsgyvK2N/lkdllc6Tdo/w/hdBsMtm', '2', 'default.png', '2021-03-25 11:51:14'),
(7, 'admin', 'admin@gmail.com', '$2y$10$xaVHmx/ylzayVrhuNY8GnOTO5POuhEYsqCEwJ1GFzPycIZbfYkvsu', '2', 'default.png', '2021-03-30 06:38:17'),
(8, 'Admin', 'admin@gmail.com', '$2y$10$jMdMFLpDQWnTSfKc8d2GOO9YA8HAsQznWP0SbZErRl3aoba/F9opm', '2', 'default.png', '2021-03-30 06:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
