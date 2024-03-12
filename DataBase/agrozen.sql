-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 07:25 AM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `Title`, `Description`, `Image`) VALUES
(1, 'AGRO VISION', 'The theme of the Agri Vision- 2024 Conference is “Economic Development through Sustainable Agriculture Practices – Together We Make it Possible”. The Sessions of Agri Vision will discuss agricultural practices designed to protect the environment, eliminate & reduce greenhouse effects, enhance soil quality and fertility to protect crops, and preserve the Earth’s natural resources for future generations.', 'images19184335_6037944.jpg'),
(2, 'J&K APPLE CONCLAVE', 'It will address the various issues that Apple growers are currently facing, as well as provide methods and trends for molding future business chances and possibilities. Furthermore, it will provide investigative insight into the best business strategies in the age of invention and novelty.', 'imagesApple.jpg'),
(3, 'FARMTECH ASIA 2024', 'FarmTech Asia is an international conference and exhibition on cutting-edge technologies linked to agriculture, horticulture, dairy, and food processing. The largest and most successful agriculture exhibition in Madhya Pradesh and Chhattisgarh, India, is called FarmTech Asia.', 'imagesFarmtech.jpg'),
(4, 'INDIA HEMP EXPO 2024', 'The India Hemp Expo 2024 will showcase a wide range of hemp-related products, from foods and cosmetics to textiles and pharmaceuticals. The event will host notable delegates, industry practitioners, consumers, and stakeholders. Featuring an opening session, research paper presentations, and the prestigious India Hemp Awards gala evening, the expo promises to be a memorable affair.', 'image_female.jpg'),
(5, 'INDO AG-CON', 'The conference is business and technology focused and expected to cover a range of crop types, such as leafy greens, mushrooms, insects, aquaculture and medicinal plants. Organizers say it’s perfect for anyone starting or sustainably scaling up their operations.', 'imagesIndo.jpg'),
(6, 'WORLD AGTI-TECH INNO', 'More than 2,500 global leaders and businesses dedicated to advancing and investing in technologies to build a stronger, more resilient agriculture and food supply chain come together for themed breakout sessions, startup pitches, investor opportunities, networking meals and more', 'imagesfarmer.jpg');

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
(5, 'Nami', 'nami@gmail.com', '$2y$10$qcmpsPiehPb932gl7rqD2eAnuARV9Fpaz54Aoh2xJ9SNWn.6BrEQm', 9898989894, 'farmer', 'divya.png', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
