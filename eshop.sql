-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2025 at 08:02 PM
-- Server version: 9.1.0
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Product_ID` int NOT NULL,
  `Priority` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Product_ID` (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `name`, `Product_ID`, `Priority`) VALUES
(2, 'mobile.webp', 2, 1),
(3, 'keyboard.webp', 3, 1),
(35, 'car111745783790.jfif', 27, 1),
(36, 'car121745783790.jfif', 27, 2),
(37, 'car131745783790.jfif', 27, 3),
(41, 'computer1746390007.webp', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

DROP TABLE IF EXISTS `ordered_products`;
CREATE TABLE IF NOT EXISTS `ordered_products` (
  `product_ID` int NOT NULL COMMENT 'the product orderd',
  `order_ID` int NOT NULL COMMENT 'the order of product',
  `quantity` int NOT NULL COMMENT 'the number of product',
  `Date` varchar(11) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL COMMENT 'the date of the product add ',
  KEY `product_ID` (`product_ID`),
  KEY `order_ID` (`order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`product_ID`, `order_ID`, `quantity`, `Date`) VALUES
(1, 4, 1, '1746907088');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int NOT NULL COMMENT 'the user that has ordered',
  `Status` enum('پرداخت شده','پرداخت نشده','','') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'پرداخت نشده',
  `Date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user` (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `user_ID`, `Status`, `Date`) VALUES
(4, 15, 'پرداخت نشده', '1'),
(5, 4, 'پرداخت نشده', '1746982690');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int NOT NULL AUTO_INCREMENT COMMENT 'the id of the product',
  `Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'the name of product',
  `Price` int NOT NULL COMMENT 'the price of product',
  `Number` int NOT NULL COMMENT 'the existence of the product',
  `Time` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Caption` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'The extra information of the product',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `Number`, `Time`, `Caption`) VALUES
(1, 'computer', 1500, 5, '1746460831', 'this is computer'),
(2, 'mobile', 5000, 14, '1745443316', 'this is mobile'),
(3, 'keyboard', 8000, 7, '1745443315', 'this is keyboard'),
(27, 'car', 10000, 8, '1746471229', 'this is car');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(400) NOT NULL DEFAULT 'deafult.jpg',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`ID`, `Name`) VALUES
(1, 'deafult.jpg'),
(13, '1746906772images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT COMMENT 'ID of uesr',
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'uesrname of the uesr',
  `Phone` varchar(11) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'The number phone of the user',
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'pass of enter into the website',
  `Profile_ID` int NOT NULL,
  `Role` enum('کاربر','ادمین','','') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'کاربر' COMMENT 'Role of the user is he/she admin or just a user',
  `Active` enum('فعال','غیرفعال','','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'فعال' COMMENT 'is the user banned or not',
  PRIMARY KEY (`ID`),
  KEY `Profile_ID` (`Profile_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Phone`, `Password`, `Profile_ID`, `Role`, `Active`) VALUES
(4, 'admin', '045843545', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'ادمین', 'فعال'),
(15, 'amir', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 13, 'کاربر', 'فعال');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
