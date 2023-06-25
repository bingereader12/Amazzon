-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 01:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pid` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pid`, `store_id`, `pname`, `price`, `quantity`, `uid`) VALUES
(2, 3, 'Chair 2', '2000', 16, 1),
(5, 3, 'Chair 5', '1500', 5, 1),
(1, 3, 'Chair', '1000', 4, 1),
(4, 3, 'Chair 4', '500', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `descri` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `store_id`, `pname`, `price`, `descri`, `image`) VALUES
(1, 3, 'Chair', '1000', 'good chair', 'IMG-6497e9a6174fb5.28755490.jpg'),
(2, 3, 'Chair 2', '2000', 'ickjsbv.jsdb/j', 'IMG-6497ed71cd25c6.47466103.jpg'),
(3, 3, 'Chair 3', '2000', 'sdfghjkl;kjhgvcxbnlkjuhylkjhg', 'IMG-6497ed846c7278.62100525.jpg'),
(4, 3, 'Chair 4', '500', 'jfbwrjkbsjkbv.skj', 'IMG-6497ed98f1bb62.14739752.jpg'),
(5, 3, 'Chair 5', '1500', 'amazing chair', 'IMG-6497edaf7bef34.40434601.jpg'),
(6, 3, 'Chair 6', '4500', 'Simplicity at its best.', 'IMG-6497edce9aaa36.66303829.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `sphone` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `seller_id`, `sname`, `semail`, `sphone`, `description`) VALUES
(2, 0, 'Mahakali', 'bloh@gmail.com', '1234567890', 'It is general stores that provides all basic goods.'),
(3, 2, 'my-portfolio-builder', 'devesh.j@somaiya.edu', '1234567890', 'hgdxtyjxcfkycghchgkytdcfxfhjmxyt'),
(4, 2, 'Mahakali', 'bhagatkardhruv2003@gmail.com', '1234567890', 'best gs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `password`, `email`, `role`, `create_at`) VALUES
(1, 'Devesh Jain', '$2y$10$.j/8GuO0OIbztyyy8o40vunM4rZaZ6LfBYp.dAPpQ69m1zmUjuU4W', 'devesh.jain@somaiya.edu', 'user', '2023-06-25 05:27:05'),
(2, 'Lake', '$2y$10$uB6UH5X3aYCMxnULOm3J6.qQiuxKl7MLqqwNHhWieBfDNyQMMPwyO', 'jain47031@gmail.com', 'selles', '2023-06-25 06:31:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
