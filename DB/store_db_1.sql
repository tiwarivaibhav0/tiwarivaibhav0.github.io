-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 04, 2022 at 05:17 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int UNSIGNED NOT NULL,
  `id` int UNSIGNED NOT NULL,
  `status` enum('pending','approved','delivered') DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `total_amount` int DEFAULT NULL,
  `pin` int DEFAULT NULL,
  `CustomerName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `id`, `status`, `address`, `order_date`, `delivery_date`, `total_amount`, `pin`, `CustomerName`) VALUES
(17, 3, 'approved', 'Indira Nagar Lucknow Lucknow Uttar Pradesh', '2022-06-03 07:25:17', '2022-06-03 07:25:17', 32150, 226016, 'Vaibhav Tiwari'),
(18, 31, 'delivered', 'Indira Nagar Lucknow Uttar Pradesh', '2022-06-03 08:06:42', '2022-06-05 08:06:42', 91050, 226017, 'Vaibhav Tiwari'),
(19, 35, 'pending', 'Indira Nagar Lucknow Uttar Pradesh', '2022-06-03 10:19:27', '2022-06-05 10:19:27', 88150, 525689, 'Vaibhav Tiwari'),
(20, 37, 'approved', 'Indira Nagar Lucknow Uttar Pradesh', '2022-06-03 13:20:28', '2022-06-05 13:20:28', 70700, 226007, 'Gaurav Shankhdhar'),
(21, 3, 'pending', 'Indira Nagar Lucknow Uttar Pradesh', '2022-06-04 05:00:18', '2022-06-06 05:00:18', 41800, 226016, 'Vaibhav Tiwari'),
(22, 39, 'pending', 'Indira Nagar Lucknow Uttar Pradesh', '2022-06-04 05:05:57', '2022-06-06 05:05:57', 46700, 226016, 'Abc Xyz');

-- --------------------------------------------------------

--
-- Table structure for table `Order_items`
--

CREATE TABLE `Order_items` (
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int DEFAULT NULL,
  `item_price` varchar(65) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Order_items`
--

INSERT INTO `Order_items` (`order_id`, `product_id`, `quantity`, `item_price`, `product_name`) VALUES
(17, 201, 1, '1200', 'WHITE t-SHIRT'),
(17, 207, 8, '2500', 'Ceiling Fan'),
(17, 209, 1, '4650', 'Hoodie'),
(17, 212, 1, '3000', 'Pack of 3 Trousers'),
(17, 216, 1, '3500', 'Wooden Table'),
(18, 204, 1, '2600', 'Half Shirt'),
(18, 211, 1, '950', 'Kurta'),
(18, 212, 1, '3000', 'Pack of 3 Trousers'),
(18, 215, 14, '5800', 'Plastic Chairs * 4'),
(18, 216, 1, '3500', 'Wooden Table'),
(19, 105, 1, '85000', 'PREDATOR LAPTOP'),
(19, 201, 2, '1200', 'WHITE t-SHIRT'),
(19, 211, 1, '950', 'Kurta'),
(20, 214, 4, '16850', 'Almirah'),
(20, 216, 1, '3500', 'Wooden Table'),
(21, 201, 1, '1200', 'WHITE t-SHIRT'),
(21, 207, 1, '2500', 'Ceiling Fan'),
(21, 215, 6, '5800', 'Plastic Chairs * 4'),
(21, 216, 1, '3500', 'Wooden Table'),
(22, 201, 1, '1200', 'WHITE t-SHIRT'),
(22, 207, 1, '2500', 'Ceiling Fan'),
(22, 209, 6, '4650', 'Hoodie'),
(22, 215, 1, '5800', 'Plastic Chairs * 4'),
(22, 218, 1, '9500', 'Earrings');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `product_id` int UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` enum('electronics','fashion','furniture','jewellery') DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_id`, `product_name`, `product_image`, `category`, `product_price`, `quantity`) VALUES
(101, 'LED TV 32 INCH', 'https://rukminim1.flixcart.com/image/416/416/television/z/b/6/samsung-32j4003-original-imaezvg8eynmheds.jpeg?q=70', 'electronics', 25000, 60),
(102, 'ANDROID PHONE', 'https://images-eu.ssl-images-amazon.com/images/I/41i7LM0pGwL._SX300_SY300_QL70_FMwebp_.jpg', 'electronics', 20000, 60),
(103, 'IPHONE XI', 'https://d2d22nphq0yz8t.cloudfront.net/88e6cc4b-eaa1-4053-af65-563d88ba8b26/https://media.croma.com/image/upload/v1631858726/Croma%20Assets/Communication/Mobiles/Images/243535_ltu5vc.png/', 'electronics', 80000, 600),
(104, ' ASPIRE 5 LAPTOP', 'https://rukminim1.flixcart.com/image/416/416/krce64w0/computer/g/x/z/aspire-5-thin-and-light-laptop-acer-original-imag55gzykbb22cp.jpeg?q=70', 'electronics', 45000, 60),
(105, 'PREDATOR LAPTOP', 'https://rukminim1.flixcart.com/image/416/416/kuvkcy80/computer/x/s/4/na-gaming-laptop-acer-original-imag7whp2f8fgpaz.jpeg?q=70', 'electronics', 85000, 70),
(201, 'WHITE t-SHIRT', 'https://i.pinimg.com/564x/c1/1d/16/c11d164de692594acf53c9a855093139.jpg', 'fashion', 1200, 198),
(203, 'Red Shirt', 'https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1862801/2018/2/9/11518155061506-Roadster-Men-Maroon--Navy-Blue-Regular-Fit-Checked-Casual-Shirt-8861518155061131-1.jpg', 'fashion', 6500, 89),
(204, 'Half Shirt', 'https://rukminim1.flixcart.com/image/714/857/kxjav0w0/shirt/h/q/q/xxl-men-slim-fit-printed-cut-away-casual-shirts-original-imag9z2dhmaujdww.jpeg?q=50', 'fashion', 2600, 98),
(205, 'Washing Machine', 'https://m.media-amazon.com/images/I/61McHnZ1BcL._SL1500_.jpg', 'electronics', 55000, 98),
(206, 'Water Cooler', 'https://m.media-amazon.com/images/I/61ugceV6vzL._SY550_.jpg', 'electronics', 6800, 110),
(207, 'Ceiling Fan', 'https://rukminim1.flixcart.com/image/416/416/k0cqqvk0/fan/e/k/y/ujala-energy-saver-ceiling-fan-1200-orient-electric-original-imafk5u6ywvfwup3.jpeg?q=70', 'electronics', 2500, 55),
(208, 'Speaker', 'https://m.media-amazon.com/images/I/81yF3MS-UBL._SY355_.jpg', 'electronics', 9500, 787),
(209, 'Hoodie', 'https://cdn.shopify.com/s/files/1/0514/9494/4962/products/humble-hoodie-228534_550x.jpg?v=1641288664', 'fashion', 4650, 56),
(210, 'Black Jeans', 'https://cdn.shopify.com/s/files/1/0384/5583/6812/products/product-image-1517567091_1800x1800.jpg?v=1610869582', 'fashion', 4420, 25),
(211, 'Kurta', 'https://m.media-amazon.com/images/I/51++cxHDe6L._UX522_.jpg', 'fashion', 950, 300),
(212, 'Pack of 3 Trousers', 'https://5.imimg.com/data5/ON/QT/MY-3070405/inspire-pack-of-3-formal-trousers-28black-2c-blue-500x500.png', 'fashion', 3000, 1000),
(213, 'Wooden Almirah', 'https://ii1.pepperfry.com/media/catalog/product/u/j/800x880/ujisato-6-door-wardrobe-with-2-drawers-by-mintwud-ujisato-6-door-wardrobe-with-2-drawers-by-mintwud-iktmg9.jpg', 'furniture', 45000, 52),
(214, 'Almirah', 'https://m.media-amazon.com/images/I/71hbwuWvHpL._SY355_.jpg', 'furniture', 16850, 66),
(215, 'Plastic Chairs * 4', 'https://m.media-amazon.com/images/I/61CWt4x8YnL._SX425_.jpg', 'furniture', 5800, 250),
(216, 'Wooden Table', 'https://www.decornation.in/wp-content/uploads/2020/06/solid-wood-computer-table.jpg', 'furniture', 3500, 150),
(217, 'Necklace  Set', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRM9sP2Agugchkx9aBfGR6UggCpev4LJZ_LlMsTI2Z8zzRG5OoeHASG19qCdU_Hkp7DrkynmIxusyqlFGrMxLHHF0M8AyUbJu7BGS-4z-0R7_puZy8wua6I&usqp=CAY', 'jewellery', 65000, 50),
(218, 'Earrings', 'https://cdn.shopify.com/s/files/1/0582/1553/0645/products/MKER107GDZN_M1_600x.jpg?v=1627748178', 'jewellery', 9500, 100),
(219, 'Bracelet', 'https://cfcdn20.candere.com/media/catalog/product/cache/1/yellow_gold_default/400x400/9df78eab33525d08d6e5fb8d27136e95/v/r/vrgbs12_3.jpg?v=1521907504', 'jewellery', 55000, 560);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','user','manager','customer') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `status`) VALUES
(1, 'admin', '1', 'admin@gmail.com', 'admin', 'admin', 'active'),
(3, 'Some1', 'Random', 'User4@gmail.com', 'ddd', 'user', 'active'),
(4, 'User2', 'random', 'User2@gmail.com', 'rtrt', 'customer', 'inactive'),
(17, 'User10', 'EXample', 'User10@gmail.com', 'User10', 'user', 'active'),
(21, 'User11', '12', 'User11@gmail.com', 'user11', 'admin', 'active'),
(22, 'Useer12', '13', 'User15@gmail.com', 'rfrfrf', 'customer', 'active'),
(26, 'User', '36', 'User36@gmail.com', '36', 'user', 'active'),
(29, 'User', '8989', 'User8989@gmail.com', '8989', 'customer', 'inactive'),
(30, 'user', '5656', 'User5656@gmail.com', '5656', 'manager', 'active'),
(31, 'Vaibhav ', 'Tiwari', 'Vaibhav@gmail.com', 'Vaibhav', 'user', 'active'),
(32, 'Arvind', 'Singh', 'Arvind@gmail.com', 'Arvind', 'customer', 'active'),
(33, 'V', 'T', 'VT@gmail.com', 'VT', 'user', 'active'),
(34, 'sdsd', 'sdsd', 'efefe@gmail.com', 'sdsd', 'user', 'active'),
(35, 'satyam', 'awasthi', 'asdf@asdf.com', '123', 'user', 'active'),
(36, 'New', 'New', 'New@gmail.com', 'New', 'user', 'active'),
(37, 'Gaurav', 'Shankhdhar', 'gaurav@gmail.com', '1234', 'user', 'active'),
(38, 'fdv', 'gbgbgbgb', 'efefe@gmail.com', '456', 'user', 'active'),
(39, 'Abc', 'Abc', 'Abc@gmail.com', 'Abc', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Order_items`
--
ALTER TABLE `Order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Order_items`
--
ALTER TABLE `Order_items`
  ADD CONSTRAINT `Order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
