-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2021 a las 08:12:05
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erlete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE `account` (
  `ID_MOVE` int(11) NOT NULL,
  `PAYER` varchar(100) NOT NULL,
  `COLLECTOR` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `AMOUNT` float NOT NULL,
  `CONCEPT` varchar(100) DEFAULT NULL,
  `TOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `ID_BOOKING` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `MAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`ID_BOOKING`, `DATE`, `MAIL`) VALUES
(1, '2021-05-11', 'member@mail.com'),
(2, '2021-05-13', 'rubensantibanezacosta902@gmail.com'),
(13, '2021-05-15', 'member@mail.com'),
(14, '2021-05-26', 'member@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cans`
--

CREATE TABLE `cans` (
  `ID_CAN` int(11) NOT NULL,
  `CAPACITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fees`
--

CREATE TABLE `fees` (
  `ID_FEE` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `PAYED` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `DNI` varchar(15) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `SURNAME` varchar(150) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ACCOUNT` varchar(100) NOT NULL,
  `ADMIN` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`DNI`, `NAME`, `SURNAME`, `MAIL`, `PASSWORD`, `ACCOUNT`, `ADMIN`) VALUES
('1234', 'member', 'member', 'member@mail.com', '1234', '1234', 0),
('4455445544H', 'Ruben', 'Santibañez', 'rubensantibanezacosta902@gmail.com', '1234', '111222211111', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productions`
--

CREATE TABLE `productions` (
  `MAIL` varchar(100) NOT NULL,
  `ID_PRO` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `KILOS` float NOT NULL,
  `TAX` float NOT NULL,
  `PAYED` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `using_cans`
--

CREATE TABLE `using_cans` (
  `MAIL` varchar(100) NOT NULL,
  `ID_CAN` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_MOVE`),
  ADD KEY `FK_MEMBERS_SACCOUNT` (`PAYER`);

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID_BOOKING`),
  ADD KEY `FK_MEMBERS_BOOKINGS` (`MAIL`);

--
-- Indices de la tabla `cans`
--
ALTER TABLE `cans`
  ADD PRIMARY KEY (`ID_CAN`);

--
-- Indices de la tabla `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`ID_FEE`),
  ADD KEY `FK_MEMBERS_FEES` (`MAIL`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MAIL`);

--
-- Indices de la tabla `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`ID_PRO`),
  ADD KEY `FK_MEMBERS_PRODUCTIONS` (`MAIL`);

--
-- Indices de la tabla `using_cans`
--
ALTER TABLE `using_cans`
  ADD PRIMARY KEY (`MAIL`,`ID_CAN`,`DATE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `ID_MOVE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID_BOOKING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `fees`
--
ALTER TABLE `fees`
  MODIFY `ID_FEE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productions`
--
ALTER TABLE `productions`
  MODIFY `ID_PRO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_MEMBERS_SACCOUNT` FOREIGN KEY (`PAYER`) REFERENCES `members` (`MAIL`);

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_MEMBERS_BOOKINGS` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Filtros para la tabla `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK_MEMBERS_FEES` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Filtros para la tabla `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `FK_MEMBERS_PRODUCTIONS` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);

--
-- Filtros para la tabla `using_cans`
--
ALTER TABLE `using_cans`
  ADD CONSTRAINT `FK_MEMBERS_CANSUSE` FOREIGN KEY (`MAIL`) REFERENCES `members` (`MAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
