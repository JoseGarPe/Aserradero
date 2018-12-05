-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 08:07:28
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
(2, 'Bodega_1', 'Sector a', 'Solo contiene materiales de plastico');

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
(1, 'Procesado', 'Material procesado ');

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
-- Estructura de tabla para la tabla `detalle_preset`
--

CREATE TABLE `detalle_preset` (
  `id_detalle_preset` int(11) NOT NULL,
  `id_preset` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad` decimal(9,0) DEFAULT NULL
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
(1, 'BK12', '110.00', '110.00', '110.00', '100.00', 1);

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
-- Estructura de tabla para la tabla `presets`
--

CREATE TABLE `presets` (
  `id_preset` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  ADD PRIMARY KEY (`id_detalle_preset`);

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
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `detalle_preset`
--
ALTER TABLE `detalle_preset`
  MODIFY `id_detalle_preset` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nave`
--
ALTER TABLE `nave`
  MODIFY `id_nave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id_packing_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presets`
--
ALTER TABLE `presets`
  MODIFY `id_preset` int(11) NOT NULL AUTO_INCREMENT;

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
