-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 04:39 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `user_Name` varchar(50) NOT NULL,
  `user_Pass` varchar(255) NOT NULL,
  `user_Email` varchar(50) NOT NULL,
  `user_Fname` varchar(50) NOT NULL,
  `user_Lname` varchar(50) NOT NULL,
  `user_Img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `user_Name`, `user_Pass`, `user_Email`, `user_Fname`, `user_Lname`, `user_Img`) VALUES
(1, 'AHS12', '$2y$10$iusesomestupidestrin1uX3LW.qT6rtD6W//qz7yQH8xX1Twyek.', 'ahslucky12@gmail.com', 'Md Azizul', 'Hakim', 'profile.jpg'),
(5, 'shovon', '$2y$10$iusesomestupidestrin1uMjTlwQ7RzMWVZPEqX/ZnIiAhryj0Wq6', 'test@gmail.com', 'test', 'user', 'sticker_bug_digital.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
