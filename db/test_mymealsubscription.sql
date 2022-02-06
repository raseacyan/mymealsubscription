-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 09:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_mymealsubscription`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_on`) VALUES
(1, 'Meat', '2022-02-05 08:16:21'),
(2, 'Vegetable', '2022-02-05 08:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `township_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `password`, `address`, `township_id`, `created_on`) VALUES
(1, 'Effy', '12345678', 'cc03e747a6afbbcbf8be7668acfebee5', 'Riverview Condo', 2, '2022-02-05 08:20:05'),
(2, 'Emily', '22222222', 'cc03e747a6afbbcbf8be7668acfebee5', '10 Bank St', 1, '2022-02-05 10:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `category_id`, `created_on`) VALUES
(1, 'Chicken Curry', 1, '2022-02-05 08:16:37'),
(2, 'Beef Steak', 1, '2022-02-05 08:16:45'),
(3, 'Pork Chop', 1, '2022-02-05 08:16:53'),
(4, 'Mashed Potato', 2, '2022-02-05 08:17:10'),
(5, 'Baked Carrots', 2, '2022-02-05 08:17:53'),
(6, 'Steamed Cauliflower', 2, '2022-02-05 08:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `meal_options`
--

CREATE TABLE `meal_options` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `meat_1` varchar(32) NOT NULL,
  `vege_1` varchar(32) NOT NULL,
  `meat_2` varchar(32) NOT NULL,
  `vege_2` varchar(32) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_options`
--

INSERT INTO `meal_options` (`id`, `date`, `meat_1`, `vege_1`, `meat_2`, `vege_2`, `subscription_id`, `customer_id`, `created_on`) VALUES
(2, '2022-02-07', 'Chicken Curry', 'Mashed Potato', 'Beef Steak', 'Baked Carrots', 1, 1, '2022-02-05 10:42:16'),
(3, '2022-02-08', 'Pork Chop', 'Mashed Potato', 'Beef Steak', 'Steamed Cauliflower', 1, 1, '2022-02-05 10:48:40'),
(4, '2022-02-09', 'any', 'any', 'any', 'any', 1, 1, '2022-02-05 10:48:53'),
(5, '2022-02-07', 'Chicken Curry', 'Mashed Potato', '', '', 2, 2, '2022-02-05 11:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `meal_number` int(11) NOT NULL,
  `add_rice` varchar(4) NOT NULL,
  `note` text NOT NULL,
  `subscription_total` decimal(10,2) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `start_date`, `end_date`, `meal_number`, `add_rice`, `note`, `subscription_total`, `customer_id`) VALUES
(1, '2022-02-07', '2022-03-09', 2, 'yes', 'no pork', '164000.00', 1),
(2, '2022-02-06', '2022-03-08', 1, 'yes', '', '82000.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `created_on`) VALUES
(1, 'Yankin', '2022-02-05 08:15:45'),
(2, 'Kamayut', '2022-02-05 08:15:55'),
(3, 'Ahlone', '2022-02-05 08:16:01'),
(4, 'Sanchaung', '2022-02-05 08:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_options`
--
ALTER TABLE `meal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meal_options`
--
ALTER TABLE `meal_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
