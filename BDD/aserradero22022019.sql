-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2019 a las 01:24:48
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
  `etiqueta` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(15, 1, 2, '10'),
(16, 1, 3, '20'),
(24, 1, 4, '10');

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
  `id_shipper` int(11) DEFAULT NULL,
  `id_nave` int(11) DEFAULT NULL,
  `id_especificacion` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Tarima Americana', 'x');

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
  ADD KEY `id_shipper` (`id_shipper`),
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
  MODIFY `id_contenedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `id_detalle_bodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega_pro`
--
ALTER TABLE `detalle_bodega_pro`
  MODIFY `id_detalle_bodega_pro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  MODIFY `id_detalle_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_procesado`
--
ALTER TABLE `detalle_procesado`
  MODIFY `id_detalle_procesado` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_orden_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id_packing_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `presets`
--
ALTER TABLE `presets`
  MODIFY `id_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `packing_list_ibfk_1` FOREIGN KEY (`id_shipper`) REFERENCES `shipper` (`id_shipper`),
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
