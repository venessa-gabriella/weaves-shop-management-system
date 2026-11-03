-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2026 at 02:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weaves_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `price`, `stock_quantity`, `description`, `created_at`) VALUES
(1, 'Boho Knotless', 'Braids', 1800.00, 12, 'Beautiful knotless braids', '2026-11-03 12:00:37'),
(2, 'Brazilian Weave', 'Human Hair', 3500.00, 8, 'Premium Brazilian hair', '2026-11-03 12:00:37'),
(3, 'Passion Twist', 'Twists', 2200.00, 15, 'Soft passion twist hair', '2026-11-03 12:00:37'),
(4, 'Darling Yaki', 'Synthetic Hair', 450.00, 20, 'Synthetic hair', '2026-11-03 12:00:37'),
(5, 'brazilian body wave', 'Human Hair', 50000.00, 3, 'black in color', '2026-11-03 12:38:12'),
(6, 'malaysian curly', 'Wigs', 17000.00, 6, 'ginger color', '2026-11-03 12:39:15'),
(7, 'yaki straight', 'Human Hair', 65000.00, 4, 'black with brown edge', '2026-11-03 12:40:21'),
(8, 'Afro kinky', 'Braids', 2000.00, 6, 'color 27', '2026-11-03 12:41:41'),
(9, 'jerry curl', 'Synthetic Hair', 8500.00, 7, 'black in color', '2026-11-03 12:42:37'),
(10, 'Italian curl', 'Synthetic Hair', 3000.00, 10, 'black in color', '2026-11-03 12:44:22'),
(11, 'pixie cut', 'Braids', 1000.00, 15, 'marron color', '2026-11-03 12:45:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
