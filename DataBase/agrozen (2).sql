-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrozen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(1, 'admin@gmail.com', 'admin@123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Time` time NOT NULL,
  `Date` text NOT NULL,
  `Location` text NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `Title`, `Description`, `Time`, `Date`, `Location`, `Image`) VALUES
(1, 'AGRO VISION', 'The theme of the Agri Vision- 2024 Conference is “Economic Development through Sustainable Agriculture Practices – Together We Make it Possible”. The Sessions of Agri Vision will discuss agricultural practices designed to protect the environment, eliminate & reduce greenhouse effects, enhance soil quality and fertility to protect crops, and preserve the Earth’s natural resources for future generations.', '12:00:00', '2024-04-11', 'Opp. Isckon,V.V Nagar, Anand', 'images19184335_6037944.jpg'),
(2, 'J&K APPLE CONCLAVE', 'It will address the various issues that Apple growers are currently facing, as well as provide methods and trends for molding future business chances and possibilities. Furthermore, it will provide investigative insight into the best business strategies in the age of invention and novelty.', '10:30:00', '2024-05-21', 'Circuit House,Fudam, Diu', 'imagesApple.jpg'),
(3, 'FARMTECH ASIA 2024', 'FarmTech Asia is an international conference and exhibition on cutting-edge technologies linked to agriculture, horticulture, dairy, and food processing. The largest and most successful agriculture exhibition in Madhya Pradesh and Chhattisgarh, India, is called FarmTech Asia.', '09:00:00', '2024-03-25', 'Maruti Solaris,Tower Chowk, Vadodra', 'imagesFarmtech.jpg'),
(4, 'INDIA HEMP EXPO 2024', 'The India Hemp Expo 2024 will showcase a wide range of hemp-related products, from foods and cosmetics to textiles and pharmaceuticals. The event will host notable delegates, industry practitioners, consumers, and stakeholders. Featuring an opening session, research paper presentations, and the prestigious India Hemp Awards gala evening, the expo promises to be a memorable affair.', '10:00:00', '2024-04-30', 'Opp. River Front,Gandhi Chowk, Ahmedabad', 'image_female.jpg'),
(5, 'INDO AG-CON', 'The conference is business and technology focused and expected to cover a range of crop types, such as leafy greens, mushrooms, insects, aquaculture and medicinal plants. Organizers say it’s perfect for anyone starting or sustainably scaling up their operations.', '09:00:00', '2024-05-04', 'Near D-Mart,V.V Nagar, Anand', 'imagesIndo.jpg'),
(6, 'WORLD AGTI-TECH INNO', 'More than 2,500 global leaders and businesses dedicated to advancing and investing in technologies to build a stronger, more resilient agriculture and food supply chain come together for themed breakout sessions, startup pitches, investor opportunities, networking meals and more', '10:30:00', '2024-06-25', 'Shine Hall, Tower Chowk, Vadodra', 'imagesfarmer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_add_prod`
--

CREATE TABLE `farmer_add_prod` (
  `prod_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_quant` int(10) NOT NULL,
  `prod_cat` varchar(20) NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `farmer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_add_prod`
--

INSERT INTO `farmer_add_prod` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_quant`, `prod_cat`, `main_img`, `farmer_name`) VALUES
(473, 'apple', 190, 'gfsergeg', 25, 'fruits', 'apple.jpeg', 'himanshu');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`no`, `id`, `file_name`, `uploaded_on`, `status`) VALUES
(13, 3, 'agro_dfd_2 (1).png', '2024-03-10 10:18:39', '1'),
(14, 3, 'agro_dfd_2 (1).png', '2024-03-10 10:26:52', '1'),
(15, 4, 'WhatsApp Image 2024-02-16 at 12.31.50 AM.jpeg', '2024-03-10 18:08:15', '1'),
(16, 5, 'WhatsApp Image 2024-02-16 at 12.50.11 AM.jpeg', '2024-03-10 18:15:04', '1'),
(17, 6, 'mango4.jpeg', '2024-03-10 23:29:52', '1'),
(18, 6, 'mango3.jpeg', '2024-03-10 23:29:52', '1'),
(19, 6, 'mango2.jpeg', '2024-03-10 23:29:52', '1'),
(20, 7, 'moong4.jpeg', '2024-03-10 23:50:57', '1'),
(21, 7, 'moong3.jpeg', '2024-03-10 23:50:57', '1'),
(22, 7, 'moong2.jpeg', '2024-03-10 23:50:57', '1'),
(23, 1111, 'Screenshot (7).png', '2024-03-30 11:16:02', '1'),
(24, 1111, 'Screenshot (8).png', '2024-03-30 11:16:02', '1'),
(25, 1111, 'Screenshot (9).png', '2024-03-30 11:16:02', '1'),
(26, 1111, 'Screenshot (10).png', '2024-03-30 11:16:02', '1'),
(27, 473, 'strawberry.jpeg', '2024-03-31 22:28:57', '1'),
(28, 473, 'strawberry.jpeg', '2024-03-31 22:29:14', '1'),
(29, 473, 'strawberry.jpeg', '2024-03-31 22:37:33', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(15, 'jaivikj93@gmail.com', '816392'),
(16, 'jaivikj93@gmail.com', '790165'),
(17, 'jaivikj93@gmail.com', '319347');

-- --------------------------------------------------------

--
-- Table structure for table `product_view`
--

CREATE TABLE `product_view` (
  `prod_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_quant` int(10) NOT NULL,
  `prod_cat` varchar(20) NOT NULL,
  `main_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_view`
--

INSERT INTO `product_view` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_quant`, `prod_cat`, `main_img`) VALUES
(3, 'corn', 500, 'super corn', 25, 'crops', 'corn.jpeg'),
(4, 'wheat', 1000, 'super wheat', 25, 'crops', 'wheat.jpeg'),
(5, 'rice', 1200, 'super rice', 25, 'crops', 'rice.jpeg'),
(6, 'mango', 330, 'SWEET MANGO JUICE', 12, 'fruits', 'mango.jpeg'),
(7, 'moong', 120, 'protienFull moong', 50, 'cereals', 'moong.jpeg'),
(12, 'strawberry', 50, 'afaefaefrazrgrff', 10, 'fruits', 'strawberry.jpeg'),
(1111, 'banana', 10, 'segeseesg', 1111, 'fruits', 'Screenshot 2024-03-07 095534.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` text NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `ProfileImage` text NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `Phone`, `Role`, `ProfileImage`, `Gender`) VALUES
(2, 'Luffy', 'luffy123@gmail.com', '$2y$10$R4G0cq1UdShaldKKFpP/l.zFg/8/Oj12pkm1YIP2vCnuztaHjhW/C', 9898989898, 'consumer', 'luffy.jpeg', 'Male'),
(3, 'Zoro', 'zoro@gmail.com', '$2y$10$.NoiXhwYp75Q4muoFLSYQuw.B94763LOOpWKfHkpnVGVEOEnUhk0a', 9276805977, 'farmer', 'zoro.jpeg', 'Male'),
(4, 'Jaivik', 'jaivikj93@gmail.com', '$2y$10$MS..3D389KIPEah9zLR1..OFhpcCWwVWrQ7t92s1RN2XkQf7tnGvm', 6598784512, 'consumer', 'jaivik.jpg', 'Male'),
(5, 'Nami', 'nami@gmail.com', '$2y$10$qcmpsPiehPb932gl7rqD2eAnuARV9Fpaz54Aoh2xJ9SNWn.6BrEQm', 9898989894, 'farmer', 'divya.png', 'female'),
(6, 'himanshu', 'himanshupam63@gmail.com', '$2y$10$lbDV8JW5ufOavc.pwdAVROo0jvmqCYWKNZ2nzXRvLMJBOcBsKMeIW', 8306355455, 'farmer', 'Screenshot (4).png', 'male'),
(7, 'adi kapadia', 'adi@123gmail.com', '$2y$10$OBLl6NniaUlASYGEP5hefu9rk6CXaMssAokywOJILl1EUXhWeoULO', 8732934649, 'consumer', 'moong4.jpeg', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_view`
--
ALTER TABLE `product_view`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_view`
--
ALTER TABLE `product_view`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
