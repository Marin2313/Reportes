-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2022 a las 00:02:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Vehiculo` varchar(255) NOT NULL,
  `Concepto` varchar(255) NOT NULL,
  `Estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`ID`, `Fecha`, `Vehiculo`, `Concepto`, `Estatus`) VALUES
(37, '2022-04-24', 'Torton', 'Prueba1 24', 'Okey'),
(38, '2022-04-24', 'Trailer', 'Prueba2 24', 'Inconcluso'),
(39, '2022-04-24', 'Tractor', 'Prueba 24', 'Okey'),
(40, '2022-04-25', 'Tractor', 'Prueba 1 editado 25', 'Inconcluso'),
(41, '2022-04-25', 'Tractor', 'Prueba 2 25', 'Inconcluso'),
(42, '2022-04-25', 'Torton', 'Prueba 3 25', 'Inconcluso'),
(43, '2022-04-25', 'Tractocamion', 'Prueba 5 25', 'Okey'),
(44, '2022-04-26', 'Tractocamion', 'Prueba 1 Editada 26', 'Okey'),
(45, '2022-04-26', 'Tractor', 'Prueba 2 26', 'Okey'),
(46, '2022-04-26', 'Tractocamion', 'Prueba 3 26', 'Inconcluso'),
(47, '2022-04-28', 'Torton', 'Prueba 1 Editada 28', 'Okey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `ID` int(11) NOT NULL,
  `Conductor` varchar(255) NOT NULL,
  `Vehiculo` varchar(255) NOT NULL,
  `Rancho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`ID`, `Conductor`, `Vehiculo`, `Rancho`) VALUES
(7, 'Andres', 'Tractocamion', 'Poza Rica'),
(8, 'Alberto', 'Torton', 'Coatzintla'),
(9, 'Carlos', 'Tractor', 'Poza rica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
