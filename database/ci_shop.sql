-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 12:46 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` double UNSIGNED NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(70) NOT NULL,
  `dob` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `gender`, `dob`, `updated_at`) VALUES
(24, 'Saniya ', 'Qurashi', 'saniya@gmail.com', 9814357425, '$2y$10$9Hplj1yDl5ZC3femipGsxuZ8KfEGJyme3qhUBZtU/aliKQ3Omjle6', 'female', '1998-02-05', '2019-06-18 11:33:45'),
(25, 'Shakil', 'Alam', 'shakil@gmail.com', 8802559102, '$2y$10$Ww.ca5CyHRqEjrs2u3Vf0.lAy/fiWUfJ8nSAgRV8ipygWeqQL/xZq', 'male', '1998-08-05', '2019-06-18 11:36:19'),
(26, 'Shakil', 'Alam', 'itxshakiil@gmail.com', 8802559102, '$2y$10$NmDhITY51Uys5Mh4WBAn5u8XdC58.ypCCNWi3bEBXC9/nQsOo.6Fa', 'male', '1998-04-10', '2019-07-10 11:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_FJsfRF0lLvmVdg', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:12:51'),
('cus_FJsjf6xXnDy1WC', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:16:27'),
('cus_FJsMfsE3CM5TM8', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 18:53:24'),
('cus_FJsOrg1vTZoJaM', 'Saniya', 'Qurashi', 'itxshakilalam@gmail.com', '2019-06-25 18:55:48'),
('cus_FJsp2rKpHgj4GH', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:22:40'),
('cus_FJsrXBKv4ulmUB', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:24:54'),
('cus_FJsupJYGFm5kLM', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:28:12'),
('cus_FJsV4TDiX3i17h', 'pooja', 'Jha', 'Itxnargiskhatun@gmail.com', '2019-06-25 19:02:33'),
('cus_FJt0PV8fycfGPW', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:33:20'),
('cus_FJtIMNeUzSrQQI', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 19:52:16'),
('cus_FJtRBNJIdmBZGB', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-25 20:00:23'),
('cus_FK9dKNwvZE7R8u', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-06-26 12:44:52'),
('cus_FMn5m9DuxRBf3g', 'Shakil', 'Alam', 'itxshakiil@gmail.com', '2019-07-03 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(20) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `signature_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `amount`, `currency`, `receipt`, `status`, `payment_id`, `attempts`, `signature_id`, `created_at`) VALUES
(4, 'order_CrXsEJn1Z3HCvN', 11, 5299900, '', '', 'created', 'pay_CrXtNsPiGpMudL', 0, NULL, '2019-07-09 11:13:32'),
(5, 'order_CrogfbUz1BNtYZ', 15, 5999900, 'INR', '3499', 'created', NULL, 0, NULL, '2019-07-10 03:40:23'),
(9, 'order_Croo7icixzJhIa', 4, 1000000, 'INR', '3499', 'created', NULL, 0, NULL, '2019-07-10 03:47:26'),
(10, 'order_Croq5mvwOOPbSg', 4, 1000000, 'INR', '3499', 'created', NULL, 0, NULL, '2019-07-10 03:49:18'),
(11, 'order_CroxvyDC8NCarz', 12, 9999900, 'INR', '3499', 'attempted', 'pay_Croye9PmPRc3f8', 0, NULL, '2019-07-10 03:56:44'),
(12, 'order_CrpbvCEIQBKHBP', 12, 9999900, 'INR', '3499', 'created', NULL, 0, NULL, '2019-07-10 04:34:35'),
(13, 'order_Crq3NtRebVtfpa', 15, 5999900, 'INR', '3499', 'paid', 'pay_Crq3nmi66Vo00e', 0, NULL, '2019-07-10 05:00:35'),
(14, 'order_D8YFhvR7H1H9Fd', 4, 1000000, 'INR', '3499', 'paid', 'pay_D8YGQav5irZrRF', 0, NULL, '2019-08-21 10:38:55'),
(15, 'order_D8YI8Fzz0vJyV6', 4, 1000000, 'INR', '3499', 'created', NULL, 0, NULL, '2019-08-21 10:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `method` varchar(255) NOT NULL,
  `captured` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `card_id` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` double NOT NULL,
  `shipping_address` text NOT NULL,
  `additional_notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `amount`, `currency`, `status`, `order_id`, `method`, `captured`, `description`, `card_id`, `email`, `contact`, `shipping_address`, `additional_notes`, `created_at`) VALUES
(1, 'pay_Crq3nmi66Vo00e', 5999900, 'INR', 'captured', 'order_Crq3NtRebVtfpa', 'card', 1, 'Acer 110-G Pro', 'card_Crq3nqt7VMX2mf', 'itxshakiil@gmail.com', 919818823829, 'M-94 Vedram colony gali no.08 Palla-1,Haryana-121003', NULL, '2019-07-10 05:01:56'),
(2, 'pay_D8YGQav5irZrRF', 1000000, 'INR', 'captured', 'order_D8YFhvR7H1H9Fd', 'card', 1, 'Lenovo Ideapad 110', 'card_D8YGQdTr1r8ubg', 'itxshakiil@gmail.com', 918802559102, 'M-94 Vedram colony gali no.08 Palla-1,Haryana-121003', NULL, '2019-08-21 10:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `img` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `img`, `created_at`) VALUES
(1, 'Acer 140-G', 77779, '<p>Updated Description</p>\r\n', NULL, '2019-06-18 12:52:44'),
(3, 'Apple macbook 3', 800000, 'A flagship laptop form Apple Inc.', NULL, '2019-06-18 13:23:15'),
(4, 'Lenovo Ideapad 110', 10000, 'A general purpose laptop', NULL, '2019-06-19 02:48:39'),
(6, 'Acer 140-G', 8500, 'A general purpose laptop', NULL, '2019-06-19 04:27:46'),
(8, 'GenPack', 82500, 'New', 'PicsArt_08-31-05.43.42.jpg', '2019-06-20 07:30:31'),
(10, 'Acer 110-G', 8500, 'Another Better', 'vlcsnap-2018-01-26-17h12m34s175-edited.jpg', '2019-06-21 15:12:21'),
(11, 'Asus i30', 52999, '<p><strong>World&#39;s First Dual Screen Laptop</strong></p>\r\n\r\n<p><em>Asus i30</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Screenshot (73).png', '2019-06-26 06:59:45'),
(12, 'Lenovo Ideapad 110 151BR Pro', 99999, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A powepack laptop for tech geeks&nbsp;</strong></h2>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lenovo brings a powerpack laptop that has&nbsp;<s>some</s> manything for all.</p>\r\n\r\n<ul>\r\n	<li>A AVD GTX R3000 GPU</li>\r\n	<li>Full HD+ 4K Screen</li>\r\n	<li>SSD <strong>v10</strong></li>\r\n	<li>Powered by super powerful i7 Intel Processor</li>\r\n	<li>8 GB RAM</li>\r\n	<li>1 TB SSD</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'Screenshot (72).png', '2019-06-27 15:06:16'),
(15, 'Acer 110-G Pro', 59999, '<p><strong>A brand new&nbsp; product form Acer</strong></p>\r\n\r\n<hr />\r\n<p>Some thin....</p>\r\n\r\n<p>....</p>\r\n\r\n<p>lorem ipsum dorem....</p>\r\n', 'Screenshot (74).png', '2019-07-03 08:13:08'),
(16, 'Apple macbook 3', 800000, 'A flagship laptop form Apple Inc.', NULL, '2019-06-18 13:23:15'),
(17, 'Lenovo Ideapad 110 151BR Pro', 99999, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A powepack laptop for tech geeks&nbsp;</strong></h2>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lenovo brings a powerpack laptop that has&nbsp;<s>some</s> manything for all.</p>\r\n\r\n<ul>\r\n	<li>A AVD GTX R3000 GPU</li>\r\n	<li>Full HD+ 4K Screen</li>\r\n	<li>SSD <strong>v10</strong></li>\r\n	<li>Powered by super powerful i7 Intel Processor</li>\r\n	<li>8 GB RAM</li>\r\n	<li>1 TB SSD</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'Screenshot (72).png', '2019-06-27 15:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `reset_links`
--

CREATE TABLE `reset_links` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_links`
--

INSERT INTO `reset_links` (`id`, `account_id`, `email`, `link`, `expired`) VALUES
(1, 23, 'itxshakiil@gmail.com', '<p>Your Reset Link is <a href=\"http://localhost/ci_shop/reset_password/d56a9cf0330ac40d65934de13923b91efe8105ba\">http://localhost/ci_shop/reset_password/d56a9cf0330ac40d65934de13923b91efe8105ba</a></p>', 1),
(2, 23, 'itxshakiil@gmail.com', '7b247258e45dba0094092984016b72ba3c3f9ff0', 0),
(3, 23, 'itxshakiil@gmail.com', '37be8b78f1d553c655306f70f58d159a24ee17bc', 1),
(4, 23, 'itxshakiil@gmail.com', '7cbea99ecbd25ad047d5e38fe6a25064511abb79', 1),
(5, 23, 'itxshakiil@gmail.com', '09e47da82748bbcd70581138a22a8006f8c18b9b', 1),
(6, 23, 'itxshakiil@gmail.com', '91b5048543f6f4e4afef16578e0a04e2739a73b4', 0),
(7, 23, 'itxshakiil@gmail.com', '28b144639fb4274c28637052582f319ce2021971', 0),
(8, 23, 'itxshakiil@gmail.com', '3313cdb992a8df824e0d7910f38124e5970e7c67', 0),
(9, 23, 'itxshakiil@gmail.com', 'de191c9ace14f073c696c66e4ef03f4e9dc7800b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1EpEdjALrMgpdVqODCLXPnek', 'cus_FJsOrg1vTZoJaM', 'Intro To React Course', '11999', 'usd', 'succeeded', '2019-06-25 18:55:48'),
('ch_1EpEkHALrMgpdVqOTFjaeuMn', 'cus_FJsV4TDiX3i17h', 'Intro To React Course', '10000', 'usd', 'succeeded', '2019-06-25 19:02:33'),
('ch_1EpEmCALrMgpdVqOUMbmguE1', 'cus_FJsXQUTvd4zSCS', 'Intro To React Course', '8500', 'usd', 'succeeded', '2019-06-25 19:04:32'),
('ch_1EpErGALrMgpdVqOhi1B7VsO', 'cus_FJscSsqAHyiy0E', 'Intro To React Course', '800000', 'usd', 'succeeded', '2019-06-25 19:09:47'),
('ch_1EpF96ALrMgpdVqOz7qjGiYE', 'cus_FJsupJYGFm5kLM', 'TEST', '850000', 'usd', 'succeeded', '2019-06-25 19:28:13'),
('ch_1EpFE4ALrMgpdVqOfmyIOETY', 'cus_FJt0PV8fycfGPW', 'Lenovo Ideapad 110 151BR', '1199900', 'usd', 'succeeded', '2019-06-25 19:33:20'),
('ch_1EpFeFALrMgpdVqOtqXdNIoD', 'cus_FJtRBNJIdmBZGB', 'Lenovo Ideapad 110 151BR', '1199900', 'usd', 'succeeded', '2019-06-25 20:00:23'),
('ch_1EpFWOALrMgpdVqOTRHITcwH', 'cus_FJtIMNeUzSrQQI', 'Acer 140-G', '850000', 'usd', 'succeeded', '2019-06-25 19:52:16'),
('ch_1EpVEHALrMgpdVqOrI2pI5ND', 'cus_FK9XdG8ooZ9bG7', 'Asus i30', '5299900', 'usd', 'succeeded', '2019-06-26 12:38:37'),
('ch_1EpVKKALrMgpdVqO2TVJKScZ', 'cus_FK9dKNwvZE7R8u', 'Asus i30', '5299900', 'usd', 'succeeded', '2019-06-26 12:44:52'),
('ch_1ErQbJALrMgpdVqOdK3tZ69E', 'cus_FM8t56hn9rfbOT', 'Lenovo Ideapad 110 151BR Pro', '8599900', 'usd', 'succeeded', '2019-07-01 20:06:21'),
('ch_1Es3V8ALrMgpdVqOtOE5kjD3', 'cus_FMn5m9DuxRBf3g', 'Lenovo Ideapad 110 151BR Pro', '8599900', 'usd', 'succeeded', '2019-07-03 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` double NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `gender`, `updated_at`) VALUES
(12, 'Shakil', 'Alam', 'itxshakiil@gmail.com', 8802559102, '$2y$10$uUO8nkW4sAiy/Suqjh6y8.8WkeTb7E2C320u18IbIH0rN04JW5kCO', 'male', '2019-06-19 13:08:12'),
(13, 'Pooja', 'Jha', 'poojajha@gmail.com', 9201548627, '$2y$10$xii4/ggiLwWHlLmI/HIEwOkislUrDCzy/t1uEuuT519xVbmpR2OaG', 'female', '2019-06-20 05:28:18'),
(15, 'Surbhi', 'Sharma', 'surbhi@gmail.com', 794958585, '$2y$10$neIKwOmWo/vh0tuOSpm7lORST68j1RLrSyyEoQ0do7EYeczMCVkYa', 'female', '2019-07-05 13:22:27'),
(16, 'Rahul', 'Kumar', 'rahul@gmail.com', 8802559102, '$2y$10$VY5KDlBRKL9AciuhanayzeqapZlnoeu.4xMwNjqw7rXpyDqQWsaVO', 'male', '2019-07-05 13:43:02'),
(17, 'Kirandeep', 'Kaur', 'kirandeep@gmail.com', 9894757485, '$2y$10$kLNmVqe5Bzxe47a5qdRipem0yIkkSV/jqs3x1PYhXMu5AwfzG3hl6', 'female', '2019-07-05 13:47:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`order_id`),
  ADD UNIQUE KEY `signature_id` (`signature_id`),
  ADD KEY `order_product_constraint` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`,`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_links`
--
ALTER TABLE `reset_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reset_links`
--
ALTER TABLE `reset_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_product_constraint` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
