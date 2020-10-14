-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2020 lúc 07:52 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tmdt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` varchar(10) NOT NULL,
  `name_category` varchar(100) NOT NULL DEFAULT 'Default name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
('BE', 'Beverages'),
('CC', 'Chips $ Cereals'),
('FF', 'Fastfood'),
('FM', 'Fresh Meat'),
('FR', 'Fresh Fruit'),
('JU', 'Juice'),
('MI', 'Milk'),
('OF', 'Ocean Foods'),
('OI', 'Oil'),
('RI', 'Rice'),
('VE', 'Vegetables');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id_item` varchar(100) NOT NULL,
  `name_item` varchar(100) NOT NULL DEFAULT 'Default name',
  `avatar_item` varchar(500) NOT NULL DEFAULT 'Default link',
  `description_item` varchar(500) NOT NULL DEFAULT 'Default description',
  `price_item` int(11) NOT NULL DEFAULT 0,
  `availability_item` tinyint(1) NOT NULL DEFAULT 1,
  `weight_item` float NOT NULL DEFAULT 0,
  `sale_off_item` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `best_seller_item` tinyint(1) NOT NULL DEFAULT 0,
  `date_created_item` datetime DEFAULT NULL,
  `latest_date_updated_item` datetime DEFAULT NULL,
  `category_item` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id_item`, `name_item`, `avatar_item`, `description_item`, `price_item`, `availability_item`, `weight_item`, `sale_off_item`, `featured`, `best_seller_item`, `date_created_item`, `latest_date_updated_item`, `category_item`) VALUES
('apple', 'Apple', 'apple', 'Apples', 0, 1, 0, 0, 0, 0, '2020-10-09 18:42:10', NULL, 'FR'),
('banana', 'Banana', 'banana', 'Bananas', 0, 1, 0, 0, 0, 0, '2020-10-09 18:43:11', NULL, 'FR'),
('beef', 'Beef', 'beef', 'Beef', 0, 1, 0, 0, 0, 0, '2020-10-09 18:44:13', NULL, 'FM'),
('bell-pepper', 'Bell pepper', 'bell-peppers', 'Bell peppers', 0, 1, 0, 0, 0, 0, '2020-10-10 23:20:14', NULL, 'VE'),
('carrot', 'Carrot', 'carrot', 'Carrot', 0, 1, 0, 0, 0, 0, '2020-10-11 00:02:18', NULL, 'VE'),
('chicken', 'Chicken', 'chicken', 'Chicken', 0, 1, 0, 0, 0, 0, '2020-10-09 18:44:37', NULL, 'FF'),
('combo-fruit', 'Combo Fruit', 'combo-fruit', 'Combo Fruit', 0, 1, 0, 0, 0, 0, '2020-10-09 18:45:25', NULL, 'FR'),
('common-guava', 'Common guava', 'common-guava', 'Common guava', 0, 1, 0, 0, 0, 0, '2020-10-09 18:46:04', NULL, 'FR'),
('grape', 'Grape', 'grape', 'Grapes', 0, 1, 0, 0, 0, 0, '2020-10-09 18:47:48', NULL, 'FR'),
('hamburger', 'Hamburger', 'hamburger', 'Hamburgers', 0, 1, 0, 0, 0, 0, '2020-10-09 18:49:22', NULL, 'FF'),
('lettuce', 'Lettuce', 'lettuce', 'Lettuce', 0, 1, 0, 0, 0, 0, '2020-10-10 23:57:59', NULL, 'VE'),
('mango', 'Mango', 'mango', 'Mangoes', 0, 1, 0, 0, 0, 0, '2020-10-09 18:52:11', NULL, 'FR'),
('orange-juice', 'Orange Juice', 'orange-juice', 'Orange Juice', 0, 1, 0, 0, 0, 0, '2020-10-09 18:52:53', NULL, 'JU'),
('sliwki-juice', 'Sliwki Juice', 'sliwki-juice', 'Sliwki Juice', 0, 1, 0, 0, 0, 0, '2020-10-09 18:54:09', NULL, 'JU'),
('watermelon', 'Watermelon', 'watermelon', 'Watermelon', 0, 1, 0, 0, 0, 0, '2020-10-09 18:56:33', NULL, 'FR');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `id_order` int(11) NOT NULL,
  `fname_user_order` varchar(100) NOT NULL,
  `lname_user_order` varchar(100) NOT NULL,
  `address_user_order` varchar(500) NOT NULL,
  `date_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_user_item`
--

CREATE TABLE `rating_user_item` (
  `id_user_rating` int(11) NOT NULL,
  `id_item_rating` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `date_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `select_user_item`
--

CREATE TABLE `select_user_item` (
  `id_user_select` int(11) NOT NULL,
  `id_item_select` int(11) NOT NULL,
  `quantity_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fname_user` varchar(100) NOT NULL,
  `lname_user` varchar(100) NOT NULL,
  `bday_user` date NOT NULL,
  `avatar_user` varchar(500) NOT NULL,
  `address_user` varchar(500) NOT NULL,
  `email_user` varchar(500) NOT NULL,
  `role_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_categoty_item` (`category_item`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `rating_user_item`
--
ALTER TABLE `rating_user_item`
  ADD PRIMARY KEY (`id_user_rating`,`id_item_rating`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `select_user_item`
--
ALTER TABLE `select_user_item`
  ADD PRIMARY KEY (`id_user_select`,`id_item_select`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_categoty_item` FOREIGN KEY (`category_item`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
