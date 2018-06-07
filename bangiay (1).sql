-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2018 lúc 03:23 PM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `bill_code` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1- chờ xử lý , 2- đã huỷ, 3- hoàn thành , 0 - đang xử lý',
  `created_date` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `total_price`, `bill_code`, `status`, `created_date`, `id_user`) VALUES
(51, 1200000, '0STOTDZY', 2, '2018-05-23 08:05:22', 12),
(52, 851120, 'N5DLAXZZ', 3, '2018-05-23 08:05:41', 12),
(53, 1300000, 'ZOZ2NFSP', 3, '2018-05-23 09:05:43', 12),
(58, 1700000, 'Y24UHBAR', 2, '2018-05-23 10:05:53', 12),
(59, 632720, 'N7SIIMJA', 3, '2018-05-23 10:05:08', 12),
(60, 2200000, '72N3X4NE', 3, '2018-05-23 10:05:43', 12),
(61, 1700000, '050VI3IZ', 3, '2018-05-23 11:05:28', 5),
(62, 2900000, '5KOJER2W', 2, '2018-05-23 11:05:56', 4),
(63, 1156720, 'VCYWRJC4', 2, '2018-05-23 11:05:00', 4),
(64, 100000, '75GDIQUZ', 0, '2018-05-24 02:05:46', 4),
(66, 1100000, '43UJKUER', 3, '2018-05-24 03:05:36', 4),
(67, 500000, 'QMSD2CP7', 1, '2018-05-24 03:05:36', 4),
(68, 400000, 'URMKBESD', 1, '2018-05-24 08:05:12', 4),
(69, 1100000, 'BYS7L7O2', 1, '2018-05-24 10:05:08', 4),
(70, 2750000, 'OJ0QISDA', 2, '2018-05-25 08:05:22', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL COMMENT 'số lượng ',
  `size_product` int(11) DEFAULT NULL,
  `sum_price` int(11) NOT NULL,
  `code_color` int(11) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `amount`, `size_product`, `sum_price`, `code_color`, `id_product`, `id_bill`) VALUES
(39, 1, 29, 600000, NULL, 35, 51),
(40, 1, 29, 600000, NULL, 36, 51),
(41, 1, 29, 351120, NULL, 37, 52),
(42, 1, 29, 100000, NULL, 40, 52),
(43, 1, 29, 200000, NULL, 41, 52),
(44, 1, 39, 200000, NULL, 41, 52),
(45, 1, 29, 500000, NULL, 34, 53),
(46, 1, 29, 600000, NULL, 35, 53),
(47, 1, 29, 200000, NULL, 41, 53),
(52, 1, 29, 500000, NULL, 34, 58),
(53, 1, 29, 600000, NULL, 35, 58),
(54, 1, 29, 600000, NULL, 36, 58),
(55, 1, 29, 351120, NULL, 37, 59),
(56, 1, 29, 105600, NULL, 38, 59),
(57, 1, 29, 176000, NULL, 39, 59),
(58, 1, 29, 500000, NULL, 34, 60),
(59, 1, 33, 500000, NULL, 34, 60),
(60, 2, 29, 1200000, NULL, 35, 60),
(61, 2, 29, 1200000, NULL, 35, 61),
(62, 1, 29, 500000, NULL, 34, 61),
(63, 1, 29, 500000, NULL, 34, 62),
(64, 2, 34, 1200000, NULL, 35, 62),
(65, 2, 37, 1200000, NULL, 36, 62),
(66, 1, 29, 500000, NULL, 34, 63),
(67, 1, 29, 351120, NULL, 37, 63),
(68, 1, 29, 105600, NULL, 38, 63),
(69, 1, 29, 200000, NULL, 41, 63),
(70, 1, 29, 100000, NULL, 40, 64),
(71, 1, 29, 500000, NULL, 34, 66),
(72, 1, 29, 600000, NULL, 35, 66),
(73, 1, 29, 500000, NULL, 34, 67),
(74, 1, 29, 200000, NULL, 41, 68),
(75, 1, 29, 200000, NULL, 42, 68),
(76, 1, 29, 500000, NULL, 34, 69),
(77, 1, 29, 600000, NULL, 35, 69),
(78, 1, 29, 550000, NULL, 54, 70),
(79, 4, 32, 2200000, NULL, 54, 70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_product`
--

CREATE TABLE `discount_product` (
  `id` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `discount_product`
--

INSERT INTO `discount_product` (`id`, `info`, `discount`, `created_date`) VALUES
(1, 'giảm 12% ', 12, '2018-05-11 12:05:18'),
(2, 'GIẢM 1000', 10, '2018-05-10 08:05:49'),
(3, 'Không khuyến mãi', 0, '2018-05-11 12:05:26'),
(4, 'giảm 30%', 30, '2018-05-11 01:05:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `id` int(11) NOT NULL,
  `link` varchar(300) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`id`, `link`, `id_product`) VALUES
(26, 'giay34.jpg', 34),
(27, 'giay34.jpg', 34),
(28, 'giay35.jpg', 35),
(29, 'giay36.jpg', 36),
(30, 'giay34.jpg', 34),
(31, 'giay35.jpg', 35),
(32, 'giay36.jpg', 36),
(33, 'giay37.jpg', 37),
(34, 'giay37.jpg', 37),
(35, 'giay38.jpg', 38),
(36, 'giay39.jpg', 39),
(37, 'giay40.jpg', 40),
(38, 'giay41.jpg', 41),
(39, 'giay42.jpg', 42),
(40, 'giay43.jpg', 43),
(41, 'giay34.jpg', 34),
(42, 'giay44.jpg', 44),
(43, 'giay45.jpg', 45),
(44, 'giay46.jpg', 46),
(45, 'giay47.jpg', 47),
(46, 'giay48.jpg', 48),
(47, 'giay49.jpg', 49),
(48, 'giay50.jpg', 50),
(49, 'giay51.jpg', 51),
(50, 'giay52.jpg', 52),
(51, 'giay53.jpg', 53),
(52, 'giay54.jpg', 54),
(53, 'giay55.jpg', 55),
(54, 'giay35.jpg', 35),
(55, 'giay36.jpg', 36),
(56, 'giay56.jpg', 56),
(57, 'giay57.jpg', 57),
(58, 'giay38.jpg', 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `number`
--

CREATE TABLE `number` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `number`
--

INSERT INTO `number` (`id`, `name`, `value`) VALUES
(1, 'access', 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` char(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0: nữ - 1: nam',
  `amount` int(11) DEFAULT NULL COMMENT 'số lượng',
  `created_date` datetime NOT NULL,
  `list_color` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: không bán - 1: mới - 2 : bình thường',
  `id_type` int(11) NOT NULL,
  `id_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `price`, `gender`, `amount`, `created_date`, `list_color`, `status`, `id_type`, `id_discount`) VALUES
(34, 'HUNTERDEN', 'Hunter Den', 500000, 1, NULL, '2018-05-11 12:05:26', '12', 0, 1, 3),
(35, 'HUNTERDO', 'Hunter Đỏ', 600000, 0, NULL, '2018-05-11 01:05:44', '12', 1, 2, 3),
(36, 'HUNTERDENDO', 'Hunter Đen Đỏ', 600000, 0, NULL, '2018-05-11 01:05:41', 'đen, đỏ', 1, 1, 3),
(37, 'BTS', 'Giày Thể thao BTS', 399000, 1, NULL, '2018-05-01 12:05:03', 'đỏ, xe, xanh', 0, 1, 1),
(38, 'DIM', 'Dép Iron Man', 120000, 1, NULL, '2018-05-11 02:05:10', 'đỏ', 1, 1, 1),
(39, 'BTSCODE', 'Giay đen BTS CODE', 200000, 1, NULL, '2018-05-10 08:05:35', 'đỏ, đen', 1, 3, 1),
(40, 'CAP1', 'Dép Captain', 100000, 1, NULL, '2018-05-11 12:05:18', 'nhiều màu', 0, 5, 3),
(41, 'DEPDO', 'Dép Đỏ', 200000, 1, NULL, '2018-05-11 12:05:55', 'đỏ', 1, 1, 3),
(42, 'DEPXANH', 'Đép xanh', 200000, 1, NULL, '2018-05-11 12:05:49', 'xanh', 1, 5, 3),
(43, 'DEPNGUOINHEN', 'Dép người nhện', 200000, 1, NULL, '2018-05-11 12:05:05', 'đỏ', 1, 5, 3),
(44, 'HUNTERXANHDEN', 'Hunter Xanh Đen', 500000, 1, NULL, '2018-05-11 12:05:18', 'xanh đen', 1, 1, 3),
(45, 'DEPXANHLAVANG', 'Dép Xanh Lá Vàng', 200000, 1, NULL, '2018-05-11 12:05:00', 'Xanh lá, vàng', 1, 5, 3),
(46, 'DEPDENHUYEN', 'Dép đen huyền', 150000, 1, NULL, '2018-05-11 12:05:37', 'đen', 1, 1, 3),
(47, 'DEPDENXANH', 'Dép đen xanh', 150000, 1, NULL, '2018-05-11 12:05:08', 'đen xanh', 1, 5, 3),
(48, 'DEPXAM', 'Dép xám', 150000, 1, NULL, '2018-05-11 12:05:56', 'xám', 1, 5, 3),
(49, 'DEPXANHDUONG', 'Dép xanh dương', 150000, 1, NULL, '2018-05-11 12:05:43', 'xanh dương', 1, 1, 3),
(50, 'DEPBIEN', 'Dép đi biển', 200000, 1, NULL, '2018-05-11 01:05:45', 'nhiều màu', 1, 5, 3),
(51, 'DEPDICHOI', 'Dép đi chơi', 250000, 1, NULL, '2018-05-11 01:05:00', 'nhiều màu', 1, 5, 3),
(52, 'HUNTERTRANGXAM', 'Hunter Trắng xám', 500000, 1, NULL, '2018-05-11 01:05:06', 'trắng, xám', 1, 1, 3),
(53, 'HUNTERTRANGDEN', 'Hunter Trắng đen', 550000, 1, NULL, '2018-05-11 01:05:10', 'trắng, đen', 1, 1, 3),
(54, 'HUNTERVANGXANHLA', 'Hunter Vàng Xanh lá', 550000, 1, NULL, '2018-05-11 01:05:02', 'vàng, xanh lá', 1, 2, 3),
(55, 'HUNTERVANGXANHLASOC', 'Hunter Vàng Xanh lá Sọc', 550000, 0, NULL, '2018-05-11 01:05:54', 'vàng, xanh lá', 1, 2, 3),
(56, 'HUNTERXANHXAM', 'Hunter Xanh Xám', 600000, 1, NULL, '2018-05-11 01:05:38', 'xanh, xám', 1, 2, 4),
(57, 'HUNTERDENXANH', 'Hunter Đen xanh', 600000, 1, NULL, '2018-05-11 01:05:36', 'đen xanh', 1, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size_form` int(11) DEFAULT NULL,
  `size_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `name`, `size_form`, `size_to`) VALUES
(1, 'Giày Nam', 29, 44),
(2, 'Giày Nữ', 29, 42),
(3, 'Trẻ em', 29, 36),
(4, 'Ba', 29, 44),
(5, 'Dép', 29, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: admin - 1 : khách hàng- 2 : nhân viên - 3: quản lý',
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: còn hoạt động- 0 : ko hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `name`, `dob`, `phone`, `role`, `address`, `email`, `status`) VALUES
(3, 'chocho', '123123', 'sSyrqxXATEGgHwYioln5Hd_nut7Iz3eY', 'chocho', '0000-00-00', '8239482394', 2, 'dsfasdfsadf', 'sdfsadaf@gmail.com', 1),
(4, 'namnam', '123123', 'zTn-ITU1cO30bgktxqIcRoi-v_7VbZbZ', 'namnam', '2018-01-17', '23453254', 4, 'dsffasdfs', 'nghai@gmail.com', 1),
(5, 'admin', 'admin', 'VwpOEo5L6ZVsFkwI_w0ch9dOoD1pTMRQ', 'admin', '2018-01-17', '453453', 1, 'sdfsadfs', 'admin@gmail.com', 1),
(6, 'admin35', '123123', 'xLwiKqI-Gp28fPVNSUr-MAmiL6m8Nx0c', 'Hồ Nhật Nam', '2018-01-10', '08481742', 1, 'feriv qeiwe', 'tini@gmail.com', 1),
(7, 'admin35', '123123', 'h_S7zikr7bomjA0ctZLusggyOW0upNB6', 'sdfsdf', '2018-02-13', '3242342', 3, 'fdsdfád', 'nghdfdsia@gmail.com', 1),
(8, 'adsfasdfds', 'dfasdfasdfasdf', 'hkEeTIhwGKG8o_h4yDsYg4pXyOSJetMz', 'ádfasdfdsaf', '0000-00-00', '2384723084', 4, 'dsfasdfasd', 'asdfasdfasdf', 1),
(9, '', '', '4V-B78l2TS31KNANGOaXeozfQqH8SaQ-', 'test', '0000-00-00', '0987654', 4, 'sdfsdfsa', 'test@gmail.com', 1),
(10, '', '', 'XZ6hCS9pQw1iJtNmPgztPLFef2Gm72uH', 'test', '0000-00-00', '0987654', 4, 'sdfsdfsa', 'test@gmail.com', 1),
(11, '', '', 'hAL-8jh4RaKSH_tFvzPf2RsB8kjvTqXo', 'Phạm Thành Nghĩa', '0000-00-00', '907798131', 4, 'kí túc xá khu B đại học quốc gia', 'nghia@gmail.com', 1),
(12, 'nghia', 'nghia', 'sKIW7QP8UB67s1dPFdJc4lGCZinMkYM1', 'Phạm Thành Nghĩa', '0000-00-00', '907798131', 4, 'kí túc xá khu B đại học quốc gia', 'nghia@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `number`
--
ALTER TABLE `number`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `discount_product`
--
ALTER TABLE `discount_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `number`
--
ALTER TABLE `number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
