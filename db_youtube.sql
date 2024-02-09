-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 03:04 PM
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
-- Database: `db_youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE `tb_content` (
  `c_id` int(9) NOT NULL,
  `c_video` varchar(255) NOT NULL,
  `c_title` varchar(255) NOT NULL,
  `c_disc` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `c_channel` varchar(255) NOT NULL,
  `c_likes` int(9) NOT NULL,
  `c_flag` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`c_id`, `c_video`, `c_title`, `c_disc`, `c_date`, `c_channel`, `c_likes`, `c_flag`) VALUES
(30, '1686296567file_example_MP4_480_1_5MG.mp4', 'Earth Revolving', 'took from samsung galaxy s21', '2023-06-09', 'KILLERYT', 1, 0),
(31, '1686296901sample_640x360.mp4', 'Beautiful beach', 'candid video', '2023-06-09', '4k videos', 0, 0),
(32, '1686297121VID-20230529-WA0010.mp4', 'CSK vs gt final match ', 'Ipl 2023 final match ', '2023-06-09', 'Niraj Racharla', 0, 0),
(35, '1686316946VID-20230604-WA0015.mp4', 'Crickdjsjd', 'Hshs', '2023-06-09', 'Niraj Racharla', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_likes`
--

CREATE TABLE `tb_likes` (
  `l_id` int(9) NOT NULL,
  `l_postid` int(9) NOT NULL,
  `l_userid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `r_id` int(9) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_mail` varchar(255) NOT NULL,
  `r_mobile` bigint(15) NOT NULL,
  `r_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_register`
--

INSERT INTO `tb_register` (`r_id`, `r_name`, `r_mail`, `r_mobile`, `r_password`) VALUES
(22, 'KILLERYT', 'killeryt@gmail.com', 898788988, '$2y$10$ggbk1Jj0TvSrp2HzLFxDbOL5ot40r7S0ixnUbcNZq23OkwaA2jsZC'),
(23, '4k videos', '4k@gmail.com', 748978347, '$2y$10$oy.yIHQWXN37SSALylssOue6wW8FCK442tun2L1k6jBhFIWa.mrkW'),
(24, 'Niraj Racharla', 'niraj@gmail.com', 7057110064, '$2y$10$BUghhT51z21IQ4PZjGNkMeP6XHxWtKVpkNWnrHSHcL0qHdtODNUi2'),
(28, 'Kaveri', 'kaveri@gmail.com', 7654321908, '$2y$10$U5hNJZ64CQguo5Ox0dIot.eGkeqCzYyzrIFZA.GCYp25z2Rhg6BZe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `c_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `l_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `r_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
