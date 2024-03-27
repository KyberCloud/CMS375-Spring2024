-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2024 at 08:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FoxEats`
--

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

CREATE TABLE `Food` (
  `Food_Option` varchar(255) NOT NULL,
  `Price` decimal(5,2) DEFAULT NULL,
  `Food_Description` text DEFAULT NULL,
  `Food_Category` varchar(255) DEFAULT NULL,
  `Dining_Service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`Food_Option`, `Price`, `Food_Description`, `Food_Category`, `Dining_Service`) VALUES
('Beef Tacos', 5.99, 'Spicy beef tacos with salsa and cheese', 'Mexican', 'Taco Truck'),
('Butter Chicken', 10.99, 'Creamy butter chicken served with rice', 'Indian', 'Curry House'),
('Cheese Pizza', 8.99, 'Classic cheese pizza with marinara sauce', 'Italian', 'Main Cafe'),
('Chicken Salad', 6.99, 'Grilled chicken salad with mixed greens', 'Healthy', 'Salad Bar'),
('Chocolate Cake', 4.99, 'Rich chocolate cake with fudge icing', 'Dessert', 'Bakery'),
('Falafel Wrap', 6.99, 'Falafel with hummus and veggies in a wrap', 'Middle Eastern', 'Mediterranean Deli'),
('Pad Thai', 8.99, 'Stir-fried noodles with shrimp and peanuts', 'Thai', 'Noodle Shop'),
('Pulled Pork Sandwich', 7.99, 'Slow-cooked pulled pork with BBQ sauce', 'American', 'Smokehouse'),
('Sushi Roll', 9.99, 'Fresh salmon sushi roll with avocado', 'Japanese', 'Sushi Counter'),
('Veggie Burger', 7.99, 'Plant-based burger with lettuce and tomato', 'American', 'Grill Station');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `order_history` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`order_id`, `username`, `order_history`, `status`, `update`, `rating`) VALUES
(1, 'johndoe', 'Burger, Fries', 'Delivered', '2024-03-26 18:30:00', 4),
(2, 'janedoe', 'Salad, Soup', 'Preparing', '2024-03-26 18:35:00', 5),
(3, 'mikeb', 'Pizza, Soda', 'Delivered', '2024-03-26 18:40:00', 3),
(4, 'sarahc', 'Pasta, Wine', 'Cancelled', '2024-03-26 18:45:00', 2),
(5, 'alexl', 'Sushi, Tea', 'Delivered', '2024-03-26 18:50:00', 5),
(6, 'emilyf', 'Tacos, Lemonade', 'Delivered', '2024-03-26 18:55:00', 4),
(7, 'danielm', 'Steak, Beer', 'Preparing', '2024-03-26 19:00:00', 5),
(8, 'oliviap', 'Curry, Rice', 'Delivered', '2024-03-26 19:05:00', 4),
(9, 'williamr', 'Sandwich, Chips', 'Delivered', '2024-03-26 19:10:00', 3),
(10, 'avas', 'Ice Cream, Cake', 'Delivered', '2024-03-26 19:15:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `FoxID` int(11) NOT NULL,
  `Credit_Card` varchar(19) DEFAULT NULL,
  `Balance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`FoxID`, `Credit_Card`, `Balance`) VALUES
(101, '1234-5678-9123-4567', 120.00),
(102, '2345-6789-0123-4568', 95.50),
(103, '3456-7890-1234-5679', 80.75),
(104, '4567-8901-2345-6780', 60.00),
(105, '5678-9012-3456-7891', 45.25),
(106, '6789-0123-4567-8902', 30.50),
(107, '7890-1234-5678-9013', 15.75),
(108, '8901-2345-6789-0124', 100.00),
(109, '9012-3456-7890-1235', 85.25),
(110, '0123-4567-8901-2346', 70.50);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`, `contact_number`, `building`) VALUES
('alexl', 'hashedpass5', '407-555-0345', 'Cedar Residence'),
('avas', 'hashedpass10', '407-555-0234', 'Ivy Residence'),
('danielm', 'hashedpass7', '407-555-0789', 'Fir Residence'),
('emilyf', 'hashedpass6', '407-555-0567', 'Elm Residence'),
('janedoe', 'hashedpass2', '407-555-0456', 'Oak Residence'),
('johndoe', 'hashedpass1', '407-555-0123', 'Pine Residence'),
('mikeb', 'hashedpass3', '407-555-0789', 'Maple Residence'),
('oliviap', 'hashedpass8', '407-555-0987', 'Grove Residence'),
('sarahc', 'hashedpass4', '407-555-0124', 'Birch Residence'),
('williamr', 'hashedpass9', '407-555-0456', 'Holly Residence');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`Food_Option`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`FoxID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`username`) REFERENCES `User` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
