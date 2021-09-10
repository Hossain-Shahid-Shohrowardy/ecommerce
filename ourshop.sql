-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 05:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'shohrowardy@gmail.com', '101219');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Dell'),
(3, 'Lenovo'),
(4, 'Asus'),
(5, 'Nokia'),
(6, 'Samsung'),
(7, 'Canon'),
(10, 'hp');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(29, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Mobiles'),
(3, 'Cameras'),
(4, 'Tablets'),
(5, 'Computers'),
(6, 'headphone'),
(8, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(15) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(0, 'Navid', 'navid1992@gmail.com', 'navid', 'bangladesh', '', 1726012285, 'O.R.Nizam road,chittagong', '23517695_1102372643198866_4535873313738055901_n (2).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_email`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(4, '', 0, 105000, 0, 2, '2018-08-03 14:40:20.000000', 'pending'),
(5, '', 0, 120000, 0, 2, '2018-08-06 16:32:57.000000', 'pending'),
(6, '', 0, 105000, 0, 2, '2018-08-06 18:13:52.000000', 'pending'),
(7, '', 0, 56000, 0, 2, '2018-08-06 18:18:01.000000', 'pending'),
(8, '', 0, 140000, 0, 1, '2018-08-06 23:38:09.000000', 'pending'),
(9, '', 0, 160000, 0, 1, '2018-08-07 16:46:53.000000', 'pending'),
(10, '', 0, 100000, 0, 1, '2018-08-07 21:57:29.000000', 'pending'),
(11, '', 0, 110000, 0, 1, '2018-08-07 22:07:58.000000', 'pending'),
(12, '', 0, 60000, 0, 1, '2018-08-07 22:52:32.000000', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `products_id`, `qty`, `order_status`) VALUES
(6, 0, 1603839773, 25, 1, 'pending'),
(7, 0, 576804610, 28, 1, 'pending'),
(8, 0, 557043956, 25, 2, 'pending'),
(9, 0, 871293616, 29, 2, 'pending'),
(10, 0, 208503857, 22, 2, 'pending'),
(11, 0, 466499959, 27, 2, 'pending'),
(12, 0, 23105637, 28, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` datetime(6) NOT NULL,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(20, 1, 1, '2018-05-22 00:32:41.000000', 'HP Pavilion', 'hp-pavilion.jpg', '', '', 35000, 'latest low cost hp laptop', 'LAPTOP,HP,NEW,laptops,Laptpos', 'on'),
(22, 1, 2, '2018-05-22 00:53:26.000000', 'Dell inspiror', 'DELL1.jpg', '', '', 50000, 'high configuration laptop of dell', 'laptop,dell,new,laptops,Laptops', 'on'),
(23, 2, 6, '2018-06-04 12:43:17.000000', 'Samsung S6', 'nokia_new.jpg', '', '', 26000, 'latest version of Samsang', 'mobiles,samsung,new,', 'on'),
(25, 1, 2, '2018-06-04 12:54:45.000000', 'Dell nice Laptop', 'dell_image.jpg', '', '', 70000, 'gaming dell laptop', 'dell,laptops,new,Laptops', 'on'),
(26, 3, 7, '2018-06-04 12:59:37.000000', 'Canon nice cameras ', 'canon.jpg', '', '', 80000, 'latest camera of canon', 'canon,new,cameras', 'on'),
(27, 1, 4, '2018-06-04 13:04:55.000000', 'Asus nice Book', 'asus.jpg', '', '', 55000, 'best laptop for student ', 'asus,new,laptops,Laptops', 'on'),
(28, 2, 0, '2018-06-04 13:12:52.000000', 'Nokia new latest lolipop', 'nokia.jpg', '', '', 30000, 'latest nokia mobiles', 'mobiles,new,nokia', 'on'),
(29, 3, 7, '2018-06-04 13:15:26.000000', 'New Canon Camera', '1200px-Nikon_D3200,_front_left.JPG', '', '', 80000, 'new Canon camera', 'canon,new,cameras', 'on'),
(30, 1, 1, '2018-06-07 20:48:10.000000', 'hp nice book', 'DELL1.jpg', '', '', 50000, 'laptop', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
