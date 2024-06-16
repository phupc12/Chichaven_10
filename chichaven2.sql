-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 06:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chichaven2`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` datetime NOT NULL,
  `trangthai` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(16, 'Giường'),
(17, 'Ghế Sofa'),
(18, 'fullcombo');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `iddm` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `iddm`, `name`, `mota`, `price`, `luotxem`, `img`) VALUES
(35, 16, 'Giường Ngủ Gỗ Tràm MOHO VLINE 601 Nhiều Kích Thước', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 4990.000, NULL, 'Giuonggo.jpg'),
(36, 17, 'Ghế Sofa Gỗ Tràm Tự Nhiên MOHO VLINE 601', 'Kích thước: Dài: 180cm x Rộng 85cm x Cao 69cm\r\n\r\nChất liệu:\r\n\r\n- Thân ghế: Gỗ tràm tự nhiên\r\n\r\n- Chân ghế: Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp kháng khuẩn, chống nhăn, kháng bụi bẩn và nấm mốc', 8190.000, NULL, 'ghesofa.webp'),
(37, 17, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO HOBRO 601', 'Kích thước: Dài 220cm x Rộng 99 cm x Cao 85cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên \r\n\r\n- Vải bọc sợi tổng hợp có khả năng chống thấm nước và dầu ', 12590.000, NULL, 'ghesofacaosu.jpg'),
(38, 17, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO FYN 901', 'Kích thước: Dài 206cm x Rộng 81,5cm x Cao 79cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên \r\n\r\n- Vải bọc sợi tổng hợp có khả năng chống thấm nước và dầu \r\n\r\n- Tấm phản: Gỗ công nghiệp Plywood chuẩn CARB-P2 (*) ', 10990.000, NULL, 'pro_mau_tu_nhien_noi_that_moho_ghe_sofa_fyn_901_2_6db9b36362284eeb9c94a841747295f9_master.jpg'),
(39, 18, 'Full Combo Phòng Ngủ MOHO KOSTER Màu Nâu', 'Full Combo 1 gồm: 1 giường ngủ 1m6, 1 set tủ quần áo 3 cánh 1m8\r\n\r\nFull Combo 2 gồm: 1 giường ngủ 1m6, 1 tủ đầu giường, 1 set tủ quần áo 3 cánh 1m8\r\n\r\nKích thước:\r\n\r\n1 Giường Ngủ (MFBNCDD01.B16): W1636 X D2154 X H800 (phù hợp với nệm 1m6)\r\n\r\n1 Tủ Đầu Giường (MFBSCDD02.B05): W500 X D400 X H500\r\n\r\n1 Set Tủ Quần Áo 3 Cánh: W1800 X D600 X H2000\r\n\r\nChất liệu chính: Gỗ cao su và gỗ MFC/ MDF chuẩn CARB P2 (*)', 15060.000, NULL, 'fullcombo.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(500) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `email`, `pass`, `phone`, `address`, `rol`) VALUES
(89, 'johan12', 'http://localhost/Marketween/Upload/User/1.jpg', 'johan12@gmail.com', '$2y$10$j9IQkvtTqd.GN7KWDL9XVumcKfTZQdsjhDRd.4yZsTweIbNCAxEZG', '0816169506', '', 'admin'),
(90, 'johan13', 'http://localhost/Marketween/Upload/User/6.jpg', 'johan13@gmail.com', '$2y$10$7ndB4rdZMz/U8wGzX.CGWuP5NlrCpLejLn1VJtlQDcysfp7psrvWm', '0372654272', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`iduser`),
  ADD KEY `id_sp` (`idpro`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`iddm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
