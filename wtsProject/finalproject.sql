-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 06:55 PM
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
-- Database: `finalproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_crud` (IN `p_Dog_Id` INT)   BEGIN
    DELETE FROM Inventory WHERE id = p_Dog_Id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_crud` (IN `p_Dogname` VARCHAR(255), IN `p_Dogbreed_id` INT, IN `p_DateOfBirth` DATE, IN `p_Weight` DECIMAL(5,2))   BEGIN
    INSERT INTO Inventory (Dogname, Dogbreed_id, DateOfBirth, Weight)
    VALUES (p_Dogname, p_Dogbreed_id, p_DateOfBirth, p_Weight);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_crud` (IN `p_Dog_Id` INT, IN `p_Dogname` VARCHAR(255), IN `p_Dogbreed_id` INT, IN `p_DateOfBirth` DATE, IN `p_Weight` DECIMAL(5,2))   BEGIN
    UPDATE Inventory
    SET
        Dogname = p_Dogname,
        Dogbreed_id = p_Dogbreed_id,
        DateOfBirth = p_DateOfBirth,
        Weight = p_Weight
    WHERE id = p_Id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dogbreed`
--

CREATE TABLE `dogbreed` (
  `id` int(11) NOT NULL,
  `breed_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogbreed`
--

INSERT INTO `dogbreed` (`id`, `breed_name`) VALUES
(1, 'Siberian Husky'),
(2, 'Golden Retriever'),
(3, 'Shitzhu');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Dog_id` int(11) NOT NULL,
  `Dogname` varchar(255) NOT NULL,
  `Dogbreed_id` int(11) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Weight` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Dog_id`, `Dogname`, `Dogbreed_id`, `DateOfBirth`, `Weight`) VALUES
(1, 'Naruto', 1, '2023-11-01', 12.50),
(4, 'hotdog', 2, '2013-12-02', 14.00),
(5, 'hatchiko', 2, '2023-11-01', 12.50);

-- --------------------------------------------------------

--
-- Table structure for table `logintbl`
--

CREATE TABLE `logintbl` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintbl`
--

INSERT INTO `logintbl` (`username`, `password`) VALUES
('dex', 'admin'),
('jelo', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogbreed`
--
ALTER TABLE `dogbreed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Dog_id`),
  ADD KEY `Dogbreed_id` (`Dogbreed_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Dogbreed_id`) REFERENCES `dogbreed` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
