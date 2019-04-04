-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2019 a las 05:47:39
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id_bodega` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `ubicacion` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id_bodega`, `nombre`, `ubicacion`, `descripcion`) VALUES
(1, 'Bodega Macro', 'x', 'x'),
(2, 'Bodega Yara', 'x', 'x'),
(3, 'Bodega Mearks', 'x', 'x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Materia Prima', 'x'),
(2, 'Procesados', 'x'),
(3, 'Tarimas', 'xx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `id_contenedor` int(11) NOT NULL,
  `id_packing_list` int(11) DEFAULT NULL,
  `estado` varchar(75) DEFAULT NULL,
  `etiqueta` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`id_contenedor`, `id_packing_list`, `estado`, `etiqueta`) VALUES
(1, 1, 'Sin Confirmar', 'contenedor 1');

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
-- Volcado de datos para la tabla `detalle_bodega`
--

INSERT INTO `detalle_bodega` (`id_detalle_bodega`, `id_bodega`, `id_material`, `cantidad`) VALUES
(1, 2, 1, 400),
(2, 2, 8, 0),
(3, 2, 6, 450),
(4, 2, 2, 375),
(5, 2, 3, 425),
(6, 2, 4, 350),
(7, 2, 5, 425),
(9, 2, 7, 425);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bodega_pro`
--

CREATE TABLE `detalle_bodega_pro` (
  `id_detalle_bodega_pro` int(11) NOT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `id_preset` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_bodega_pro`
--

INSERT INTO `detalle_bodega_pro` (`id_detalle_bodega_pro`, `id_bodega`, `id_preset`, `cantidad`) VALUES
(1, 2, 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_detalle_orden` int(11) NOT NULL,
  `id_orden_producto` int(11) DEFAULT NULL,
  `id_detalle_preset` int(11) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `cantidad_utilizado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_detalle_orden`, `id_orden_producto`, `id_detalle_preset`, `id_bodega`, `cantidad_utilizado`) VALUES
(1, 1, 15, 2, 50),
(2, 1, 16, 2, 75),
(3, 1, 13, 2, 150),
(4, 1, 14, 2, 75),
(5, 1, 12, 2, 75),
(6, 1, 10, 2, 100),
(7, 1, 11, 2, 125);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_preset`
--

CREATE TABLE `detalle_preset` (
  `id_detalle_preset` int(11) NOT NULL,
  `id_preset` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_preset`
--

INSERT INTO `detalle_preset` (`id_detalle_preset`, `id_preset`, `id_material`, `cantidad`) VALUES
(10, 1, 1, '4'),
(11, 1, 2, '5'),
(12, 1, 3, '3'),
(13, 1, 4, '6'),
(14, 1, 5, '3'),
(15, 1, 6, '2'),
(16, 1, 7, '3'),
(17, 2, 19, '2'),
(18, 2, 20, '2'),
(19, 2, 21, '5'),
(20, 2, 22, '3'),
(21, 2, 23, '6'),
(22, 2, 24, '3'),
(23, 2, 25, '5'),
(24, 3, 26, '2'),
(25, 3, 27, '6'),
(26, 3, 28, '3'),
(27, 3, 29, '2'),
(28, 3, 30, '2'),
(29, 4, 31, '2'),
(30, 4, 32, '5'),
(31, 4, 33, '3'),
(32, 4, 34, '2'),
(33, 4, 35, '3'),
(34, 4, 36, '6'),
(35, 4, 37, '3'),
(36, 5, 38, '7'),
(37, 5, 39, '3'),
(38, 5, 40, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_procesado`
--

CREATE TABLE `detalle_procesado` (
  `id_detalle_procesado` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `cantidad_materia_prima` int(11) NOT NULL,
  `id_maquina` int(11) NOT NULL,
  `id_material_saliente` int(11) NOT NULL,
  `cantidad_saliente` int(11) NOT NULL,
  `rendimiento_esperado` int(11) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  `estado` varchar(25) DEFAULT 'Sin Confirmar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_procesado`
--

INSERT INTO `detalle_procesado` (`id_detalle_procesado`, `id_materia_prima`, `cantidad_materia_prima`, `id_maquina`, `id_material_saliente`, `cantidad_saliente`, `rendimiento_esperado`, `id_bodega`, `estado`) VALUES
(1, 8, 500, 1, 6, 500, 520, 2, 'Confirmado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion`
--

CREATE TABLE `especificacion` (
  `id_especificacion` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especificacion`
--

INSERT INTO `especificacion` (`id_especificacion`, `nombre`, `descripcion`) VALUES
(1, 'USA', 'X'),
(2, 'EU', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id_maquina` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id_maquina`, `nombre`, `descripcion`, `id_bodega`) VALUES
(1, 'CAPE 1', 'X', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `largo` decimal(19,2) DEFAULT NULL,
  `grueso` decimal(19,2) DEFAULT NULL,
  `ancho` decimal(19,2) DEFAULT NULL,
  `m_cuadrados` decimal(19,2) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `nombre`, `largo`, `grueso`, `ancho`, `m_cuadrados`, `id_categoria`) VALUES
(1, 'T1 CHEP USA', '1013.00', '17.50', '140.00', '0.09', 2),
(2, 'T3 CHEP USA', '1013.00', '17.50', '140.00', '0.07', 2),
(3, 'CB CHEP USA', '1216.00', '19.00', '127.00', '0.08', 2),
(4, 'BK1 CHEP USA', '191.00', '89.00', '127.00', '0.01', 2),
(5, 'BK2 CHEP USA', '95.00', '89.00', '127.00', '0.03', 2),
(6, 'B1 CHEP USA', '1013.00', '17.50', '140.00', '0.05', 2),
(7, 'B2 CHEP USA', '937.00', '17.50', '140.00', '0.06', 2),
(8, 'T1', '2046.00', '17.50', '89.00', '0.09', 1),
(9, 'T2', '270.00', '17.00', '135.00', '0.04', 1),
(10, 'T3', '2000.00', '17.00', '100.00', '0.08', 1),
(11, 'CB', '2432.00', '19.00', '127.00', '0.08', 1),
(12, 'BK1', '320.00', '95.00', '95.00', '0.08', 1),
(13, 'BK2', '290.00', '95.00', '95.00', '0.02', 1),
(14, 'B1', '2026.00', '17.50', '140.00', '0.05', 1),
(15, 'B2', '2000.00', '17.50', '140.00', '0.06', 1),
(16, 'BICELADO', '1000.00', '25.00', '100.00', '0.01', 1),
(17, 'B1 BISELADO', '2032.00', '16.00', '89.00', '0.03', 1),
(18, 'B2 BISELADO', '2024.00', '16.00', '89.00', '0.03', 1),
(19, 'T1 CHEP EUROPEA', '1000.00', '17.50', '140.00', '0.03', 2),
(20, 'T2 CHEP EUROPA', '1000.00', '17.00', '135.00', '0.04', 2),
(21, 'T3 CHEP EUROPA', '1000.00', '17.00', '100.00', '0.08', 2),
(22, 'CB CHEP EUROPA', '1200.00', '25.00', '100.00', '0.09', 2),
(23, 'BK1 CHEP EUROPA', '160.00', '95.00', '95.00', '0.08', 2),
(24, 'BK2 CHEP EUROPA', '95.00', '95.00', '95.00', '0.02', 2),
(25, 'BICELADO CHEP EUROPA', '1000.00', '25.00', '100.00', '0.01', 2),
(26, 'T1 AMERICANA BANANO', '1016.00', '16.00', '127.00', '0.04', 2),
(27, 'T3 AMERICANA BANANO', '1016.00', '16.00', '89.00', '0.09', 2),
(28, 'BASE AMERICANA BANANO', '1219.00', '35.00', '89.00', '0.01', 2),
(29, 'B1 BISELADO AMERICANA BANANO', '1016.00', '16.00', '127.00', '0.04', 2),
(30, 'B2 BISELADO AMERICANA BANANO', '1016.00', '16.00', '89.00', '0.03', 2),
(31, 'T1 PE-GMA03', '1016.00', '19.00', '140.00', '0.05', 2),
(32, 'T3 PE-GMA03	', '1016.00', '19.00', '89.00', '0.09', 2),
(33, 'CB PE-GMA03	', '1219.00', '19.00', '98.00', '0.07', 2),
(34, 'B1 PE-GMA03	', '1016.00', '19.00', '89.00', '0.03', 2),
(35, 'B2 PE-GMA03', '1041.00', '19.00', '98.00', '0.06', 2),
(36, 'BK1 PE-GMA03', '127.00', '89.00', '98.00', '0.07', 2),
(37, 'BK2 PE-GMA03', '89.00', '89.00', '98.00', '0.02', 2),
(38, 'T1 AMERICANA PINA', '1000.00', '16.00', '102.00', '0.01', 2),
(39, 'BASE AMERICANA PINA', '1200.00', '35.00', '89.00', '0.01', 2),
(40, 'B1 AMERICANA PINA', '1000.00', '16.00', '102.00', '0.07', 2),
(41, 'BASE', '2400.00', '35.00', '89.00', '0.01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave`
--

CREATE TABLE `nave` (
  `id_nave` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nave`
--

INSERT INTO `nave` (`id_nave`, `nombre`, `descripcion`) VALUES
(1, 'RITA', 'X'),
(2, 'PESCARA', 'X'),
(3, 'SPIRIT OF AUCKLAND', 'X'),
(4, 'MONTE OLIVA', 'X'),
(5, 'MARINER', 'X'),
(6, 'MARGARETE SCHULTE', 'X'),
(7, 'LORETTA', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE `orden_producto` (
  `id_orden_producto` int(11) NOT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `cantidad` int(111) DEFAULT NULL,
  `estado` varchar(75) COLLATE utf8_spanish2_ci DEFAULT 'Sin Confirmar',
  `fase` varchar(125) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_preset` int(11) DEFAULT NULL,
  `fecha_orden` date DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_producto`
--

INSERT INTO `orden_producto` (`id_orden_producto`, `id_bodega`, `cantidad`, `estado`, `fase`, `id_preset`, `fecha_orden`, `id_maquina`) VALUES
(1, 2, 25, 'Confirmado', 'Finalizado', 1, '2019-03-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packing_list`
--

CREATE TABLE `packing_list` (
  `id_packing_list` int(11) NOT NULL,
  `numero_factura` varchar(250) DEFAULT NULL,
  `codigo_embarque` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `mes` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total_contenedores` decimal(9,0) DEFAULT NULL,
  `contenedores_ingresados` decimal(9,0) DEFAULT NULL,
  `paquetes` decimal(9,0) DEFAULT NULL,
  `paquetes_fisicos` decimal(9,0) DEFAULT NULL,
  `obervaciones` varchar(250) DEFAULT NULL,
  `shipper` int(11) DEFAULT NULL,
  `id_nave` int(11) DEFAULT NULL,
  `id_especificacion` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `packing_list`
--

INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `shipper`, `id_nave`, `id_especificacion`, `estado`) VALUES
(1, '12', '11', 'Compra', 'enero', '2019-03-06', '10', '1', '5', '5', 'cvbnj', 0, 1, 1, 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `etiqueta` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_packing_list` int(11) DEFAULT NULL,
  `piezas` int(11) DEFAULT NULL,
  `largo` decimal(11,2) DEFAULT NULL,
  `ancho` decimal(11,2) DEFAULT NULL,
  `grueso` decimal(11,2) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `estado` varchar(150) COLLATE utf8_spanish2_ci DEFAULT 'Sin Confirmar',
  `metros_cubicos` decimal(11,2) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `id_contenedor` int(11) DEFAULT NULL,
  `multiplo` decimal(11,11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `id_material`, `etiqueta`, `id_packing_list`, `piezas`, `largo`, `ancho`, `grueso`, `fecha_ingreso`, `estado`, `metros_cubicos`, `id_bodega`, `id_contenedor`, `multiplo`, `stock`) VALUES
(1, 1, 'T1-P100', 1, 500, '150.00', '150.00', '150.00', '2019-03-04', 'Confirmado', '0.34', 2, 1, '0.20000000000', 500),
(2, 8, 'T1-P100', 1, 500, '150.00', '150.00', '150.00', '2019-03-20', 'Confirmado', '0.39', 2, 1, '0.23000000000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `campo_a` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_b` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_c` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_d` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_e` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_f` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_g` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_h` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_i` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_j` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_k` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_l` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_m` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_n` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_o` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_p` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_q` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_r` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_s` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_t` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_u` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_v` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campo_x` varchar(123) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_tipo_usuario`, `campo_a`, `campo_b`, `campo_c`, `campo_d`, `campo_e`, `campo_f`, `campo_g`, `campo_h`, `campo_i`, `campo_j`, `campo_k`, `campo_l`, `campo_m`, `campo_n`, `campo_o`, `campo_p`, `campo_q`, `campo_r`, `campo_s`, `campo_t`, `campo_u`, `campo_v`, `campo_x`) VALUES
(1, 1, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '', 'Si', 'Si', 'Si', 'Si', 'Si', NULL),
(2, 4, '', '', '', 'Si', 'Si', '', '', 'Si', '', '', 'Si', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presets`
--

CREATE TABLE `presets` (
  `id_preset` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presets`
--

INSERT INTO `presets` (`id_preset`, `nombre`, `descripcion`) VALUES
(1, 'TARIMA CHEP USA', 'X'),
(2, 'TARIMA CHEP EUROPA', 'X'),
(3, 'TARIMA AMERICANA BANANO', 'X'),
(4, 'TARIMA PEGMA03', 'X'),
(5, 'TARIMA AMERICANA PINA', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(11) NOT NULL,
  `material_entrada` varchar(250) DEFAULT NULL,
  `cantidad_entrada` decimal(9,0) DEFAULT NULL,
  `material_salida` varchar(250) DEFAULT NULL,
  `cantidad_salida` decimal(9,0) DEFAULT NULL,
  `productos_creados` decimal(9,0) DEFAULT NULL,
  `rendimiento_esperado` decimal(9,0) DEFAULT NULL,
  `id_contenedor` int(11) DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_tipo_solicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipper`
--

CREATE TABLE `shipper` (
  `id_shipper` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shipper`
--

INSERT INTO `shipper` (`id_shipper`, `nombre`, `descripcion`) VALUES
(1, 'ARAUCO ARGENTINA', 'X'),
(2, 'TREE SERVICIOS', 'X'),
(3, 'ALTOS HORIZONTES', 'X'),
(4, 'SERRABRAS', 'X'),
(5, 'CMPC', 'X'),
(6, 'ASERRADERO POCO A POCO', 'X'),
(7, 'ASERRADERO JCE', 'X'),
(8, 'DANKS', 'X'),
(9, 'KIMWOOD', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `cantidad` decimal(19,0) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Administra el sitio '),
(4, 'Operador', 'Solo realiza ciertas acciones');

--
-- Disparadores `tipo_usuario`
--
DELIMITER $$
CREATE TRIGGER `permisosUsuario` AFTER INSERT ON `tipo_usuario` FOR EACH ROW INSERT INTO permisos(id_permiso,id_tipo_usuario,campo_a,campo_b,campo_c,campo_d,campo_e,campo_f,campo_g,campo_h,campo_i,campo_j,campo_k,campo_l,campo_m,campo_n,campo_o,campo_p,campo_q,campo_r,campo_s,campo_t,campo_u,campo_v)
values(NULL,new.id_tipo_usuario,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE `traslado` (
  `id_traslado` int(11) NOT NULL,
  `bodega_origen` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `bodega_destino` int(11) DEFAULT NULL,
  `estado` varchar(75) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'No Confirmado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado_pro`
--

CREATE TABLE `traslado_pro` (
  `id_traslado_pro` int(11) NOT NULL,
  `bodega_origen` int(11) DEFAULT NULL,
  `id_preset` int(11) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `bodega_destino` int(11) DEFAULT NULL,
  `estado` varchar(75) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'No Confirmado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `telefono` decimal(9,0) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `correo`, `telefono`, `contrasena`, `id_tipo_usuario`) VALUES
(1, 'Administrador', 'Aserradero', 'administrador@gmail.com', '22589630', 'b20b0f63ce2ed361e8845d6bf2e59811aaa06ec96bcdb92f9bc0c5a25e83c9a6', 1),
(5, 'Eduardo', 'Garcia', 'eduardo.garcia@gmail.com', '22145820', 'e257b110509437aaceddbd342bc63d05e74221d6bac056ed279d752ff8d3afcb', 4),
(6, 'Recepcion', 'Xx', 'rc@gmail.com', '22222222', '6d467c8642298cb3fe4097f8b118018744f00e07ecdb50f07eb960bf805fc0e0', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD PRIMARY KEY (`id_contenedor`),
  ADD KEY `id_packing_list` (`id_packing_list`);

--
-- Indices de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD PRIMARY KEY (`id_detalle_bodega`),
  ADD KEY `FK_DETLALE_1` (`id_bodega`),
  ADD KEY `FK_DETLALE_2` (`id_material`);

--
-- Indices de la tabla `detalle_bodega_pro`
--
ALTER TABLE `detalle_bodega_pro`
  ADD PRIMARY KEY (`id_detalle_bodega_pro`),
  ADD KEY `FK_BODEGA_PRO` (`id_bodega`),
  ADD KEY `FK_PRESETS` (`id_preset`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_detalle_orden`),
  ADD KEY `FK_DETALLE_ORDEN` (`id_orden_producto`),
  ADD KEY `FK_DETALLE_PRESET` (`id_detalle_preset`),
  ADD KEY `FK_BODEGA_DESTINO` (`id_bodega`);

--
-- Indices de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  ADD PRIMARY KEY (`id_detalle_preset`),
  ADD KEY `fk_preset_1` (`id_preset`),
  ADD KEY `fk_material_1` (`id_material`);

--
-- Indices de la tabla `detalle_procesado`
--
ALTER TABLE `detalle_procesado`
  ADD PRIMARY KEY (`id_detalle_procesado`);

--
-- Indices de la tabla `especificacion`
--
ALTER TABLE `especificacion`
  ADD PRIMARY KEY (`id_especificacion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id_maquina`),
  ADD KEY `id_bodega` (`id_bodega`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `nave`
--
ALTER TABLE `nave`
  ADD PRIMARY KEY (`id_nave`);

--
-- Indices de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD PRIMARY KEY (`id_orden_producto`),
  ADD KEY `FK_orden_bodega` (`id_bodega`),
  ADD KEY `FK_orden_preset` (`id_preset`),
  ADD KEY `FK_ORDEN_MAQUINA` (`id_maquina`);

--
-- Indices de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`id_packing_list`),
  ADD KEY `id_shipper` (`shipper`),
  ADD KEY `id_nave` (`id_nave`),
  ADD KEY `id_especificacion` (`id_especificacion`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`),
  ADD KEY `FK_MATERIAL_PAQUETE` (`id_material`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `FK_TIPO_USUARIO` (`id_tipo_usuario`);

--
-- Indices de la tabla `presets`
--
ALTER TABLE `presets`
  ADD PRIMARY KEY (`id_preset`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `id_contenedor` (`id_contenedor`),
  ADD KEY `id_maquina` (`id_maquina`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tipo_solicitud` (`id_tipo_solicitud`);

--
-- Indices de la tabla `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id_shipper`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_bodega` (`id_bodega`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id_temporal`),
  ADD KEY `FK_TEMPORAL_BODEGA` (`id_bodega`),
  ADD KEY `FK_TEMP_MATERIAL` (`id_material`),
  ADD KEY `FK_TEMP_PRESET` (`id_preset`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`id_tipo_solicitud`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD PRIMARY KEY (`id_traslado`),
  ADD KEY `FK_MATERIAL_TRASLADO` (`id_material`);

--
-- Indices de la tabla `traslado_pro`
--
ALTER TABLE `traslado_pro`
  ADD PRIMARY KEY (`id_traslado_pro`),
  ADD KEY `FK_PRESET_TRASLADO` (`id_preset`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  MODIFY `id_contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `id_detalle_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega_pro`
--
ALTER TABLE `detalle_bodega_pro`
  MODIFY `id_detalle_bodega_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  MODIFY `id_detalle_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `detalle_procesado`
--
ALTER TABLE `detalle_procesado`
  MODIFY `id_detalle_procesado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especificacion`
--
ALTER TABLE `especificacion`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `nave`
--
ALTER TABLE `nave`
  MODIFY `id_nave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  MODIFY `id_orden_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id_packing_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `presets`
--
ALTER TABLE `presets`
  MODIFY `id_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id_shipper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id_temporal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `traslado`
--
ALTER TABLE `traslado`
  MODIFY `id_traslado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `traslado_pro`
--
ALTER TABLE `traslado_pro`
  MODIFY `id_traslado_pro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD CONSTRAINT `contenedores_ibfk_1` FOREIGN KEY (`id_packing_list`) REFERENCES `packing_list` (`id_packing_list`);

--
-- Filtros para la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD CONSTRAINT `FK_DETLALE_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `FK_DETLALE_2` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`);

--
-- Filtros para la tabla `detalle_bodega_pro`
--
ALTER TABLE `detalle_bodega_pro`
  ADD CONSTRAINT `FK_BODEGA_PRO` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRESETS` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `FK_BODEGA_DESTINO` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DETALLE_ORDEN` FOREIGN KEY (`id_orden_producto`) REFERENCES `orden_producto` (`id_orden_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DETALLE_PRESET` FOREIGN KEY (`id_detalle_preset`) REFERENCES `detalle_preset` (`id_detalle_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  ADD CONSTRAINT `fk_material_1` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_preset_1` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`);

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD CONSTRAINT `FK_ORDEN_MAQUINA` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orden_bodega` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orden_preset` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `packing_list`
--
ALTER TABLE `packing_list`
  ADD CONSTRAINT `packing_list_ibfk_2` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`),
  ADD CONSTRAINT `packing_list_ibfk_3` FOREIGN KEY (`id_especificacion`) REFERENCES `especificacion` (`id_especificacion`);

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `FK_MATERIAL_PAQUETE` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `FK_TIPO_USUARIO` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_contenedor`) REFERENCES `contenedores` (`id_contenedor`),
  ADD CONSTRAINT `proceso_ibfk_2` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`),
  ADD CONSTRAINT `proceso_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `proceso_ibfk_4` FOREIGN KEY (`id_tipo_solicitud`) REFERENCES `tipo_solicitud` (`id_tipo_solicitud`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`);

--
-- Filtros para la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD CONSTRAINT `FK_TEMPORAL_BODEGA` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TEMP_MATERIAL` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TEMP_PRESET` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `traslado`
--
ALTER TABLE `traslado`
  ADD CONSTRAINT `FK_MATERIAL_TRASLADO` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `traslado_pro`
--
ALTER TABLE `traslado_pro`
  ADD CONSTRAINT `FK_PRESET_TRASLADO` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
