-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2024 lúc 07:19 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chichaven4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
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
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(16, 'Giường'),
(17, 'Ghế Sofa'),
(18, 'fullcombo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL,
  `token_order` varchar(10) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`order_detail_id`, `token_order`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 'gpPMicK1bQ', 39, 3564, 15060000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `token_order` varchar(10) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` bigint(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1' COMMENT '1: hiện, 2: ẩn (đã xóa)',
  `name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`token_order`, `customer_id`, `order_date`, `total_amount`, `status`, `name`, `address`, `email`, `phone`) VALUES
('gpPMicK1bQ', 91, '2024-06-12 22:11:28', 53673840000, '2', 'Nguyễn Hoàng Lê Hiếu', '102 Phan Đình Phùng, Phườn Bến Nghé, Quận 1, TP Hồ Chí Minh', 'nguyenhieu3105@gmail.com', '0999999999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `iddm` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `iddm`, `name`, `mota`, `price`, `luotxem`, `img`) VALUES
(35, 16, 'Giường Ngủ Gỗ Tràm MOHO VLINE 601 Nhiều Kích Thước', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 4990000, NULL, 'Giuonggo.jpg'),
(36, 17, 'Ghế Sofa Gỗ Tràm Tự Nhiên MOHO VLINE 601', 'Kích thước: Dài: 180cm x Rộng 85cm x Cao 69cm\r\n\r\nChất liệu:\r\n\r\n- Thân ghế: Gỗ tràm tự nhiên\r\n\r\n- Chân ghế: Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp kháng khuẩn, chống nhăn, kháng bụi bẩn và nấm mốc', 8190000, NULL, 'ghesofa.webp'),
(37, 17, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO HOBRO 601', 'Kích thước: Dài 220cm x Rộng 99 cm x Cao 85cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên \r\n\r\n- Vải bọc sợi tổng hợp có khả năng chống thấm nước và dầu ', 12590000, NULL, 'ghesofacaosu.jpg'),
(38, 17, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO FYN 901', 'Kích thước: Dài 206cm x Rộng 81,5cm x Cao 79cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên \r\n\r\n- Vải bọc sợi tổng hợp có khả năng chống thấm nước và dầu \r\n\r\n- Tấm phản: Gỗ công nghiệp Plywood chuẩn CARB-P2 (*) ', 1099000, NULL, 'pro_mau_tu_nhien_noi_that_moho_ghe_sofa_fyn_901_2_6db9b36362284eeb9c94a841747295f9_master.jpg'),
(39, 18, 'Full Combo Phòng Ngủ MOHO KOSTER Màu Nâu', 'Full Combo 1 gồm: 1 giường ngủ 1m6, 1 set tủ quần áo 3 cánh 1m8\r\n\r\nFull Combo 2 gồm: 1 giường ngủ 1m6, 1 tủ đầu giường, 1 set tủ quần áo 3 cánh 1m8\r\n\r\nKích thước:\r\n\r\n1 Giường Ngủ (MFBNCDD01.B16): W1636 X D2154 X H800 (phù hợp với nệm 1m6)\r\n\r\n1 Tủ Đầu Giường (MFBSCDD02.B05): W500 X D400 X H500\r\n\r\n1 Set Tủ Quần Áo 3 Cánh: W1800 X D600 X H2000\r\n\r\nChất liệu chính: Gỗ cao su và gỗ MFC/ MDF chuẩn CARB P2 (*)', 15060000, NULL, 'fullcombo.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(500) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `email`, `pass`, `phone`, `address`, `role`) VALUES
(89, 'johan12', 'http://localhost/Marketween/Upload/User/1.jpg', 'johan12@gmail.com', '$2y$10$j9IQkvtTqd.GN7KWDL9XVumcKfTZQdsjhDRd.4yZsTweIbNCAxEZG', '0816169506', '', 'admin'),
(90, 'johan13', 'http://localhost/Marketween/Upload/User/6.jpg', 'johan13@gmail.com', '$2y$10$7ndB4rdZMz/U8wGzX.CGWuP5NlrCpLejLn1VJtlQDcysfp7psrvWm', '0372654272', '', 'user'),
(91, 'Tester', '', 'test@t.est', '$2y$10$Xw1tY0IsnPHagcJM8CHA..sGuH.95vjcLnPmj2QGKJX8cfK7GEnle', '0958585858', NULL, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`iduser`),
  ADD KEY `id_sp` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_token` (`token_order`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`token_order`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`iddm`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_token` FOREIGN KEY (`token_order`) REFERENCES `orders` (`token_order`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
