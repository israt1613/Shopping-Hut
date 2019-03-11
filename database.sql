-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 07:47 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(13, 'Polo'),
(27, 'Nike'),
(31, 'Sketchers'),
(33, 'Levis'),
(34, 'Ella Moss'),
(35, 'Gucci'),
(36, 'Non-Brand'),
(37, 'Huda Beauty'),
(38, 'Adidas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `items`, `expire_date`, `paid`) VALUES
(1, '[{\"id\":\"12\",\"size\":\"Mini\",\"quantity\":2},{\"id\":\"6\",\"size\":\"36\",\"quantity\":\"1\"}]', '2019-01-02 08:16:10', 0),
(2, '[{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"2\"},{\"id\":\"8\",\"size\":\" Medium-36\",\"quantity\":\"1\"},{\"id\":\"16\",\"size\":\"Large\",\"quantity\":\"1\"},{\"id\":\"16\",\"size\":\"Small\",\"quantity\":\"2\"},{\"id\":\"13\",\"size\":\"38\",\"quantity\":3},{\"id\":\"8\",\"size\":\"36\",\"quantity\":3},{\"id\":\"17\",\"size\":\"medium\",\"quantity\":\"1\"},{\"id\":\"15\",\"size\":\"XL\",\"quantity\":\"2\"}]', '2019-01-02 09:56:05', 0),
(4, '[{\"id\":\"13\",\"size\":\"Medium-36\",\"quantity\":1},{\"id\":\"6\",\"size\":\"Medium-36\",\"quantity\":2}]', '2019-01-03 18:50:32', 0),
(5, '[{\"id\":\"15\",\"size\":\"M\",\"quantity\":\"2\"}]', '2019-01-02 13:12:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Men', 0),
(2, 'Women', 0),
(3, 'Boys', 0),
(4, 'Girls', 0),
(5, 'Shirts', 1),
(6, 'Pants', 1),
(7, 'Shoes', 1),
(8, 'Accessories', 1),
(9, 'Shirts', 2),
(10, 'Pants', 2),
(11, 'Shoes', 2),
(12, 'Dresses', 2),
(13, 'Shirts', 3),
(14, 'Pants', 3),
(15, 'Dresses', 4),
(16, 'Shoes', 4),
(17, 'Accessories', 2),
(25, 'Gifts', 0),
(26, 'Home Decor', 25),
(29, 'Shoes', 3),
(30, 'Pants', 4),
(31, 'Bag', 2),
(32, 'Bags &amp; Accessories', 0),
(33, 'Bag', 32),
(34, 'Hoodie', 1),
(35, 'Food', 0),
(36, 'Chocolates', 35);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `sizes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `deleted`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`) VALUES
(5, 0, 'Title', '45', '50', 13, '15', '/shoppingHut/images/products/84cbcc060e77034c0d0a387cf1015b1f.png', 'nice tshirt', 1, 'small:3'),
(6, 0, 'High Heels', '375', '400', 35, '11', '/shoppingHut/images/products/d7387b0a8a9f09303be571766c78dd99.jpg', 'This is a Nice and Elegant heel.', 1, 'Small-34:6,Medium-36:4,Large-38:3'),
(7, 0, 'Summer Dress', '79', '89', 34, '12', '/shoppingHut/images/products/13b0dd2c325c599b3017f100fae89ae2.png', 'Comfortable summer dress...', 1, 'Small:5,Medium:10,Large:3'),
(8, 0, 'Shoes', '120', '125', 27, '11', '/shoppingHut/images/products/c41823d012c0852a211ba9176038de49.png', 'Beautiful pink Shoe.', 1, ' Small-34:5,Medium-38:2,Large-36:4,m:'),
(9, 0, 'Princess Dress', '18', '20', 36, '15', '/shoppingHut/images/products/e4210a038cf088feb284fe930ff24d44.png', 'Beautiful princess dress.', 1, 'Small(age-6 years):4,medium(age-9 years):3'),
(10, 0, 'Bag', '85', '90', 27, '31', '/shoppingHut/images/products/b97b2a7207c6ab2b80a4b386b35ddc17.jpg', 'Nice bags.', 1, 'Medium:2'),
(11, 0, 'Liquid Matte LipSticks', '30', '33', 37, '17', '/shoppingHut/images/products/ab5c445e608401cb1392a2903c763131.jpg', 'LIQUID MATTE MINIS - AU NATUREL NUDES', 1, '4 in 1:3'),
(12, 0, 'Eye shadow palette', '25', '27', 37, '17', '/shoppingHut/images/products/6ce45b4ef709ca17daf86923cba60726.jpg', '9 colors', 1, 'Mini:2'),
(13, 0, 'Nike Air Force 1 ', '128', '130', 27, '29', '/shoppingHut/images/products/76c9446b4b0e41572b95ba3a19333ced.png', 'Nike Air Force 1 Premium Winter\r\nMen&#039;s Shoe', 1, 'Small-34:4,Medium-36:2,Large-38:5'),
(14, 0, 'Nike Vapor Power Training Bag', '70', '77', 27, '33', '/shoppingHut/images/products/bae8c6151bd36f7c241b6a4d5cfec0b9.png', 'Men&#039;s Training Duffel Bag (Medium)', 0, 'Medium:2'),
(15, 0, 'Shirt', '42', '45', 33, '5', '/shoppingHut/images/products/d7ffb93b0b82acab1780343829ca5e5e.png', 'Checked Dark Shirt', 1, 'S:3,M:2,L:6,XL:7'),
(16, 0, 'Men&#039;s Athletics suit', '115', '120', 38, '34', '/shoppingHut/images/products/c200b4f412fec6b72787512ea3fc2094.png', 'Men&#039;s Athletics ADIDAS Z.N.E. FAST RELEASE HOODIE', 1, 'Small:4,Medium:5,Large:2'),
(17, 0, 'Gown', '20', '25', 36, '12', '/shoppingHut/images/products/48a44371b8e9499880d3235f17b1b927.jpg', 'Spring Gown with Sleeves.', 1, 'Medium:3'),
(18, 0, 'T shirt', '20', '25', 36, '15', '/shoppingHut/images/products/0bde7b3daf0bfd414c660523816126c3.png', 'Nice tshirt', 1, 'L:6'),
(19, 0, 'T shirt', '20', '25', 36, '15', '/shoppingHut/images/products/0568c442f86b90e8532d00ce96444f44.png', '', 1, 'M:5,L:4,XL:3');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `charge_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cart_id` int(11) NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(175) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(175) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(175) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `txn_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(1, 'Israt Jahan', 'israt5223@gmail.com', '$2y$10$yg/winINAFOp2lXcoOQNnO88qsRPcdm.L6BJznvHWKIZm1fMzp.7.', '2018-12-01 00:20:03', '2018-12-05 05:04:27', 'admin,editor'),
(8, 'qwdf sdcf', 'awsesdrf@gmail.com', '$2y$10$i3QnuvTcXDj7adYkQxifsOvN0Enh8lwyVIdch.oZ7lPUiZytz7Tla', '2018-12-02 00:03:17', '2018-12-01 19:08:09', 'editor'),
(9, 'Ipshita Tasnim', 'ipsita.tasnim97@gmail.com', '$2y$10$1BYnQ.XubShokl8obKlZKO3wMBMjxGq/Z3Cg/WHs/OJxSBdJiPtdK', '2018-12-04 11:31:05', '2018-12-04 06:31:45', 'admin,editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
