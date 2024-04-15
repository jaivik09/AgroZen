-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 06:52 PM
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
-- Table structure for table `events_reg`
--

CREATE TABLE `events_reg` (
  `id` int(11) NOT NULL,
  `R_id` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Time` time NOT NULL,
  `Location` text NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_reg`
--

INSERT INTO `events_reg` (`id`, `R_id`, `Title`, `Date`, `Time`, `Location`, `Email`) VALUES
(2, '1aurBrbS', 'AGRO VISION', '2024-04-11', '12:00:00', 'Opp. Isckon,V.V Nagar, Anand', 'jaivikj93@gmail.com'),
(3, 'IMnRJBE8', 'INDIA HEMP EXPO 2024', '2024-04-30', '10:00:00', 'Opp. River Front,Gandhi Chowk, Ahmedabad', 'luffy123@gmail.com'),
(4, 'eQkLpDN6', 'FARMTECH ASIA 2024', '2024-03-25', '09:00:00', 'Maruti Solaris,Tower Chowk, Vadodra', 'jaivikj93@gmail.com'),
(5, 'nfPWtSlV', 'INDO AG-CON', '2024-05-04', '09:00:00', 'Near D-Mart,V.V Nagar, Anand', 'zoro@gmail.com'),
(10, 'e69JEqH0', 'J&K APPLE CONCLAVE', '2024-05-21', '10:30:00', 'Circuit House,Fudam, Diu', 'jaivikj93@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_reg`
--
ALTER TABLE `events_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_reg`
--
ALTER TABLE `events_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
