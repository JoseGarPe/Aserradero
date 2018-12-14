-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2018 a las 22:08:42
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hermes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `campo_a` longtext COLLATE utf8_spanish2_ci,
  `campo_b` longtext COLLATE utf8_spanish2_ci,
  `campo_c` longtext COLLATE utf8_spanish2_ci,
  `campo_d` longtext COLLATE utf8_spanish2_ci,
  `campo_e` longtext COLLATE utf8_spanish2_ci,
  `campo_f` longtext COLLATE utf8_spanish2_ci,
  `campo_g` longtext COLLATE utf8_spanish2_ci,
  `campo_h` longtext COLLATE utf8_spanish2_ci,
  `campo_i` longtext COLLATE utf8_spanish2_ci,
  `campo_j` longtext COLLATE utf8_spanish2_ci,
  `campo_k` longtext COLLATE utf8_spanish2_ci,
  `campo_l` longtext COLLATE utf8_spanish2_ci,
  `campo_m` longtext COLLATE utf8_spanish2_ci,
  `campo_n` longtext COLLATE utf8_spanish2_ci,
  `campo_o` longtext COLLATE utf8_spanish2_ci,
  `campo_p` longtext COLLATE utf8_spanish2_ci,
  `campo_q` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
