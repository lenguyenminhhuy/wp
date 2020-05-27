-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 27, 2020 at 08:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(50) NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `brand` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`
id`,
`name
`, `image`, `price`, `brand`) VALUES
(8, 'x', '8.jpg', 100, 'H&M'),
(9, 'y', '9.jpg', 200, 'H&M'),
(10, 'z', '10.jpg', 120, 'Levis'),
(1, 'shirt', '1.jpg', 100, 'Zara'),
(2, 'skirt', '2.jpg', 200, 'Zara'),
(3, 'ab', '3.jpg', 300, 'Fendi'),
(4, 't', '4.jpg', 500, 'Chanel'),
(6, 'six', '6.jpg', 400, 'Louis Vuitton');
