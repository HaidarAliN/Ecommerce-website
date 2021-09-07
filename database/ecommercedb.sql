-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 09:51 PM
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
  `description` varchar(10000) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `shop_id`, `price`, `image_path`, `category`, `description`, `active`) VALUES
(27, 'rose1', 2, 11, 5, 'images/flower.jpg', 'flowers', 'qwe qe qwe', 1),
(29, 'rose2', 4, 11, 5, 'images/flower2.jpg', 'flowers', 'fd asd a', 1),
(30, 'laptop', 2, 12, 5, 'images/speech.jpeg', 'electronics', 'ewq eqwe qwe', 1),
(31, 'lenovo laptop', 3, 12, 5, 'images/speech.jpeg', 'electronics', 'verry good', 1),
(33, 'toshiba', 31, 12, 5, 'images/speech.jpeg', 'electronics', '2020 edition', 1),
(35, 'la rose', 12, 13, 5, 'images/flower.jpg', 'flowers', 'new newn ew', 1),
(36, 'la rose 2', 6, 13, 5, 'images/flower2.jpg', 'flowers', 'new new', 1),
(38, 'rose3', 12, 11, 5, 'images/flower2.jpg', 'flowers', 'New to stock', 1),
(39, 'photo1', 4, 16, 5, 'images/team_02.jpg', 'Photography', 'My first photo', 1),
(40, 'photo2', 10, 16, 5, 'images/team_05.jpg', 'Photography', 'My second photo', 1),
(41, 'photo3', 6, 16, 5, 'images/team_06.jpg', 'Photography', 'My third photo', 1),
(42, 'photo4', 7, 16, 5, 'images/team_01.jpg', 'Photography', 'My fourth photo', 1),
(43, 'Imac', 3, 14, 5, 'images/speech.jpeg', 'electronics', '2019 edition', 1),
(44, 'rose4', 2, 11, 5, 'images/flower2.jpg', 'flowers', 'new flower to the shop', 0);

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
(13, 27),
(14, 27),
(14, 29),
(15, 27),
(16, 27),
(17, 27),
(18, 27),
(18, 27),
(19, 27),
(20, 27),
(20, 30),
(21, 27),
(21, 27);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `user_id`, `status`, `date`) VALUES
(1, 17, 1, '2021-01-09'),
(2, 17, 1, '2021-01-09'),
(3, 17, 1, '2021-01-09'),
(4, 17, 1, '2021-01-09'),
(5, 17, 1, '2021-05-09'),
(6, 17, 1, '2021-06-09'),
(7, 17, 1, '2021-07-09'),
(8, 17, 1, '2021-08-09'),
(9, 17, 1, '2021-02-09'),
(10, 17, 1, '2021-08-09'),
(11, 17, 1, '2021-04-09'),
(12, 17, 1, '2021-05-09'),
(13, 17, 1, '2021-03-09'),
(14, 17, 1, '2021-03-09'),
(15, 17, 1, '2021-03-09'),
(16, 17, 1, '2021-02-09'),
(17, 17, 1, '2021-10-09'),
(18, 17, 1, '2021-11-09'),
(19, 17, 1, '2021-11-09'),
(20, 17, 1, '2021-01-23'),
(21, 17, 1, '2021-09-07');

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

-- --------------------------------------------------------

--
-- Table structure for table `users_liked_items`
--

CREATE TABLE `users_liked_items` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_liked_items`
--

INSERT INTO `users_liked_items` (`user_id`, `item_id`) VALUES
(17, 29),
(17, 38),
(21, 27),
(21, 30),
(17, 31),
(17, 33),
(17, 30);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
