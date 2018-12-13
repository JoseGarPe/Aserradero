-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2018 a las 19:48:57
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
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id_temporal` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `cantidad` int(111) DEFAULT NULL,
  `id_preset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id_temporal`),
  ADD KEY `FK_TEMPORAL_BODEGA` (`id_bodega`),
  ADD KEY `FK_TEMP_MATERIAL` (`id_material`),
  ADD KEY `FK_TEMP_PRESET` (`id_preset`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id_temporal` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD CONSTRAINT `FK_TEMPORAL_BODEGA` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TEMP_MATERIAL` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TEMP_PRESET` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
