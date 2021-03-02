-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2021 a las 16:32:12
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spacex`
--
CREATE DATABASE IF NOT EXISTS `spacex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spacex`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `launches`
--

CREATE TABLE `launches` (
  `flight_number` int(11) NOT NULL,
  `mission_name` varchar(15) NOT NULL,
  `launch_year` year(4) NOT NULL,
  `rocket_name` varchar(15) NOT NULL,
  `launch_site` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `launches`
--

INSERT INTO `launches` (`flight_number`, `mission_name`, `launch_year`, `rocket_name`, `launch_site`) VALUES
(1, 'FalconSat', 2006, 'Falcon 1', 'Kwajalein Atoll'),
(2, 'DemoSat', 2020, 'Falcon 1', 'Kwajalein Atoll');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `account_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(125) NOT NULL,
  `role` enum('administrador','regular') NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`account_id`, `username`, `pass`, `fullname`, `email`, `address`, `role`) VALUES
(1, 'admin', '$2y$12$BrpJbiwsBxNiQFLfUEBagOpkIU71bbf3S/HA3EyymzXjxMbPs7PiK', 'Administrador', 'admin@spacex.com', 'El Valle del Espíritu Santo', 'administrador'),
(2, 'regular', '$2y$12$H.9Vd/ooPyN7vFHS5fyXOOsJLVN8O.8b0v.CwYT.4h1Q6iL8cMa0W', 'Regular', 'regular@spacex.com', 'El Valle del Esp&iacute;ritu Santo', 'regular');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `launches`
--
ALTER TABLE `launches`
  ADD UNIQUE KEY `flight_number` (`flight_number`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `launches`
--
ALTER TABLE `launches`
  MODIFY `flight_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
