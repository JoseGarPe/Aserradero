-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 19:34:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aserradero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bodega`
--

CREATE TABLE `detalle_bodega` (
  `id_detalle_bodega` int(11) NOT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD PRIMARY KEY (`id_detalle_bodega`),
  ADD KEY `FK_DETLALE_1` (`id_bodega`),
  ADD KEY `FK_DETLALE_2` (`id_material`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `id_detalle_bodega` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD CONSTRAINT `FK_DETLALE_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `FK_DETLALE_2` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
