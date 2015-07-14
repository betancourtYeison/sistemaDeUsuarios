-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-07-2015 a las 21:18:00
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `ojo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
`codigo_compra` int(11) NOT NULL,
  `num_tarjeta_credito` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `direccion_envio` varchar(60) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `barrio` varchar(40) DEFAULT NULL,
  `correo_electronico` varchar(120) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedores`
--

CREATE TABLE `contenedores` (
  `nombre_contenedor` varchar(30) NOT NULL DEFAULT '',
  `color_letra` varchar(7) DEFAULT NULL,
  `tamano_letra` int(2) DEFAULT NULL,
  `tipo_letra` varchar(20) DEFAULT NULL,
  `color_fondo` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenedores`
--

INSERT INTO `contenedores` (`nombre_contenedor`, `color_letra`, `tamano_letra`, `tipo_letra`, `color_fondo`) VALUES
('cabecera', '#999999', 36, 'inherit', '#000'),
('cuerpo', '#000', 14, 'inherit', '#fff'),
('menu', '#777777', 14, 'inherit', '#f2f2f2'),
('pie', '#fff', 12, 'inherit', '#000'),
('titulo', '#000', 70, 'inherit', '#fff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
`codigoestado` int(3) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `tipo` int(3) NOT NULL COMMENT '1-estados usuarios, 2-estado de prestamos, 3-estados de recurso'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`codigoestado`, `descripcion`, `tipo`) VALUES
(1, 'ACTIVO', 1),
(2, 'INACTIVO', 1),
(3, 'PENALIZADO', 1),
(4, 'PRESTADO', 2),
(5, 'DEVUELTO', 2),
(6, 'ACTIVO', 3),
(7, 'DADO DE BAJA', 3),
(8, 'DAÑADO', 3),
(9, 'PRESTADO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `codigomodulo` int(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `ruta` varchar(40) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1-normal, 2-submenu, 3-principal submenu'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`codigomodulo`, `descripcion`, `ruta`, `tipo`) VALUES
(1, 'USUARIOS', '../usuarios/usuarios.php', 1),
(7, 'ASIGNAMODULOS', '../configuracion/asignarModulo.php', 2),
(2, 'PERFIL', '../perfiles/perfiles.php', 3),
(8, 'MODULOS', '../modulo/modulos.php', 1),
(20, 'EDITAR MODULOS', '../Estilos/modificar.php', 1),
(21, 'PRODUCTOS', '../productos/productos.php', 1),
(22, 'COMPRAS', '../compras/compras.php', 1),
(10, 'USUARIOS', '../usuarios/usuarios.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `codigoperfil` int(2) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codigoperfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilmodulo`
--

CREATE TABLE `perfilmodulo` (
`codigo` int(2) NOT NULL,
  `codigoperfil` int(2) NOT NULL,
  `codigomodulo` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfilmodulo`
--

INSERT INTO `perfilmodulo` (`codigo`, `codigoperfil`, `codigomodulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(6, 2, 1),
(7, 2, 3),
(4, 1, 4),
(8, 1, 5),
(10, 1, 7),
(11, 1, 8),
(19, 2, 9),
(18, 1, 10),
(17, 1, 9),
(20, 1, 22),
(21, 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(60) DEFAULT NULL,
  `cantidad_disponible` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `categoria` varchar(40) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `cantidad_disponible`, `precio`, `foto`, `descripcion`, `categoria`, `estado`) VALUES
(123, 'sandwich', 10, 1200, '', 'pequeño', '1', 1),
(321, 'coca cola', 96, 2900, '', 'litro', '1/4', 1),
(2221, 'mazamorra', 36, 4500, '', 'rica', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_compra`
--

CREATE TABLE `producto_compra` (
  `codigo_producto` int(11) NOT NULL DEFAULT '0',
  `codigo_compra` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `codigoestado` int(2) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `codigoperfil` int(2) NOT NULL,
  `deuda` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `correo`, `telefono`, `codigoestado`, `pass`, `codigoperfil`, `deuda`) VALUES
('1', 'Jorge', 'Castaño', 'jorge@jorge.copm', '31553535626', 1, '1', 1, 0),
('3', 'Yeison', 'Bentancourt', 'yeison@yeison.com', '12345', 1, '3', 2, 0),
('', '', '', '', '', 0, '', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
 ADD PRIMARY KEY (`codigo_compra`);

--
-- Indices de la tabla `contenedores`
--
ALTER TABLE `contenedores`
 ADD PRIMARY KEY (`nombre_contenedor`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`codigoestado`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
 ADD PRIMARY KEY (`codigomodulo`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`codigoperfil`);

--
-- Indices de la tabla `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto_compra`
--
ALTER TABLE `producto_compra`
 ADD PRIMARY KEY (`codigo_compra`,`codigo_producto`), ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
MODIFY `codigo_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `codigoestado` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
MODIFY `codigo` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_compra`
--
ALTER TABLE `producto_compra`
ADD CONSTRAINT `producto_compra_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`),
ADD CONSTRAINT `producto_compra_ibfk_2` FOREIGN KEY (`codigo_compra`) REFERENCES `compra` (`codigo_compra`);