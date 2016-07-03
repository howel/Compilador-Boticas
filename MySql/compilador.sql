-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2016 a las 05:08:04
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compilador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codcliente` int(11) NOT NULL,
  `dnicliente` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `appaterno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apmaterno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `db` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codcliente`, `dnicliente`, `nombre`, `appaterno`, `apmaterno`, `direccion`, `email`, `celular`, `db`, `sexo`, `estado`) VALUES
(1, '12345677', 'ANDREA', 'Lopez', 'Hernandez', 'Jr. Lima 50', 'garu971@hotmail.com', '987456685', 'INKAFARMA', 'Femenino', 1),
(2, '56510211', 'Pedro', 'Garro', 'Uriarte', 'Jr. Peru 150', 'pedro@hotmail.com', '987456685', 'INKAFARMA', 'Masculino', 1),
(3, '32652215', 'Diana', 'Guerra', 'Gonzales', 'Av. Arequipa 1050', 'diana1@hotmail.com', '987456685', 'INKAFARMA', 'Femenino', 1),
(4, '98567401', 'Antony', 'Amacifuen', 'Cotrina', 'Jr. Sucre 950', 'anto@hotmail.com', '987456685', 'INKAFARMA', 'Masculino', 1),
(5, '98765432', 'Esthefany', 'Ramirez', 'Delgado', 'Jr. Junin 650', 'esthefany@hotmail.com', '987456685', 'INKAFARMA', 'Femenino', 1),
(6, '71072969', 'Jhowel', 'Altamirano', 'Vega', 'Jr. Sucre 46', 'jhoalve@gmail.com', '969979954', 'INKAFARMA', 'Masculino', 1),
(7, '71082943', 'Ciro', 'Ramirez', 'Perez', 'Jr. Moyobamba 283', 'kaleta_17@hotmail.com', '942789354', 'INKAFARMA', 'Masculino', 1),
(8, '72573645', 'Aby', 'Ruiz ', 'Torres', 'Jr. Ulis 342', 'vero@gmail.com', '943567231', 'INKAFARMA', 'Masculino', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
