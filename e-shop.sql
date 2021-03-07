-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 11:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `email` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`email`, `text`, `newsletter`) VALUES
('example@gmail.com', 'I want to ask something about polaroid cameras.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand` varchar(10) NOT NULL,
  `mp` float NOT NULL,
  `optical` float NOT NULL,
  `digital` float NOT NULL,
  `screen` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `mp`, `optical`, `digital`, `screen`, `color`, `price`, `image`) VALUES
('0', 'Canon Powershot SX530 HS', 'canon', 16, 50, 4, 3, 'black', 269, './images/camera.png'),
('1', 'Compact Nikon A1000', 'nikon', 16, 35, 4, 3, 'black', 299, './images/camera2.png'),
('2', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'white', 139, './images/camera9.png'),
('3', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'red', 139, './images/camera8.png'),
('4', 'Compact Nikon Coolpix W150', 'nikon', 14.17, 3, 6, 2.7, 'blue', 139, './images/camera5.png'),
('5', 'Compact Waterproof Leica X-U (Typ 113)', 'leica', 16.2, 0, 0, 3, 'black', 2725.5, './images/camera3.png'),
('6', 'Compact Camera Canon PowerShot G3X', 'canon', 20.2, 25, 0, 3, 'black', 749.5, './images/camera4.png'),
('7', 'Compact Nikon Coolpix A900', 'nikon', 20.3, 35, 4, 3, 'grey', 278.5, './images/camera7.png'),
('8', 'Compact Sony Cyber-shot DSC W800', 'sony', 20.1, 5, 10, 2.7, 'grey', 105, './images/camera6.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `psw` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `tel`, `addr`, `postcode`, `psw`) VALUES
('Fname', 'Lname', 'test@email.com', '2109898598', 'Test St. 68', '12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `whishlist`
--

CREATE TABLE `whishlist` (
  `email` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whishlist`
--

INSERT INTO `whishlist` (`email`, `id`) VALUES
('test@email.com', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`psw`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
