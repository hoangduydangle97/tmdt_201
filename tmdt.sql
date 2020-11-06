-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2020 lúc 01:58 PM
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
  `name_category` varchar(100) NOT NULL DEFAULT 'Default name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
('beverages', 'Beverages'),
('chips-cereals', 'Chips & Cereals'),
('fastfood', 'Fastfood'),
('fresh-fruit', 'Fresh Fruit'),
('fresh-meat', 'Fresh Meat'),
('juice', 'Juice'),
('milk', 'Milk'),
('ocean-foods', 'Ocean Foods'),
('oil', 'Oil'),
('rice', 'Rice'),
('vegetables', 'Vegetables');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id_item` varchar(100) NOT NULL,
  `name_item` varchar(100) NOT NULL DEFAULT 'Default name',
  `avatar_item` varchar(500) NOT NULL DEFAULT 'Default link',
  `description_item` varchar(500) NOT NULL DEFAULT 'Default description',
  `price_item` float NOT NULL DEFAULT 0,
  `availability_item` tinyint(1) NOT NULL DEFAULT 1,
  `weight_item` float NOT NULL DEFAULT 0,
  `sale_off_item` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `best_seller_item` tinyint(1) NOT NULL DEFAULT 0,
  `date_created_item` datetime DEFAULT NULL,
  `latest_date_updated_item` datetime DEFAULT NULL,
  `category_item` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id_item`, `name_item`, `avatar_item`, `description_item`, `price_item`, `availability_item`, `weight_item`, `sale_off_item`, `featured`, `best_seller_item`, `date_created_item`, `latest_date_updated_item`, `category_item`) VALUES
('apple', 'Apple', 'apple', 'Apples', 1.49, 1, 0, 0, 1, 1, '2020-10-09 18:42:10', '2020-10-09 18:42:10', 'fresh-fruit'),
('banana', 'Banana', 'banana', 'Bananas', 0.57, 1, 0, 0, 0, 1, '2020-10-09 18:43:11', '2020-10-09 18:43:11', 'fresh-fruit'),
('beef', 'Beef', 'beef', 'Beef', 2.49, 1, 0, 0, 1, 0, '2020-10-09 18:44:13', '2020-10-09 18:44:13', 'fresh-meat'),
('bell-pepper', 'Bell pepper', 'bell-peppers', 'Bell peppers', 4.59, 1, 0, 0, 0, 0, '2020-10-10 23:20:14', '2020-10-10 23:20:14', 'vegetables'),
('carrot', 'Carrot', 'carrot', 'Carrot', 1.22, 1, 0, 0, 1, 0, '2020-10-11 00:02:18', '2020-10-11 00:02:18', 'vegetables'),
('chicken', 'Chicken', 'chicken', 'Chicken', 6.99, 1, 0, 0, 0, 0, '2020-10-09 18:44:37', '2020-10-09 18:44:37', 'fastfood'),
('combo-fruit', 'Combo Fruit', 'combo-fruit', 'Combo Fruit', 19.99, 1, 0, 0, 1, 0, '2020-10-09 18:45:25', '2020-10-09 18:45:25', 'fresh-fruit'),
('common-guava', 'Common guava', 'common-guava', 'Common guava', 3.49, 1, 0, 0, 0, 0, '2020-10-09 18:46:04', '2020-10-09 18:46:04', 'fresh-fruit'),
('grape', 'Grape', 'grape', 'Grapes', 2.09, 1, 0, 0, 1, 0, '2020-10-09 18:47:48', '2020-10-09 18:47:48', 'fresh-fruit'),
('hamburger', 'Hamburger', 'hamburger', 'Hamburgers', 6.99, 1, 0, 0, 0, 0, '2020-10-09 18:49:22', '2020-10-09 18:49:22', 'fastfood'),
('lettuce', 'Lettuce', 'lettuce', 'Lettuce', 0.35, 1, 0, 0, 0, 0, '2020-10-10 23:57:59', '2020-10-10 23:57:59', 'vegetables'),
('mango', 'Mango', 'mango', 'Mangoes', 7.39, 1, 0, 0, 1, 0, '2020-10-09 18:52:11', '2020-10-09 18:52:11', 'fresh-fruit'),
('orange-juice', 'Orange Juice', 'orange-juice', 'Orange Juice', 2.62, 1, 0, 0, 0, 0, '2020-10-09 18:52:53', '2020-10-09 18:52:53', 'juice'),
('sliwki-juice', 'Sliwki Juice', 'sliwki-juice', 'Sliwki Juice', 2.99, 1, 0, 0, 0, 0, '2020-10-09 18:54:09', '2020-10-09 18:54:09', 'juice'),
('watermelon', 'Watermelon', 'watermelon', 'Watermelon', 0.55, 1, 0, 0, 1, 0, '2020-10-09 18:56:33', '2020-10-09 18:56:33', 'fresh-fruit');

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
('hoangduydangle', 'apple', 5, 'Apples are good!  I love them.', '2020-10-26 01:28:36'),
('hoangduydangle', 'banana', 4, 'Good.', '2020-10-29 12:04:57'),
('hoangduydangle', 'beef', 5, 'Exellent!', '2020-10-30 01:39:03'),
('hoangduydangle', 'chicken', 5, 'Delicious!', '2020-10-29 12:15:40'),
('hoangduydangle', 'hamburger', 2, 'Not special.', '2020-10-30 18:54:54'),
('hoangduydangle', 'mango', 5, NULL, '2020-10-30 23:17:39'),
('johnsmith', 'beef', 3, 'OK', '2020-10-31 16:06:01'),
('johnsmith', 'combo-fruit', 4, 'Good', '2020-10-31 16:01:15'),
('johnwick', 'apple', 4, 'Good', '2020-10-25 15:44:42'),
('johnwick', 'banana', 3, 'OK.', '2020-10-29 12:05:18'),
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
  `username_user_select` varchar(100) NOT NULL,
  `id_item_select` varchar(100) NOT NULL,
  `quantity_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('banana', 3.5, 2),
('beef', 4, 2),
('bell-pepper', 4, 1),
('carrot', 0, 0),
('chicken', 4.5, 2),
('combo-fruit', 4, 1),
('common-guava', 0, 0),
('grape', 0, 0),
('hamburger', 3.5, 2),
('lettuce', 0, 0),
('mango', 4.5, 1),
('orange-juice', 0, 0),
('sliwki-juice', 0, 0),
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
  `email_user` varchar(500) DEFAULT NULL,
  `role_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username_user`, `password_user`, `fname_user`, `lname_user`, `bday_user`, `avatar_user`, `address_user`, `email_user`, `role_user`) VALUES
('admin', '$2y$10$BrGCoW9ovXA9tym7pTlefeKyMMNPvkfq6/D4oNv85rBghI78Nd35C', 'Jacob', 'Browns', '1980-11-06', '/tmdt_201/public/master1/img/user/default-avatar.jpg', NULL, 'jacob1106browns@gmail.com', 1),
('hoangduydangle', '$2y$10$2d9x5b1ruHgPh9.4OxDz0ebpixI590JLZMOQBwZFmKr7MdnhoOCky', 'Hoangduy', 'Dangle', '1997-09-30', '/tmdt_201/public/master1/img/user/hoangduydangle/avatar.jpg', NULL, NULL, 0),
('johnsmith', '$2y$10$F1rYCKRdYGNlWlzfnhXivuiKMJVy6CvNdk1eri0k6d66ZpYoOozWS', 'John', 'Smith', '1964-10-31', '/tmdt_201/public/master1/img/user/default-avatar.jpg', NULL, 'johnsmith@gmail.com', 0),
('johnwick', '$2y$10$SZ.c3c3Xje7vW9uXjgCuouKmVQ/FVJotzEW.TPFqgn3NLqKkGr0Tu', 'Johnathan', 'Wick', '1967-10-15', '/tmdt_201/public/master1/img/user/default-avatar.jpg', NULL, NULL, 0),
('tonystark', '$2y$10$3eqWspe4pFNQsFqaJogBSern8YK1RVDNHdE6fQAso4GdnYJRl9BjS', 'Tony', 'Stark', '1970-05-29', '/tmdt_201/public/master1/img/user/default-avatar.jpg', NULL, NULL, 0);

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
  ADD PRIMARY KEY (`username_user_rating`,`id_item_rating`,`date_rating`),
  ADD KEY `fk_item_rating` (`id_item_rating`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `select_user_item`
--
ALTER TABLE `select_user_item`
  ADD PRIMARY KEY (`username_user_select`,`id_item_select`);

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
