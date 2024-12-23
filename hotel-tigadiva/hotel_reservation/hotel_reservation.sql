-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 11:25 PM
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
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `total_payment` decimal(10,2) NOT NULL,
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `guest_name`, `email`, `room_type`, `floor`, `room_number`, `room_id`, `check_in_date`, `check_out_date`, `status`, `payment_status`, `total_payment`, `payment_method`) VALUES
(20, 'nilam', 'nilam@gmail.com', 'Single', 2, 5, 74, '2024-12-24', '2024-12-25', 'Cancelled', 'Pending', 500000.00, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `floor`, `room_number`, `status`) VALUES
(70, 'Single', 2, 1, 'Booked'),
(71, 'Single', 2, 2, 'Booked'),
(72, 'Single', 2, 3, 'Booked'),
(73, 'Single', 2, 4, 'Booked'),
(74, 'Single', 2, 5, 'Available'),
(75, 'Single', 2, 6, 'Available'),
(76, 'Single', 2, 7, 'Available'),
(77, 'Single', 2, 8, 'Available'),
(78, 'Single', 2, 9, 'Available'),
(79, 'Single', 2, 10, 'Available'),
(80, 'Single', 2, 11, 'Available'),
(81, 'Single', 2, 12, 'Available'),
(82, 'Single', 2, 13, 'Available'),
(83, 'Single', 2, 14, 'Available'),
(84, 'Single', 2, 15, 'Available'),
(85, 'Single', 3, 16, 'Available'),
(86, 'Single', 3, 17, 'Available'),
(87, 'Single', 3, 18, 'Available'),
(88, 'Single', 3, 19, 'Available'),
(89, 'Single', 3, 20, 'Available'),
(90, 'Single', 3, 21, 'Available'),
(91, 'Single', 3, 22, 'Available'),
(92, 'Single', 3, 23, 'Available'),
(93, 'Single', 3, 24, 'Available'),
(94, 'Single', 3, 25, 'Available'),
(95, 'Single', 3, 26, 'Available'),
(96, 'Single', 3, 27, 'Available'),
(97, 'Single', 3, 28, 'Available'),
(98, 'Single', 3, 29, 'Available'),
(99, 'Single', 3, 30, 'Available'),
(100, 'Double', 4, 31, 'Booked'),
(101, 'Double', 4, 32, 'Booked'),
(102, 'Double', 4, 33, 'Available'),
(103, 'Double', 4, 34, 'Available'),
(104, 'Double', 4, 35, 'Available'),
(105, 'Double', 4, 36, 'Available'),
(106, 'Double', 4, 37, 'Available'),
(107, 'Double', 4, 38, 'Available'),
(108, 'Double', 4, 39, 'Available'),
(109, 'Double', 4, 40, 'Available'),
(110, 'Double', 4, 41, 'Available'),
(111, 'Double', 4, 42, 'Available'),
(112, 'Double', 4, 43, 'Available'),
(113, 'Double', 4, 44, 'Available'),
(114, 'Double', 4, 45, 'Available'),
(115, 'Double', 4, 46, 'Available'),
(116, 'Double', 4, 47, 'Available'),
(117, 'Double', 4, 48, 'Available'),
(118, 'Double', 4, 49, 'Available'),
(119, 'Double', 4, 50, 'Available'),
(120, 'Double', 5, 51, 'Available'),
(121, 'Double', 5, 52, 'Available'),
(122, 'Double', 5, 53, 'Available'),
(123, 'Double', 5, 54, 'Available'),
(124, 'Double', 5, 55, 'Available'),
(125, 'Double', 5, 56, 'Available'),
(126, 'Double', 5, 57, 'Available'),
(127, 'Double', 5, 58, 'Available'),
(128, 'Double', 5, 59, 'Available'),
(129, 'Double', 5, 60, 'Available'),
(130, 'Double', 5, 61, 'Available'),
(131, 'Double', 5, 62, 'Available'),
(132, 'Double', 5, 63, 'Available'),
(133, 'Double', 5, 64, 'Available'),
(134, 'Double', 5, 65, 'Available'),
(135, 'Double', 5, 66, 'Available'),
(136, 'Double', 5, 67, 'Available'),
(137, 'Double', 5, 68, 'Available'),
(138, 'Double', 5, 69, 'Available'),
(139, 'Double', 5, 70, 'Available'),
(140, 'Suite', 6, 71, 'Available'),
(141, 'Suite', 6, 72, 'Available'),
(142, 'Suite', 6, 73, 'Available'),
(143, 'Suite', 6, 74, 'Available'),
(144, 'Suite', 6, 75, 'Available'),
(145, 'Suite', 6, 76, 'Available'),
(146, 'Suite', 6, 77, 'Available'),
(147, 'Suite', 6, 78, 'Available'),
(148, 'Suite', 6, 79, 'Available'),
(149, 'Suite', 6, 80, 'Available'),
(150, 'Suite', 7, 81, 'Available'),
(151, 'Suite', 7, 82, 'Available'),
(152, 'Suite', 7, 83, 'Available'),
(153, 'Suite', 7, 84, 'Available'),
(154, 'Suite', 7, 85, 'Available'),
(155, 'Suite', 7, 86, 'Available'),
(156, 'Suite', 7, 87, 'Available'),
(157, 'Suite', 7, 88, 'Available'),
(158, 'Suite', 7, 89, 'Available'),
(159, 'Suite', 7, 90, 'Available'),
(160, 'Suite', 7, 91, 'Available'),
(161, 'Suite', 7, 92, 'Available'),
(162, 'Suite', 7, 93, 'Available'),
(163, 'Suite', 7, 94, 'Available'),
(164, 'Suite', 7, 95, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(5, '', 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(12, 'nilam', 'nilam@gmail.com', 'f4bb63f4e4743e070ee2f562e3cad826', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
