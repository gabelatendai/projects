-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 08:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `email`) VALUES
(1, '$2y$10$3972sb.gczc.KG75IsvAqeE3KC8h6S1Z3cuCwbwQVHUlr3vMONBoi', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `checkin` varchar(40) NOT NULL,
  `checkout` varchar(40) NOT NULL,
  `guest` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `destination`, `checkin`, `checkout`, `guest`, `status`, `category`, `type`, `email`, `phonenumber`) VALUES
(1, 'Dubai', '7/28/2021', '9/30/2021', 0, 1, 'economy', 'car', 'gabrielmusodza@gmail.com', '0772629299'),
(2, 'Dubai', '8/3/2021', '8/28/2021', 4, 1, 'economy', 'flight', 'gabrielmusodza@gmail.com', '0772629299'),
(3, 'Dubai', '7/27/2021', '8/3/2021', 3, 1, 'Economy', 'flight', 'admin@admin.com', '0783693297'),
(4, '', '7/21/2021', '7/27/2021', 4, 1, 'Luxury', 'hotel', 'gabrielmusodza@gmail.com', '0775348561');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `checkin` varchar(40) NOT NULL,
  `checkout` varchar(40) NOT NULL,
  `guest` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `destination`, `checkin`, `checkout`, `guest`, `status`, `departure`, `email`, `phonenumber`) VALUES
(7, 'Masvingo', '7/27/2021', '8/5/2021', 0, 0, 'Harare', 'tm@gmail.com', '0772629299');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `departure` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `destination`, `departure`, `price`, `status`, `date`) VALUES
(4, 'London', 'Addis Ababa', '300', 1, '20 Jul 2021'),
(5, 'London', 'Capetown', '400', 1, '20 Jul 2021'),
(6, 'Dubai', 'Harare', '500', 1, '20 Jul 2021');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(250) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `checkin` varchar(40) NOT NULL,
  `checkout` varchar(40) NOT NULL,
  `guest` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `destination`, `checkin`, `checkout`, `guest`, `status`, `category`, `departure`, `email`, `phonenumber`) VALUES
(7, 'Dubai', '7/28/2021', '8/5/2021', 3, 1, 'Luxury', 'Harare', 'tasigudu@gmail.com', '0783693297'),
(8, 'Dubai', '7/21/2021', '8/7/2021', 3, 1, 'Luxury', 'Harare', 'tm@gmail.com', '0775348561');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `checkin` varchar(40) NOT NULL,
  `checkout` varchar(40) NOT NULL,
  `guest` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `destination`, `checkin`, `checkout`, `guest`, `status`, `category`, `type`, `email`, `phonenumber`) VALUES
(5, 'Harare', '8/3/2021', '9/4/2021', 3, 1, '4', '', 'gabrielmusodza@gmail.com', '+971 504607199');

-- --------------------------------------------------------

--
-- Table structure for table `stripecharges`
--

CREATE TABLE `stripecharges` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` int(11) UNSIGNED DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripecharges`
--

INSERT INTO `stripecharges` (`id`, `amount`, `class`, `date`) VALUES
(1, 40, 'Class 2', '2019-12-04'),
(2, 41, 'Class 4', '2019-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(100) NOT NULL,
  `Pwd` varchar(100) NOT NULL,
  `Typeofuser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Pwd`, `Typeofuser`) VALUES
('admin', 'admin', 'Admin'),
('neeru', 'neeru', 'General'),
('manu', '12345', 'Admin'),
('preet', 'preet', 'General');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripecharges`
--
ALTER TABLE `stripecharges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stripecharges`
--
ALTER TABLE `stripecharges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
