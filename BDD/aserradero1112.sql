-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 07:21:24
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
(4, 'Bodega_productos', 'zona 1', 'x');

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
  `etiqueta` varchar(250) DEFAULT NULL,
  `piezas` decimal(9,0) DEFAULT NULL,
  `multiplo` double(19,2) DEFAULT NULL,
  `m_cuadrados` decimal(19,2) DEFAULT NULL,
  `tarimas` decimal(9,0) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `id_packing_list` int(11) DEFAULT NULL,
  `n_paquetes` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `bodega_pendiente` int(11) DEFAULT NULL,
  `estado` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`id_contenedor`, `etiqueta`, `piezas`, `multiplo`, `m_cuadrados`, `tarimas`, `id_bodega`, `id_packing_list`, `n_paquetes`, `id_material`, `bodega_pendiente`, `estado`) VALUES
(1, 'BK1-100-1', '100', 0.25, '0.40', '2', 2, 1, 3, 1, 0, 'Confirmado'),
(2, 'BK1-100-2', '100', 0.25, '0.40', '2', 2, 1, 3, 1, 0, 'Confirmado'),
(3, 'BK1-100-3', '500', 0.10, '0.08', '1', 2, 1, 150, 2, 0, 'Confirmado'),
(4, 'KAA12', '500', 0.10, '0.13', '1', 3, 1, 250, 4, 0, 'Confirmado');

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
(1, 2, 1, 100),
(2, 2, 2, 310),
(3, 2, 3, 360),
(4, 3, 4, 500);

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
(1, 3, 15, 2, 50),
(2, 3, 16, 2, 50),
(3, 4, 15, 2, 40),
(4, 4, 16, 2, 40),
(5, 5, 15, 2, 50),
(6, 5, 16, 2, 50);

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
(16, 1, 3, '10');

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
(19, 1, 40, 1, 2, 10, 9, 2, 'Confirmado'),
(20, 1, 10, 1, 3, 50, 10, 2, 'Confirmado'),
(21, 1, 10, 1, 3, 10, 10, 2, 'Confirmado');

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
(2, 'BK12-P', '10.00', '10.00', '10.00', '520.00', 1),
(3, 'FG43-P', '10.00', '3.00', '30.00', '12.00', 1),
(4, 'KA12-P', '10.00', '10.00', '10.00', '100.00', 1);

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
  `id_preset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_producto`
--

INSERT INTO `orden_producto` (`id_orden_producto`, `id_bodega`, `cantidad`, `estado`, `fase`, `id_preset`) VALUES
(3, 4, 5, 'Confirmado', 'Finalizado', 1),
(4, 4, 4, 'Confirmado', 'Finalizado', 1),
(5, 4, 5, 'Sin Confirmar', 'NULL', 1);

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

--
-- Volcado de datos para la tabla `packing_list`
--

INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `id_shipper`, `id_nave`, `id_especificacion`, `estado`) VALUES
(1, '1', '1', 'x', 'enero', '2018-12-06', '3', '4', '10', '5', 'rewa', 1, 1, 1, 'abierto');

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
(3, 'Administrador', 'Administra el sitio '),
(4, 'Operador', 'Solo realiza ciertas acciones');

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
  ADD KEY `id_packing_list` (`id_packing_list`),
  ADD KEY `id_bodega` (`id_bodega`);

--
-- Indices de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD PRIMARY KEY (`id_detalle_bodega`),
  ADD KEY `FK_DETLALE_1` (`id_bodega`),
  ADD KEY `FK_DETLALE_2` (`id_material`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_detalle_orden`),
  ADD KEY `FK_BODEGA_SALIDA` (`id_bodega`),
  ADD KEY `FK_ORDEN_PRODUCTO` (`id_orden_producto`),
  ADD KEY `FK_DETALLE_PRESET` (`id_detalle_preset`);

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
  ADD KEY `FK_orden_preset` (`id_preset`);

--
-- Indices de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`id_packing_list`),
  ADD KEY `id_shipper` (`id_shipper`),
  ADD KEY `id_nave` (`id_nave`),
  ADD KEY `id_especificacion` (`id_especificacion`);

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
  MODIFY `id_contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `id_detalle_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  MODIFY `id_detalle_preset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_procesado`
--
ALTER TABLE `detalle_procesado`
  MODIFY `id_detalle_procesado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_orden_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id_packing_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenedores`
--
ALTER TABLE `contenedores`
  ADD CONSTRAINT `contenedores_ibfk_1` FOREIGN KEY (`id_packing_list`) REFERENCES `packing_list` (`id_packing_list`),
  ADD CONSTRAINT `contenedores_ibfk_2` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`);

--
-- Filtros para la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD CONSTRAINT `FK_DETLALE_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`),
  ADD CONSTRAINT `FK_DETLALE_2` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `FK_BODEGA_SALIDA` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DETALLE_PRESET` FOREIGN KEY (`id_detalle_preset`) REFERENCES `detalle_preset` (`id_detalle_preset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDEN_PRODUCTO` FOREIGN KEY (`id_orden_producto`) REFERENCES `orden_producto` (`id_orden_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_orden_preset` FOREIGN KEY (`id_preset`) REFERENCES `presets` (`id_preset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `packing_list`
--
ALTER TABLE `packing_list`
  ADD CONSTRAINT `packing_list_ibfk_1` FOREIGN KEY (`id_shipper`) REFERENCES `shipper` (`id_shipper`),
  ADD CONSTRAINT `packing_list_ibfk_2` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`),
  ADD CONSTRAINT `packing_list_ibfk_3` FOREIGN KEY (`id_especificacion`) REFERENCES `especificacion` (`id_especificacion`);

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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
