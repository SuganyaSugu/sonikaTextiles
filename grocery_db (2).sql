-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 04:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `is_admin` int(2) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `fullname`, `username`, `password`, `is_admin`, `status`, `date_created`) VALUES
(1, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2024-04-13 23:57:14'),
(2, 'User', 'user', '0192023a7bbd73250516f069df18b500', 0, 1, '2024-04-13 23:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

CREATE TABLE `cart_list` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `category_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `customer_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1->active 2->inactive',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`customer_id`, `fullname`, `username`, `password`, `email`, `contact`, `address`, `status`, `date_created`, `date_updated`) VALUES
(25, '', 'customer', 'Test@123', 'testuser@gmail.com', '', '', 1, '2024-04-14 15:52:08', '2024-04-14 15:52:08'),
(26, 'Hello', 'admin1', 'admin123', 'email@gmail.com', '9879999879', '', 1, '2024-04-14 16:02:41', '2024-04-14 16:02:41'),
(27, 'பதிவு எதுவும் கிடைக்கவில்லை', 'பதிவு எதுவும் ', 'பதிவு எதுவும் கி', 'பதிவு கிடைக்கவில்லை', 'எதுவும் கிடைக்கவில்லை', '', 1, '2024-04-14 16:04:48', '2024-04-14 16:04:48');

--
-- Triggers `customer_list`
--
DELIMITER $$
CREATE TRIGGER `updatedTime_cust` AFTER UPDATE ON `customer_list` FOR EACH ROW BEGIN
        UPDATE `customer_list` SET date_updated = CURRENT_TIMESTAMP WHERE customer_id = NEW.customer_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fees_list`
--

CREATE TABLE `fees_list` (
  `fee_id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_list`
--

CREATE TABLE `inventory_list` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_code` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `delivery_address` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fees_list`
--
ALTER TABLE `fees_list`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `inventory_list`
--
ALTER TABLE `inventory_list`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fee_id` (`fee_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fees_list`
--
ALTER TABLE `fees_list`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_list`
--
ALTER TABLE `inventory_list`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `cart_list_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_list` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_list`
--
ALTER TABLE `inventory_list`
  ADD CONSTRAINT `inventory_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_list` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `inventory_list` (`inventory_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`fee_id`) REFERENCES `fees_list` (`fee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_list` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
