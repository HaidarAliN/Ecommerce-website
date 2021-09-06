-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 06:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `shop_id`, `price`, `image_path`, `category`, `description`) VALUES
(27, 'rose1', 2, 11, 5, 'images/flower.jpg', 'flowers', 'qwe qe qwe'),
(29, 'rose2', 5, 11, 5, 'images/flower2.jpg', 'flowers', 'fd asd a'),
(30, 'laptop', 6, 12, 5, 'images/speech.jpeg', 'electronics', 'ewq eqwe qwe'),
(31, 'lenovo laptop', 2, 12, 5, 'images/speech.jpeg', 'electronics', 'verry good'),
(33, 'toshiba', 16, 12, 5, 'images/speech.jpeg', 'electronics', '2020 edition'),
(35, 'la rose', 12, 13, 5, 'images/flower.jpg', 'flowers', 'new newn ew'),
(36, 'la rose 2', 6, 13, 5, 'images/flower2.jpg', 'flowers', 'new new'),
(38, 'rose3', 12, 11, 5, 'images/flower2.jpg', 'flowers', 'New to stock'),
(39, 'photo1', 4, 16, 5, 'images/team_02.jpg', 'Photography', 'My first photo'),
(40, 'photo2', 10, 16, 5, 'images/team_05.jpg', 'Photography', 'My second photo'),
(41, 'photo3', 6, 16, 5, 'images/team_06.jpg', 'Photography', 'My third photo'),
(42, 'photo4', 7, 16, 5, 'images/team_01.jpg', 'Photography', 'My fourth photo'),
(43, 'Imac', 3, 14, 5, 'images/speech.jpeg', 'electronics', '2019 edition');

-- --------------------------------------------------------

--
-- Table structure for table `items_in_receipt`
--

CREATE TABLE `items_in_receipt` (
  `receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_in_receipt`
--

INSERT INTO `items_in_receipt` (`receipt_id`, `item_id`) VALUES
(0, 27),
(0, 29),
(2, 27),
(2, 30),
(3, 30),
(4, 27),
(5, 29),
(5, 29),
(6, 29),
(6, 29),
(7, 30),
(8, 27),
(8, 30),
(8, 27),
(9, 27),
(9, 33),
(10, 31),
(10, 27),
(11, 27),
(11, 29),
(12, 29),
(13, 27);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `user_id`, `status`) VALUES
(1, 17, 1),
(2, 17, 1),
(3, 17, 1),
(4, 17, 1),
(5, 17, 1),
(6, 17, 1),
(7, 17, 1),
(8, 17, 1),
(9, 17, 1),
(10, 17, 1),
(11, 17, 1),
(12, 17, 1),
(13, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `category`, `image_path`) VALUES
(11, 16, 'Rose', 'flowers', 'images/flower.jpg'),
(12, 18, 'High speed', 'electronics', 'images/speech.jpeg'),
(13, 19, 'eat vit', 'food', 'images/food.jpg'),
(14, 20, 'Ishop', 'electronics', 'images/speech.jpeg'),
(16, 23, 'Photo Artist', 'Photography', 'images/team_04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `address`) VALUES
(16, 'Haidar Ali', 'Nehme', 'sizito97germany@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 1, 'nabaiteh'),
(17, 'mhmd', 'nehme', 'sizito_germany@hotmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 0, 'nabaiteh'),
(18, 'ro2a', 'makke', 'shopowner2@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 1, 'nabaiteh'),
(19, 'Charbel', 'Nehme', 'shopowner3@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 1, 'nabaiteh'),
(20, 'zainab', 'darwish', 'shopowner4@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 1, 'nabaiteh'),
(21, 'Charbel', 'makke', 'customer1@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 0, 'nabaiteh'),
(23, 'hassan', 'nehme', 'shopowner5@gmail.com', '3cc849279ba298b587a34cabaeffc5ecb3a044bbf97c516fab7ede9d1af77cfa', 1, 'nabaiteh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
