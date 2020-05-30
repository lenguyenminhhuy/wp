-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2020 at 03:23 PM
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
(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`
id`,
`name
`, `image`, `price`, `brand`, `description`) VALUES
(1, 'Sweater', '2.jpg', 100, 'H&M', 'A sweater for any healthcare professional. It is an ideal for girls as this sweater would made young girls more lovely.'),
(3, 'Blazer', '1.jpg', 119.99, 'Zara', 'A beautiful balazer for a good day. An ideal item for women. Wearing it helps you look so fancy '),
(2, 'Orange T-shirt', '5.jpg', 599.99, 'Chanel', 'The celebrated artist and social activist — came together to transform our most iconic piece of T-shirt.'),
(5, 'Summer collection', '4.jpg', 299.99, 'Levis', 'Turn your old shirt into a new one.'),
(4, 'Beautiful Dress', '10.jpg', 499.99, 'Gucci', 'New everyday basics. You can finally dye happy. A simple but lovely dress for every girl.');
