-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: btkd4fugj67roxefnqpx-mysql.services.clever-cloud.com:3306
-- Generation Time: May 19, 2021 at 10:13 AM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btkd4fugj67roxefnqpx`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID_MOVE` int NOT NULL,
  `PAYER` varchar(100) NOT NULL,
  `COLLECTOR` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'admin@erlete.eus',
  `DATE` date NOT NULL,
  `AMOUNT` float NOT NULL,
  `CONCEPT` varchar(100) DEFAULT NULL,
  `TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID_MOVE`, `PAYER`, `COLLECTOR`, `DATE`, `AMOUNT`, `CONCEPT`, `TOTAL`) VALUES
(10, 'mocholo@mail.com', 'admin@erlete.eus', '2021-05-18', 50, '2021', NULL),
(11, 'mocholo@mail.com', 'admin@erlete.eus', '2021-05-18', 50, '2021', NULL),
(12, 'mocholo@mail.com', 'admin@erlete.eus', '2021-05-18', 50, '2021', NULL),
(13, 'mocholo@mail.com', 'admin@erlete.eus', '2021-05-19', 5, 'taxes', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `ID_BOOKING` int NOT NULL,
  `DATE` date NOT NULL,
  `MAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`ID_BOOKING`, `DATE`, `MAIL`) VALUES
(1, '2021-05-11', 'member@mail.com'),
(2, '2021-05-13', 'rubensantibanezacosta902@gmail.com'),
(19, '2021-05-25', 'member@mail.com'),
(25, '2021-05-29', 'member@mail.com'),
(28, '2021-05-28', 'member@mail.com'),
(31, '2021-05-22', 'mocholo@mail.com'),
(32, '2021-05-18', 'mocholo@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cans`
--

CREATE TABLE `cans` (
  `ID_CAN` int NOT NULL,
  `CAPACITY` int NOT NULL,
  `PRICE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cans`
--

INSERT INTO `cans` (`ID_CAN`, `CAPACITY`, `PRICE`) VALUES
(1, 100, NULL),
(2, 100, NULL),
(3, 100, NULL),
(4, 150, NULL),
(5, 150, NULL),
(6, 150, NULL),
(7, 250, NULL),
(8, 500, NULL),
(9, 150, NULL),
(10, 150, 15);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `ID_FEE` int NOT NULL,
  `YEAR` int NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `AMOUNT` float NOT NULL,
  `PAYED` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`ID_FEE`, `YEAR`, `MAIL`, `AMOUNT`, `PAYED`) VALUES
(1, 2021, 'mocholo@mail.com', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `DNI` varchar(15) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `SURNAME` varchar(150) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ACCOUNT` varchar(100) NOT NULL,
  `ADMIN` tinyint NOT NULL DEFAULT '0',
  `ACTIVE` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`DNI`, `NAME`, `SURNAME`, `MAIL`, `PASSWORD`, `ACCOUNT`, `ADMIN`, `ACTIVE`) VALUES
('12221', 'Maitane', 'Gallastegui', 'admin@erlete.eus', 'Admin123', '32552532', 1, 1),
('431441D', 'Manuel', 'Moreno', 'manuel@erlete.eus', '2345', '323552', 0, 1),
('1234', 'member', 'member', 'member@mail.com', '1234', '1234', 0, 1),
('64566546546', 'Mochales', 'Mocholo', 'mocholo@mail.com', '1234', '32118676432', 0, 1),
('1111A', 'Pepe', 'Gonzalez', 'pepegonzo@gmail.com', 'Pe1234', '123456', 0, 1),
('4455445544H', 'Ruben', 'Santibañez', 'rubensantibanezacosta902@gmail.com', '1234', '111222211111', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `MAIL` varchar(100) NOT NULL,
  `ID_PRO` int NOT NULL,
  `DATE` date NOT NULL,
  `KILOS` float NOT NULL,
  `TAX` float NOT NULL,
  `PAYED` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`MAIL`, `ID_PRO`, `DATE`, `KILOS`, `TAX`, `PAYED`) VALUES
('mocholo@mail.com', 104, '2021-05-19', 20, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `using_cans`
--

CREATE TABLE `using_cans` (
  `MAIL` varchar(100) NOT NULL,
  `ID_CAN` int NOT NULL,
  `DATE` date NOT NULL,
  `DATE2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `using_cans`
--

INSERT INTO `using_cans` (`MAIL`, `ID_CAN`, `DATE`, `DATE2`) VALUES
('mocholo@mail.com', 1, '2021-05-19', '2021-06-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_MOVE`),
  ADD KEY `FK_MEMBERS_SACCOUNT` (`PAYER`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID_BOOKING`),
  ADD KEY `FK_MEMBERS_BOOKINGS` (`MAIL`);

--
-- Indexes for table `cans`
--
ALTER TABLE `cans`
  ADD PRIMARY KEY (`ID_CAN`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`ID_FEE`),
  ADD KEY `FK_MEMBERS_FEES` (`MAIL`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MAIL`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`ID_PRO`),
  ADD KEY `FK_MEMBERS_PRODUCTIONS` (`MAIL`);

--
-- Indexes for table `using_cans`
--
ALTER TABLE `using_cans`
  ADD PRIMARY KEY (`MAIL`,`ID_CAN`,`DATE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID_MOVE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID_BOOKING` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `ID_FEE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `ID_PRO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_MEMBERS_SACCOUNT` FOREIGN KEY (`PAYER`) REFERENCES `members` (`MAIL`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_MEMBERS_BOOKINGS` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK_MEMBERS_FEES` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Constraints for table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `FK_MEMBERS_PRODUCTIONS` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Constraints for table `using_cans`
--
ALTER TABLE `using_cans`
  ADD CONSTRAINT `FK_MEMBERS_CANSUSE` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
