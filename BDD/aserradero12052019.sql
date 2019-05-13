-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2019 a las 04:22:51
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

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
(2, 'Bodega_1', 'Sector a', 'Solo contiene materiales de plastico'),
(3, 'Bodega_2', 'San Salvador', 'x'),
(4, 'Bodega_productos', 'santa elena', 'x');

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
(1, 'Procesado', 'Material procesado '),
(2, 'Materia Prima', 'x'),
(3, 'Finalizados', 'x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `id_contenedor` int(11) NOT NULL,
  `id_packing_list` int(11) DEFAULT NULL,
  `estado` varchar(75) DEFAULT NULL,
  `etiqueta` varchar(150) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`id_contenedor`, `id_packing_list`, `estado`, `etiqueta`, `fecha_ingreso`, `id_bodega`) VALUES
(1, 6, 'Sin Confirmar', 'CP2124A', '0000-00-00', NULL),
(2, 7, 'Confirmado', 'CP2124A', '0000-00-00', 0),
(3, 7, 'Sin Confirmar', 'CGP12375', '0000-00-00', 0),
(4, 8, 'Sin Confirmar', 'BK123az122', '0000-00-00', 0),
(5, 9, 'Confirmado', 'ASCHU12', '0000-00-00', 0),
(6, 9, 'Confirmado', 'AJCUQE1234', '0000-00-00', 0),
(7, 10, 'Confirmado', 'fgh12', '2019-04-14', NULL),
(21, 9, 'Confirmado', 'BK123123124', '2019-04-28', 2),
(22, 9, 'Confirmado', 'ASCQUU123', '2019-04-28', 3);

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
(8, 2, 1, 1402),
(9, 2, 2, 620),
(10, 3, 3, 469),
(11, 3, 4, 515);

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
(1, 4, 1, 5);

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
(1, 1, 15, 2, 115),
(2, 1, 16, 3, 115),
(3, 1, 24, 3, 85);

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
(15, 1, 2, '23'),
(16, 1, 3, '23'),
(24, 1, 4, '17');

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
(1, 1, 200, 1, 3, 4, 1, 3, 'Confirmado'),
(2, 1, 100, 1, 3, 4, 1, 3, 'Sin Confirmar'),
(3, 1, 100, 1, 4, 2, 1, 3, 'Sin Confirmar'),
(4, 1, 100, 1, 4, 5, 1, 4, 'Sin Confirmar'),
(5, 1, 450, 1, 2, 450, 450, 2, 'Confirmado'),
(6, 1, 450, 1, 2, 285, 285, 2, 'Confirmado'),
(7, 1, 685, 1, 3, 580, 580, 3, 'Confirmado'),
(8, 1, 850, 1, 4, 600, 600, 3, 'Confirmado');

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
(1, 'Administrador', 'aa');

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
(1, 'Newman 2', 'xx', 2);

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
(1, 'BK12', '110.00', '110.00', '110.00', '100.00', 2),
(2, 'BK12-P', '110.00', '110.00', '110.00', '520.00', 1),
(3, 'FG43-P', '110.00', '30.00', '30.00', '12.00', 1),
(4, 'KA12-P', '110.00', '110.00', '110.00', '100.00', 1);

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
(1, 'ventura 1', 'navio pequeÃ±o');

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
(1, 4, 5, 'Confirmado', 'Finalizado', 1, '2019-03-01', 1);

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
  `id_nave` int(11) DEFAULT NULL,
  `id_especificacion` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `shipper` varchar(250) DEFAULT 'N/A',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `packing_list`
--

INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `id_nave`, `id_especificacion`, `estado`, `shipper`, `fecha_inicio`, `fecha_cierre`) VALUES
(6, '456456', '456898', 'Turismo', 'febrero', '2019-02-11', '5', '2', '10', '10', 'ninguna', 1, 1, 'Cerrado', 'N/A', NULL, NULL),
(7, '5478', '4', 'Compra', 'marzo', '2019-03-01', '4', '3', '15', '4', 'Ninguna', 1, 1, 'abierto', 'N/A', NULL, NULL),
(8, '123', '123123', 'Turismo', 'marzo', '2019-03-21', '15', '2', '25', '25', 'n/a', 1, 1, 'abierto', 'Prueba', NULL, NULL),
(9, '123', '123123asd', 'Compra', 'marzo', '2019-03-21', '15', '65', '123', '123', 'asd', 1, 1, 'Abierto', 'Prueba', NULL, NULL),
(10, '7', '45875', 'Prueba', 'abril', '2019-04-14', '15', '1', '15', '15', 'N/A', 1, 1, 'Cerrado', 'Prueba', '2019-04-14', '2019-04-14');

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
(1, 1, 'BK12-3', 6, 450, '150.00', '150.00', '25.00', '2019-03-01', 'Confirmado', '0.05', 2, 1, '0.20000000000', 450),
(2, 1, 'BK12-3', 7, 450, '150.00', '150.00', '5.00', '2019-03-01', 'Confirmado', '0.01', 2, 2, '0.20000000000', 0),
(3, 1, 'BK12-4', 7, 685, '150.00', '140.00', '4.00', '2019-03-01', 'Confirmado', '0.01', 2, 2, '0.10000000000', 0),
(4, 1, 'BK12-5', 7, 450, '150.00', '150.00', '150.00', '2019-02-28', 'Confirmado', '0.30', 2, 2, '0.20000000000', 450),
(5, 1, 'BK12-6', 7, 850, '150.00', '150.00', '150.00', '2019-02-28', 'Confirmado', '0.29', 2, 2, '0.10000000000', 0),
(6, 1, 'BK123', 8, 40, '123.00', '123.00', '123.00', '2019-03-21', 'Sin Confirmar', '0.03', 2, 4, '0.40000000000', 40),
(7, 1, 'BK123', 8, 0, '0.00', '0.00', '0.00', '0000-00-00', 'Sin Confirmar', '0.00', 0, 0, '0.00000000000', 0),
(8, 1, 'BK1234A8SD', 9, 450, '150.00', '150.00', '150.00', '2019-05-04', 'Sin Confirmar', '0.15', 2, 5, '0.10000000000', 450),
(11, 1, 'BK123456A8SDA', 9, 481, '785.00', '458.00', '254.00', '2019-05-04', 'Sin Confirmar', '6.15', 3, 5, '0.14000000000', 481),
(12, 1, '485asfqw2', 9, 785, '745.00', '150.00', '150.00', '2019-05-04', 'Sin Confirmar', '1.32', 2, 5, '0.10000000000', 785),
(13, 1, 'BK12345AQ', 9, 100, '785.00', '789.00', '785.00', '2019-05-04', 'Sin Confirmar', '4.86', 2, 5, '0.10000000000', 100),
(14, 1, 'BK12345AQ', 9, 500, '456.00', '123.00', '481.00', '2019-05-04', 'Sin Confirmar', '2.70', 2, 5, '0.20000000000', 500),
(15, 1, 'NK34154', 9, 450, '456.00', '456.00', '456.00', '2019-05-04', 'Sin Confirmar', '4.27', 2, 5, '0.10000000000', 450),
(16, 1, 'BK12-7', 7, 452, '200.00', '150.00', '150.00', '2019-05-12', 'Confirmado', '0.41', 2, 2, '0.20000000000', 452);

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
(2, 4, '', '', '', 'Si', 'Si', '', '', 'Si', '', '', 'Si', '', '', '', '', '', '', '', '', '', 'Si', '', ''),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'Tarima Americana', 'x'),
(2, 'Tarima Chep Usa', 'Tarima Chep Usa'),
(3, 'Tarima Americana Banano', 'Tarima Americana Banano');

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
(1, 'Operador', 'asd');

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

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`id_temporal`, `id_material`, `id_bodega`, `cantidad`, `id_preset`) VALUES
(4, 2, 2, 300, 1),
(5, 3, 3, 451, 1),
(6, 4, 3, 165, 1);

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
(5, 'Eduardo', 'Garcia', 'eduardo.garcia@gmail.com', '22145820', 'e257b110509437aaceddbd342bc63d05e74221d6bac056ed279d752ff8d3afcb', 4);

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
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenedores`
--
ALTER TABLE `contenedores`
  MODIFY `id_contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `id_detalle_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega_pro`
--
ALTER TABLE `detalle_bodega_pro`
  MODIFY `id_detalle_bodega_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  MODIFY `id_detalle_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_procesado`
--
ALTER TABLE `detalle_procesado`
  MODIFY `id_detalle_procesado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especificacion`
--
ALTER TABLE `especificacion`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nave`
--
ALTER TABLE `nave`
  MODIFY `id_nave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  MODIFY `id_orden_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id_packing_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `presets`
--
ALTER TABLE `presets`
  MODIFY `id_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id_shipper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id_temporal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `packing_list_ibfk_2` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packing_list_ibfk_3` FOREIGN KEY (`id_especificacion`) REFERENCES `especificacion` (`id_especificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

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
