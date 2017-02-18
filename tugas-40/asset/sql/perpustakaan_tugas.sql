-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2017 at 07:45 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `cover_picture` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `synopsis` text,
  `total_page` int(11) NOT NULL,
  `age_limit` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT '1',
  `add_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `category_id`, `librarian_id`, `code`, `cover_picture`, `title`, `author`, `publisher`, `synopsis`, `total_page`, `age_limit`, `stock`, `add_at`, `update_at`, `is_delete`) VALUES
(2, 1, 1, '20170213204', '20170213204.jpg', 'Hujan Season 2', 'Tere Liye', 'GM', 'Novel Tentang Hujan Part 2', 140, 0, 10, '2017-02-13 03:01:37', '2017-02-14 07:07:30', 0),
(3, 1, 1, '20170213542', '20170213542.jpg', 'Pulang', 'Tere Liye', '', 'Pulang Sudah Magrib', 5, 1, 5, '2017-02-13 03:23:35', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_delete` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `is_delete`) VALUES
(1, 'Novel', 0),
(2, 'Agama', 0),
(3, 'Bahasa Indonesia', 0),
(4, 'Matematika', 0),
(5, 'Sembarang', 1),
(6, 'Testing', 1),
(7, 'Bahasa Inggris', 0),
(8, 'Fisika Murni', 0),
(9, 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_chief` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `name`, `username`, `password`, `is_chief`) VALUES
(1, 'Muhammad Iqbal', 'chongieball', '$2y$10$l0m.cpklKp0L7WfWWRBEcer5yuAtfK8PUdW6hvCUa5yw/a0bXaPvS', 1),
(3, 'M. Fahmi Fadillah', 'fadeloleng', '$2y$10$DgL/FCQ1vyZ3.1Aq4tUeMu50p0FmxHyJrImYxMDkg3qmW14ROEgZy', 0),
(4, 'M. Aditya Anugrah', 'aditlope', '$2y$10$wkYo.tT4gqEHZk0roSdLYOoELpFFnL7FuWARwL7cqjQcFu8ipa4Nq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_librarian`
--

CREATE TABLE `log_librarian` (
  `id` int(11) NOT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_at` datetime DEFAULT '1000-01-01 00:00:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_librarian`
--

INSERT INTO `log_librarian` (`id`, `librarian_id`, `login_at`, `logout_at`) VALUES
(1, 1, '2017-02-11 06:49:23', '2017-02-11 13:53:33'),
(2, 1, '2017-02-11 06:59:57', '2017-02-11 14:01:17'),
(3, 1, '2017-02-11 07:08:45', '2017-02-11 14:13:42'),
(4, 1, '2017-02-11 07:13:54', '2017-02-11 14:17:57'),
(5, 1, '2017-02-11 07:27:11', '2017-02-11 14:27:33'),
(6, 1, '2017-02-12 03:44:23', '2017-02-12 10:45:11'),
(7, 3, '2017-02-12 03:48:09', '2017-02-12 10:50:14'),
(8, 1, '2017-02-12 03:51:08', '2017-02-12 10:57:57'),
(9, 3, '2017-02-12 04:03:09', '2017-02-12 11:03:19'),
(10, 1, '2017-02-12 04:05:18', '2017-02-12 11:05:53'),
(11, 1, '2017-02-12 06:23:33', '2017-02-12 13:29:27'),
(12, 1, '2017-02-12 06:30:57', '2017-02-12 13:31:08'),
(13, 3, '2017-02-12 06:31:17', '2017-02-12 13:31:24'),
(14, 1, '2017-02-12 06:33:19', '2017-02-12 21:43:22'),
(15, 1, '2017-02-12 13:18:10', '2017-02-12 21:43:22'),
(16, 1, '2017-02-12 14:43:18', '2017-02-12 21:43:22'),
(17, 1, '2017-02-12 14:44:05', '2017-02-12 21:46:17'),
(18, 1, '2017-02-12 14:54:20', '2017-02-13 02:06:42'),
(19, 1, '2017-02-12 19:23:51', '2017-02-13 04:12:50'),
(20, 3, '2017-02-12 21:13:12', '2017-02-13 04:23:12'),
(21, 1, '2017-02-12 22:29:08', '2017-02-13 05:59:38'),
(22, 4, '2017-02-12 23:35:27', '2017-02-13 09:10:16'),
(23, 1, '2017-02-13 02:10:45', '2017-02-13 17:48:41'),
(24, 1, '2017-02-13 10:48:51', '2017-02-14 06:35:38'),
(25, 1, '2017-02-13 13:48:19', '2017-02-14 06:35:38'),
(26, 1, '2017-02-13 22:40:56', '2017-02-14 06:35:38'),
(27, 1, '2017-02-13 23:35:47', '2017-02-14 07:01:48'),
(28, 1, '2017-02-14 00:04:12', '2017-02-14 07:08:47'),
(29, 3, '2017-02-14 00:09:29', '2017-02-14 07:44:30'),
(30, 4, '2017-02-14 00:43:46', '2017-02-14 07:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_librarian`
--
ALTER TABLE `log_librarian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log_librarian`
--
ALTER TABLE `log_librarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`librarian_id`) REFERENCES `librarian` (`id`);

--
-- Constraints for table `log_librarian`
--
ALTER TABLE `log_librarian`
  ADD CONSTRAINT `log_librarian_ibfk_1` FOREIGN KEY (`librarian_id`) REFERENCES `librarian` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
