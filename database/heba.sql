-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 07:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heba`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Microsoft'),
(2, 'Lenovo'),
(3, 'Sony'),
(4, 'Nokia'),
(5, 'Dell'),
(6, 'Hp'),
(7, 'Samsung'),
(8, 'Huawi'),
(9, 'Htc'),
(10, 'Oppo'),
(11, 'Apple'),
(12, 'Infinix'),
(13, 'Accer'),
(14, 'Canon'),
(15, 'Nikon');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Laptops', 0),
(2, 'Tablets', 0),
(3, 'Mobiles', 0),
(4, 'Cameras', 0),
(5, 'I3', 1),
(6, 'I5', 1),
(7, 'I7', 1),
(8, 'AMD', 1),
(9, '7 inch', 2),
(10, '8 inch', 2),
(11, '9 inch', 2),
(12, '10 inch', 2),
(13, '12 inch', 2),
(14, 'Touch ', 3),
(15, 'Keys', 3),
(16, 'Compacts', 4),
(17, 'Digital Single', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Price` decimal(65,0) NOT NULL,
  `List_price` decimal(65,0) NOT NULL,
  `Brand` int(11) NOT NULL,
  `Categories` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Featured` tinyint(4) NOT NULL DEFAULT '0',
  `Colors` varchar(255) NOT NULL,
  `Keywords` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Title`, `Price`, `List_price`, `Brand`, `Categories`, `Image`, `Description`, `Featured`, `Colors`, `Keywords`) VALUES
(1, 'Lenovo Laptop', '4600', '5000', 2, '6', 'images/products/lenovoi5.jpeg', '15.6 inch Screen ,Intel Core i5 Processor,6 GB Memory ,750GB HDD', 1, 'red:3 , black:5 , white:1 , blue:2 , silver:3', 'Lenovo Laptop ,Core i5'),
(2, 'Lenovo Laptop', '7000', '8000', 2, '7', 'images/products/lenovoi7.jpg', '15.6 inch Screen ,Intel Core i7 Processor,8 GB Memory ,2TB HDD', 1, 'red:3 , black:5 , white:1 , blue:2 , silver:3 ', 'Lenovo Laptop,Core i7'),
(3, 'Dell Laptop', '16000', '17000', 5, '7', 'images/products/delli7.jpg', 'dell inspiron 7359,6th gen ,intel core-i7,8gb ram,256gb,15.6 inch Screen ,touch,win10', 1, 'red:3 , black:5 , white:1 , blue:2 , silver:3 ', 'Dell Laptop,Core i7'),
(4, 'Dell laptop', '10000', '11200', 5, '6', 'images/products/delli5.jpg', 'dell inspiron 7359,5th gen ,intel core-i5,8gb ram,256gb,15.6 inch Screen ,touch,win10', 1, 'red:3 , black:5 , white:1 , blue:2 , silver:3', 'dell,laptop,i5,inspiron'),
(5, 'Dell Laptop', '8000', '9000', 5, '5', 'images/products/delli3.jpg', 'dell inspiron 7359,5th gen ,intel core-i3,4gb ram,256gb,15.6 inch Screen ,touch,win10', 1, 'red:3 , black:5 , white:1 , blue:2 , silver:3', 'dell,laptop,i3'),
(6, 'Lenovo Laptop', '7000', '9000', 2, '5', 'images/products/lenovoi3.jpg', '15.6 inch Screen ,Intel Core i3 Processor,4 GB Memory ,1TB HDD', 1, 'gray:3,red:4,black:2', 'lenovo, laptop,i3'),
(7, 'Apple Laptop', '40000', '45000', 11, '7', 'images/products/applei7.jpg', '15.6 inch Screen ,Intel Core i7 Processor,8 GB Memory ,2TB HDD', 1, 'red:3,gray:5,pink:6,silver:2', 'apple,laptop,i7'),
(8, 'Apple laptop', '25000', '26000', 11, '6', 'images/products/applei5.jpg', '15.6 inch Screen ,Intel Core i5 Processor,8 GB Memory ,2TB HDD', 1, 'gray:3,silver:2:pink:5', 'apple,laptop,i5'),
(9, 'Apple Laptop', '20000', '22200', 11, '5', 'images/products/applei3.jpg', '15.6 inch Screen ,Intel Core i3 Processor,4 GB Memory ,1TB HDD', 1, 'red:2,black:5,silver:4', 'apple,i3,laptop'),
(10, 'Sony Xperia', '5000', '6000', 3, '14', 'images/products/sony1.jpg', 'Experience the most interesting smartphone features with the sony G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'white:3,black:2', 'sony,mobile,touch'),
(11, 'Sony Mobile', '3000', '4000', 3, '14', 'images/products/sony2.jpg', 'Experience the most interesting smartphone features with the sony G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'red:2,orange:2', 'sony,phones,mobiles'),
(12, 'Sony Mobile', '2000', '3000', 3, '14', 'images/products/sony4.jpg', 'Experience the most interesting smartphone features with the sony G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'red:3,black:5', 'sony,mobile'),
(13, 'Nokia mobile', '500', '700', 4, '15', 'images/products/nokia1.jpg', 'Experience the most interesting smartphone features with the nokia G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'red:2,white:4', 'nokia,mobile'),
(14, 'Nokia Mobile', '600', '700', 4, '15', 'images/products/nokia2.jpg', 'Experience the most interesting smartphone features with the nokia G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'black:2,white:3', 'mobile,nokia,phones'),
(15, 'Nokia Mobile', '200', '400', 4, '15', 'images/products/nokia3.jpg', 'Experience the most interesting smartphone features with the nokia G8 smartphone. This gold colored smartphone is integrated with a powerful Qualcomm MSM8939 Snapdragon 615 1.5GHz plus 1.2GHz Octa Core processor, the Android Lollipop 5.1 operating system, and a 3GB RAM module, which together constitute its primary, steadfast internal components. Stream movies and music, play games ...', 3, 'gray:5,red:4', 'nokia,keys,phones,mobiles'),
(17, 'Canon Camera', '15000', '17000', 14, '16', 'images/products/canon1.jpg', 'Deliver beautiful photos and video with speed, simplicity and fun. Entry level DSLR cameras such as the EOS T6, EOS T7i, EOS T6i or a EOS SL2 boast advanced technology such as the CMOS Image Sensor and Canon DIGIC Image Processor for richly detailed images and quick camera response, even in low light.', 4, 'black:5', 'canon,digital,camera'),
(18, 'Canon Camera', '10000', '11200', 14, '16', 'images/products/canon2.jpg', 'Deliver beautiful photos and video with speed, simplicity and fun. Entry level DSLR cameras such as the EOS T6, EOS T7i, EOS T6i or a EOS SL2 boast advanced technology such as the CMOS Image Sensor and Canon DIGIC Image Processor for richly detailed images and quick camera response, even in low light.', 4, 'blue:5', 'canon,camera,compact'),
(19, 'Nikon Camera', '15000', '18000', 15, '17', 'images/products/nikon3.jpg', 'Deliver beautiful photos and video with speed, simplicity and fun. Entry level DSLR cameras such as the EOS T6, EOS T7i, EOS T6i or a EOS SL2 boast advanced technology such as the CMOS Image Sensor and Canon DIGIC Image Processor for richly detailed images and quick camera response, even in low light.', 4, 'red:2,black\r\n:5', 'nikon,digital,camera'),
(20, 'Nikon Camera', '18000', '19000', 15, '17', 'images/products/nikon2.jpg', 'Deliver beautiful photos and video with speed, simplicity and fun. Entry level DSLR cameras such as the EOS T6, EOS T7i, EOS T6i or a EOS SL2 boast advanced technology such as the CMOS Image Sensor and Canon DIGIC Image Processor for richly detailed images and quick camera response, even in low light.', 4, 'blue:3,black:5', 'nikon,camera,digital'),
(21, 'Nikon Camera', '18000', '19000', 15, '17', 'images/products/nikon1.png', 'Deliver beautiful photos and video with speed, simplicity and fun. Entry level DSLR cameras such as the EOS T6, EOS T7i, EOS T6i or a EOS SL2 boast advanced technology such as the CMOS Image Sensor and Canon DIGIC Image Processor for richly detailed images and quick camera response, even in low light.', 4, 'blue:3,black:5', 'nikon,camera,digital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
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
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
