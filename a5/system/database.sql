-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2020 at 09:29 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`, `brand`, `description`) VALUES
(1, 'Blazer ', '1.jpg', 299.99, 'Fendi', 'This blazer is a type of jacket resembling a suit jacket, but cut more casually. A blazer is generally distinguished from a sport coat as a more formal garment and tailored from solid color fabrics. Blazers often have naval-style metal buttons to reflect their origins as jackets worn by boating club members.'),
(2, 'Sweater', '5.jpg', 170, 'Saint Laurent', 'A sweater, also called a jumper in British English,[1] is a piece of clothing, typically with long sleeves, made of knitted or crocheted material that covers the upper part of the body. When sleeveless, the garment is often called a slipover or sweater vest.\r\n\r\nSweaters are worn by adults and children of all genders, often over a shirt, blouse, T-shirt, or other top, but sometimes next to the skin. Sweaters were traditionally made from wool but can now be made of cotton, synthetic fibers, or any combination of these.'),
(3, 'T-Shirt Summer', '4.jpg', 160, 'Lacoste', 'T-shirt is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.\r\n\r\nTypically made of cotton textile in a stockinette or jersey knit, it has a distinctively pliable texture compared to shirts made of woven cloth. Some modern versions have a body made from a continuously knitted tube, produced on a circular knitting machine, such that the torso has no side seams.'),
(5, 'Italian skirt', '7.jpg', 799, 'Gucci', 'Animated by a gold and brown paisley floral print, this short kaftan dress has a relaxed silhouette with a drawstring subtly emphasizing the waistline and aged gold-toned metal buttons adding a vintage feel. First introduced as part of Gucci’s 1996 collection, the kaftan continues to be an integral part of the House aesthetic while evolving in new materials and modern details.'),
(4, 'Floral dress', '10.jpg', 599.99, 'Gucci', 'This dress (also known as a frock or a gown) is a garment traditionally worn by women or girls consisting of a skirt with an attached bodice (or a matching bodice giving the effect of a one-piece garment). It consists of a top piece that covers the torso and hangs down over the legs. A dress can be any one-piece garment containing a skirt of any length, and can be formal or casual.\r\n\r\n'),
(6, 'Diagonal sweater', '2.jpg ', 100, 'Saint Laurent', 'Amusing designs paired with famous places characterize the House’s collections. The Gucci cherries combine with “Beverly Hills” in the playful motif printed over this off-white heavy felted cotton jersey sweatshirt, designed with long puff sleeves for an unexpected take on a cult silhouette.'),
(7, 'Black T-shirt', '13.png', 200, 'Polo', 'Typically made of cotton textile in a stockinette or jersey knit, it has a distinctively pliable texture compared to shirts made of woven cloth. The manufacture of T-shirts has become highly automated and may include cutting fabric with a laser or a water jet.'),
(8, 'Pink skirt', '8.jpg', 159.49, 'H&M', 'The hemline of skirts can vary from micro to floor-length and can vary according to cultural conceptions of modesty and aesthetics as well as the wearer\'s personal taste, which can be influenced by such factors as fashion and social context. Most skirts are self-standing garments, but some skirt-looking panels may be part of another garment such as leggings, shorts, and swimsuits.'),
(9, 'Girl bikini', '11.jpg', 160, 'H&M', 'A bikini is typically a women\'s two-piece swimsuit featuring two triangles of fabric on top, similar to a bra and covering the woman\'s breasts, and two triangles of fabric on the bottom, the front covering the pelvis but exposing the navel, and the back covering the buttocks.[1][2] The size of the top and bottom can vary from full coverage of the breasts, pelvis, and buttocks, to more revealing designs like a thong or G-string that cover only the areolae and mons pubis, but expose the buttocks.'),
(10, 'Summer collection', '9.jpg', 259.49, 'Zara', 'A bikini is typically a women\'s two-piece swimsuit featuring two triangles of fabric on top, similar to a bra and covering the woman\'s breasts, and two triangles of fabric on the bottom, the front covering the pelvis but exposing the navel, and the back covering the buttocks.[1][2] The size of the top and bottom can vary from full coverage of the breasts, pelvis, and buttocks, to more revealing designs like a thong or G-string that cover only the areolae and mons pubis, but expose the buttocks.'),
(11, 'Winter collection', '2.jpg', 200, 'Zara', 'Amusing designs paired with famous places characterize the House’s collections. The Gucci cherries combine with “Beverly Hills” in the playful motif printed over this off-white heavy felted cotton jersey sweatshirt, designed with long puff sleeves for an unexpected take on a cult silhouette.'),
(12, 'Spring collection ', '1.jpg', 299.99, 'Lacoste\r\n', 'This blazer is a type of jacket resembling a suit jacket, but cut more casually. A blazer is generally distinguished from a sport coat as a more formal garment and tailored from solid color fabrics. Blazers often have naval-style metal buttons to reflect their origins as jackets worn by boating club members.\r\n\r\n');
