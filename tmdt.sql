-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2020 lúc 07:31 PM
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
  `id_category` varchar(100) NOT NULL,
  `name_category` varchar(100) NOT NULL DEFAULT 'Default name',
  `date_created_category` datetime DEFAULT NULL,
  `latest_date_updated_category` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `date_created_category`, `latest_date_updated_category`) VALUES
('beverages', 'Beverages', '2020-10-09 18:30:12', '2020-10-09 18:30:12'),
('chips-cereals', 'Chips & Cereals', '2020-10-09 18:31:15', '2020-10-09 18:31:15'),
('fastfood', 'Fastfood', '2020-10-09 18:32:07', '2020-10-09 18:32:07'),
('fresh-fruit', 'Fresh Fruit', '2020-10-09 18:33:20', '2020-10-09 18:33:20'),
('fresh-meat', 'Fresh Meat', '2020-10-09 18:35:43', '2020-10-09 18:35:43'),
('juice', 'Juice', '2020-10-09 18:38:22', '2020-10-09 18:38:22'),
('milk', 'Milk', '2020-10-09 18:40:10', '2020-10-09 18:40:10'),
('ocean-foods', 'Ocean Foods', '2020-10-09 18:41:17', '2020-10-09 18:41:17'),
('oil', 'Oil', '2020-10-09 18:42:56', '2020-10-09 18:42:56'),
('rice', 'Rice', '2020-10-09 18:44:31', '2020-10-09 18:44:31'),
('vegetables', 'Vegetables', '2020-10-09 18:45:49', '2020-10-09 18:45:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id_item` varchar(100) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `avatar_item` varchar(500) NOT NULL,
  `detail_item_1` varchar(500) DEFAULT NULL,
  `detail_item_2` varchar(500) DEFAULT NULL,
  `detail_item_3` varchar(500) DEFAULT NULL,
  `description_item` varchar(500) DEFAULT NULL,
  `price_item` float NOT NULL DEFAULT 0,
  `unit_item` varchar(10) DEFAULT 'kg',
  `availability_item` tinyint(1) NOT NULL DEFAULT 1,
  `weight_item` float NOT NULL DEFAULT 0,
  `sale_off_item` float NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `num_purchased` int(11) NOT NULL DEFAULT 0,
  `date_created_item` datetime DEFAULT NULL,
  `latest_date_updated_item` datetime DEFAULT NULL,
  `category_item` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id_item`, `name_item`, `avatar_item`, `detail_item_1`, `detail_item_2`, `detail_item_3`, `description_item`, `price_item`, `unit_item`, `availability_item`, `weight_item`, `sale_off_item`, `featured`, `num_purchased`, `date_created_item`, `latest_date_updated_item`, `category_item`) VALUES
('apple', 'Apple', 'public/images/uploads/products/apple/avatar/apple.jpg', 'public/images/uploads/products/apple/details/detail-1-apple.jpg', 'public/images/uploads/products/apple/details/detail-2-apple.jpg', 'public/images/uploads/products/apple/details/detail-3-apple.jpg', 'Apples', 35000, 'kg', 1, 1, 20, 1, 1, '2020-10-09 18:42:10', '2020-10-09 18:42:10', 'fresh-fruit'),
('avocado', 'Avocado', 'public/images/uploads/products/avocado/avatar/avocado.jpg', 'public/images/uploads/products/avocado/details/detail-1-avocado.jpg', 'public/images/uploads/products/avocado/details/detail-2-avocado.jpg', 'public/images/uploads/products/avocado/details/detail-3-avocado.jpg', 'Avocado', 99000, 'kg', 1, 1, 0, 1, 1, '2020-10-09 18:45:25', '2020-10-09 18:45:25', 'fresh-fruit'),
('banana', 'Banana', 'public/images/uploads/products/banana/avatar/banana.jpg', 'public/images/uploads/products/banana/details/detail-1-banana.jpg', 'public/images/uploads/products/banana/details/detail-2-banana.jpg', 'public/images/uploads/products/banana/details/detail-3-banana.jpg', 'Bananas', 23000, 'kg', 1, 1, 15, 0, 0, '2020-10-09 18:43:11', '2020-10-09 18:43:11', 'fresh-fruit'),
('beef', 'Beef', 'public/images/uploads/products/beef/avatar/beef.jpg', 'public/images/uploads/products/beef/details/detail-1-beef.jpg', 'public/images/uploads/products/beef/details/detail-2-beef.jpg', 'public/images/uploads/products/beef/details/detail-3-beef.jpg', 'Beef', 219000, 'kg', 1, 1, 25, 1, 1, '2020-10-09 18:44:13', '2020-10-09 18:44:13', 'fresh-meat'),
('bell-pepper', 'Bell pepper', 'public/images/uploads/products/bell-pepper/avatar/bell-peppers.jpg', 'public/images/uploads/products/bell-pepper/details/detail-1-bell-pepper.jpg', 'public/images/uploads/products/bell-pepper/details/detail-2-bell-pepper.jpg', 'public/images/uploads/products/bell-pepper/details/detail-3-bell-pepper.jpg', 'Bell peppers', 62000, 'kg', 1, 1, 0, 0, 0, '2020-10-10 23:20:14', '2020-10-10 23:20:14', 'vegetables'),
('carrot', 'Carrot', 'public/images/uploads/products/carrot/avatar/carrot.jpg', 'public/images/uploads/products/carrot/details/detail-1-carrot.jpg', 'public/images/uploads/products/carrot/details/detail-2-carrot.jpg', 'public/images/uploads/products/carrot/details/detail-3-carrot.jpg', 'Carrot', 17000, 'kg', 1, 1, 0, 1, 0, '2020-10-11 00:02:18', '2020-10-11 00:02:18', 'vegetables'),
('chicken', 'Chicken', 'public/images/uploads/products/chicken/avatar/chicken.jpg', 'public/images/uploads/products/chicken/details/detail-1-chicken.jpg', 'public/images/uploads/products/chicken/details/detail-2-chicken.jpg', 'public/images/uploads/products/chicken/details/detail-3-chicken.jpg', 'Chicken', 229000, 'kg', 0, 1, 0, 0, 0, '2020-10-09 18:44:37', '2020-12-14 03:22:35', 'fresh-meat'),
('dragon-fruit', 'Dragon fruit', 'public/images/uploads/products/dragon-fruit/avatar/dragon-fruit.jpg', 'public/images/uploads/products/dragon-fruit/details/detail-1-dragon-fruit.jpg', 'public/images/uploads/products/dragon-fruit/details/detail-2-dragon-fruit.jpg', 'public/images/uploads/products/dragon-fruit/details/detail-3-dragon-fruit.jpg', 'Dragon fruit', 23000, 'kg', 1, 1, 0, 0, 1, '2020-10-09 18:46:04', '2020-10-09 18:46:04', 'fresh-fruit'),
('grape', 'Grape', 'public/images/uploads/products/grape/avatar/grape.jpg', 'public/images/uploads/products/grape/details/detail-1-grape.jpg', 'public/images/uploads/products/grape/details/detail-2-grape.jpg', 'public/images/uploads/products/grape/details/detail-3-grape.jpg', 'Grapes', 59000, 'kg', 1, 1, 20, 1, 0, '2020-10-09 18:47:48', '2020-10-09 18:47:48', 'fresh-fruit'),
('hamburger', 'Hamburger', 'public/images/uploads/products/hamburger/avatar/hamburger.jpg', 'public/images/uploads/products/hamburger/details/detail-1-hamburger.jpg', 'public/images/uploads/products/hamburger/details/detail-2-hamburger.jpg', 'public/images/uploads/products/hamburger/details/detail-3-hamburger.jpg', 'Hamburgers', 35000, 'item', 1, 1, 0, 0, 0, '2020-10-09 18:49:22', '2020-10-09 18:49:22', 'fastfood'),
('lettuce', 'Lettuce', 'public/images/uploads/products/lettuce/avatar/lettuce.jpg', 'public/images/uploads/products/lettuce/details/detail-1-lettuce.jpg', 'public/images/uploads/products/lettuce/details/detail-2-lettuce.jpg', 'public/images/uploads/products/lettuce/details/detail-3-lettuce.jpg', 'Lettuce', 25000, 'kg', 1, 1, 0, 0, 0, '2020-10-10 23:57:59', '2020-10-10 23:57:59', 'vegetables'),
('lime', 'Lime', 'public/images/uploads/products/lime/avatar/lime.jpg', 'public/images/uploads/products/lime/details/detail-1-lime.jpg', 'public/images/uploads/products/lime/details/detail-2-lime.jpg', 'public/images/uploads/products/lime/details/detail-3-lime.jpg', 'Lime', 25000, 'kg', 1, 1, 0, 0, 0, '2020-11-08 19:14:19', '2020-11-08 19:14:19', 'fresh-fruit'),
('mango', 'Mango', 'public/images/uploads/products/mango/avatar/mango.jpg', 'public/images/uploads/products/mango/details/detail-1-mango.jpg', 'public/images/uploads/products/mango/details/detail-2-mango.jpg', 'public/images/uploads/products/mango/details/detail-3-mango.jpg', 'Mangoes', 25000, 'kg', 1, 1, 0, 1, 0, '2020-10-09 18:52:11', '2020-10-09 18:52:11', 'fresh-fruit'),
('orange-juice', 'Orange Juice', 'public/images/uploads/products/orange-juice/avatar/orange-juice.jpg', 'public/images/uploads/products/orange-juice/details/detail-1-orange-juice.jpg', 'public/images/uploads/products/orange-juice/details/detail-2-orange-juice.jpg', 'public/images/uploads/products/orange-juice/details/detail-3-orange-juice.jpg', 'Orange Juice', 29000, 'item', 1, 1, 5, 0, 0, '2020-10-09 18:52:53', '2020-10-09 18:52:53', 'juice'),
('strawberry-juice', 'Strawberry Juice', 'public/images/uploads/products/strawberry-juice/avatar/strawberry-juice.jpg', 'public/images/uploads/products/strawberry-juice/details/detail-1-strawberry-juice.jpg', 'public/images/uploads/products/strawberry-juice/details/detail-2-strawberry-juice.jpg', 'public/images/uploads/products/strawberry-juice/details/detail-3-strawberry-juice.jpg', 'Strawberry Juice', 34000, 'item', 1, 1, 0, 0, 0, '2020-10-09 18:54:09', '2020-10-09 18:54:09', 'juice'),
('watermelon', 'Watermelon', 'public/images/uploads/products/watermelon/avatar/watermelon.jpg', 'public/images/uploads/products/watermelon/details/detail-1-watermelon.jpg', 'public/images/uploads/products/watermelon/details/detail-2-watermelon.jpg', 'public/images/uploads/products/watermelon/details/detail-3-watermelon.jpg', 'Watermelon', 17000, 'kg', 1, 1, 0, 1, 0, '2020-10-09 18:56:33', '2020-10-09 18:56:33', 'fresh-fruit');

--
-- Bẫy `item`
--
DELIMITER $$
CREATE TRIGGER `tg_insert_item` AFTER INSERT ON `item` FOR EACH ROW INSERT INTO top_item(id_item_top, average_rating, num_review) VALUES(NEW.id_item, '0', '0')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id_order` varchar(100) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `quantity_item` float NOT NULL,
  `total_item` float NOT NULL DEFAULT 0,
  `update_status` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id_order`, `name_item`, `quantity_item`, `total_item`, `update_status`) VALUES
('03223284805f5150e8bc508c38ededb8', 'Apple', 1, 35000, '2020-12-14 00:21:51'),
('03223284805f5150e8bc508c38ededb8', 'Avocado', 1, 23000, '2020-12-14 00:21:51'),
('113f88954c3be1d17fdc52162dd21ceb', 'Apple', 2, 52500, '2020-12-08 16:25:32'),
('113f88954c3be1d17fdc52162dd21ceb', 'Banana', 2, 34500, '2020-12-08 16:25:32'),
('2d441677b4f897b64e70e107fa7c7138', 'Beef', 1, 219000, '2020-12-26 06:57:32'),
('2d441677b4f897b64e70e107fa7c7138', 'Dragon fruit', 1, 23000, '2020-12-26 06:57:32'),
('3f514731d4410f737f6613a2de7b478b', 'Avocado', 1, 99000, NULL),
('3f514731d4410f737f6613a2de7b478b', 'Bell pepper', 1, 62000, NULL),
('461dac001cefe4642be0c4266982655b', 'Apple', 1, 35000, '2020-12-26 03:35:37'),
('461dac001cefe4642be0c4266982655b', 'Avocado', 1, 99000, '2020-12-26 03:35:37'),
('5ebf1f404d4218923d6adbb2ce349e40', 'Beef', 1, 219000, NULL),
('5ebf1f404d4218923d6adbb2ce349e40', 'Watermelon', 1, 17000, NULL),
('706b7f24fab5679b6a53b0f05d3a9c58', 'Bell pepper', 1, 62000, NULL),
('706b7f24fab5679b6a53b0f05d3a9c58', 'Carrot', 1, 17000, NULL),
('d4c9ddd8c209a2944f516abcc7a0262e', 'Apple', 1.5, 52500, '2020-12-26 07:59:50'),
('d4c9ddd8c209a2944f516abcc7a0262e', 'Avocado', 1.5, 148500, '2020-12-26 07:59:50'),
('d864250c50b80453320d98358f4e2ddd', 'Beef', 1, 219000, NULL),
('d864250c50b80453320d98358f4e2ddd', 'Chicken', 1, 229000, NULL),
('e600d3c0fb0b941c5a285f663051bc2c', 'Avocado', 1, 99000, NULL),
('e600d3c0fb0b941c5a285f663051bc2c', 'Bell pepper', 1, 62000, NULL);

--
-- Bẫy `order_item`
--
DELIMITER $$
CREATE TRIGGER `tg_delete_order_item` AFTER DELETE ON `order_item` FOR EACH ROW UPDATE item SET num_purchased=(SELECT COUNT(*) FROM (SELECT * FROM `order_item` WHERE name_item=OLD.name_item) t1 LEFT JOIN order_user t2 ON t1.id_order=t2.id_order WHERE t2.status_order='Delivered') WHERE name_item=OLD.name_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_insert_order_item` AFTER INSERT ON `order_item` FOR EACH ROW UPDATE item SET num_purchased=(SELECT COUNT(*) FROM (SELECT * FROM `order_item` WHERE name_item=NEW.name_item) t1 LEFT JOIN order_user t2 ON t1.id_order=t2.id_order WHERE t2.status_order='Delivered') WHERE name_item=NEW.name_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_update_order_item` AFTER UPDATE ON `order_item` FOR EACH ROW UPDATE item SET num_purchased=(SELECT COUNT(*) FROM (SELECT * FROM `order_item` WHERE name_item=NEW.name_item) t1 LEFT JOIN order_user t2 ON t1.id_order=t2.id_order WHERE t2.status_order='Delivered') WHERE name_item=NEW.name_item
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_user`
--

CREATE TABLE `order_user` (
  `id_order` varchar(100) NOT NULL,
  `fname_user_order` varchar(100) NOT NULL,
  `lname_user_order` varchar(100) NOT NULL,
  `address_user_order` varchar(500) NOT NULL,
  `phone_user_order` varchar(100) NOT NULL,
  `email_user_order` varchar(100) NOT NULL,
  `username_user_order` varchar(100) DEFAULT NULL,
  `note_order` varchar(500) DEFAULT NULL,
  `shipping_order` int(10) NOT NULL,
  `free_shipping` varchar(50) NOT NULL,
  `coupon_order` int(10) DEFAULT NULL,
  `total_order` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_canceled` datetime DEFAULT NULL,
  `date_confirmed` datetime DEFAULT NULL,
  `date_prepared` datetime DEFAULT NULL,
  `date_delivered` datetime DEFAULT NULL,
  `date_request` datetime DEFAULT NULL,
  `date_confirm_request` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `payment_order` varchar(10) DEFAULT NULL,
  `paid_order` tinyint(1) NOT NULL,
  `status_order` varchar(100) NOT NULL DEFAULT 'Not Confirmed',
  `tracking_order` varchar(50) DEFAULT NULL,
  `return_reason` varchar(100) DEFAULT NULL,
  `cancel_reason` varchar(100) DEFAULT NULL,
  `cancel_role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_user`
--

INSERT INTO `order_user` (`id_order`, `fname_user_order`, `lname_user_order`, `address_user_order`, `phone_user_order`, `email_user_order`, `username_user_order`, `note_order`, `shipping_order`, `free_shipping`, `coupon_order`, `total_order`, `date_created`, `date_canceled`, `date_confirmed`, `date_prepared`, `date_delivered`, `date_request`, `date_confirm_request`, `date_returned`, `payment_order`, `paid_order`, `status_order`, `tracking_order`, `return_reason`, `cancel_reason`, `cancel_role`) VALUES
('03223284805f5150e8bc508c38ededb8', 'Hoangduy', 'Dangle', '789 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0988341765', 'duy.dang.bku_19@hcmut.edu.vn', 'hoangduydangle', NULL, 29700, '0', NULL, 87700, '2020-11-10 14:11:31', NULL, '2020-12-09 04:12:34', '2020-12-13 21:39:02', '2020-12-13 21:39:45', '2020-12-14 00:20:06', '2020-12-14 00:21:24', '2020-12-14 00:21:51', 'cod', 0, 'Returned', NULL, 'not-described', NULL, NULL),
('113f88954c3be1d17fdc52162dd21ceb', 'Hoangduy', 'Dangle', '79 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 116700, '2020-12-08 15:41:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vnpay', 1, 'Not Confirmed', NULL, NULL, NULL, NULL),
('2d441677b4f897b64e70e107fa7c7138', 'Johnathan', 'Wick', '123 Lý Thường Kiệt, Phường 14, Quận 10, Hồ Chí Minh', '0984123456', 'johnwick@gmail.com', 'johnwick', NULL, 29700, '0', NULL, 271700, '2020-11-10 12:32:41', NULL, '2020-11-11 08:27:04', '2020-11-11 09:03:04', '2020-11-12 13:24:55', NULL, NULL, NULL, 'cod', 0, 'Delivered', NULL, NULL, NULL, NULL),
('3f514731d4410f737f6613a2de7b478b', 'Hoangduy', 'Dangle', '79 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 190700, '2020-12-08 15:34:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 0, 'Not Confirmed', NULL, NULL, NULL, NULL),
('461dac001cefe4642be0c4266982655b', 'Hoangduy', 'Dangle', '123 Ly Thuong Kiet, Phường Tân Định, Quận 1, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 163700, '2020-12-07 18:07:45', NULL, '2020-12-26 03:35:17', '2020-12-26 03:35:32', '2020-12-26 03:35:37', NULL, NULL, NULL, 'cod', 0, 'Delivered', NULL, NULL, NULL, NULL),
('5ebf1f404d4218923d6adbb2ce349e40', 'Hoangduy', 'Dangle', '123 Lý Thường Kiệt, Phường Tân Định, Quận 1, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 265700, '2020-12-08 14:25:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 0, 'Not Confirmed', NULL, NULL, NULL, NULL),
('706b7f24fab5679b6a53b0f05d3a9c58', 'Hoangduy', 'Dangle', '123 Lý Thường Kiệt, Phường Tân Định, Quận 1, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 108700, '2020-12-08 14:32:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 0, 'Not Confirmed', NULL, NULL, NULL, NULL),
('d4c9ddd8c209a2944f516abcc7a0262e', 'Hoangduy', 'Dangle', '123 Lý Thường Kiệt, Phường Tân Định, Quận 1, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 230700, '2020-12-26 07:24:22', NULL, '2020-12-26 07:59:50', NULL, NULL, NULL, NULL, NULL, 'vnpay', 1, 'Processing', NULL, NULL, NULL, NULL),
('d864250c50b80453320d98358f4e2ddd', 'Hoangduy', 'Dangle', '79 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '1', NULL, 448000, '2020-12-08 15:02:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 0, 'Not Confirmed', NULL, NULL, NULL, NULL),
('e600d3c0fb0b941c5a285f663051bc2c', 'Hoangduy', 'Dangle', '79 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0123456789', 'duy.dang.bku_19@hcmut.edu.vn', NULL, 'Delivery before this Sunday', 29700, '0', NULL, 190700, '2020-12-08 15:30:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 0, 'Not Confirmed', NULL, NULL, NULL, NULL);

--
-- Bẫy `order_user`
--
DELIMITER $$
CREATE TRIGGER `tg_delete_order_user` AFTER DELETE ON `order_user` FOR EACH ROW DELETE FROM order_item WHERE id_order=OLD.id_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_update_order_user` AFTER UPDATE ON `order_user` FOR EACH ROW UPDATE order_item SET update_status=CURRENT_TIMESTAMP WHERE id_order=NEW.id_order
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_vnpay`
--

CREATE TABLE `order_vnpay` (
  `vnp_TxnRef` varchar(100) NOT NULL,
  `vnp_ResponseCode` int(2) NOT NULL,
  `vnp_TransactionNo` int(15) NOT NULL,
  `vnp_PayDate` int(14) NOT NULL,
  `vnp_OrderInfo` varchar(255) NOT NULL,
  `vnp_BankTranNo` varchar(255) NOT NULL,
  `vnp_BankCode` varchar(20) NOT NULL,
  `vnp_Amount` int(12) NOT NULL,
  `vnp_SecureHash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_vnpay`
--

INSERT INTO `order_vnpay` (`vnp_TxnRef`, `vnp_ResponseCode`, `vnp_TransactionNo`, `vnp_PayDate`, `vnp_OrderInfo`, `vnp_BankTranNo`, `vnp_BankCode`, `vnp_Amount`, `vnp_SecureHash`) VALUES
('113f88954c3be1d17fdc52162dd21ceb', 0, 13431847, 2147483647, 'Thanh toan don hang', '20201208154318', 'NCB', 11670000, 'b1a47bdee62e0d95ed4d399d2236f47b8bf630a19635fb81dcc3df7b9a70e8fc'),
('d4c9ddd8c209a2944f516abcc7a0262e', 0, 13441230, 2147483647, 'Thanh toan don hang', '20201226072522', 'NCB', 23070000, '10e8315083034c4c1ffc8c64a1ab27fb2c60ff5423f8a167e5b8e2e5453d5123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_user_item`
--

CREATE TABLE `rating_user_item` (
  `username_user_rating` varchar(100) NOT NULL,
  `id_item_rating` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `date_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rating_user_item`
--

INSERT INTO `rating_user_item` (`username_user_rating`, `id_item_rating`, `rating`, `review`, `date_rating`) VALUES
('admin', 'banana', 5, 'Our bananas are fresh fruit from Mexico', '2020-11-06 22:46:25'),
('hoangduydangle', 'apple', 5, 'Apples are good!  I love them.', '2020-10-26 01:28:36'),
('hoangduydangle', 'banana', 4, 'Good.', '2020-10-29 12:04:57'),
('hoangduydangle', 'beef', 5, 'Exellent!', '2020-10-30 01:39:03'),
('hoangduydangle', 'chicken', 5, 'Delicious!', '2020-10-29 12:15:40'),
('hoangduydangle', 'hamburger', 2, 'Not special.', '2020-10-30 18:54:54'),
('hoangduydangle', 'mango', 5, NULL, '2020-10-30 23:17:39'),
('johnsmith', 'avocado', 4, 'Good', '2020-10-31 16:01:15'),
('johnsmith', 'beef', 3, 'OK', '2020-10-31 16:06:01'),
('johnwick', 'apple', 4, 'Good', '2020-10-25 15:44:42'),
('johnwick', 'banana', 3, 'OK', '2020-11-06 22:35:58'),
('johnwick', 'bell-pepper', 4, 'Good', '2020-10-30 01:39:43'),
('johnwick', 'chicken', 4, 'Good', '2020-10-29 12:16:30'),
('johnwick', 'hamburger', 5, 'Delicious! I love it.', '2020-10-30 19:02:17'),
('johnwick', 'mango', 4, 'Good', '2020-10-30 23:18:18'),
('johnwick', 'watermelon', 5, 'Yeah. It\'s so good!', '2020-10-29 12:06:57'),
('tonystark', 'apple', 1, 'Disappointed!', '2020-10-26 21:54:50'),
('tonystark', 'watermelon', 5, 'Exellent!', '2020-10-29 12:07:02');

--
-- Bẫy `rating_user_item`
--
DELIMITER $$
CREATE TRIGGER `tg_delete_average_rating` AFTER DELETE ON `rating_user_item` FOR EACH ROW UPDATE top_item SET average_rating=(SELECT AVG(rating) FROM `rating_user_item` WHERE id_item_rating=OLD.id_item_rating), num_review=(SELECT COUNT(*) AS num_review FROM rating_user_item WHERE id_item_rating=OLD.id_item_rating AND review IS NOT NULL) WHERE id_item_top=OLD.id_item_rating
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_insert_average_rating` AFTER INSERT ON `rating_user_item` FOR EACH ROW UPDATE top_item SET average_rating=(SELECT AVG(rating) FROM `rating_user_item` WHERE id_item_rating=NEW.id_item_rating), num_review=(SELECT COUNT(*) AS num_review FROM rating_user_item WHERE id_item_rating=NEW.id_item_rating AND review IS NOT NULL) WHERE id_item_top=NEW.id_item_rating
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_update_average_rating` AFTER UPDATE ON `rating_user_item` FOR EACH ROW UPDATE top_item SET average_rating=(SELECT AVG(rating) FROM `rating_user_item` WHERE id_item_rating=NEW.id_item_rating), num_review=(SELECT COUNT(*) AS num_review FROM rating_user_item WHERE id_item_rating=NEW.id_item_rating AND review IS NOT NULL) WHERE id_item_top=NEW.id_item_rating
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `top_item`
--

CREATE TABLE `top_item` (
  `id_item_top` varchar(100) NOT NULL,
  `average_rating` float NOT NULL,
  `num_review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `top_item`
--

INSERT INTO `top_item` (`id_item_top`, `average_rating`, `num_review`) VALUES
('apple', 3.33333, 3),
('avocado', 4, 1),
('banana', 4, 3),
('beef', 4, 2),
('bell-pepper', 4, 1),
('carrot', 0, 0),
('chicken', 4.5, 2),
('dragon-fruit', 0, 0),
('grape', 0, 0),
('hamburger', 3.5, 2),
('lettuce', 0, 0),
('lime', 0, 0),
('mango', 4.5, 1),
('orange-juice', 0, 0),
('strawberry-juice', 0, 0),
('watermelon', 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username_user` varchar(100) NOT NULL,
  `password_user` varchar(500) NOT NULL,
  `fname_user` varchar(100) NOT NULL,
  `lname_user` varchar(100) NOT NULL,
  `bday_user` date DEFAULT NULL,
  `avatar_user` varchar(500) DEFAULT NULL,
  `address_user` varchar(500) DEFAULT NULL,
  `phone_user` varchar(100) NOT NULL,
  `email_user` varchar(500) DEFAULT NULL,
  `role_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username_user`, `password_user`, `fname_user`, `lname_user`, `bday_user`, `avatar_user`, `address_user`, `phone_user`, `email_user`, `role_user`) VALUES
('admin', '$2y$10$BrGCoW9ovXA9tym7pTlefeKyMMNPvkfq6/D4oNv85rBghI78Nd35C', 'Jacob', 'Browns', '1980-11-06', 'public/images/uploads/users/default-avatar.jpg', NULL, '0932490127', 'jacob1106browns@gmail.com', 1),
('hoangduydangle', '$2y$10$2d9x5b1ruHgPh9.4OxDz0ebpixI590JLZMOQBwZFmKr7MdnhoOCky', 'Hoangduy', 'Dangle', '1997-09-30', 'public/images/uploads/users/hoangduydangle/avatar.jpg', '789 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Hồ Chí Minh', '0988341765', 'duy.dang.bku_19@hcmut.edu.vn', 0),
('johnsmith', '$2y$10$F1rYCKRdYGNlWlzfnhXivuiKMJVy6CvNdk1eri0k6d66ZpYoOozWS', 'John', 'Smith', '1964-10-31', 'public/images/uploads/users/default-avatar.jpg', NULL, '0903112223', 'johnsmith@gmail.com', 0),
('johnwick', '$2y$10$SZ.c3c3Xje7vW9uXjgCuouKmVQ/FVJotzEW.TPFqgn3NLqKkGr0Tu', 'Johnathan', 'Wick', '1967-10-15', 'public/images/uploads/users/default-avatar.jpg', '123 Ly Thuong Kiet, Ward 14, District 10, HCMC', '0984123456', 'johnwick@gmail.com', 0),
('tedcruz', '$2y$10$OA2h7cDh2t91Ng1C2ql7veX5HNmeod9gqOdTQVM/BzcgRAWlbmOfK', 'Ted', 'Cruz', '1990-01-01', 'public/images/uploads/user/default-avatar.jpg', '123 Lý Thường Kiệt, Phường Tân Định, Quận 1, Hồ Chí Minh', '0123456789', 'tedcruz@gmail.com', 0),
('tonystark', '$2y$10$3eqWspe4pFNQsFqaJogBSern8YK1RVDNHdE6fQAso4GdnYJRl9BjS', 'Tony', 'Stark', '1970-05-29', 'public/images/uploads/users/default-avatar.jpg', NULL, '0916654321', 'tonystark@gmail.com', 0);

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
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id_order`,`name_item`);

--
-- Chỉ mục cho bảng `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_vnpay`
--
ALTER TABLE `order_vnpay`
  ADD PRIMARY KEY (`vnp_TxnRef`);

--
-- Chỉ mục cho bảng `rating_user_item`
--
ALTER TABLE `rating_user_item`
  ADD PRIMARY KEY (`username_user_rating`,`id_item_rating`,`date_rating`),
  ADD KEY `fk_item_rating` (`id_item_rating`);

--
-- Chỉ mục cho bảng `top_item`
--
ALTER TABLE `top_item`
  ADD PRIMARY KEY (`id_item_top`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username_user`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_categoty_item` FOREIGN KEY (`category_item`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating_user_item`
--
ALTER TABLE `rating_user_item`
  ADD CONSTRAINT `fk_item_rating` FOREIGN KEY (`id_item_rating`) REFERENCES `item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_rating` FOREIGN KEY (`username_user_rating`) REFERENCES `user` (`username_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `top_item`
--
ALTER TABLE `top_item`
  ADD CONSTRAINT `fk_item_average_rating` FOREIGN KEY (`id_item_top`) REFERENCES `item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
