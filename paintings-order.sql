-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paintings-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(30, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(31, 'Shruthi Kalaiselvan', 'Shruthi', '539fd53b59e3bb12d203f45a912eeaf2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(5, 'Acrylic Painting', 'Food_Category_794.jpg', 'Yes', 'Yes'),
(8, 'Oil Paintings', 'Food_Category_493.jpg', 'Yes', 'Yes'),
(9, 'Soft Pastels', 'Food_Category_351.jpg', 'Yes', 'Yes'),
(10, 'Water Colours', 'Food_Category_504.jpg', 'No', 'Yes'),
(12, 'Oil Pastels', 'Food_Category_704.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `paintings` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `paintings`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(3, 'Fish', '10.00', 1, '10.00', '2022-11-07 04:40:53', 'Cancelled', 'shruthi', '9840157071', 'shruthi@gmail.com', 'kolathur'),
(4, 'Blue Moonlight', '14.00', 1, '14.00', '2022-11-07 04:41:19', 'On Delivery', 'latha', '9360830689', 'latha@gmail.com', 'Egmore'),
(5, 'Blue eyed cat ', '13.00', 1, '13.00', '2022-11-07 04:41:52', 'Delivered', 'Ilakia S R', '9078956789', 'ilakia@gmail.com', 'Nazarathpet'),
(6, 'Waterfalls', '7.00', 1, '7.00', '2022-11-07 04:44:25', 'Delivered', 'Shreeram', '9845628945', 'shreeram@gmail.com', 'OMR'),
(7, 'Flower', '10.00', 1, '10.00', '2022-11-07 04:45:10', 'Ordered', 'Santhosh', '9674556783', 'santhosh@gmail.com', 'Ambattur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paintings`
--

CREATE TABLE `tbl_paintings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paintings`
--

INSERT INTO `tbl_paintings` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(7, 'Fish', 'Koy Fish', '10.00', 'Painting-Name-8570.jpg', 5, 'No', 'Yes'),
(8, 'Cow', 'Acrylic Painting - Cow', '9.00', 'Painting-Name-6563.jpg', 5, 'No', 'Yes'),
(9, 'Covid', 'Women affected by covid', '13.00', 'Painting-Name-1088.jpg', 5, 'Yes', 'Yes'),
(10, 'Boat', 'This painting uses a lot of color, but the most color is concentrated within the boats, creating the focal point and grabbing attention.', '15.00', 'Painting-Name-2953.jpg', 5, 'Yes', 'Yes'),
(11, 'Blue Moonlight', 'Oil Painting On Canvas By Leonid Afremov', '14.00', 'Painting-Name-9415.jpg', 8, 'Yes', 'Yes'),
(12, 'Venice', 'Chuck Larivey - Venice another time', '16.00', 'Painting-Name-1680.jpg', 8, 'Yes', 'Yes'),
(13, 'Lemon', 'Lemon Paiting', '8.00', 'Painting-Name-4208.jpg', 8, 'No', 'Yes'),
(15, 'Sunset', 'Sunset Walk - Marla Baggetta', '6.00', 'Painting-Name-7170.jpg', 9, 'Yes', 'Yes'),
(16, 'Blue eyed cat ', 'portrait Art Print by Karen Kaspar', '13.00', 'Painting-Name-9470.jpg', 9, 'Yes', 'Yes'),
(17, 'Girl', 'Pastel Griserie Intoxication', '6.00', 'Painting-Name-2588.jpg', 9, 'No', 'Yes'),
(18, 'Waterfalls', 'Snoqualmie Falls', '7.00', 'Painting-Name-4494.jpg', 10, 'Yes', 'Yes'),
(19, 'Penguin', 'A Christmas painting', '4.00', 'Painting-Name-6050.jpg', 10, 'Yes', 'Yes'),
(20, 'Portrait', 'Pastel portrait 2 by bloodyman88 on DeviantArt', '6.00', 'Painting-Name-5898.jpg', 12, 'Yes', 'Yes'),
(21, 'Flower', 'Impressionist Oil Pastel Landscape', '10.00', 'Painting-Name-5123.jpg', 12, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paintings`
--
ALTER TABLE `tbl_paintings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_paintings`
--
ALTER TABLE `tbl_paintings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
