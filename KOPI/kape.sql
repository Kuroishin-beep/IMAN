-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 04:42 AM
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
-- Database: `kape`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenum` varchar(15) NOT NULL,
  `totalprice` decimal(8,2) NOT NULL,
  `ref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `phonenum`, `totalprice`, `ref_id`) VALUES
(1, ' uy', 'uyy', '09123456789', 120.00, 1),
(2, 'Jelsie Hazel', 'Dayrit', '09134567890', 160.50, 2),
(3, 'Eisha Janel', 'Alva', '09145678901', 145.25, 3),
(4, 'Eya Isabel', 'Yalung', '09156789012', 155.00, 4),
(5, 'Julia Adrianna', 'Abasolo', '09167890123', 170.25, 5),
(6, 'Angelica Mae', 'Tadique', '09178901234', 148.90, 6),
(7, 'Merick Joshua', 'Mallari', '09189012345', 162.75, 7),
(8, 'Francis Joshua', 'Perez', '09190123456', 157.30, 8),
(9, 'Aaron Matthew', 'Francisco', '09201234567', 140.00, 9),
(10, 'Ellaine', 'Gonzales', '09212345678', 165.50, 10),
(11, 'Kiara Mariz', 'Laxamana', '09223456789', 155.75, 11),
(12, 'Jazz', 'Alvarez', '09234567890', 163.20, 12),
(13, 'Joaquin', 'Galang', '09245678901', 158.90, 13),
(14, 'Jade', 'Fajardo', '09256789012', 170.00, 14),
(15, 'Stanley Emer', 'Predella', '09267890123', 145.50, 15),
(16, 'Christle Mae', 'Vizcayno', '09278901234', 150.00, 16),
(17, 'Jedivon', 'Tumali', '09289012345', 175.25, 17),
(18, 'Monei', 'Flores', '09290123456', 162.00, 18),
(19, 'Justin', 'Roy', '09301234567', 167.75, 19),
(20, 'Acelin Joy', 'Galang', '09312345678', 155.50, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `item_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_detail_id`, `order_id`, `product_id`, `item_price`) VALUES
(1, 1, 1, 120.00),
(2, 1, 2, 100.00),
(3, 2, 3, 140.00),
(4, 3, 4, 180.00),
(5, 3, 5, 130.00),
(6, 4, 6, 200.00),
(7, 5, 7, 150.00),
(8, 5, 8, 90.00),
(9, 6, 9, 170.00),
(10, 7, 10, 160.00),
(11, 7, 11, 140.00),
(12, 8, 12, 180.00),
(13, 9, 13, 190.00),
(14, 9, 1, 150.00),
(15, 10, 2, 200.00),
(16, 11, 3, 170.00),
(17, 11, 4, 160.00),
(18, 12, 5, 130.00),
(19, 13, 6, 120.00),
(20, 13, 7, 140.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`) VALUES
(1, 5, '2024-01-05'),
(2, 8, '2024-01-10'),
(3, 3, '2024-01-15'),
(4, 10, '2024-01-20'),
(5, 2, '2024-01-25'),
(6, 6, '2024-02-01'),
(7, 1, '2024-02-05'),
(8, 4, '2024-02-10'),
(9, 9, '2024-02-15'),
(10, 7, '2024-02-20'),
(11, 11, '2024-03-01'),
(12, 13, '2024-03-05'),
(13, 15, '2024-03-10'),
(14, 17, '2024-03-15'),
(15, 19, '2024-03-20'),
(16, 20, '2024-03-25'),
(17, 3, '2024-04-01'),
(18, 5, '2024-04-05'),
(19, 6, '2024-04-10'),
(20, 9, '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `inventory_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `cost`, `category`, `inventory_count`) VALUES
(1, 'Cappuccino', 120.00, 50.40, 'Coffee', 100),
(2, 'Macchiato', 110.00, 50.00, 'Coffee', 100),
(3, 'Latte', 130.00, 50.40, 'Coffee', 100),
(4, 'Flat White', 140.00, 50.40, 'Coffee', 100),
(5, 'Mocha', 150.00, 51.90, 'Coffee', 100),
(6, 'Affogato', 160.00, 100.00, 'Coffee', 100),
(7, 'Americano', 110.00, 50.00, 'Coffee', 100),
(8, 'Spanish Latte', 160.00, 50.50, 'Coffee', 100),
(9, 'Sea Salt Latte', 170.00, 51.50, 'Coffee', 100),
(10, 'Caramel Macchiato', 160.00, 51.90, 'Coffee', 100),
(11, 'Espresso', 100.00, 50.00, 'Coffee', 100),
(12, 'Cold Brew', 140.00, 2.00, 'Coffee', 100),
(13, 'Irish Coffee', 180.00, 21.00, 'Coffee', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `total_payment` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `total_payment`) VALUES
(10023, 'Brew Brothers Coffee Co.', 2515.00),
(10024, 'Smucker\'s', 1131.40),
(10025, 'Arctic Treats Inc.', 1253.70),
(10026, 'La Lechera', 817.40),
(10027, 'FlavorFusion Inc.', 2704.90),
(10028, 'Bushmills', 1601.52);

-- --------------------------------------------------------

--
-- Table structure for table `supplierdetails`
--

CREATE TABLE `supplierdetails` (
  `supplier_detail_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplierdetails`
--

INSERT INTO `supplierdetails` (`supplier_detail_id`, `supplier_id`, `transaction_id`, `transaction_date`, `amount`) VALUES
(1, 10023, 765432, '2024-04-16', 20.00),
(2, 10023, 234567, '2024-04-16', 20.00),
(3, 10024, 890123, '2024-04-16', 5.00),
(4, 10024, 456789, '2024-04-16', 5.00),
(5, 10025, 321098, '2024-04-16', 5.00),
(6, 10026, 987654, '2024-04-16', 20.00),
(7, 10027, 543210, '2024-04-16', 20.00),
(8, 10027, 678901, '2024-04-16', 10.00),
(9, 10028, 109876, '2024-04-16', 2.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `ref_id` (`ref_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplierdetails`
--
ALTER TABLE `supplierdetails`
  ADD PRIMARY KEY (`supplier_detail_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `supplierdetails`
--
ALTER TABLE `supplierdetails`
  ADD CONSTRAINT `supplierdetails_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
